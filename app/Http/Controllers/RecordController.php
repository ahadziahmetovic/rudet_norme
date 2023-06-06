<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;
use App\Models\Employee;
use App\Models\Operation;
use App\Models\Product;
use App\Models\Serie;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function records_list()
    {

        $stanje = DB::table("records")
            ->select('records.id', 'employees.first_name', 'employees.last_name', 'products.product_name', 'operations.operation', 'records.amount', 'records.hours', 'records.scrap', 'records.machine_no')
            ->leftjoin('employees', 'employees.id', '=', 'records.employee_id')
            ->leftjoin('work_orders', 'work_orders.id', '=', 'records.order_id')
            ->leftjoin('products', 'products.id', '=', 'records.product_id')
            ->leftjoin('operations', 'operations.id', '=', 'records.operation_id')
            ->paginate(15);
        Log::info($stanje);


        return view('records_list', ['stanje' => $stanje]);
    }
    public function records_edit()
    {

        return view('records_edit');
    }

    public function records()
    {
        $stanje = WorkOrder::where('status', '=', 1)->get();

        $series = Serie::where('status', '=', 1)->get();
        $operations = Operation::where('status', '=', 1)->get();
        Log::info($series);
        return view('records', ['stanje' => $stanje, 'series' => $series, 'operations' => $operations]);
    }

    public function import_records(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        //Data values
        //Log::info($data['uposlenik_id']);
        /*   foreach ($data['data'] as $key) {
         Log::info($key);
        }  */
        //Separated values



        foreach ($data as $key => $value) {

            foreach ($value as $k) {
                $user = DB::table('empview')->where('FullName', $k['fullname'])->first();
                //Log::info($user->FullName);
                //ID Imena i prezimena
                Log::info($user->id);

                //Novi Unos
                $record = new Record();
                $record->amount = $k['amount'];
                $record->hours = $k['hours'];
                $record->scrap = $k['scrap'];
                $record->date = $k['datum'];
                $record->machine_no = 1;
                $record->order_id = $k['nalog_id'];
                $record->product_id = $k['product_id'];
                $record->employee_id = $user->id;
                $record->operation_id = $k['operation_id'];
                $record->machine_no = $k['masina'];
                $record->serie_id = $k['series_id'];
                $record->save();

                //Log::info($k);


            }

            // echo json_encode(['status'=>'RADI']);


        }
        echo json_encode(['status' => 'RADI']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecordRequest  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update($record)
    {
        $rec = Record::find($record);
        $rn = WorkOrder::where('id', '=', $rec->order_id)->get();
        $product = Product::find($rec->product_id);
        $employee = DB::table('empview')->where('id', $rec->employee_id)->first();
        $operation = Operation::where('id', '=', $rec->operation_id)->first();
        $serie = Serie::where('id', '=', $rec->serie_id)->first();
        $machine = $rec->machine_no;
        Log::info($rec);

        return view('records_edit')->with(['record' => $rec, 'rn' => $rn, 'oper' => $operation, 'serie' => $serie, 'product' => $product, 'employee' => $employee, 'machine' => $machine]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy($record)
    {
        //Remove record

        $record = Record::find($record);
        $record->delete();
        return Redirect::route('records_list');
    }

    public function reports(Request $request)
    {

        if ($request->isMethod('get')) {
            return view('reports');
        }

        if ($request->isMethod('post')) {
            if (isset($request)) {
                $pocetak = Date('Y-m-d', strtotime($request->pocetak));
                $kraj = Date('Y-m-d', strtotime($request['kraj']));

                $employees = DB::table('employees')
                    ->join('records', 'employees.id', '=', 'records.employee_id')
                    ->join('operations', 'records.operation_id', '=', 'operations.id')
                    ->select('employees.first_name', 'employees.last_name', 'records.amount', 'records.hours', 'operations.operation', 'operations.norm')
                    ->selectRaw('ROUND(((amount-scrap) / ((operations.norm / 8) * records.hours)) * 100, 2) AS percentage')
                    ->whereBetween('records.date', [$pocetak, $kraj])
                    ->orderBy('percentage', 'DESC')
                    ->get();

                Log::info($employees);

                return view('reports')->with('employees', $employees)->with('pocetak', $pocetak)->with('kraj', $kraj);
            } else {
                $poruka = "Potrebno je da izaberete datume.";
                return view('reports', ['poruka' => $poruka]);
            }
        }
    }

    public function reports_total(Request $request)
    {

        if (isset($request)) {
            $pocetak = Date('Y-m-d', strtotime($request->pocetak));
            $kraj = Date('Y-m-d', strtotime($request['kraj']));

            $employees = Employee::join('records', 'employees.id', '=', 'records.employee_id')
                ->join('operations', 'records.operation_id', '=', 'operations.id')
                ->select('employees.first_name', 'employees.last_name')
                ->selectRaw('SUM(records.amount) AS amount, SUM(records.hours) AS hours, SUM(operations.norm) AS norm')
                ->selectRaw('ROUND(AVG(ROUND(((amount-scrap) / ((operations.norm / 8) * records.hours)) * 100, 2)), 2) AS percentage')
                ->whereBetween('records.date', [$pocetak, $kraj])
                ->groupBy('employees.first_name', 'employees.last_name')
                ->orderBy('percentage', 'DESC')
                ->get();
            Log::info($employees);

            return view('reports_total')->with('employees', $employees)->with('pocetak', $pocetak)->with('kraj', $kraj);
        } else {
            $poruka = "Potrebno je da izaberete datume.";
            return view('reports_total', ['poruka' => $poruka]);
        }
    }
}

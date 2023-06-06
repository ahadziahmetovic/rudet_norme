<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use App\Http\Requests\StoreWorkOrderRequest;
use App\Http\Requests\UpdateWorkOrderRequest;
use App\Models\Product;
use App\Models\WorkOrderProduct;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WorkOrderController extends Controller
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
    public function workorder()
    {
        $products = Product::where('status', '=', 1)->get();
        $workorders = WorkOrder::where('status',1)->get();
        return view('workorder', ['products' => $products, 'workorders'=> $workorders]);
    }

    public function import_workorder(Request $request)
    {

        try {
            $data = json_decode($request->getContent(), true);
            $order_num = $data['nalog_naziv'];
            $nalog = new WorkOrder();
            $nalog->order_number = $order_num;
            $nalog->status = true;
            $nalog->date = Carbon::now()->format('Y-m-d');
            $nalog->save();
            $nalog_id = $nalog->id;
    
            foreach ($data['podaci'] as $key => $value) {
                Log::info($value);
                $wop = new WorkOrderProduct();
                $wop->amount = $value['kolicina'];
                $wop->order_id = $nalog_id;
                $wop->product_id = $value['proizvod_id'];
                $wop->save();
            }

            echo json_encode(['status' => 'NALOG JE UNEŠEN!']);

          
          } catch (Exception $e) {
          
            
          
             // return $e->getMessage();
              echo json_encode(['status' => $e->getMessage()]);
          
          }

       
        //echo json_encode(['status' => 'NALOG JE UNEŠEN!']);
       
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
     * @param  \App\Http\Requests\StoreWorkOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show($value)
    {

        //Show data of workorder
        $workOrderList = WorkOrderProduct::join('products', 'work_order_products.product_id','=','products.id')
        ->join('work_orders','work_order_products.order_id','=', 'work_orders.id')
        ->where('order_id', $value)->get();
        return view('workorder_details', ['workOrderList' => $workOrderList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkOrderRequest  $request
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkOrderRequest $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }
}

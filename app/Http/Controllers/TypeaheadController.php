<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeaheadController extends Controller
{

    public function autocompleteSearch(Request $request)
    {
          $query = $request->get('term');
          //$query = json_decode($request->getContent(), true);
        
          //$filterResult = Employee::where('first_name', 'LIKE', '%'. $query)->pluck('first_name');
          $filterResult = DB::table('empview')->where('FullName', 'LIKE', '%'. $query.'%')->pluck('FullName');
          Log::info($filterResult);
          return response()->json($filterResult);
         // echo json_encode($filterResult);
    } 
    
}

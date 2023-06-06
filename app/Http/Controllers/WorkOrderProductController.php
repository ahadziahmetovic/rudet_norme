<?php

namespace App\Http\Controllers;

use App\Models\WorkOrderProduct;
use App\Http\Requests\StoreWorkOrderProductRequest;
use App\Http\Requests\UpdateWorkOrderProductRequest;

class WorkOrderProductController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkOrderProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkOrderProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrderProduct  $workOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrderProduct $workOrderProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrderProduct  $workOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrderProduct $workOrderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkOrderProductRequest  $request
     * @param  \App\Models\WorkOrderProduct  $workOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkOrderProductRequest $request, WorkOrderProduct $workOrderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrderProduct  $workOrderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrderProduct $workOrderProduct)
    {
        //
    }
}

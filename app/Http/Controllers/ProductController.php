<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\WorkOrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::get();
        return view('newProduct',['products'=> $products]);
    }

    
    public function vrati_proizvode(Request $request)
    {
        
        $nalog = json_decode($request->getContent(), true);
        $proizvodi = WorkOrderProduct::where('order_id','=', $nalog)->get();
        $svi_proizvodi = collect();
        foreach ($proizvodi as $key => $value) {
            Log::info('Key:'.$key.' Vrijednost:'.$value->product_id);
            $svi_proizvodi->push(Product::where('id','=', $value->product_id)->get());

        }
        $svi_proizvodi = $svi_proizvodi->flatten();
        Log::info($svi_proizvodi);
        echo json_encode($svi_proizvodi);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Product::create($request->all());
        return Redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the item by its ID
        $prod = Product::find($id);
    
        // Check if the item exists
        if (!$prod) {
            return redirect()->route('newProduct')->with('error', 'Product not found.');
        }
    
        // Delete the item
        $prod->delete();
    
        // Redirect back with a success message
        return redirect()->route('newProduct')->with('success', 'Product deleted successfully.');
    }
}

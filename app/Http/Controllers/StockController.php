<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Record;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock =Stock::get();
        return view('files.stock.index',compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product= Product::get();
        $stock = Stock::get();
        return view('files.stock.create',compact('product','stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $stock = Stock::findOrFail($id);
        // dd($request->all());
        $product_id= $request->product_id;

        $request->validate([
            'supplier_name' => 'required|max:50|min:2',
            
            'product_id' => 'required'
        ]);
        $stock= new Stock;
        $stock['supplier_name'] = $request->supplier_name;
        $stock['product_id'] = $request->product_id;
        $stock['in_stock'] = $request->in_stock;
        $stock->save();
        $recieved_stock= Stock::where('product_id',$product_id)->sum('in_stock');
        dd($recieved_stock);
        $record = new Record;
     



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

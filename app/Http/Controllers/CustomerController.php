<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer :: get();
        return view ('files.customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $customer = new Customer;
        $customer['name']= $request->name;
        $customer['phone']= $request->phone;
        $customer['email']= $request->email;
        $customer['address'] = $request->address;
        $customer->save();
        return back()->with('message','Customer added Successfully');
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
        $customer = Customer::findorFail($id);
        return view('files.customer.edit',compact('customer'));
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
        $customer = Customer::findorFil($id);
        $customer['name'] =  $request->name;
        $customer['phone'] = $request->phone;
        $customer['email'] = $request->email;
        $customer['address'] = $request->address;
        $customer->update();
        return back()->with('message','Customer updated Successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer= Customer::findorFail($id);
        $customer->delete();
        return back()->with('message','Customer deleted successfully');
    }

    public function details($id){
        $customer = Customer::findorFail($id);
        return $customer;

    }
}

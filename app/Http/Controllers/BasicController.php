<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Challan;
use App\Models\ChallanItem;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Customer;
use App\Models\Stock;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function dashboard()
    {
        $current_date = Carbon::now()->toDateString();
        //today sales
        $todaySale = Sale::where('created_at', 'LIKE','%'.$current_date.'%')->sum('total_amount');
        //monthly sales
        $monthSale = Sale::whereMonth('created_at',date('m'))->sum('total_amount');
        //yearly sales
        $yearlySale = Sale::whereYear('created_at',date('Y'))->sum('total_amount');
        
        $totalSale = Sale::sum('total_amount');
        return view('files.home.index', [
            'todaySale' => $todaySale,
            'monthSale' => $monthSale,
            'yearlySale' => $yearlySale,
            'totalSale' => $totalSale
        ]);
    }

    //Brand section
    public function brand()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('files.brand.index', compact('brands'));
    }
    public function brandStore(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->save();

        return back()->with('message','Brand has been created successfully');
    }
    public function brandDestroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return back()->with('delete-message','Brand has been deleted successfully');
    }

    //Sale section
    public function showSale()
    {
        $sales = Sale::orderBy('id', 'DESC')->get();
        return view('files.sale.index',compact('sales'));
        
        /*
        $sales = Sale::orderBy('id', 'DESC')->get();
        dd($sales);*/
    }
    public function createSale()
    {
        $customer = Customer::get();
        $product = Product::get();
        return view('files.sale.create',compact('customer','product'));
    }
    //Create sale with date
    public function createSaleDate()
    {
        return view('files.sale.create-date');
    }
    //Store sale data
    public function saveSale(Request $request)
    {
        // dd(($request->quantity));
        $quantity = $request->quantity;
        // dd($quantity);
        
        $id=$request->product_id; 
        
    // dd($id);
    $stock = Stock::where('product_id',$id)->sum('in_stock');
        // dd($stock);

    // return $stock;
    // die;
        $product= Product::find($id);
        // dd($product['model']);
        foreach($request->quantity as $data){
            $total_stock =  $stock - $data;
            // dd($total_stock);
        }

        
        $product['total_stock'] = $total_stock;
        $product->save();
        // dd($product['total_stock']);

    


       
       
        $request->validate([
            'c_name'=>'required',
            // 'c_number'=>'required',
            // 'c_address'=>'required',
        ]);
        
        
        if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_email']){
            $c_email = $request['c_email'];
        }else{
            $c_email = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['cp_name']){
            $cp_name = $request['cp_name'];
        }else{
            $cp_name = "";
        }
        
        if($request['cp_number']){
            $cp_number = $request['cp_number'];
        }else{
            $cp_number = "";
        }
        
        if($request['cp_address']){
            $cp_address = $request['cp_address'];
        }else{
            $cp_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['relational_manager']){
            $relational_manager = $request['relational_manager'];
        }else{
            $relational_manager = "";
        }
        
        if($request['guarantee_card_no']){
            $guarantee_card_no = $request['guarantee_card_no'];
        }else{
            $guarantee_card_no = "";
        }
        
        if($request['po_ref_no']){
            $po_ref_no = $request['po_ref_no'];
        }else{
            $po_ref_no = "";
        }
        
         
        
       
        // $invoice_value = Sale::latest()->first();
        $invoice_value = Sale::get()->last();
        // return $invoice_value['due_amount'];
        
        // $invoice_value = Sale::max('id');
        
        $invoice =  Sale::insertGetId([
            'c_name' => $request['c_name'],
            'cp_name' => $cp_name,
            'c_email' => $c_email,
            'c_number' => $c_number,
            'cp_number' => $cp_number,
            'c_address' => $c_address,
            'cp_address' => $cp_address,
            'narration' => $narration,
            'relational_manager' => $relational_manager,
            'guarantee_card_no' => $guarantee_card_no,
            'po_ref_no' => $po_ref_no,
            
            'invoice' => $invoice_value['invoice'] + 1,
            'total_amount' => $request['total_amount'],
           
        
            'discount' => $request['discount'],
            'discounted_price' => $request['discounted_price'],
            'paid_amount' => $request['amountPaid'],
            'due_amount' => $request['amountDue'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            SaleItem::insert([
                'sale_id' => $lastInsertId,
                'product_name' => $request['productName'][$i],
                'product_model' => $request['productModel'][$i],
                'product_color' => $request['productColor'][$i],
                'product_capacity' => $request['productCapacity'][$i],
                'product_serial' => $request['productSerial'][$i],
                'sale_item_quantity' => $request['quantity'][$i],
                
                'unit' => $request['unit'][$i],
                
                'sale_item_price' => $request['price'][$i],
                'sale_item_total_amount' => $request['total'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            
        }
        return redirect()->route('show.sale');
    }
    //Store sale data with date
    public function saveSaleDate(Request $request)
    {
        
        // return $request->all();
       
        $request->validate([
            'c_name'=>'required',
            
            'created_at'=>'required',
        ]);
        
        
        
        
        if($request['c_email']){
            $c_email = $request['c_email'];
        }else{
            $c_email = "";
        }
        
        
        if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['cp_name']){
            $cp_name = $request['cp_name'];
        }else{
            $cp_name = "";
        }
        
        if($request['cp_number']){
            $cp_number = $request['cp_number'];
        }else{
            $cp_number = "";
        }
        
        if($request['cp_address']){
            $cp_address = $request['cp_address'];
        }else{
            $cp_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['relational_manager']){
            $relational_manager = $request['relational_manager'];
        }else{
            $relational_manager = "";
        }
        
        if($request['guarantee_card_no']){
            $guarantee_card_no = $request['guarantee_card_no'];
        }else{
            $guarantee_card_no = "";
        }
        
        if($request['po_ref_no']){
            $po_ref_no = $request['po_ref_no'];
        }else{
            $po_ref_no = "";
        }
        
        
        // $invoice_value = Sale::max('id');
        // $invoice_value = Sale::latest()->first();
        $invoice_value = Sale::get()->last();
        $invoice =  Sale::insertGetId([
            'c_name' => $request['c_name'],
            
            'c_email' => $c_email,
            'c_number' =>$c_number,
            
            
            'c_address' => $c_address,
            'cp_name' => $cp_name,
            'cp_number' => $cp_number,
            'cp_address' => $cp_address,
            'narration' => $narration,
            'relational_manager' => $relational_manager,
            'guarantee_card_no' => $guarantee_card_no,
            'po_ref_no' => $po_ref_no,
            
            'invoice' => $invoice_value['invoice'] + 1,
            'total_amount' => $request['total_amount'],
            'discount' => $request['discount'],
            'discounted_price' => $request['discounted_price'],
            'paid_amount' => $request['amountPaid'],
            'due_amount' => $request['amountDue'],
            'created_at' => $request['created_at'],
            'updated_at' => Carbon::now()
        ]);

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            SaleItem::insert([
                'sale_id' => $lastInsertId,
                'product_name' => $request['productName'][$i],
                'product_model' => $request['productModel'][$i],
                'product_color' => $request['productColor'][$i],
                'product_capacity' => $request['productCapacity'][$i],
                'product_serial' => $request['productSerial'][$i],
                'sale_item_quantity' => $request['quantity'][$i],
                
                'unit' => $request['unit'][$i],
                
                'sale_item_price' => $request['price'][$i],
                'sale_item_total_amount' => $request['total'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('show.sale');
    }
    //Print single sale
    public function salePrint($id)
    {
        
        $sale = Sale::findOrFail($id);
       
        
        $saleItems = SaleItem::where('sale_id', $id)->get();
        
        $sale_sum = SaleItem::where('sale_id', $id)->sum('sale_item_quantity');
        // dd($sale_sum);
        // return $sale_sum; die;
        // return view('files.sale.sale-print', [
        //     'sale' => $sale,
        //     'saleItems' => $saleItems,
        //     'sale_sum' => $sale_sum
        // ]);
        
         return view('files.sale.sale-print',compact('sale','saleItems','sale_sum'));
    }
    public function saleRemove($id){
        $invoice = Sale::findOrFail($id);
        $invoice->delete();
        return back()->with('delete-message','Sale has been deleted successfully');
    }

    //Challan section
    public function showChallan()
    {
        $sales = Challan::orderBy('id', 'DESC')->get();
        return view('files.challan.index',[
            'sales' => $sales
        ]);
    }
    public function createChallan()
    {
        return view('files.challan.create');
    }

    public function createChallanDate()
    {
        return view('files.challan.create-date');
    }
    //Store challan data
    public function saveChallan(Request $request)
    {
        
        
        
        
        // return $request->all(); die;
        
        $request->validate([
            'c_name'=>'required',
        ]);
        
        
        
        
        
        if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['delivery_address']){
            $delivery_address = $request['delivery_address'];
        }else{
            $delivery_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['driver']){
            $driver = $request['driver'];
        }else{
            $driver = "";
        }
        
        if($request['request']){
            $rrequest = $request['request'];
        }else{
            $rrequest = "";
        }
        
        if($request['vehicle']){
            $rvehicle = $request['vehicle'];
        }else{
            $rvehicle = "";
        }
       
        if($request['ho']){
            $rho = $request['ho'];
        }else{
            $rho = "";
        }
        
        if($request['invoice_no']){
            $invoice_no = $request['invoice_no'];
        }else{
            $invoice_no = "";
        }
        
        // $invoice_value = Challan::max('id');
 
        // $invoice_value = Challan::latest()->first();
        $invoice_value = Challan::get()->last();
        // return $invoice_value;
        $invoice =  Challan::insertGetId([
            'c_name' => $request['c_name'],
            'c_number' => $c_number,
            'c_address' => $c_address,
            'delivery_address' => $delivery_address,
            'narration' => $narration,
            'challan_no' => $invoice_value['challan_no'] + 1,
            
            'invoice' => $invoice_value['invoice'] + 1,
            'serial' => "",
            'invoice_date' => Carbon::now()->toDateString(),
            'driver' => $driver,
            'request' => $rrequest,
            'vehicle' => $rvehicle,
            'ho' => $rho,
            'invoice_no'=>$invoice_no,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
   

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            ChallanItem::insert([
                'challan_id' => $lastInsertId,
                'product_name' => $request['productName'][$i],
                'product_model' => $request['productModel'][$i],
                'product_color' => $request['productColor'][$i],
                'product_serial' => $request['productSerial'][$i],
                'challan_item_quantity' => $request['quantity'][$i],
                'unit' => $request['unit'][$i],
                'remarks' => $request['remarks'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        return redirect()->route('show.challan');
    }
    //Store challan data with date
    public function saveChallanDate(Request $request)
    {
        $request->validate([
            'c_name'=>'required',
            
            'created_at'=>'required',
        ]);
        
         if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['delivery_address']){
            $delivery_address = $request['delivery_address'];
        }else{
            $delivery_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['driver']){
            $driver = $request['driver'];
        }else{
            $driver = "";
        }
        
        if($request['request']){
            $rrequest = $request['request'];
        }else{
            $rrequest = "";
        }
        
        if($request['vehicle']){
            $rvehicle = $request['vehicle'];
        }else{
            $rvehicle = "";
        }
       
        if($request['ho']){
            $rho = $request['ho'];
        }else{
            $rho = "";
        }
        
        if($request['invoice_no']){
            $invoice_no = $request['invoice_no'];
        }else{
            $invoice_no = "";
        }
        
        // $invoice_value = Challan::max('id');
        // $invoice_value = Challan::latest()->first();
        
        $invoice_value = Challan::get()->last();
        $invoice =  Challan::insertGetId([
            'c_name' => $request['c_name'],
            'c_number' => $c_number,
            'c_address' => $c_address,
            'delivery_address' => $delivery_address,
            'narration' => $narration,
            'challan_no' => $invoice_value['challan_no'] + 1,
            'invoice' => $invoice_value['invoice'] + 1,
            'invoice_date' => Carbon::now()->toDateString(),
            'driver' => $driver,
            'request' => $rrequest,
            'vehicle' => $rvehicle,
            'ho' => $rho,
            'invoice_no' => $invoice_no,
            'created_at' => $request['created_at'],
            'updated_at' => Carbon::now()
        ]);

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            ChallanItem::insert([
                'challan_id' => $lastInsertId,
                'product_name' => $request['productName'][$i],
                'product_model' => $request['productModel'][$i],
                'product_color' => $request['productColor'][$i],
                'product_serial' => $request['productSerial'][$i],
                'challan_item_quantity' => $request['quantity'][$i],
                'unit' => $request['unit'][$i],
                'remarks' => $request['remarks'][$i],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        
        return redirect()->route('show.challan');
    }
    public function challanRemove($id){
        $invoice = Challan::findOrFail($id);
        $invoice->delete();
        return back()->with('delete-message','Challan has been deleted successfully');
    }
    //Print single challan
    public function challanPrint($id)
    {
        $sale = Challan::findOrFail($id);
        $saleItems = ChallanItem::where('challan_id', $id)->get();
        $sale_sum = ChallanItem::where('challan_id', $id)->sum('challan_item_quantity');
        return view('files.challan.challan-print', [
            'sale' => $sale,
            'saleItems' => $saleItems,
            'sale_sum' => $sale_sum
        ]);
    }
    
    
    //challanEdit
    public function challanEdit($challan_id){
        $challan = Challan::where('id',$challan_id)->first();
        
        $items = ChallanItem::where('challan_id',$challan_id)->get()->toArray();
        
        return view('files.challan.challan_edit',compact('challan','items'));
    }
    
    //challanUpdate
    public function challanUpdate(Request $request,$challan_id)
    {
        
        
        
        
        ///return $request->all(); die;
        
        $request->validate([
            'c_name'=>'required',
        ]);
        
        
        
        
        
        if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['delivery_address']){
            $delivery_address = $request['delivery_address'];
        }else{
            $delivery_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['driver']){
            $driver = $request['driver'];
        }else{
            $driver = "";
        }
        
        if($request['request']){
            $rrequest = $request['request'];
        }else{
            $rrequest = "";
        }
        
        if($request['vehicle']){
            $rvehicle = $request['vehicle'];
        }else{
            $rvehicle = "";
        }
       
        if($request['ho']){
            $rho = $request['ho'];
        }else{
            $rho = "";
        }
        
        if($request['invoice_no']){
            $invoice_no = $request['invoice_no'];
        }else{
            $invoice_no = "";
        }
        
        $fl=Challan::findorFail($request['challan_id']);
        // $invoice_value = Challan::max('id');
 
        $invoice_value = Challan::latest()->first();
        $invoice =  Challan::insertGetId([
            'c_name' => $request['c_name'],
            'c_number' => $c_number,
            'c_address' => $c_address,
            'delivery_address' => $delivery_address,
            'narration' => $narration,
            
            'challan_no' => $invoice_value['challan_no'] ,
            'invoice' => $invoice_value['invoice'] + 1,
            'serial' => "",
            'invoice_date' => Carbon::now()->toDateString(),
            'driver' => $driver,
            'request' => $rrequest,
            'vehicle' => $rvehicle,
            'ho' => $rho,
            'invoice_no'=>$invoice_no,
            'created_at' => $fl->created_at,
            'updated_at' => Carbon::now()
        ]);
        
  

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            
        if($request['productName'][$i]){
         $productName = $request['productName'][$i];
        }else{
            $productName = "";
        }
         if($request['productModel'][$i]){
            $productModel = $request['productModel'][$i];
        }else{
            $productModel = "";
        }
        
        if($request['productColor'][$i]){
            $productColor = $request['productColor'][$i];
        }else{
            $productColor = "";
        }
        
        // if($request['productColor'][$i]){
        //     $productColor = $request['productColor'][$i];
        // }else{
        //     $productColor = "";
        // }
        if($request['productSerial'][$i]){
            $productSerial = $request['productSerial'][$i];
        }else{
            $productSerial = "";
        }
        if($request['quantity'][$i]){
            $quantity = $request['quantity'][$i];
        }else{
            $quantity = "";
        }
         if($request['unit'][$i]){
            $unit = $request['unit'][$i];
        }else{
            $unit = "";
        }
        //  if($request['unit'][$i]){
        //     $unit = $request['unit'][$i];
        // }else{
        //     $unit = "";
        // }
         if($request['remarks'][$i]){
            $remarks = $request['remarks'][$i];
        }else{
            $remarks = "";
        }
            ChallanItem::insert([
                'challan_id' => $lastInsertId,
                'product_name' => $productName,
                'product_model' => $productModel,
                'product_color' => $productColor,
                'product_serial' => $productSerial,
                'challan_item_quantity' => $quantity,
                'unit' => $unit,
                'remarks' => $remarks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $file=Challan::findorFail($request['challan_id']);
        //return $file;
        $file->delete();
        

        $files = ChallanItem::where('challan_id',$request['challan_id'])->get();
        foreach($files as $file){
            $file_del = ChallanItem::where('challan_id',$file['challan_id'])->first();
            $file_del->delete();
        }
        return redirect()->route('show.challan');
    }
    
   
    //saleEdit
    public function saleEdit($sale_id){
        $sale = Sale::where('id',$sale_id)->first();
        $sale_item = SaleItem::where('sale_id',$sale['id'])->get()->toArray();
        return view('files.sale.sale_edit',compact('sale','sale_item'));
    }
    
    
    //saleUpdate
    public function saleUpdate(Request $request,$sale_id)
    {
        //return $sale_id;
        // return $request->all();
       
        $request->validate([
            'c_name'=>'required',
            // 'c_number'=>'required',
            // 'c_address'=>'required',
           
        ]);
        
        
        if($request['c_number']){
            $c_number = $request['c_number'];
        }else{
            $c_number = "";
        }
        
        if($request['c_email']){
            $c_email = $request['c_email'];
        }else{
            $c_email = "";
        }
        
        if($request['c_address']){
            $c_address = $request['c_address'];
        }else{
            $c_address = "";
        }
        
        if($request['cp_name']){
            $cp_name = $request['cp_name'];
        }else{
            $cp_name = "";
        }
        
        if($request['cp_number']){
            $cp_number = $request['cp_number'];
        }else{
            $cp_number = "";
        }
        
        if($request['cp_address']){
            $cp_address = $request['cp_address'];
        }else{
            $cp_address = "";
        }
        
        if($request['narration']){
            $narration = $request['narration'];
        }else{
            $narration = "";
        }
        
        if($request['relational_manager']){
            $relational_manager = $request['relational_manager'];
        }else{
            $relational_manager = "";
        }
        
        if($request['guarantee_card_no']){
            $guarantee_card_no = $request['guarantee_card_no'];
        }else{
            $guarantee_card_no = "";
        }
        
        if($request['po_ref_no']){
            $po_ref_no = $request['po_ref_no'];
        }else{
            $po_ref_no = "";
        }
        
       $fl=Sale::findorFail($request['sale_id']);
       $invoice_value = Sale::latest()->first();
        // return $request->all();
        // $invoice_value = Sale::max('id');
        $invoice =  Sale::insertGetId([
            'c_name' => $request['c_name'],
            
            'cp_name' => $cp_name,
            'c_email' => $c_email,
            'c_number' => $c_number,
            'cp_number' => $cp_number,
            'c_address' => $c_address,
            'cp_address' => $cp_address,
            'narration' => $narration,
            'relational_manager' => $relational_manager,
            'guarantee_card_no' => $guarantee_card_no,
            'po_ref_no' => $po_ref_no,
            'invoice' => $fl->invoice,
            'total_amount' => $request['total_amount'],
            'discount' => $request['discount'],
            'discounted_price' => $request['discounted_price'],
            'paid_amount' => $request['amountPaid'],
            'due_amount' => $request['amountDue'],
            'created_at' => $fl->created_at,
            'updated_at' => Carbon::now()
        ]);
        
        
       
    
        

        $lastInsertId = $invoice;
        for ($i = 0; $i < count($request['productName']); $i++) {
            
            
             if($request['productName'][$i]){
                $productName = $request['productName'][$i];
            }else{
                $productName = "";
            }
            
             if($request['productModel'][$i]){
                $productModel = $request['productModel'][$i];
            }else{
                $productModel = "";
            }
            
            if($request['productColor'][$i]){
                $productColor = $request['productColor'][$i];
            }else{
                $productColor = "";
            }
            
            if($request['productCapacity'][$i]){
                $productCapacity = $request['productCapacity'][$i];
            }else{
                $productCapacity = "";
            }
            
            if($request['productSerial'][$i]){
                $productSerial = $request['productSerial'][$i];
            }else{
                $productSerial = "";
            }
            
            if($request['quantity'][$i]){
                $quantity = $request['quantity'][$i];
            }else{
                $quantity = "";
            }
            
            if($request['unit'][$i]){
                $unit = $request['unit'][$i];
            }else{
                $unit = "";
            }
            
            if($request['price'][$i]){
                $price = $request['price'][$i];
            }else{
                $price = "";
            }
            if($request['total'][$i]){
                $total = $request['total'][$i];
            }else{
                $total = "";
            }
            
            SaleItem::insert([
                'sale_id' => $lastInsertId,
                'product_name' => $productName,
                'product_model' => $productModel,
                'product_color' => $productColor,
                'product_capacity' => $productCapacity,
                'product_serial' => $productSerial,
                'sale_item_quantity' => $quantity,
                
                'unit' => $unit,
                
                'sale_item_price' => $price,
                'sale_item_total_amount' => $total,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        $file=Sale::findorFail($request['sale_id']);
        $file->delete();

        
        $files = SaleItem::where('sale_id',$request['sale_id'])->get();
        foreach($files as $file){
            $file_del = SaleItem::where('sale_id',$file['sale_id'])->first();
            $file_del->delete();
        }
      
        
        return redirect()->route('show.sale');
    }
    
    
    public function saleItemDelete($id){
        $file=SaleItem::findorFail($id);
        $file->delete();
        return redirect()-> back();
    }
    
    public function challanItemDelete($id){
        $file=ChallanItem::findorFail($id);
        $file->delete();
        return redirect()-> back();
    }
    
    
    
    
}

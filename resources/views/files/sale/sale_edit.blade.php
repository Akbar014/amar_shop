@extends('layouts.master')
@section('title') Add sale @endsection
@section('pos') active show-sub @endsection
@section('sale-list') active @endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <a class="breadcrumb-item" href="{{ route('show.sale') }}">Sale list</a>
            <span class="breadcrumb-item active">Sale Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{url('/sale-update/'.$sale['id']) }}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                    @csrf
                    <div class="load-animate animated fadeInUp">
                        <input id="currency" type="hidden" value="$">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Customer Details</h3>
                                <div class="row">
                                    <input type="hidden" name="sale_id" value="{{$sale['id']}}">
       
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_name" id="c_name" value="{{$sale['c_name']}}" placeholder="Enter customer name" autocomplete="off" required />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_number" id="c_number" value="{{$sale['c_number']}}" placeholder="Enter customer phone" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="c_address" id="c_address" placeholder="Enter customer address" >{{$sale['c_address']}}</textarea>
                                </div>
                                
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Contact Person Details</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cp_name" id="cp_name" value="{{$sale['cp_name']}}" placeholder="Enter contact person name" autocomplete="off" />
                                        </div>
                                    </div>
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <input type="text" class="form-control" name="cp_number" id="cp_number" value="{{$sale['cp_number']}}" placeholder="Enter contact person phone" autocomplete="off" />-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="4" name="cp_address" id="cp_address" placeholder="Enter delivery address">{{$sale['cp_address']}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="relational_manager" id="relational_manager" value="{{$sale['relational_manager']}}" placeholder="Enter relational manager" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="narration" id="narration" placeholder="Enter your narration">{{$sale['narration']}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="guarantee_card_no" id="guarantee_card_no" value="{{$sale['guarantee_card_no']}}" placeholder="Enter guarantee card no" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="po_ref_no" id="po_ref_no" value="{{$sale['po_ref_no']}}" placeholder="Enter p.o ref no" autocomplete="off" />
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <table class="table table-condensed table-striped" id="invoiceItem">
                                    <tr>
                                        <th width="2%">
                                            <div class="custom-control custom-checkbox mb-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th width="18%">Name</th>
                                        <th width="13%">Model</th>
                                        <th width="8%">Color</th>
                                        <th width="10%">Capacity</th>
                                        <th width="10%">Serial</th>
                                        <th width="10%">Quantity</th>
                                        <th width="10%">Unit</th>
                                        <th width="10%">Price</th>
                                        <th width="10%">Total</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    
                                    @foreach($sale_item as $key=>$item)
                                   
                                    
                                  <script>
                                    
                                      
                                      
                                  </script>
                                    
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                                                    <label class="custom-control-label" for="itemRow_1"></label>
                                                </div>
                                            </td>
                                            <td><input type="text" name="productName[]" id="productName_1" value="{{$item['product_name']}}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productModel[]" id="productModel_1" value="{{$item['product_model']}}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productColor[]" id="productColor_1" value="{{$item['product_color']}}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productCapacity[]" id="productCapacity_1" value="{{$item['product_capacity']}}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productSerial[]" id="productSerial_1" value="{{$item['product_serial']}}" class="form-control" autocomplete="off"></td>
                                            <td><input type="number" name="quantity[]" id="quantity_1" value="{{$item['sale_item_quantity']}}" class="form-control quantity" autocomplete="off"></td>
                                            
                                            <td><input type="text" name="unit[]" id="unit_1" value="{{$item['unit']}}" class="form-control unit" autocomplete="off"></td>
                                            
                                            <td><input type="number" name="price[]" id="price_1" value="{{$item['sale_item_price']}}" class="form-control price" autocomplete="off"></td>
                                            <td><input type="number" name="total[]" id="total_1" value="{{$item['sale_item_total_amount']}}" class="form-control total" autocomplete="off"></td>
                                            <td><a href="{{url('/sale_item_delete/'.$item['id'])}}" class="btn btn-lg" ><i class="fa fa-trash text-danger"></i></a></td>
                                        </tr>
                                    @endforeach
                                 
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                                <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                            </div>
                        </div>
                        <div class="row">

                            <input value="" type="hidden" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
                            <input value="" type="hidden" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
                            <input value="" type="hidden" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                            <input value="" type="hidden" class="form-control" name="discountName" placeholder="Discount name">
                            <input value="" type="hidden" class="form-control" name="discountRate" id="discountRate" placeholder="Discount Rate">
                            <input value="" type="hidden" class="form-control" name="discountAmount" id="discountAmount" placeholder="Discount Amount">


                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group mt-3 mb-3 ">
                                    <label>Total: &nbsp;</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text currency">$</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{$sale['total_amount']}}" name="total_amount" id="totalAftertax" placeholder="Total">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group mt-3 mb-3 ">
                                    <label>Discount: &nbsp;</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text currency">$</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{$sale['discount']}}" name="discount" value="" id="discount" placeholder="Discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group mt-3 mb-3 ">
                                    <label>Discounted Price: &nbsp;</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text currency">$</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{$sale['discounted_price']}}" name="discounted_price" value="" id="discounted_price" placeholder="Discounted Price">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group mt-3 mb-3 ">
                                    <label>Amount Paid: &nbsp;</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text currency">$</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{$sale['paid_amount']}}" name="amountPaid" value="" id="amountPaid" placeholder="Amount Paid">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group mt-3 mb-3 ">
                                    <label>Amount Due: &nbsp;</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text currency">$</span>
                                        </div>
                                        <input type="number" class="form-control" value="{{$sale['due_amount']}}" name="amountDue" value="" id="amountDue" placeholder="Amount Due">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">Update invoice</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', '#checkAll', function() {
                $(".itemRow").prop("checked", this.checked);
            });
            $(document).on('click', '.itemRow', function() {
                if ($('.itemRow:checked').length == $('.itemRow').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
            });
            var count = $(".itemRow").length;
            $(document).on('click', '#addRows', function() {
                count++;
                var htmlRows = '';
                htmlRows += '<tr>';
                htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_'+count+'"> <label class="custom-control-label" for="itemRow_'+count+'"></label> </div></td>';
                htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="productModel[]" id="productModel_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="productColor[]" id="productColor_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="productCapacity[]" id="productCapacity_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="productSerial[]" id="productSerial_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';
                
                htmlRows += '<td><input type="text" name="unit[]" id="unit'+count+'" class="form-control unit" autocomplete="off"></td>';
                
                htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';
                htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';
                htmlRows += '</tr>';
                $('#invoiceItem').append(htmlRows);
            });
            $(document).on('click', '#removeRows', function(){
                $(".itemRow:checked").each(function() {
                    $(this).closest('tr').remove();
                });
                $('#checkAll').prop('checked', false);
                calculateTotal();
            });
            $(document).on('blur', "[id^=quantity_]", function(){
                calculateTotal();
            });
            $(document).on('blur', "[id^=price_]", function(){
                calculateTotal();
            });
            $(document).on('blur', "#taxRate", function(){
                calculateTotal();
            });
            $(document).on('blur', "#discountRate", function(){
                calculateTotal();
            });
            $(document).on('blur', "#amountPaid", function(){
                var amountPaid = $(this).val();
                var totalAftertax = $('#totalAftertax').val();
                var totalAfterdiscount = $('#totalAfterdiscount').val();
                if(amountPaid && totalAftertax) {
                    totalAftertax = totalAftertax-amountPaid;
                    $('#amountDue').val(totalAftertax);
                } else {
                    $('#amountDue').val(totalAftertax);
                }
            });
            $(document).on('click', '.deleteInvoice', function(){
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to remove this?")){
                    $.ajax({
                        url:"action.php",
                        method:"POST",
                        dataType: "json",
                        data:{id:id, action:'delete_invoice'},
                        success:function(response) {
                            if(response.status == 1) {
                                $('#'+id).closest("tr").remove();
                            }
                        }
                    });
                } else {
                    return false;
                }
            });
        });
        function calculateTotal(){
            var totalAmount = 0;
            $("[id^='price_']").each(function() {
                var id = $(this).attr('id');
                id = id.replace("price_",'');
                var price = $('#price_'+id).val();
                var quantity  = $('#quantity_'+id).val();
                if(!quantity) {
                    quantity = 1;
                }
                var total = price*quantity;
                $('#total_'+id).val(parseFloat(total));
                totalAmount += total;
            });
            $('#subTotal').val(parseFloat(totalAmount));
            var taxRate = $("#taxRate").val();
            var discountRate = $("#discountRate").val();
            var subTotal = $('#subTotal').val();
            if(subTotal) {
                var taxAmount = subTotal*taxRate/100;
                var discountAmount = subTotal*discountRate/100;
                $('#taxAmount').val(taxAmount);
                $('#discountAmount').val(discountAmount);
                subTotal = parseFloat(subTotal)+parseFloat(taxAmount)-parseFloat(discountAmount);
                $('#totalAftertax').val(subTotal);
                
                var amountPaid = $('#amountPaid').val();
                var totalAftertax = $('#totalAftertax').val();
                var totalAfterdiscount = $('#totalAfterdiscount').val();
                if(amountPaid && totalAftertax && totalAfterdiscount) {
                    totalAftertax = totalAftertax-amountPaid;
                    $('#amountDue').val(totalAftertax);
                } else {
                    $('#amountDue').val(subTotal);
                }
            }
            
            $(document).on('blur', '#discount', function() {
                var total = $('#totalAftertax').val();
                var discount = $('#discount').val();
                var discounted_price = total - discount;
                $('#discounted_price').val(discounted_price);
              
            });
            
            
            $(document).on('blur', '#amountPaid', function() {
                var discounted_price = $('#discounted_price').val();
                var paid_amount = $('#amountPaid').val();
                var due_amount = discounted_price - paid_amount;
                $('#amountDue').val(due_amount);
            });
            
            
            
            
            
        }

    </script>
@endsection

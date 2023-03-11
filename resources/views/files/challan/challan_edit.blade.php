@extends('layouts.master')
@section('title') Add product @endsection
@section('pos') active show-sub @endsection
@section('challan-list') active @endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <a class="breadcrumb-item" href="{{ route('show.challan') }}">Challan list</a>
            <span class="breadcrumb-item active">Challan Edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ url('/challan-update/'.$challan['id']) }}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                    @csrf
                    <div class="load-animate animated fadeInUp">
                        <input id="currency" type="hidden" value="$">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Customer details</h3>
                                <div class="row">
                                <input type="hidden" name="challan_id" value="{{$challan['id']}}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_name" id="c_name" value="{{$challan['c_name']}}" placeholder="Enter customer name" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_number" id="c_number" value="{{$challan['c_number']}}" placeholder="Enter customer phone" autocomplete="off" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="c_address" id="c_address" required>{{$challan['c_address']}}</textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="delivery_address" id="delivery_address" placeholder="Enter delivery address" required>{{$challan['delivery_address']}}</textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="narration" id="narration" placeholder="Enter your narration">{{$challan['narration']}}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="driver" value="{{$challan['driver']}}" id="driver" placeholder="Enter driver name" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="vehicle" value="{{$challan['vehicle']}}" id="vehicle" placeholder="Enter vehicle number" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="request" value="{{$challan['request']}}" id="request" placeholder="Enter request by name" autocomplete="off" required />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ho" value="{{$challan['ho']}}" id="ho" placeholder="Enter H.O" autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="invoice_no" value="{{$challan['invoice_no']}}" id="invoice_no" placeholder="Enter invoice no" autocomplete="off"/>
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
                                        <th width="10%">Color</th>
                                        <th width="10%">Serial</th>
                                        <th width="13%">Quantity</th>
                                        <th width="13%">Unit</th>
                                        <th width="13%">Remarks</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                    @foreach($items as $item)
                                    
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                                                    <label class="custom-control-label" for="itemRow_1"></label>
                                                </div>
                                            </td>
                                            <td><input type="text" name="productName[]" id="productName_1" value="{{ $item['product_name'] }}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productModel[]" id="productModel_1" value="{{ $item['product_model'] }}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productColor[]" id="productColor_1" value="{{ $item['product_color'] }}" class="form-control" autocomplete="off"></td>
                                            <td><input type="text" name="productSerial[]" id="productSerial_1" value="{{ $item['product_serial'] }}" class="form-control" autocomplete="off"></td>
                                            <td><input type="number" name="quantity[]" id="quantity_1" value="{{ $item['challan_item_quantity'] }}" class="form-control quantity" autocomplete="off"></td>
                                            <td><input type="text" name="unit[]" id="unit_1" value="{{ $item['unit'] }}" class="form-control unit" autocomplete="off"></td>
                                            <td><input type="text" name="remarks[]" id="remarks_1" value="{{ $item['remarks'] }}" class="form-control quantity" autocomplete="off"></td>
                                            <td><a href="{{url('/challan_item_delete/'.$item['id'])}}" class="btn btn-lg"><i class="fa fa-trash text-danger"></i></a></td>
                                        </tr>
                                    
                                    @endforeach    
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
                                <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">Update challan</button>
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
                htmlRows += '<td><input type="text" name="productSerial[]" id="productSerial_'+count+'" class="form-control" autocomplete="off"></td>';
                htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="unit[]" id="unit_'+count+'" class="form-control unit" autocomplete="off"></td>';
                htmlRows += '<td><input type="text" name="remarks[]" id="remarks'+count+'" class="form-control remarks" autocomplete="off"></td>';
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
        }

    </script>
@endsection

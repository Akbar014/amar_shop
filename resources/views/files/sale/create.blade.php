@extends('layouts.master')
@section('title') Add sale @endsection
@section('pos') active show-sub @endsection
@section('sale-create') active @endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('dashboard') }}">Lotus Int</a>
            <a class="breadcrumb-item" href="{{ route('show.sale') }}">Sale list</a>
            <span class="breadcrumb-item active">Sale create</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                @if(Session::get('message'))
                    <p class="text-success pl-1">{{ Session::get('message') }}</p>
                @endif
                <form action="{{ route('sale.store') }}" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
                    @csrf
                    <div class="load-animate animated fadeInUp">
                        <input id="currency" type="hidden" value="$">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Customer Details</h3>
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Enter customer name" autocomplete="off" required />
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control"  onchange="customer();"  id="getid">
                                                <option value="">Select Option</option>
                                                @foreach($customer as $item)
                                                    <option  value="{{$item->id}}">{{ $item->name }} </option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group mb-3">
                                        <label for="select2Multiple">Multiple Tags</label>
                                        <select class="select2-multiple form-control" name="tags[]" multiple="multiple"
                                          id="select2Multiple">
                                            @foreach($customer as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach              
                                        </select>
                                      </div> --}}

                                      <input type="hidden" class="form-control" name="c_name" id="CustomerName"/>

                                     
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="c_email" id="CustomerEmail" placeholder="Enter customer email" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="c_number" id="CustomerPhone" placeholder="Enter customer phone" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="c_address" id="CustomerAddress" placeholder="Enter customer address" ></textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h3>Contact Person Details</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="cp_name" id="cp_name" placeholder="Enter contact person name" autocomplete="off" />
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                 <div class="form-group">
                                    <textarea class="form-control" rows="4" name="cp_address" id="cp_address" placeholder="Enter delivery address"></textarea>
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="relational_manager" id="relational_manager" placeholder="Enter relational manager" autocomplete="off" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="narration" id="narration" placeholder="Enter your narration"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="guarantee_card_no" id="guarantee_card_no" placeholder="Enter guarantee card no" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="po_ref_no" id="po_ref_no" placeholder="Enter p.o ref no" autocomplete="off" />
                                        </div>
                                    </div>

                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter invoice no" autocomplete="off" />-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
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
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                                                <label class="custom-control-label" for="itemRow_1"></label>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <select class="form-control"  onchange="product();" name="productName[]"  id="productid">
                                            <option value="">Select Option</option>
                                                @foreach($product as $item)
                                                    <option  value="{{$item->id}}">{{ $item->name }} </option> 
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="productModel[]" id="productModel_1" class="form-control" autocomplete="off"></td>
                                        <td><input type="text" name="productColor[]" id="productColor_1" class="form-control" autocomplete="off"></td>
                                        <td><input type="text" name="productCapacity[]" id="productCapacity_1" class="form-control" autocomplete="off"></td>
                                        <td><input type="text" name="productSerial[]" id="productSerial_1" class="form-control" autocomplete="off"></td>
                                        <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                                        
                                        <td><input type="text" name="unit[]" id="unit_1" class="form-control unit" autocomplete="off"></td>
                                        
                                        
                                        <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
                                        <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
                                        <input type="hidden" name ="product_id" id="id">
                                    </tr>
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
                                        <input value="" type="number" class="form-control" name="total_amount" id="totalAftertax" placeholder="Total">
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
                                        <input value="" type="number" class="form-control" name="discount" id="discount" placeholder="Discount">
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
                                        <input value="" type="number" class="form-control" name="discounted_price" id="discounted_price" placeholder="Discounted Price">
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
                                        <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
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
                                        <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">Save invoice</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <select name="c_name" id="allbooks">
        <option value="none" ></option>
        <option value="allbooks" >All Books</option>
      </select>
      <div id="show">
        <!-- ITEMS TO BE DISPLAYED HERE -->
      </div>
      
      
      
      <script src="jquery-1.9.1.min.js"></script> <!-- CHANGE THE JQUERY FILE DEPENDING ON THE VERSION YOU HAVE DOWNLOADED -->
      <script type="text/javascript">
        $(document).ready(function(){ /* PREPARE THE SCRIPT */
          $("#allbooks").change(function(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
            var allbooks = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
            var dataString = "allbooks="+allbooks; /* STORE THAT TO A DATA STRING */
      
            $.ajax({ /* THEN THE AJAX CALL */
              type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
              url: "get-data.php", /* PAGE WHERE WE WILL PASS THE DATA */
              data: dataString, /* THE DATA WE WILL BE PASSING */
              success: function(result){ /* GET THE TO BE RETURNED DATA */
                $("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
              }
            });
      
          });
        });
      </script>

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
                // htmlRows += "<td><select name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"> <option value="">Select Option</option> @foreach($product as $item)<option  value="{{$item->id}}">{{ $item->name }} </option> @endforeach</select>'</td>";
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
{{-- select customer --}}
<script>
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            // var data = $('#select2-dropdown').select2("val");
            alert('ok');
            // console.log(data);
            alert(JSON.stringify(data));
            
            
            
        });
    });
</script>



//customer script
<script>
    function customer() {
      var id = document.getElementById('getid').value;

        $.ajax({
            type: "GET",
            url:"/customer/data/"+id,
            contentType: "application/json",
            dataType: "json",
            // success: function(response) {
            //     console.log(response);
            // },
            // error: function(response) {
            //     console.log(response);
            // }
            success:function(res){
                // console.log(res);
                // document.getElementById('id').value = res.id;            
                document.getElementById('CustomerName').value = res.name;            
                document.getElementById('CustomerPhone').value = res.phone;            
                document.getElementById('CustomerEmail').value = res.email;            
                document.getElementById('CustomerAddress').value = res.address;            
                
                
            }
        });





    }

   
    
</script>

<script>
    function product(){
        var id = document.getElementById('productid').value;
        console.log(id);

        $.ajax({
            type: "GET",
            url:"/product/data/"+id,
            contentType: "application/json",
            dataType: "json",
            // success: function(response) {
            //     console.log(response);
            // },
            // error: function(response) {
            //     console.log(response);
            // }
            success:function(res){
                // console.log(res);
                document.getElementById('id').value = res.id;            
                document.getElementById('productModel_1').value = res.model;          
                document.getElementById('productColor_1').value = res.color;        
                document.getElementById('productCapacity_1').value = res.capacity;         
                document.getElementById('unit_1').value = res.unit;           
                document.getElementById('price_1').value = res.price;            
                document.getElementById('productName_1').value = res.name;            
                
                
            }
        });
    }
</script>


{{-- multiple select --}}
<!-- <script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

</script> -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection

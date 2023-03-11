<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Lotus Int - Challan print</title>
    <style>
        @media print {
            .hidden-print {
                display: none;
            }
            .invoice-company {
                display: none;
            }
        }

        .invoice-company {
            font-size: 20px;
            color: #1A237E;
            text-transform: uppercase;
        }
        .hr {
            display: inline-block;
            width: 230px;
        }
        .hr:before {
            content: '';
            display: block;
            border-top: 2px solid #282626;
            margin-top: 0.5em;
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="invoice-company text-inverse f-w-600 mb-4">
    <span class="pull-right hidden-print">
        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5">
            <i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print
        </a>
    </span>
        <a href="{{ route('show.challan') }}" style="color: #0c0c0c">
            Challan list
        </a>
    </div>
</div>
<p class="text-center" style="padding-top: 105px">
    Exclusive Showroom: Lotus International <br>
    1-4, Asha Plaza, (1st Floor) 1 No.Super-Market, Mirpur-1, Dhaka <br>
    Cell: 01675-011631, 01819-547154, E-Mail: lotusinternational78@gmail.com
</p>
<div class="customerDetails" style="margin-left: 20px">
    <div class="row" style="padding-top: 76px;">
        <div class="col-8">
            <table>
                <tbody>
                <tr>
                    <td>Challan Date</td>
                    <td> : {{ $sale->created_at->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td>Customer's/Dealer's Name</td>
                    <td> : {{ $sale->c_name }}</td>
                </tr>
                <tr>
                    <td>Contact Address</td>
                    <td> : {!! $sale->c_address !!}</td>
                    <!--<td><textarea style="width:850px; border:none;" readonly>{!! $sale->c_address !!}</textarea></td>-->
                </tr>
                <!--<tr>-->
                <!--    <td>Delivery Address</td>-->
                    <!--<td> : {!! $sale->delivery_address !!}</td>-->
                <!--    <td><textarea style="width:850px; border:none;" readonly>{!! $sale->delivery_address !!}</textarea></td>-->
                <!--</tr>-->
                </tbody>
            </table>
             <p>Delivery Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {!! $sale->delivery_address !!}</p>
        </div>
        <div class="col-4">
            <table>
                <tbody>
                <tr>
                    <td>Challan No</td>
                    <td> : LI-MR1-<script>document.write(new Date().getFullYear().toString().substr(-2))</script>-{{ $sale->challan_no }}</td>
                </tr>
                <tr>
                    <td>Contact No</td>
                    <td> : {!! $sale->c_number !!}</td>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td> : {{ date('d-m-Y', strtotime($sale->invoice_date)) }}</td>
                </tr>
                <tr>
                    <td>Driver Name</td>
                    <td> : {{ $sale->driver }}</td>
                </tr>
                <tr>
                    <td>Invoice No</td>
                    <td> : {{ $sale->invoice_no }}</td>
                </tr>
                <tr>
                    <td>Req. By</td>
                    <td> : {{ $sale->request }}</td>
                </tr>
                <tr>
                    <td>Vehicle No</td>
                    <td> : {{ $sale->vehicle }}</td>
                </tr>
                <tr>
                    <td>H.O</td>
                    <td> : {{ $sale->ho }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="productDetails">
        <table style="width: 100%;border-collapse: collapse;">
            <tr style="background-color: #9d9b9854">
                <th colspan="6" style="border: 1px solid black;" class="text-center">Product Information</th>
                <th rowspan="2" style="border: 1px solid black;" class="text-center">Remarks</th>
            </tr>
            <tr style="font-weight: bold; background-color: #9d9b9854">
                <td style="border: 1px solid black;">Product</td>
                <td style="border: 1px solid black;">Model</td>
                <td style="border: 1px solid black;">Colour</td>
                <td style="border: 1px solid black;">Serial No.</td>
                <td style="border: 1px solid black;">Qty</td>
                <td style="border: 1px solid black;">Unit</td>
            </tr>
            @foreach($saleItems as $item)
                <tr>
                    <td style="border: 1px solid black; font-style: italic;">{{ $item->product_name }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_model }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_color }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_serial }}</td>
                    <td style="border: 1px solid black;">{{ $item->challan_item_quantity }}</td>
                    <td style="border: 1px solid black;">{{ $item->unit }}</td>
                    <td style="border: 1px solid black;">{{ $item->remarks }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="border: 1px solid black;font-weight: bold;" class="text-center">Sub Total:</td>
                <td style="border: 1px solid black;font-weight: bold;">{{ $sale_sum }}</td>
                <!--<td style="border: 1px solid black;">{{ $item->unit }}</td>-->
                <td style="border: 1px solid black;"></td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;font-weight: bold;" class="text-center">Grand Total:</td>
                <td style="border: 1px solid black;font-weight: bold;">{{ $sale_sum }}</td>
                <!--<td style="border: 1px solid black;">{{ $item->unit }}</td>-->
                <td style="border: 1px solid black;"></td>
            </tr>
        </table>
    </div>
    <div class="wordAmount" style="margin-top: 5px;font-size: 19px;">
        <!--<table>-->
        <!--    <tbody>-->
        <!--    <tr>-->
        <!--        <td style="font-weight: bold">Narration</td>-->
        <!--        <td> : {{ $sale->narration }}</td>-->
        <!--    </tr>-->
        <!--    </tbody>-->
        <!--</table>-->
        <div class="d-flex justify-content-start align-items-center mt-2" >
                
                <!--<p class="font-weight-bold">-->
                   
                <!--</p>-->
                <!--<p class="ml-1" style="text-transform: capitalize; font-style: italic;"> {{ $sale->narration }}</p>-->
                <div class="d-flex justify-content-start align-items-start">
                <p class="font-weight-bold " >
                   Narration<span>:</span>
                </p>
                <p class="ml-1" >{{ $sale->narration }}</p>
                </div>
                 
                
            </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

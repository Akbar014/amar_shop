<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Lotus Int - Invoice print</title>
    <style>
        body {
        
        font-weight: 500;
    }
        @media print {
            .hidden-print {
                display: none;
            }
            .invoice-company {
                display: none;
            }
        }

        .invoice-company {
            font-size: 16px;
            color: #1A237E;
            text-transform: uppercase;
        }
        .hr {
            display: inline-block;
            width: 260px;
        }
        .hr:before {
            content: '';
            display: block;
            border-top: 2px solid #282626;
            margin-top: 0.5em;
        }
        p{
            font-size: 16px;
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
        <a href="{{ route('show.sale') }}" style="color: #0c0c0c">
            Sale list
        </a>
    </div>
</div>
<p class="text-center" style="padding-top: 110px">
    Exclusive Showroom: Lotus International  1-4, Asha Plaza, (1st Floor) , 1/B Kalwalapara,<br>
     1 No.Super-Market, Mirpur-1, Dhaka. Cell: 01732293911, E-Mail:  esquireelectronicsltdlimr1@gmail.com<br>
    
</p>
<div class="customerDetails" style="margin-left: 30px">
    <div class="row no-gutters" style="padding-top: 80px;">
        <div class="col-8">
            <table >
                <tbody>
                <tr>
                    <td class="d-flex align-items-start" >Customer's Name </td>
                    <td> : {!! $sale->c_name !!}</td>
                </tr>
                <tr>
                    <td style="width:150px;"class="d-flex align-items-start">Contact Address &nbsp;&nbsp;</td>
                    <td style="width:500px;"> : {!! $sale->c_address !!}</td>
                </tr>
                
                <tr>
                    <td class="d-flex align-items-start">Contact Person &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td> : {{ $sale->cp_name }}</td>
                </tr>
                <tr>
                    <td class="d-flex align-items-start">Contact Number &nbsp;&nbsp; </td>
                    <td> : {{ $sale->c_number }}</td>
                    
                    @php
                        $c_number = str_replace(',', '<br />', $sale->cp_number);
                    @endphp

                    <td>  {!! $sale->cp_number !!} </td>
                </tr>
                
                <tr>
                    <td class="d-flex align-items-start">Delivery Address &nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td> : {{ $sale->cp_address }} </td>
                </tr>
            
                </tbody>
            </table>
            
            
            <!--<p>Delivery Address &nbsp;&nbsp;: {!! $sale->cp_address !!}</p>-->

        </div>
        
        <div class="col-4 ">
            <table style="width:400px;">
                <tbody>
                <tr>
                    <td style="width:150px;">Invoice Date</td>
                    <td style="width:300px;"> : {{ $sale->created_at->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <td style="width:150px;">Invoice No.</td>
                    <td style="width:300px;"> : LI-MR1-{{ $sale->created_at->format('y') }}-{{ $sale->invoice }}</td>
                </tr>
                <tr>
                    <td style="width:100px;">Relationship Manager</td>
                    <td style="width:300px;"> : {{$sale->relational_manager}}</td>
                </tr>
                <tr>
                    <td style="width:150px;">Guarantee Card No.</td>
                    <td  style="width:300px;"> : {{$sale->guarantee_card_no}}</td>
                </tr>
                <tr>
                    <td style="width:200px;">P.O Ref No.</td>
                    <td  style="width:320px;"> : {{$sale->po_ref_no}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="productDetails mt-2">
        <table style="width: 100%;border-collapse: collapse;">
            <tr style="background-color: #9d9b9854">
                <th colspan="7" style="border: 1px solid black;" class="text-center">Product Information</th>
                <th rowspan="2" style="border: 1px solid black;" class="text-center">Unit Price</th>
                <th rowspan="2" style="border: 1px solid black;" class="text-center">Net Amount</th>
            </tr>
            <tr style="font-weight: bold; background-color: #9d9b9854">
                <td style="border: 1px solid black;">Product</td>
                <td style="border: 1px solid black;">Model</td>
                <td style="border: 1px solid black;">Colour</td>
                <td style="border: 1px solid black;">Capacity</td>
                <td style="border: 1px solid black;">Serial No.</td>
                <td style="border: 1px solid black;">Qty</td>
                <td style="border: 1px solid black;">Unit</td>
            </tr>
            @foreach($saleItems as $item)
                <tr>
                    <td style="border: 1px solid black; font-style: italic;">{{ $item->product_name }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_model }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_color }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_capacity }}</td>
                    <td style="border: 1px solid black;">{{ $item->product_serial }}</td>
                    <td style="border: 1px solid black;">{{ $item->sale_item_quantity }}</td>
                    <td style="border: 1px solid black;">{{ $item->unit }}</td>
                    <td style="border: 1px solid black;">{{ $item->sale_item_price }}</td>
                    <td style="border: 1px solid black;">{{ $item->sale_item_total_amount }}</td>
                </tr>
            @endforeach
            <tr style="font-weight: bold;">
                <td colspan="5" style="border: 1px solid black;" class="text-center">Gross Total:</td>
                <td style="border: 1px solid black;">{{ $sale_sum }}</td>
                <td colspan="2" style="border: 1px solid black;"></td>
                <td style="border: 1px solid black;">{{ $sale->total_amount }}</td>
            </tr>
        </table>
        
        <div class="finalAmount" style="font-weight: italic; text-align: right; margin-top: 20px; marign-right:20px">
            @if($sale->discount == 0)
            
            @else
                <span style="padding-right: 100px">Special Discount:</span>
                <span>{{ $sale->discount }}</span>
            @endif
        </div>

        <div class="finalAmount" style="font-weight: bold; text-align: right; margin-top: 20px; marign-right:20px">
            <span style="padding-right: 100px">Net Total Amount:</span>
            @if($sale->discounted_price > 0)
             <span>{{ $sale->discounted_price }}</span>
            @else
             <span>{{ $sale->total_amount }}</span>
            @endif
            
        </div>
        
      
        
        <div class="wordAmount" style="margin-top: 50px;">
            
            
            
            
            
            <div class="d-flex justify-content-start align-items-center">
                
                <p class="font-weight-bold">
                   Amount in Word :
                </p>
                
                <p class="ml-1" style="text-transform: capitalize; font-style: italic;">&nbsp;
                    <?php

                    if($sale['discounted_price'] > 0){
                    $number = $sale['discounted_price'];
                     $no = floor($number);
                     $point = round($number - $no, 2) * 100;
                     $hundred = null;
                     $digits_1 = strlen($no);
                     $i = 0;
                     $str = array();
                     $words = array('0' => '', '1' => 'one', '2' => 'two',
                      '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                      '7' => 'seven', '8' => 'eight', '9' => 'nine',
                      '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                      '13' => 'thirteen', '14' => 'fourteen',
                      '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                      '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                      '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                      '60' => 'sixty', '70' => 'seventy',
                      '80' => 'eighty', '90' => 'ninety');
                     $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                     while ($i < $digits_1) {
                       $divider = ($i == 2) ? 10 : 100;
                       $number = floor($no % $divider);
                       $no = floor($no / $divider);
                       $i += ($divider == 10) ? 1 : 2;
                       if ($number) {
                          $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                          $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                          $str [] = ($number < 21) ? $words[$number] .
                              " " . $digits[$counter] . $plural . " " . $hundred
                              :
                              $words[floor($number / 10) * 10]
                              . " " . $words[$number % 10] . " "
                              . $digits[$counter] . $plural . " " . $hundred;
                       } else $str[] = null;
                    }
                    $str = array_reverse($str);
                    $result = implode('', $str);
                    $points = ($point) ?
                      "." . $words[$point / 10] . " " .
                            $words[$point = $point % 10] : '';
                    echo $result . "Taka  " . $points;}
                    
                    else {
                     $number = $sale['total_amount'];
                     $no = floor($number);
                     $point = round($number - $no, 2) * 100;
                     $hundred = null;
                     $digits_1 = strlen($no);
                     $i = 0;
                     $str = array();
                     $words = array('0' => '', '1' => 'one', '2' => 'two',
                      '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                      '7' => 'seven', '8' => 'eight', '9' => 'nine',
                      '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                      '13' => 'thirteen', '14' => 'fourteen',
                      '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                      '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                      '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                      '60' => 'sixty', '70' => 'seventy',
                      '80' => 'eighty', '90' => 'ninety');
                     $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                     while ($i < $digits_1) {
                       $divider = ($i == 2) ? 10 : 100;
                       $number = floor($no % $divider);
                       $no = floor($no / $divider);
                       $i += ($divider == 10) ? 1 : 2;
                       if ($number) {
                          $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                          $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                          $str [] = ($number < 21) ? $words[$number] .
                              " " . $digits[$counter] . $plural . " " . $hundred
                              :
                              $words[floor($number / 10) * 10]
                              . " " . $words[$number % 10] . " "
                              . $digits[$counter] . $plural . " " . $hundred;
                       } else $str[] = null;
                    }
                    $str = array_reverse($str);
                    $result = implode('', $str);
                    $points = ($point) ?
                      "." . $words[$point / 10] . " " .
                            $words[$point = $point % 10] : '';
                    echo $result . "Taka  " . $points;
                    
                    }
                    
                   ?>

                    &nbsp;Only</p>
 
            </div>
             <div class="d-flex justify-content-start align-items-center" >
                
                <!--<p class="font-weight-bold">-->
                   
                <!--</p>-->
                <!--<p class="ml-1" style="text-transform: capitalize; font-style: italic;"> {{ $sale->narration }}</p>-->
                <div class="d-flex justify-content-start align-items-start">
                <p class="font-weight-bold " >
                   Narration<span>:</span>
                </p>
                <p class="ml-1"  ">{{ $sale->narration }}</p>
                </div>
                 
                
            </div>
        </div>


    </div>
</div>


    
    




<div style="margin-top: 150px;" class="container text-center">
    <div class="row">
        <div class="col-4">
            <p class="hr text-center ">Goods Received as per specification</p>
        </div>
        <div class="col-4">
            <p class="hr text-center">Prepared by</p>
        </div>
        <div class="col-4">
            <p class="hr text-center">Authentication Signature</p>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

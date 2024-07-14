<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d M Y');
        ?>
    </title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 2px;
            text-align: left;
            font-size:12px;
        }
        th {
            background-color: lightcyan;
        }
        .td-border{
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
        }
        .summary {
            background-color: lightcyan;
            font-weight: bold;
        }
        .without-summary {
            background-color: lightgreen;
            border-right: 1px solid lightblue;
            font-weight:700;
        }
        .with-summary {
            background-color: lightyellow;
            border-right: 1px solid lightblue;
            font-weight:700;
        }
        .btn{
            cursor:pointer;
        }
        .btn-success{
            background-color:darkgreen;
            opacity: 1;
            width: 100%;
            height:20px;
            color:white;
            padding:2px;
        }
    </style>
</head>
<body >
    <div id="modal-content">
        <header>
            <div class="row">
                <div style="background-color:white;margin-top:1px;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;padding-bottom:15px;">
                    <div class="col-6">
                        <span style="float:inline-start;">
                            <a class="btn" type="button" href="{{ url('super-admin/inventory-details-record') }}">
                                <img style="width:80px;height:85px;padding:0px;border:1px solid lightgray;" src="data:image/log/png;base64,{{ $imageData }}" alt="company-logo" width="100">
                            </a>
                        </span>
                        <span style="color:black; font-size:12px; font-wight:700px; float:right; margin-top:30px; padding-right:5px">
                            Download :<?php
                            $timezone = date_default_timezone_get();
                            ?>
                            <?php
                            date_default_timezone_set('Asia/Dhaka');
                            echo date('d l M Y') . " || ";
                            echo date("h:i:sA");
                            ?>
                            <label for="prepared">
                                [ User : {{Auth::User()->email}} ]
                            </label><br>
                        </span>
                    </div>
                    <div class="col-6">
                        @foreach($companyinformations as $infos)
                            <p style="color:black; font-size:12px; text-align:left;margin-left:100px;margin-top:20px;">
                                <span style="color:black; font-size:20px; font-wight:600px;">{{$infos->company_name}}</span><br>
                                <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="col-xl-6" style="float:right;">
                <p style="font-weight: 700; font-size:12px; color:black; text-align:left;">Total Inventory Iteams : {{ $inventories->count()}}.00</p>
                <p style="font-weight: 700; font-size:12px; color:black; text-align:left;">
                    Month :
                    @if(count($months) > 0)
                        {{ implode(', ', $months) }}
                    @else
                        No months found
                    @endif
                </p>
            </div>
            <div class="col-xl-6">
                <p style="font-weight: 700; font-size:12px; color:black; text-align:left;">
                    <span>Pending :TK. {{ number_format($totalInvPending, 2) }} </span><br>
                    <span>Unauthorize :TK. {{ number_format($totalInvDeny, 2) }} </span><br>
                    <span>Authorize :TK. {{ number_format($totalInvJustify, 2) }} </span><br>
                    <span>Total : <span style="border-bottom:3px double darkgray;">TK. {{ number_format($netTotal, 2) }}</span> </span>
                </p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="td-border" colspan="15" style="text-align:center;">Monthly Report : Inventory Details</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="td-border" style="text-align:center;">SN.</th>
                    <th class="td-border">Inv-ID</th>
                    <th class="td-border">Create Date</th>
                    <th class="td-border">Group</th>
                    <th class="td-border">Medicine</th>
                    <th class="td-border">Dosage</th>
                    <th class="td-border">MRP</th>
                    <th class="td-border">Units</th>
                    <th class="td-border">Quantity</th>
                    <th class="td-border">Amount</th>
                    <th class="td-border">VAT</th>
                    <th class="td-border">Tax</th>
                    <th class="td-border">Discount</th>
                    <th class="td-border">Subtotal</th>
                    <th class="td-border">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Initialize serial number
                    $serialNumber = 1; 
                ?>
                @foreach ($inventories as $inventory)
                    <tr>
                        <td style="text-align:center;width:50px;">{{ $serialNumber++ }}</td>
                        <td>{{ $inventory->inv_id }}</td>
                        <td>{{ $inventory->created_at->format('d M Y h:i:sA') }}</td>
                        <td>{{ $inventory->medicine_groups->group_name ?? '' }}</td>
                        <td>{{ $inventory->medicine_names->medicine_name ?? '' }}</td>
                        <td>{{ $inventory->medicine_dogs->dosage }}</td>
                        <td>{{ $inventory->price }} ৳</td>
                        <td>{{ $inventory->units->units_name }}</td>
                        <td>{{ $inventory->quantity }}</td>
                        <td>{{ $inventory->amount }} ৳</td>
                        <td>{{ $inventory->vat_percentage }} %</td>
                        <td>{{ $inventory->tax_percentage }} %</td>
                        <td>{{ $inventory->discount_percentage }} %</td>
                        <td>{{ $inventory->sub_total }} ৳</td>
                        <td>
                            @if ($inventory->status === null)
                                <span class="badge rounded-pill bg-gray" style="color:black;background-color: white;cursor: pointer;">Pending</span>
                            @elseif ($inventory->status == 0)
                                <span class="badge rounded-pill bg-warn" style="color:orangered;background-color: white;cursor: pointer;">❌ Unauthorize</span>
                            @elseif ($inventory->status == 1)
                                <span class="badge rounded-pill bg-azure" style="color:darkgreen;background-color: #ecfffd;cursor: pointer;">✅ Authorize</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="summary">
                    <td colspan="8" style="text-align:center;">Totals:</td>
                    <td style="border-bottom:3px double darkgray;">{{ number_format($totalQty, 2) }} qty</td>
                    <td style="border-bottom:3px double darkgray;">{{ number_format($totalAmount, 2) }} ৳</td>
                    <td style="border-bottom:3px double darkgray;">{{ number_format($totalVAT, 2) }} %</td>
                    <td style="border-bottom:3px double darkgray;">{{ number_format($totalTax, 2) }} %</td>
                    <td style="border-bottom:3px double darkgray;">{{ number_format($totalDiscount, 2) }} %</td>
                    <td style="border-bottom:3px double darkgray;" colspan="2">{{ number_format($totalSubTotal, 2) }} ৳</td>
                </tr>
                <tr><td style="border:none;"></td></tr><br><br>
                <tr>
                    <td class="without-summary" colspan="3">Without (VAT, Tax and Discount)</td>
                    <td colspan="12" style="border:none;background-color:none;font-weight:700;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total Quantity</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalQty, 2) }} qty</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total Inventories</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalAmount, 2) }} ৳</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td class="with-summary" colspan="3">With (VAT, Tax and Discount)</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total VAT</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalVAT, 2) }} %</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total Tax</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalTax, 2) }} %</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total Discount</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalDiscount, 2) }} %</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
                <tr>
                    <td style="font-weight:700;" colspan="2">Total Inventories</td>
                    <td style="font-weight:700;border-right: 1px solid lightblue;border-left: 1px solid lightblue;">{{ number_format($totalSubTotal, 2) }} ৳</td>
                    <td colspan="12" style="border:none;background-color:none;"></td>
                </tr>
            </tfoot>
        </table>
        <div class="row" style="margin-top:10px;">
            <div class="col-12">
                <div style="background-color: white; color:black; text-align:left; font-size:12px;font-weight:700;">
                    <p style="display: inline-block; margin-top:40px;">
                        <span style="text-align: center;">
                            <label for="prepared">
                                Prepared by ({{Auth::User()->name}})
                            </label>
                        </span>
                        <span style="text-align: center; margin-left:350px;">
                            <label for="reference">
                                Reference by
                            </label>
                        </span>
                        <span style="text-align: center; margin-left:431px;">
                            <label for="prepared">
                                Authorized by
                            </label>
                        </span>
                    </p>
                </div>
            </div>
        </div>                        
        <div class="footer" style="border-top: 1px double lightgray;margin-top:30px;">
            @if(count($companyinformations) > 0)
                @foreach($companyinformations as $infos)
                    <p style="color:black; font-size:12px; text-align:center;">
                        <span style="color:black; font-size:12px;">Email :{{$infos->email}}</span> ;
                        <span style="color:black; font-size:12px;">Facebook :{{$infos->facebook_address}}</span> ;
                        <span style="color:black; font-size:12px;">Linkedin :{{$infos->linkedin}}</span><br>
                        <span style="color:black; font-size:12px;">Contract-Number :{{$infos->contract_number_one}}, {{$infos->contract_number_two}}</span> ;
                        <span style="color:black; font-size:12px;">Hot-Number :{{$infos->hot_number}}</span>
                    </p>
                @endforeach
            @else
            <span>Now, there no data filtering !</span>
            @endif
        </div>
    </div>
</body>
</html>

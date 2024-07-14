<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory PDF - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d l M Y') . " || ";
            echo date("h:i:sA");
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font-Awesome min.css CDN link -->
    <link rel="stylesheet" href="{{ asset('backend_asset/main_asset/fontawesome-6.4.2-web/css/all.min.css') }}">
    <!--============== Google Fonts Link ==================-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 0px;
        }
        .content {
            margin: 0px;
        }
        .footer {
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th{
            background-color: whitesmoke;
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
        }
        th #theadLeftBorder{
            border-left: 1px solid lightgray;
        }
        th #theadRightBorder{
            border-right:1px solid lightgray;
        }
        tr{
            border: 1px solid lightgray;
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%;
        }
        td{
            padding: 2px;
            font-size:12px;
            color:black;
            width: 100%; 
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="row">
            <div style="background-color:white;margin-top:1px;border-top: 1px solid lightgray;border-bottom: 1px solid lightgray;padding-bottom:15px;">
                <div class="col-6">
                    <span style="float:inline-start;">
                        <img style="width:80px;height:85px;padding:0px;border:1px solid lightgray;" src="data:image/log/png;base64,{{ $imageData }}" alt="company-logo" width="100">
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
    </div>

    <div class="content">
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
                    <span>Total : <span style="border-bottom:1px double darkgray;">TK. {{ number_format($netTotal, 2) }}</span> </span>
                </p>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th id="theadLeftBorder">SN.</th>
                    <th>INV-ID</th>
                    <th>Create</th>
                    <th>Group</th>
                    <th>Medicine</th>
                    <th>Dosage</th>
                    <th>MRP</th>
                    <th>Units</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>VAT</th>
                    <th style="text-align:left;">Tax</th>
                    <th>Discount</th>
                    <th>Sub Total</th>
                    <th id="theadRightBorder">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    // Initialize serial number
                    $serialNumber = 1;
                @endphp
                @if( count($inventories) >0 )
                    @foreach($inventories as $item)
                        @php

                            $statusClass = 'text-dark';
                            $statusText = 'Pending';
                            $statusColor = 'color:black;background-color: white;cursor: pointer;';
                            $statusBg = 'badge rounded-pill bg-gray';

                            if ($item->status === null) {
                                $statusClass = 'text-dark';
                                $statusText = 'Pending';
                                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                                $statusBg = 'badge rounded-pill bg-gray';
                            } elseif ($item->status == 0) {
                                $statusClass = 'text-danger';
                                $statusText = 'Unauthorize';
                                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                                $statusBg = 'badge rounded-pill bg-warn';
                            } elseif ($item->status == 1) {
                                $statusClass = 'text-dark';
                                $statusText = 'Authorize';
                                $statusColor = 'color:black;background-color: white;cursor: pointer;';
                                $statusBg = 'badge rounded-pill bg-azure';
                            }
                        @endphp
                        <tr>
                            <td style="text-align: center;">{{ $serialNumber++ }}</td>
                            <td style="text-align: center;">{{ $item->inv_id }}</td>
                            <td style="text-align: center;">{{ $item->created_at->format('d M Y') }}</td>
                            <td style="text-align: center;">{{ $item->medicine_groups->group_name }}</td>
                            <td style="text-align: center;">{{ $item->medicine_names->medicine_name }}</td>
                            <td style="text-align: center;">{{ $item->medicine_dogs->dosage }}</td>
                            <td style="text-align: center;">TK.{{ number_format($item->price, 2) }} </td>
                            <td style="text-align: center;">{{ $item->units->units_name }}</td>
                            <td style="text-align: center;">{{ number_format($item->quantity, 2) }}</td>
                            <td style="text-align: center;">TK.{{ number_format($item->amount, 2) }} </td>
                            <td style="text-align: center;">{{ number_format($item->vat_percentage, 2) }} %</td>
                            <td style="text-align: center;">{{ number_format($item->tax_percentage, 2) }} %</td>
                            <td style="text-align: center;">{{ number_format($item->discount_percentage, 2) }} %</td>
                            <td style="text-align: center;">TK.{{ number_format($item->sub_total, 2) }} </td>
                            <td class="{{ $statusClass }}" style="{{ $statusColor }} font-size:12px;text-align:center;">
                                <span class="{{ $statusBg }}">{{ $statusText }}</span>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="3">
                            Inventory Data Not Exists On Server !
                        </td>
                    </tr> 
                @endif
            </tbody>
            <tfoot>
                <tr style="background-color:whitesmoke;">
                    <th id="th_sort" colspan="8" style="text-align:center;
                    font-size:13px; padding-left:5px; padding-right:5px; background-color:whitesmoke;">Total </th>
                    <th id="th_sort" style="text-align:center; font-size:12px; padding-left:5px; padding-right:5px;">{{ number_format($totalInvQty, 2) }}</th>
                    <th id="th_sort" style="text-align:center; font-size:12px; padding-left:5px; padding-right:5px;">TK.{{ number_format($totalAmount, 2) }} </th>
                    <th id="th_sort" style="text-align:center; font-size:12px; padding-left:5px; padding-right:5px;">{{ number_format($totalInvVat, 2) }} %</th>
                    <th id="th_sort" style="text-align:center; font-size:12px; padding-left:4px; padding-right:4px;">{{ number_format($totalInvTax, 2) }} %</th>
                    <th id="th_sort" style="text-align:center; font-size:12px; padding-left:5px; padding-right:5px;">{{ number_format($totalInvDiscount, 2) }} %</th>
                    <th id="th_sort" colspan="2" style="text-align:left; font-size:12px; padding-left:5px; padding-right:5px;">TK.{{ number_format($totalInv, 2) }} </th>
                </tr>
            </tfoot>
        </table>
        
    </div>
    <div class="row">
        <div class="col-12">
            <div style="background-color: white; color:black; text-align:left; font-size:12px;font-weight:700;">
                <p style="display: inline-block; margin-top:40px;">
                    <span style="text-align: center;">
                        <label for="prepared">
                            Prepared by ({{Auth::User()->name}})
                        </label>
                    </span>
                    <span style="text-align: center; margin-left:300px;">
                        <label for="reference">
                            Reference by
                        </label>
                    </span>
                    <span style="text-align: center; margin-left:380px;">
                        <label for="prepared">
                            Authorized by
                        </label>
                    </span>
                </p>
            </div>
        </div>
    </div>                        
    <div class="footer" style="border-top: 1px double lightgray;">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Subscribers PDF - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d l M Y') . " || ";
            echo date("h:i:sA");
        ?>
    </title>
    <style>
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin: 20px;
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
            background-color: lightgray;
        }
        th, tr {
            border: 1px solid lightgray;
            padding: 2px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="row" style="border-bottom: 1px solid darkgray;">
            <div class="col-6">
                <span style="float:inline-start;">
                    <!-- <img src="{{ asset('/image/logo.png') }}" alt="logo"> -->
                    {{ asset('/image/office.jpg') }}
                </span>
                <span style="color:black; font-size:12px; font-wight:700px; float:right; margin-top:20px;">
                    Download :<?php
                    $timezone = date_default_timezone_get();
                    ?>
                    <?php
                    date_default_timezone_set('Asia/Dhaka');
                    echo date('d l M Y') . " || ";
                    echo date("h:i:sA");
                    ?>
                </span>
            </div>
            <div class="col-6">
                @foreach($companyinformations as $infos)
                    <p style="color:black; font-size:12px; text-align:left;">
                        <span style="color:black; font-size:25px; font-wight:700px;">{{$infos->company_name}}</span><br>
                        <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content">
        <p style="font-weight: 700; font-size:15px; color:black; text-align:center;">The List Of Email Collection On Subscribers ( total : {{ $allnewsletters->count()}}.00 )</p>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subscription Date</th>
                    <th style="text-align: left;">Email</th>
                </tr>
            </thead>
            <tbody>
                @if( count($allnewsletters) >0 )
                    @foreach($allnewsletters as $newsletter)
                        <tr>
                            <td style="text-align: center;">{{ $newsletter->id }}</td>
                            <td style="text-align: center;">{{ $newsletter->created_at->format('d l M Y h:i:sA') }}</td>
                            <td style="text-align: left;">{{ $newsletter->email }}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="error_data" align="center" text-danger colspan="3">
                            Subscriber email Not Exists On Server !
                        </td>
                    </tr> 
                @endif
            </tbody>
            <tfoot>
                <tr style="background-color:whitesmoke;">
                    <th id="th_sort" style="text-align:center;
                    font-size:14px; padding-left:5px; padding-right:5px; background-color:lightgray;">All Subscribers : {{$allnewsletters->count()}}.00</th>
                    <th id="th_sort" style="text-align:left; font-size:14px; padding-left:5px; padding-right:5px;"></th>
                    <th id="th_sort" style="text-align:left; font-size:14px; padding-left:5px; padding-right:5px;"></th>
                </tr>
            </tfoot>
        </table>
        <div class="row">
            <div class="col-12">
                <div style="background-color: white; color:black; text-align:left; font-size:14px;font-weight:700;">
                    <p style="display: inline-block; margin-top:50px;">
                        <span style="text-align: center;">
                            <label for="prepared">
                                Prepared by ({{Auth::User()->name}})
                            </label>
                        </span>
                        <span style="text-align: center; margin-left:125px;">
                            <label for="reference">
                                Reference by
                            </label>
                        </span>
                        <span style="text-align: center; margin-left:160px;">
                            <label for="prepared">
                                Authorized by
                            </label>
                        </span>
                    </p>
                </div>
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
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Log Session Print - 
        <?php
            $timezone = date_default_timezone_get();
            ?>
            <?php
            date_default_timezone_set('Asia/Dhaka');
            echo date('d l M Y') . " || ";
            echo date("h:i:sA");
        ?>
    </title>
</head>
<body>
    <div id="session-modal-content">
        <div class="header">
            <div class="row" style="background-color:white;border-bottom: 1px double rgb(33 197 197);padding-bottom:20px;">
                <div class="col-12">
                    @foreach($companyinformations as $infos)
                        <p style="color:black; font-size:12px; text-align:left;margin-left:80px;margin-bottom: 0px;margin-top:0px;padding-top:12px;">
                            <span style="color:black; font-size:17px; font-wight:600;">{{$infos->company_name}}</span><br>
                            <span style="color:black; font-size:12px;">Address :{{$infos->company_address}}</span><br>
                        </p>
                    @endforeach
                    <span style="color:black; font-size:11px; padding-right:5px;float:right;margin-top:-30px;">
                        Download :<?php
                        $timezone = date_default_timezone_get();
                        ?>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " || ";
                        echo date("h:i:sA");
                        ?><br>
                        <label for="prepared">
                            [ User : {{Auth::User()->login_email}} ]
                        </label>
                    </span>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-xl-6" style="float:left;">
                    <p style="font-weight:700; font-size:11px; color:black; text-align:left;margin-bottom: 5px;padding-top: 5px;">
                        From : {{ $start_date->format('d M Y') }}<br>
                        To : {{ $end_date->format('d M Y') }}<br>
                    </p>
                </div>
                <div class="col-xl-6">
                    @php
                        $firstSession = $logSessionData->first();
                    @endphp
                    <p style="float:right;font-weight:700; font-size:11px; color:black; text-align:left;margin-bottom: 5px;padding-top: 5px;">
                        Branch-Type : {{ optional($firstSession->users)->branch_type ?? 'N/A' }}<br>
                        Branch-ID : {{ $firstSession->branch_id ?? 'N/A' }}<br>
                        Branch-Name : {{ optional($firstSession->users)->branch_name ?? 'N/A' }}<br>
                        Branch-Location : {{ optional($firstSession->users)->location ?? 'N/A' }}
                    </p>
                </div>
            </div>
            <div class="row mt-1">
                <table class="session-log-table">
                    <thead>
                        <tr>
                            <th id="theadLeftBorder">SN.</th>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>IP</th>
                            <th>Login Time</th>
                            <th>Logout Time</th>
                            <th>Last Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Initialize serial number
                            $serialNumber = 1;
                        @endphp
                        @if( count($logSessionData) >0 )
                            @foreach($logSessionData as $item)
                                <tr>
                                    <td>{{ $serialNumber++ }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->roles->name }}</td>
                                    <td>{{ $item->ip_address }}</td>
                                    <td>{{ $item->created_at->format('d M Y h:i:s A') }}</td>
                                    <td>{{ $item->updated_at->format('d M Y h:i:s A') }}</td>
                                    <td>{{ $item->last_activity }}</td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="error_data" colspan="8" style="text-align:center;color:red;">
                                    Session Data Not Exists On Server !
                                </td>
                            </tr> 
                        @endif
                    </tbody>
                </table>
            </div>
            <div style="display: flex;justify-content: space-between;width: 100%; overflow: hidden;margin-top:10px;">
                <div style="display: inline-block; width: 40%; vertical-align: top;">
                    <table class="summary-table">
                        <thead>
                            <tr>
                                <th colspan="5">User Summary</th>
                            </tr>
                            <tr>
                                <th>SN.</th>
                                <th>Email</th>
                                <th>Login</th>
                                <th>Logout</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSummaryData as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ number_format($user->total_login, 2) }}</td>
                                <td>{{ number_format($user->total_logout, 2) }}</td>
                                <td>{{ number_format($user->total_activity, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>{{ number_format($userTotalLogin, 2) }}</td>
                                <td>{{ number_format($userTotalLogout, 2) }}</td>
                                <td>{{ number_format($userSubTotalActivity, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    
                <div class="print-table-wrapper">
                    <table class="branch-summary-table">
                        <thead>
                            <tr>
                                <th colspan="5">Branch Summary</th>
                            </tr>
                            <tr>
                                <th>SN.</th>
                                <th>Branch-ID</th>
                                <th>Login</th>
                                <th>Logout</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $firstSession = $logSessionData->first();
                            @endphp
                            <tr>
                                <td>1</td>
                                <td>{{ $firstSession->branch_id ?? 'N/A' }}</td>
                                <td>{{ number_format($totalLogin, 2) }}</td>
                                <td>{{ number_format($totalLogout, 2) }}</td>
                                <td>{{ number_format($totalActivity, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex;justify-content: space-between;color:black; text-align:left; font-size:12px;font-weight:700;">
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="prepared">
                        Prepared by ({{Auth::User()->name}})
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="reference">
                        Reference by
                    </label>
                </span>
            </div>
            <div class="col-4" style="margin-top:50px;text-align: center;">
                <span>
                    <label for="prepared">
                        Authorized by
                    </label>
                </span>
            </div>
        </div>                    
        <div class="footer" style="border-top: 1px double rgb(33 197 197);">
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
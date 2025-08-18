<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        table, tr, th, td {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            width: 100%;
            background-color: rgb(239, 255, 255);">;
        }
    </style>
</head>
<body>
    @foreach($companyinformations as $infos)
        <table style="width: 100%;border-bottom: 1px double rgb(221, 221, 221);">
            <tr><td colspan="11" style="font-size: 24px; font-weight: bold;">{{ $infos->company_name }}</td></tr>
            <tr><td colspan="11"><strong>Address : {{ $infos->company_address }}</strong></td></tr>
            <tr><td colspan="11">
                <strong>
                    <span>
                        User Log Session Data Download :<?php
                        $timezone = date_default_timezone_get();
                        ?>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " || ";
                        echo date("h:i:sA");
                        ?>
                        <label for="prepared">
                            [ User : {{$auth_user_email}} ]
                        </label>
                    </span>
                </strong>
            </td></tr>
        </table>
        <br>
    @endforeach

    <?php 
        $firstSession = $logSessionData->first();
    ?>

    <table>
        <tr>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>From :</strong> </td>
            <td style="border: 1px ridge rgb(233, 233, 233);text-align:left;mso-number-format:'\@';"><strong>{{ \Carbon\Carbon::parse($start_date)->format('d-M-Y') }}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>Branch Type : </strong></td>
            <td colspan="2" style="border: 1px ridge rgb(233, 233, 233);"><strong>{{ optional($firstSession->users)->branch_type ?? 'N/A' }}</strong></td>
        </tr>
        <tr>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>To : </strong></td>
            <td style="border: 1px ridge rgb(233, 233, 233);text-align:left;mso-number-format:'\@';"><strong>{{ \Carbon\Carbon::parse($end_date)->format('d-M-Y') }}</strong></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>Branch ID : </strong></td>
            <td colspan="2" style="border: 1px ridge rgb(233, 233, 233);"><strong>{{ $firstSession->branch_id ?? 'N/A' }}</strong></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>Branch Name : </strong></td>
            <td colspan="2" style="border: 1px ridge rgb(233, 233, 233);"><strong>{{ optional($firstSession->users)->branch_name ?? 'N/A' }}</strong></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="border: 1px ridge rgb(233, 233, 233);"><strong>Branch Location : </strong></td>
            <td colspan="2" style="border: 1px ridge rgb(233, 233, 233);"><strong>{{ optional($firstSession->users)->location ?? 'N/A' }}</strong></td>
        </tr>
    </table>
    <br>
    <table style="width: 100%; border: 1px ridge rgb(221, 221, 221);">
        <thead>
            <tr>
                <th style="text-align:center;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">SN</th>
                <th style="text-align:center;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">User ID</th>
                <th colspan="4" style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Email</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Role</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">IP Address</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Login Time</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Logout Time</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Last Activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logSessionData as $index => $item)
                <tr>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);">{{ $index + 1 }}</td>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);">{{ $item->user_id }}</td>
                    <td colspan="4" style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->email }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->roles->name ?? 'N/A' }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->ip_address }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->created_at->format('d M Y h:i:sA') }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->updated_at->format('d M Y h:i:sA') }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->last_activity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <table>
        <thead>
            <tr><th></th><th colspan="8" style="background-color: rgb(239, 255, 255);border: 1px ridge rgb(221, 221, 221);">User Summary</th></tr>
            <tr>
                <th></th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">SN.</th>
                <th colspan="4" style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Email</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Login</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Logout</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userSummaryData as $index => $user)
                <tr>
                    <td></td>
                    <td style="text-align:center;border-left: 1px ridge rgb(221, 221, 221);border-right: 1px ridge rgb(233, 233, 233);border-bottom: 1px ridge rgb(233, 233, 233);border-top: 1px ridge rgb(233, 233, 233);">{{ $index + 1 }}</td>
                    <td colspan="4" style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $user->email }}</td>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);mso-number-format:'0.00';">{{ $user->total_login }}</td>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);mso-number-format:'0.00';">{{ $user->total_logout }}</td>
                    <td style="text-align:center;border-left: 1px ridge rgb(233, 233, 233);border-right: 1px ridge rgb(221, 221, 221);border-bottom: 1px ridge rgb(233, 233, 233);border-top: 1px ridge rgb(233, 233, 233);mso-number-format:'0.00';">{{ $user->total_activity }}</td>
                </tr>
            @endforeach
            <tr style="font-weight: bold;">
                <td></td>
                <td colspan="5" style="text-align:center;font-weight:700;border: 1px ridge rgb(221, 221, 221);">Total</td>
                <td style="text-align:center;font-weight:700;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';">{{ $userTotalLogin }}</td>
                <td style="text-align:center;font-weight:700;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';">{{ $userTotalLogout }}</td>
                <td style="text-align:center;font-weight:700;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';">{{ $userSubTotalActivity }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <table>
        <thead>
            <tr><th></th><th colspan="5" style="background-color: rgb(239, 255, 255);border: 1px ridge rgb(221, 221, 221);">Branch Summary</th></tr>
            <tr>
                <th></th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">SN</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Branch ID</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Login</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Logout</th>
                <th style="border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Activity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td style="text-align:center;border: 1px ridge rgb(221, 221, 221);"><strong>1</strong></td>
                <td style="border: 1px ridge rgb(221, 221, 221);"><strong>{{ $firstSession->branch_id ?? 'N/A' }}</strong></td>
                <td style="text-align:center;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';"><strong>{{ $summary->total_login }}</strong></td>
                <td style="text-align:center;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';"><strong>{{ $summary->total_logout }}</strong></td>
                <td style="text-align:center;border: 1px ridge rgb(221, 221, 221);mso-number-format:'0.00';"><strong>{{ $summary->total_activity }}</strong></td>
            </tr>
        </tbody>
    </table>

    <br><br><br>
    <table>
        <tr>
            <td colspan="4" style="text-align:center;font-weight:700;">Prepared by ( {{ $auth_user_name }} )</td>
            <td colspan="5" style="text-align:center;font-weight:700;">Reference by</td>
            <td colspan="2" style="text-align:center;font-weight:700;">Authorized by</td>
        </tr>
    </table>
</body>
</html>

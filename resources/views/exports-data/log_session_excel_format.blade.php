<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 4px;
        }
        th {
            background-color: lightcyan;
        }
    </style>
</head>
<body>
    @foreach($companyinformations as $infos)
        <table style="width: 100%;">
            <tr><td colspan="6" style="font-size: 24px; font-weight: bold;">{{ $infos->company_name }}</td></tr>
            <tr><td colspan="6">Address: {{ $infos->company_address }}</td></tr>
            <tr><td colspan="6">User Log Session Data</td></tr>
        </table>
        <br>
    @endforeach

    @php $firstSession = $logSessionData->first(); @endphp

    <table style="width: 100%;">
        <tr>
            <td>Branch Type</td>
            <td colspan="2">{{ optional($firstSession->users)->branch_type ?? 'N/A' }}</td>
            <td>Branch ID</td>
            <td colspan="2">{{ $firstSession->branch_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Branch Name</td>
            <td colspan="2">{{ optional($firstSession->users)->branch_name ?? 'N/A' }}</td>
            <td>Branch Location</td>
            <td colspan="2">{{ optional($firstSession->users)->location ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Date From</td>
            <td colspan="2">{{ \Carbon\Carbon::parse($start_date)->format('d M Y') }}</td>
            <td>Date To</td>
            <td colspan="2">{{ \Carbon\Carbon::parse($end_date)->format('d M Y') }}</td>
        </tr>
    </table>

    <br>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th>SN</th>
                <th>User ID</th>
                <th>Email</th>
                <th>Role</th>
                <th>IP Address</th>
                <th>Login Time</th>
                <th>Logout Time</th>
                <th>Last Activity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logSessionData as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->name ?? 'N/A' }}</td>
                    <td>{{ $item->ip_address }}</td>
                    <td>{{ $item->created_at->format('d M Y h:i:s A') }}</td>
                    <td>{{ $item->updated_at->format('d M Y h:i:s A') }}</td>
                    <td>{{ $item->last_activity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <table style="width: 100%;">
        <thead>
            <tr><th colspan="6" style="background-color: lightgreen;">User Summary</th></tr>
            <tr>
                <th>SN</th>
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
            <tr style="font-weight: bold;">
                <td colspan="2">Total</td>
                <td>{{ number_format($userTotalLogin, 2) }}</td>
                <td>{{ number_format($userTotalLogout, 2) }}</td>
                <td>{{ number_format($userSubTotalActivity, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    <table style="width: 100%;">
        <thead>
            <tr><th colspan="6" style="background-color: lightgreen;">Branch Summary</th></tr>
            <tr>
                <th>SN</th>
                <th>Branch ID</th>
                <th>Login</th>
                <th>Logout</th>
                <th>Activity</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $firstSession->branch_id ?? 'N/A' }}</td>
                <td>{{ number_format($summary->total_login ?? 0, 2) }}</td>
                <td>{{ number_format($summary->total_logout ?? 0, 2) }}</td>
                <td>{{ number_format($summary->total_activity ?? 0, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    <table style="width: 100%;">
        <tr>
            <td>Prepared by</td>
            <td>{{ $auth_user }}</td>
            <td>Reference by</td>
            <td></td>
            <td>Authorized by</td>
            <td></td>
        </tr>
    </table>

    <br><br>
    @foreach($companyinformations as $infos)
        <table style="width: 100%;">
            <tr>
                <td>Email: {{ $infos->email }}</td>
                <td>Facebook: {{ $infos->facebook_address }}</td>
                <td>LinkedIn: {{ $infos->linkedin }}</td>
            </tr>
            <tr>
                <td>Contact: {{ $infos->contract_number_one }}, {{ $infos->contract_number_two }}</td>
                <td>Hotline: {{ $infos->hot_number }}</td>
            </tr>
        </table>
    @endforeach
</body>
</html>

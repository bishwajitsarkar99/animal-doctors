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
            <tr><td colspan="12" style="font-size: 24px; font-weight: bold;">{{ $infos->company_name }}</td></tr>
            <tr><td colspan="12"><strong>Address : {{ $infos->company_address }}</strong></td></tr>
            <tr><td colspan="12">
                <strong>
                    <span>
                        Branch Data Download :<?php
                        $timezone = date_default_timezone_get();
                        ?>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " || ";
                        echo date("h:i:sA");
                        ?>
                        <label for="prepared">
                            [ User : {{$email}} ]
                        </label>
                    </span>
                </strong>
            </td></tr>
        </table>
        <br>
    @endforeach
    <br>
    <table style="width: 100%; border: 1px ridge rgb(221, 221, 221);">
        <thead>
            <tr>
                <th style="text-align:center;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">SN</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Branch Type</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Branch ID</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Branch Name</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Division</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">District</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Upazila</th>
                <th style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">City</th>
                <th colspan="4" style="text-align:left;border: 1px ridge rgb(221, 221, 221);background-color: rgb(239, 255, 255);">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $index => $item)
                <tr>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);">{{ $index + 1 }}</td>
                    <td style="text-align:center;border: 1px ridge rgb(233, 233, 233);">{{ $item->branch_type }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->branch_id }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->branch_name }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->divisions->division_name }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->districts->district_name }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->thana_or_upazilas->thana_or_upazila_name }}</td>
                    <td style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->town_name }}</td>
                    <td colspan="4" style="text-align:left;border: 1px ridge rgb(233, 233, 233);">{{ $item->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br><br>
    <table>
        <tr>
            <td colspan="4" style="text-align:center;font-weight:700;">Prepared by ( {{ $name }} )</td>
            <td colspan="5" style="text-align:center;font-weight:700;">Reference by</td>
            <td colspan="3" style="text-align:center;font-weight:700;">Authorized by</td>
        </tr>
    </table>
</body>
</html>

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
            background-color: rgb(239, 255, 255);>;
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
    <br><br>
    <table>
        <tr>
            <td colspan="12" style="background-color: rgb(239, 255, 255);text-align:center;">
                <strong>{{$errorMessage}}</strong>
            </td>
        </tr>
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

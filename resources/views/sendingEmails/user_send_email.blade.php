<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="color-scheme" content="light">
        <meta name="supported-color-schemes" content="light">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>GST Center</title>
    </head>
    <style>
    
    </style>
    <body>
        <div style="width: 99%;height: 100%;margin-right: auto;margin-left: auto;background-color: white;box-shadow: 0px 2px 20px #0001, 0px 2px 6px #0001;border: 1px solid lightgray;border-radius: 5px;opacity: 1;">
            <table style="width: 100%;height: 100%;margin-right: auto;margin-left: auto;background-color: white;box-shadow: 0px 2px 20px #0001, 0px 2px 6px #0001;border-bottom: 1px solid lightgray;opacity: 1;border-top-right-radius: 5px;border-top-left-radius: 5px;">
                <thead>
                    <tr>
                        <th style="text-align:left;">
                            <span style="background-color:darkblue;margin-left: 10px;">
                                <img src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt="logo">
                            </span>
                        </th>
                        <th style="text-align:left;">
                            <h2 style="margin-left: 0px;">{{setting('company_name')}}</h2>
                        </th>  
                    </tr>
                </thead>
            </table>
            <tr>
                <div style="margin-left: 10px;">
                    <h4 class="sending-date" style="margin-bottom:0px;">
                        <span class="serv">
                            <?php
                            $timezone = date_default_timezone_get();
                            echo "Date :";
                            ?>
                        </span>
                        <?php
                        date_default_timezone_set('Asia/Dhaka');
                        echo date('d l M Y') . " ; ";
                        echo date("h:i:sA");
                        ?>
                    </h4>
                    <h4 style="margin-bottom:0px;margin-top:0px;">To : {{$details['user_to']}}</h4>
                    <h4 style="margin-bottom:0px;margin-top:0px;">Cc : {{ $details['user_cc'] ?? 'No Carbon Copy' }} </h4>
                    <h4 style="margin-top:0px;">Bcc : {{ $details['user_bcc'] ?? 'No Block Carbon Copy' }}</h4>
                </div>
                <div style="margin-left: 10px;">
                    <h4 style="background-color: #efebeb;border-left: 3px solid cadetblue;width: 950px;">Subject : {{$details['subject']}}</h4>
                </div>
                <div style="margin-left: 10px;">
                    <p>{!! $details['main_content'] !!}</p>
                </div>
                <div style="margin-left: 10px;">
                    <h4 style="margin-bottom:0px;">Thanks with best regard,</h4>
                    <h4 style="margin-top:0px;">{{Auth::user()->name}}</h4> 
                </div>
            </tr>
        </div>
    </body>
</html>
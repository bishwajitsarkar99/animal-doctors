<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>GST Center</title>
</head>
<style>

</style>
<body>
    <span style="background-color:darkblue;">
        <img src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt="logo">
        <h3>{{setting('company_name')}}</h3>
    </span>
    <h4>{{$details['subject']}}</h4>
    <p>{{$details['main_content']}}</p>

    <h4>Thanks Regard</h4>
    <h4>{{Auth::user()->name}}</h4>
</body>
</html>
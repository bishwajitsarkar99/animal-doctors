<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GST Center</title>
</head>
<style>

</style>
<body>
    <h3>{{$details['title']}}</h3>
    <h4>{{$details['subject']}}</h4>
    <p>{{$details['main_content']}}</p>

    <h4>Thanks Regard</h4>
    <h5>{{Auth::user()->name}}</h5>
</body>
</html>
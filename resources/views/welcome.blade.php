<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="font-weight-bold col-md-2">Currency 1</div>
        <div class="font-weight-bold col-md-2">Currency 2</div>
        <div class="font-weight-bold col-md-8">Rate</div>
    </div>
    {{{ddd($rates)}}}
    @foreach($rates as $key => $value)
        @if($key!== $base)
            <div class="row">
                <div class="col-md-2">{{$base}}</div>

                <div class="col-md-2">{{$key}}</div>

                <div class="col-md-8">{{$value}}</div>
            </div>
        @endif
    @endforeach
</div>
</body>
</html>

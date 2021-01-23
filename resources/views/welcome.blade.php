@extends('layout')
@section('content')
<div class="container mt-5">
    <h1>Welcome to the page</h1>
    
    <a type="submit" value="Update Currencies" class="btn btn-dark" name="updateCurrency" href="{{route('updateCurrency')}}">Update</a>
    @if(Session::has('msg'))
        <h3>{{\Session::get('msg')}}</h3>
    @endif
    <div class="row">
        <div class="font-weight-bold col-md-2">Currency 1</div>
        <div class="font-weight-bold col-md-2">Currency 2</div>
        <div class="font-weight-bold col-md-8">Rate</div>
    </div>

    @foreach($currencies as $currency)
        <div class="row">
            <div class="col-md-2">USD</div>
            <div class="col-md-2">{{$currency['currency']}}</div>
            <div class="col-md-2">{{$currency['rate']}}</div>
        </div>
    @endforeach
    @endsection

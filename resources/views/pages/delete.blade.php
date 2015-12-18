@extends('layouts.master')

@section('title')
    Delete Coupon
@stop


@section('content')

    <h1>Delete Coupon</h1>

    <p>
        Are you sure you want to delete <em>{{$coupon->name_of_store." ".$coupon->description}}</em>?
    </p>

    <p>
        <a href='/coupons/delete/{{$coupon->id}}'>Yes</a>
    </p>

@stop



 




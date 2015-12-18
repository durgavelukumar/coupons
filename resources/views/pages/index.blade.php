@extends('layouts.master')

@section('title')
    Your coupons
@stop

@section('content') 
  <!--  <div class='coupon'>   -->
        @foreach($coupons as $coupon)
		
            <h2>{{ $coupon->name_of_store." ".$coupon->description."     Valid From: ".$coupon->date_valid_from." ".$coupon->time_valid_from."     Valid Until: ".$coupon->date_valid_until." ".$coupon->time_valid_until}}</h2>
			<a href='/coupons/edit/{{$coupon->id}}'>Edit</a> | 
                <a href='/coupons/confirm-delete/{{$coupon->id}}'>Delete</a><br>
        
        @endforeach
 <!--   </div>     -->
@stop

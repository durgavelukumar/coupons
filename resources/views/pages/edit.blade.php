@extends('layouts.master')

@section('title')
    Edit Your Coupon
@stop

@section('content')

    <h1>Edit coupon</h1>
	
	@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
	@endif

	<form method='POST' action='/coupons/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

		<input type='hidden' name='id' value='{{ $coupon->id }}'>

		
		<div class='form-group'>
            <label>Name of Store:</label>
            <input
                type='text'
                id='name_of_store'
                name='name_of_store'
                value='{{$coupon->name_of_store}}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Description:</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{$coupon->description}}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Date valid from:</label>
            <input
                type='text'
                id='date_valid_from'
                name='date_valid_from'
                value='{{$coupon->date_valid_from}}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Time valid from:</label>
            <input
                type='text'
                id='time_valid_from'
                name='time_valid_from'
                value='{{$coupon->time_valid_from}}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Date valid until:</label>
            <input
                type='text'
                id='date_valid_until'
                name='date_valid_until'
                value='{{$coupon->date_valid_until}}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Time valid until:</label>
            <input
                type='text'
                id='time_valid_until'
                name='time_valid_until'
                value='{{$coupon->time_valid_until}}'
				
			>
		</div>
		
		<button type="submit" class="btn btn-primary">Save coupon</button>
    </form>

@stop
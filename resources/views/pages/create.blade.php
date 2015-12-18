@extends('layouts.master')

@section('title')
    Create Your Coupon
@stop

@section('content')

    <h1>Add a new coupon</h1>
	
	@if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
	@endif

	<form method='POST' action='/coupons/create'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

		<div class='form-group'>
            <label>Name of Store:</label>
            <input
                type='text'
                id='name_of_store'
                name='name_of_store'
                value='{{ old('title','Target') }}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Description:</label>
            <input
                type='text'
                id='description'
                name='description'
                value='{{ old('title','25% off clothes') }}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Date valid from:</label>
            <input
                type='text'
                id='date_valid_from'
                name='date_valid_from'
                value='{{ old('title','YYYYMMDD') }}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Time valid from:</label>
            <input
                type='text'
                id='time_valid_from'
                name='time_valid_from'
                value='{{ old('title','HHMMSS') }}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Date valid until:</label>
            <input
                type='text'
                id='date_valid_until'
                name='date_valid_until'
                value='{{ old('title','YYYYMMDD') }}'
				
			>
		</div>
		
		<div class='form-group'>
            <label>Time valid until:</label>
            <input
                type='text'
                id='time_valid_until'
                name='time_valid_until'
                value='{{ old('title','HHMMSS') }}'
				
			>
		</div>
		
		<button type="submit" class="btn btn-primary">Add coupon</button>
    </form>

@stop
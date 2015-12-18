<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
		
			
			
			
            html, body {
					padding: 2cm;
                height: 100%;
				
            }

            <!--body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            } -->

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 115px;
            }
        </style>
    </head>
    <body>
	
	<H1>Coupon Collector</H1>
    <!--    <div class="container">
            <div class="content">
                <div class="title">Developer's Best Friend</div>
            </div>
        </div>   -->
	<nav>
    <ul>
        @if(Auth::check())
            <li><a href='/'>Home</a></li>
            <li><a href='/coupons/create'>Add a coupon</a></li>
            <li><a href='/logout'>Log out</a></li>
        @else
            <li><a href='/'>Home</a></li>
            <li><a href='/login'>Log in</a></li>
            <li><a href='/register'>Register</a></li>
        @endif
    </ul>
</nav>	
		
	<section>
		@if(Session::get('flash_message') != null))
			<div class='flash_message'>{{ Session::get('flash_message') }}</div>
		@endif
	<br>
        {{-- Main page content will be yielded here --}}
		@yield('title')
        @yield('content')
		
		

    </section>

    </body>
	
	
</html>

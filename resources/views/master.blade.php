<!DOCTYPE html>
<html>
    <head>
        <title>PUSH sender</title>
        <link rel="stylesheet" href="/css/stylesheet.css">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/"> Dashbord </a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="/send-message"> Send Message </a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="/sent-messages">Sent Messages</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="/settings">Settings </a></li>
				</ul>
				
				
				<!-- Reverse order due the float:right assign order
				 in style from navbar-right-->
				<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ url('/simulator') }}">Phone Simulator</a></li>
				</ul>
			</div>
		</div>
	</nav>	
		
        <div class="container">
		
			<div class="content">
                @yield('status')
				@yield('content')
				@yield('response')
				
				<!-- Scripts -->
				<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
				<script src="/js/App.js"></script>
				
             </div>
        </div>
    </body>
</html>




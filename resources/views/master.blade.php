<!DOCTYPE html>
<html>
    <head>
        <title>PUSH sender</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/stylesheet.css">
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="/js/App.js"></script>
       
    </head>
    <body>
		<div class="sidebar">
			<div class="item btn"><a href="/send-message"> Send Message </a></div>
			<div class="item btn"><a href="/sent-messages">Sent Messages</a></div>
			<div class="item btn"><a href="/settings">Settings </a></div>
		</div>
        <div class="container">
		
			<div class="content">
                @yield('status')
				@yield('content')
             </div>
        </div>
    </body>
</html>

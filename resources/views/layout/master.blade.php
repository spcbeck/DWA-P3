<!DOCTYPE html>
<html lang="en">
	<head>
	 	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	  	<title> {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','Buzzfeed Article and Writer Generator')</title>
	  	<meta name="description" content="Dynamic Web Applications Project 2 site">
	  	<meta name="author" content="Sean Beck">

	  	<link rel="SHORTCUT ICON" href="/favicon.ico" />

	  	<link href="/css/app.css" rel="stylesheet" type="text/css">
	 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

	 	<script src="https://use.typekit.net/tjj3ezf.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
	  
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	   	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

	<body>
		<div class="container">
			<header class="clearfix">
				<h1 class="pull-left"><img src="/images/FuzzBeed.svg" alt="Fuzz Beed" /></h1>
				<img src="/images/reactions.png" alt="reactions" class="pull-right reactions" />
			</header>

		</div>

			<nav class="navbar navbar-default">
				<div class="container">
				<!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    	<ul class="nav navbar-nav">
				        	<li><a href="#" onclick="document.getElementById('scraper').submit();">Aggregate Content</a></li>
				    	</ul>
				    </div>
			    </div>
			</nav>
			<form id="scraper" method="GET" action="/articles/scrape" class="hidden">
				{{ csrf_field() }}
			</form>
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					@yield('articleDisplay')
				</div>
				<div class="col-md-4">
					@yield('content')
				</div>
			</div>
		</div>
	</body>
</html>
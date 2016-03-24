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

	  	<link href="./css/styles.css" rel="stylesheet" type="text/css">
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

	<body class="container-fluid">
		<h1>Fuzz Beed</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Buzzfeed Writer Profile Generator
					</div>
					<div class="panel-body">
						<form method="POST">
						{{ csrf_field() }}
							<div class="form-group">
								<label>Include:</label>
								<div class="btn-group" data-toggle="buttons">
	                				<label class="btn btn-default">
	                					<input type="radio"> Twitter Bio
	                				</label>
	                				<label class="btn btn-default">
	                					<input type="radio"> Location
	                				</label>
	                				<label class="btn btn-default">
	                					<input type="radio"> Department
	                				</label>
	                			</div>
							</div>
							<button class="btn btn-primary" type="submit">Generate Writer</button>
						</form>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						Buzzfeed List and Article Generator
					</div>
					<div class="panel-body">
						<form method="POST" action="/articles/create">
						{{ csrf_field() }}
							<div class="form-group">
								<label>Type:</label>
								<div class="btn-group" data-toggle="buttons">
		            				<label class="btn btn-default">
		            					<input type="radio"> Listicle
		            				</label>
		            				<label class="btn btn-default">
		            					<input type="radio"> Long Form
		            				</label>
		            			</div>
		            		</div>
		            		<div class="form-group">
		            			<label># of Paragraphs/List Items</label>
		            			<input type-"number" />
		            		</div>
		            		<button class="btn btn-primary" type="submit">Generate Article</button>
	            		</form>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
					Ur Content
					</div>
					<div class="panel-body">

					</div>
				</div>
			</div>
		</div>
	</body>
</html>
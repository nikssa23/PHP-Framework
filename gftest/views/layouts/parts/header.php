<html>
    <head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

	<link href="/css/justified-nav.css" rel="stylesheet">

    </head>
    <body>
	<div class="container">

	    <!-- Static navbar -->
	    <nav class="navbar navbar-default">
		<div class="container-fluid">
		    <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Ask-nerds.com</a>
		    </div>
		    <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			    <li class="<?= ($this->load_page == 'home') ? 'activ' : '' ?>"><a href="/">Home</a></li>
			    <li class="<?= ($this->load_page == 'forum') ? 'active' : '' ?>"><a href="/index.php/forum">Forum</a></li>
			    <li class="<?= ($this->load_page == 'help') ? 'activ' : '' ?>"><a href="/index.php/help">Help</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="/login">Login</a></li>
			    <li><a href="/register">Register</a></li>
			</ul>
		    </div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	    </nav>

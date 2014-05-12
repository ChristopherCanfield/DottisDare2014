<?php
	require_once('server/session.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width initial-scale=0.75">
    <meta name="description" content="Login page for Dotti's Dare" />
	<meta name="author" content="Christopher D. Canfield" />
    
    <title>Dotti's Dare</title>

    <!-- css -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/dottisdare.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 class="title">
    	Welcome to the Dotti's Dare<br>
    	2014 Scavenger Hunt!
    </h1>
    
    <div class="container">
      <form class="form-signin signinform" role="form">
        <h4 class="form-signin-heading">
        	Please enter your troop number to continue.<br>
        	Ex. TR1234
        </h4>
        
        <input type="text" class="form-control" placeholder="" required autofocus>
        <button class="btn btn-lg btn-primary " type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
    
	<?php
		echo $_SESSION['test'];
		echo 'test';
	?>

    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
	require_once('server/session.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width initial-scale=0.75">
    <meta name="description" content="Dotti's Dare Clue Code" />
	<meta name="author" content="Christopher D. Canfield" />
    
    <title>Dotti's Dare - Clue Code</title>

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
    <div class="container">
      <form class="form-signin cluecode" role="form">
        <h4 class="form-signin-heading">
        	Enter the 3-digit code found on the back of your clue:
        </h4>
        
        <input type="text" class="form-control dottisdare" placeholder="" required autofocus>
        <button class="btn btn-lg btn-primary dottisdare" type="submit">Submit Clue Code</button>
      </form>
    </div> <!-- /container -->
    
    <footer>
    	&copy; 2014 Christopher D. Canfield | Caitlin F. Canfield
    </footer>
    
    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

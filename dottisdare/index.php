<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width initial-scale=0.75">
    <meta name="description" content="Dotti's Dare Login Page" />
	<meta name="author" content="Christopher D. Canfield" />
    
    <title>Dotti's Dare</title>

    <!-- css -->
    <link href="lib/jquery-ui/css/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
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
      <form class="form-signin signinform" role="form" action="server/login.php" method="post">
        <h4 class="form-signin-heading">
        	Please enter your troop number to continue.<br>
        	Ex. TR1234
        </h4>
        
        <input type="text" class="form-control dottisdare" name="troop" placeholder="" required autofocus>
        
        <?php 	
	    	if (isset($_GET['status']))
			{
				echo '<div style="color:#E80000;margin-bottom:30px;">';
				echo 'Invalid troop number: ' . $_GET['troop'];
				echo '</div>';
			}
		?>
        
        <button class="btn btn-lg btn-primary dottisdare" type="submit" data-loading-text="Loading...">Sign in</button>
      </form>
    </div> <!-- /container -->
    
    <footer>
    	&copy; 2014 Christopher D. Canfield | Caitlin F. Canfield<br>
    	Divergent Thoughts Games
    </footer>

    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
  </body>
</html>

<?php
	session_start();

	if (empty($_GET['troopname']))
	{
		require('server/environment.php');
		$pathStart = (Environment::get() == Environment::LOCAL) ? '/dottisdare' : '';
		header('location: ' . $pathStart . '/index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width initial-scale=0.75">
    <meta name="description" content="Dotti's Dare Scavenger Hunt Rules" />
	<meta name="author" content="Christopher D. Canfield" />
    
    <title>Dotti's Dare - Rules</title>

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
  	<?php require('server/header.php');	?>
  	
    <div class="container">  
    	<h1 class="title">
    		Dotti's Dare 2014 Scavenger Hunt Rules
    	</h1>
    		
  		<div class="rules dottisdare">
  			<?php 	
				echo '<h3 class="rules">';
				echo 'Welcome ' . $_GET['troopname'] . '!';
				echo '</h3>';
			?>
  			
  			<h3 class="rules">
      			Your goal is to find the events from Dotti’s life that are hidden around camp, 
      			and place them in the order in which they happened 
      		</h3>
  			
	  		<ul>
	      		<li>
	      			A picture of your next event’s hiding spot will appear on a map of camp, in its approximate location. 
	      			Tap the picture to enlarge it, and tap again to go back to the map screen.
				</li>
	      		<li>
	      			If you have Location Services enabled for your browser, 
	      			you will get a message when you are getting close.
	      		</li>
	      		<li>
	      			Once you have found your event, tap the FOUND IT! button. 
	      			You will then be asked to enter the three-digit code found on the event paper.
	      		</li>
	      		<li>
	      			When you have entered the code, you will be able to place your event on a timeline of Dotti’s life. 
	      			When the timeline appears, simply tap the location where you think the event belongs. 
	      			You will have the opportunity to move events around as you find more!
	      		</li>
	      		<li>
	      			If you need help at any time, tap the question mark in the bottom right-hand corner of the screen.
	      		</li>
	      	</ul>
	      	
	      	<div class="centered">
	      		<?php
	      			echo '<a class="btn btn-lg btn-primary dottisdare rules" href="map.php?troop=' . 
	      					rawurlencode($_GET['troop']) . '&amp;troopname=' . rawurlencode($_GET['troopname'])
	      					. '">Ready to Play!</a>';
				?>
		    </div>
	      </div>

    </div> <!-- /container -->
    
    <footer>
    	&copy; 2014 Christopher D. Canfield | Caitlin F. Canfield
    </footer>

    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    <script src="lib/touch-punch/jquery.ui.touch-punch.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
  </body>
</html>

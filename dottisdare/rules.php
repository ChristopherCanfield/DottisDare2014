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
	      			On the next screen, you will see a map of camp with several different symbols, representing the approximate location of each clue. 
	      			Tap on each symbol to see a picture of the clue location.
				</li>
	      		<li>
	      			Once you have found a clue,  enter its 3-digit code under its picture and tap "Submit Clue Code."
	      		</li>
	      		<li>
	      			If you have entered the correct code, the text of the clue will appear, along with the button "Open Timeline." 
	      			Tap that button to see your timeline of clues/events in Dotti's life.
	      		</li>
	      		<li>
	      			On the timeline screen, you can adjust the order of events by dragging them up or down.
	      		</li>
	      		<li>
	      			When you are happy with the order of your clues, click "Ok" and you will return to the map.
	      		</li>
	      		<li>
	      			Once you have found all 12 event clues, a "Submit" button will appear on your timeline screen. 
	      			When you are happy with the order of all of your events, click this button to submit your timeline!
	      		</li>
	      		<li>
	      			You can view your timeline at any time by clicking the "Timeline" button above the map.
	      		</li>
	      		<li>
	      			If you need help, tap the "Help" button in the upper-right corner of the screen. 
	      			It will bring you back to this instruction screen.
	      		</li>
	      		<li>
	      			You can also log out and log back in if necessary. Your progress will be saved.
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
    	&copy; 2014 Christopher D. Canfield | Caitlin F. Canfield<br>
    	Divergent Thoughts Games
    </footer>

    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    <script src="lib/touch-punch/jquery.ui.touch-punch.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
  </body>
</html>

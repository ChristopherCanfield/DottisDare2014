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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width initial-scale=0.75">
    <meta name="description" content="Dotti's Dare Camp Map" />
	<meta name="author" content="Christopher D. Canfield" />
    
    <title>Dotti's Dare - Camp Map</title>

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
    	Dotti's Dare 2014 Map &amp; Timeline
    </h1>

    <div class="container">
      <div class="map dottisdare centered">
        <?php
			echo '<h3 class="map">';
			echo $_GET['troopname'];
			echo '</h3>';
		?>
		
		<div class="centered">
			<a class="btn btn-lg btn-primary dottisdare map" data-toggle="modal" href="#timeline" alt="Timeline">
				Timeline
			</a>
	    </div>

		<?php 
			include 'server/clues/clue173.php';
			include 'server/clues/clue178.php';
			include 'server/clues/clue217.php';
			include 'server/clues/clue218.php';
			include 'server/clues/clue249.php';
			include 'server/clues/clue267.php';
			include 'server/clues/clue472.php';
			include 'server/clues/clue514.php';
			include 'server/clues/clue542.php';
			include 'server/clues/clue874.php';
			include 'server/clues/clue875.php';
			include 'server/clues/clue925.php';
			include 'server/timeline.php';
		?>
        
        <img src="images/map.jpg" height="722" width="962" alt="Camp Map" usemap="#map" />
		<map name="map">
		    <area shape="poly" coords="659, 402, 712, 360, 670, 318, 617, 314, 610, 370" 
		    		data-toggle="modal" href="#blueSquare" alt="Blue Square" />
		    <area shape="poly" coords="687, 420, 736, 381, 806, 388, 799, 451, 718, 458" 
		    		data-toggle="modal" href="#redTriangle" alt="Red Triangle" />
		    <area shape="rect" coords="592, 472, 694, 545" 
		    		data-toggle="modal" href="#greenSquare" alt="Green Square" />
		    <area shape="rect" coords="725, 266, 823, 342" 
		    		data-toggle="modal" href="#greenTriangle" alt="Green Triangle" />
		    <area shape="poly" coords="575, 105, 698, 101, 697, 139, 638, 167, 582, 140" 
		    		data-toggle="modal" href="#greenCircle" alt="Green Circle" />
		    <area shape="poly" coords="655, 91, 572, 94, 547, 45, 652, 35, 697, 55, 698, 90" 
		    		data-toggle="modal" href="#purpleTriangle" alt="Purple Triangle" />
		    <area shape="rect" coords="610, 192, 684, 269" 
		    		data-toggle="modal" href="#purpleSquare" alt="Purple Square" />
		    <area shape="poly" coords="753, 136, 795, 203, 862, 195, 830, 136, 768, 115" 
		    		data-toggle="modal" href="#redCircle" alt="Red Circle" />
		    <area shape="poly" coords="781, 209, 764, 171, 732, 140, 701, 171, 729, 220" 
		    		data-toggle="modal" href="#purpleCircle" alt="Purple Circle" />
		    <area shape="rect" coords="484, 308, 571, 391" 
		    		data-toggle="modal" href="#blueTriangle" alt="Blue Triangle" />
		    <area shape="rect" coords="383, 224, 474, 332" 
		    		data-toggle="modal" href="#redSquare" alt="Red Square" />
		    <area shape="rect" coords="194, 220, 319, 325" 
		    		data-toggle="modal" href="#blueCircle" alt="Blue Circle" />
		</map>
		<div class="centered small" style="margin-top: 10px;">
			Campground map &copy; 2014 Girl Scouts of Eastern Pennsylvania
		</div>
    </div> <!-- /container -->
    
    <footer>
    	&copy; 2014 Christopher D. Canfield | Caitlin F. Canfield
    </footer>
    
    <!-- jQuery -->
    <script src="lib/jquery/jquery-1.11.1.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
    
    <script>
		$(function() {
			$('#sortable').sortable({
			    axis: 'y',
			    update: function (event, ui) {
			        var timelineData = $(this).sortable('serialize');

			        $.ajax({
			            data: timelineData + '&troop=' <?php $_GET['troop'] ?> ,
			            type: 'POST',
			            url: 'server/processTimeline.php'
			        });
			    }
			});
			
			$( "#sortable" ).disableSelection();
		});
	</script>
	
	<script src="js/Clue.js"></script>
  </body>
</html>

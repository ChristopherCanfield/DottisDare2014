    <div class="navbar navbar-dottisdare" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand">Dotti's Dare 2014 | <?php echo htmlspecialchars($_GET['troopname']); ?></span>
       	</div>
       	<div class="navbar-dottisdare">
	       	<ul class="nav">
	       		<li class="navbar-dottisdare"><a href="index.php" class="navbar-dottisdare">Log Out</a></li>
	       		<?php
	       			echo
		        	'<li class="navbar-dottisdare"><a href="rules.php?troop=' . rawurlencode($_GET['troop']) .
		        		'&amp;troopname=' . rawurlencode($_GET['troopname']) . '" class="navbar-dottisdare">Help</a></li>';
		       	?>          
	        </ul>
	   </div>
      </div>
    </div>
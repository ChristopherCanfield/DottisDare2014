<?php
    require_once('server/session.php');
	
	$troop = isset($_POST['troop']) ? $_POST['troop'] : null;
	if (is_null($troop))
	{
		// TODO: invalid troop id - do something
	}
	
	
?>
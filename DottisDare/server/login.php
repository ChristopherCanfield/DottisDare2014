<?php
    require_once('server/session.php');
	require_once('server/model/database.php');
	
	$troop = isset($_POST['troop']) ? $_POST['troop'] : null;
	if (is_null($troop))
	{
		// TODO: invalid troop id - do something
	}
	
	$troopName = Database::getTroopName($troop);
	
	$_SESSION['troop'] = $troopName;
	
	header('location: /restaurant/login/success.php?action=login');
	exit;
?>
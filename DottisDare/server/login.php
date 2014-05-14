<?php
	require_once('session.php');
	require('database.php');
	
	$troop = isset($_POST['troop']) ? $_POST['troop'] : null;
	if (is_null($troop))
	{
		header('location: /dottisdare/index.php?status=invalid&troop=' . $troop);
		exit;
	}
	
	$troopName = Database::getTroopName($troop);
	if (is_null($troopName))
	{
		header('location: /dottisdare/index.php?status=invalid&troop=' . $troop);
		exit;
	}
	
	$_SESSION['troop'] = $troop;
	$_SESSION['troopName'] = $troopName;
	
	header('location: /dottisdare/rules.php?troop=' . $troop . '&troopname=' . $troopName);
	exit;
?>
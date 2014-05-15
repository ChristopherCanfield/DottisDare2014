<?php
	session_start();

	require('database.php');
	
	$pathStart = (Environment::get() == Environment::LOCAL) ? '/dottisdare' : '';
	
	$troop = isset($_POST['troop']) ? $_POST['troop'] : null;
	if (is_null($troop))
	{
		header('location: ' . $pathStart . '/index.php?status=invalid&troop=' . $troop);
		exit;
	}
	
	$troopName = Database::getTroopName($troop);
	if (is_null($troopName))
	{
		header('location: ' . $pathStart . '/index.php?status=invalid&troop=' . $troop);
		exit;
	}
	
	$_SESSION['troop'] = $troop;
	$_SESSION['troopname'] = $troopName;
	
	header('location: ' . $pathStart . '/rules.php?troop=' . $troop . '&troopname=' . $troopName);
	exit;
?>
<?php
	require('database.php');

	$troopId = $_POST['troop'];
	$clueId = $_POST['clue'];

	Database::addClue($troopId, $clueId);
	
	exit;
?>
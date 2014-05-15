<?php
	require('database.php');

	$timelineOrder = 0;
	$troopId = $_POST['troop'];

	foreach ($_POST['clue'] as $clueId) {
		Database::setClueTimelineOrder($_POST['troop'], $clueId, $timelineOrder);

	    $timelineOrder++;
	}
	
	exit;
?>
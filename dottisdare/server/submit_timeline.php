<?php
	require('database.php');

	$troopId = $_POST['troop'];
	$submitTimeline = $_POST['submittimeline'];

	Database::setTimelineSubmitted($troopId, $submitTimeline);
	
	exit;
?>
<?php
	require('database.php');

	$troopId = $_POST['troop'];
	$submitTimeline = $_POST['submittimeline'] == 1;

	Database::setTimelineSubmitted($troopId, $submitTimeline);
	
	exit;
?>
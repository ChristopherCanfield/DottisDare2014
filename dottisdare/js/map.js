/**
 * map.js
 * Functionality used by the map page.
 * @author Christopher D. Canfield
 */

/**
 * Submits or unsubmits the timeline.
 */
var submitTimeline = function(troopId, submit) {
	var buttonText = (submit === true) ? "Unsubmit" : "Submit";
	$("#submitTimeline").html(buttonText);
	$("#submitTimeline").submit(function() {
		submitTimeline(troopId, !submit);
	});
	
	$.post("server/submit_timeline.php",
			{troop: troopId, submittimeline: submit}
		);
};

/**
 * Updates the form to reflect a correct clue code.
 */
var correctClueFormUpdates = function(troopId, troopName, clueId, modalId) {
	$("#clue" + clueId).css( "visibility", "visible");
	$("#input" + clueId).hide();
	$("#incorrect" + clueId).hide();
	
	$("#clueSubmitText" + clueId).text(getClueText(clueId));
	
	$("#submitButton" + clueId).html("Open Timeline");
	$("#form" + clueId).submit(function() {
		// Do nothing.
	});
	
	$.post("server/new_clue.php",
			{troop: troopId, clue: clueId},
			$("#form" + clueId).submit(function() {
				closeModalOpenTimeline(troopId, troopName, modalId);
			})
		);
};

/**
 * Closes the specified modal and opens the timeline.
 */
var closeModalOpenTimeline = function(troopId, troopName, modalId)
{
	$("#" + modalId).modal("hide");
	var url = "map.php?troop=" + troopId + "&troopname=" + troopName + "&showtimeline";
	window.location.replace(encodeURI(url));
};

var clueCodeIncorrect = function(clueId) {
	$("#incorrect" + clueId).css("visibility", "visible");
};

/**
 * Determines whether the clue code is correct, and updates the form based on whether it is
 * correct or not.
 * @param {troopId} troopId the troop's id.
 * @param {String} troopName the name of the troop.
 * @param {int} clueId the correct clue id.
 * @param {String} modalId the modal's html id.
 */
var validateClue = function(troopId, troopName, clueId, modalId) {
	if (clueId == $('#input' + clueId).val())
	{
		correctClueFormUpdates(troopId, troopName, clueId, modalId);
	}
	else
	{
		clueCodeIncorrect(clueId);
	}
};

/**
 * Returns the text of the specified clue.
 * @param {int} clueId the clue's id.
 * @return {String} the clue's description text.
 */
var getClueText = function(clueId) {
	// This data should be pulled from the database...
	
	switch (clueId)
	{
		case 173:
			return "Dotti was left stranded on a rock in the middle of a raging river while whitewater rafting with her Senior Troop.";
		case 178:
			return "Dotti became a leader of an intermediate troop.";
		case 217:
			return "Dotti began working for Girl Scouts.";
		case 218:
			return "Dotti became her council's delegate for the Girl Scout National Convention. She would reprise this role many times.";
		case 249:
			return "Dotti joined the Lansdale Ambulance Corp.";
		case 267:
			return "Dotti moved to Chicago.";
		case 472:
			return "Dotti worked as a cook during summer camp at Camp Laughing Waters.";
		case 514:
			return "A member of Dotti's Senior Troop #553 was named the first Gold Award recipient in the Greater Philadelphia Council.";
		case 542:
			return "Dotti began traveling to Appalachia each summer to help build and repair homes for the poor.";
		case 874:
			return "Dotti one the highest national Girl Scout honor - the Thanks Badge II.";
		case 875:
			return "Dotti led a Pilot troop of five-year-olds to help gather information before implementation of the Daisy program.";
		case 925:
			return "Dotti graduated from North Penn High School.";
		default:
			throw "Invalid clue id passed to getClueText.";
	}
};

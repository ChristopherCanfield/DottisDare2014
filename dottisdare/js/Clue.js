/**
 * ValidateClue.js
 * @author Christopher D. Canfield
 */

/**
 * Updates the form to reflect a correct clue code.
 */
var correctClueFormUpdates = function(troopId, troopName, clueCode, modalId) {
	$("#clue" + clueCode).css( "visibility", "visible");
	$("#input" + clueCode).hide();
	$("#incorrect" + clueCode).hide();
	
	$("#clueSubmitText" + clueCode).text(getClueText(clueCode));
	
	$("#submitButton" + clueCode).html("Open Timeline");
	$("#form" + clueCode).submit(function() {
		// Do nothing.
	});
	
	$.post("server/new_clue.php",
			{troop: troopId, clue: clueCode},
			$("#form" + clueCode).submit(function() {
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

var clueCodeIncorrect = function(clueCode) {
	$("#incorrect" + clueCode).css("visibility", "visible");
};

/**
 * Determines whether the clue code is correct, and updates the form based on whether it is
 * correct or not.
 * @param {troopId} troopId the troop's id.
 * @param {String} troopName the name of the troop.
 * @param {int} clueCode the correct clue code.
 * @param {String} modalId the modal's html id.
 */
var validateClue = function(troopId, troopName, clueCode, modalId) {
	if (clueCode == $('#input' + clueCode).val())
	{
		correctClueFormUpdates(troopId, troopName, clueCode, modalId);
	}
	else
	{
		clueCodeIncorrect(clueCode);
	}
};

/**
 * Returns the text of the specified clue.
 * @param {int} clueCode the clue's code.
 * @return {String} the clue's description text.
 */
var getClueText = function(clueCode) {
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

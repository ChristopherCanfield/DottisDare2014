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
	
	$("#clueSubmitText" + clueCode).text();
	
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
 * @param {Object} clueId the clue's id.
 */
var getClueText = function(clueId) {
	// This data should be pulled from the database...
	
	switch (clueId)
	{
		case 173:
		
			break;
		case 178:
		
			break;
		case 217:
		
			break;
		case 218:
		
			break;
		case 249:
		
			break;
		case 267:
		
			break;
		case 472:
		
			break;
		case 514:
		
			break;
		case 542:
		
			break;
		case 874:
		
			break;
		case 875:
		
			break;
		case 925:
		
			break;
		default:
			throw "Invalid clue id passed to getClueText.";
	}
};


173	Dotti was left stranded on a rock in the middle of a raging river while whitewater rafting with her Senior Troop.
178	Dotti became a leader of an intermediate troop.
217	Dotti began working for Girl Scouts.
218	Dotti became her council's delegate for the Girl Scout National Convention. She would reprise this role many times.
249	Dotti joined the Lansdale Ambulance Corp. 
267	Dotti moved to Chicago.
472	Dotti worked as a cook during summer camp at Camp Laughing Waters.
514	A member of Dotti's Senior Troop #553 was named the first Gold Award recipient in the Greater Philadelphia Council.
542	Dotti began traveling to Appalachia each summer to help build and repair homes for the poor.
874	Dotti one the highest national Girl Scout honor - the Thanks Badge II.
875	Dotti led a Pilot troop of five-year-olds to help gather information before implementation of the Daisy program.
925	Dotti graduated from North Penn High School

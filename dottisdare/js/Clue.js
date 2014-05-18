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
	$("#submitText" + clueCode).hide();
	$("#incorrect" + clueCode).hide();
	
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
	window.location.href("map.php?troop=" + troopId + "&amp;troopName=" + encodeURIComponent(troopName) +
			"&amp;showtimeline");
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

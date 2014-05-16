/**
 * ValidateClue.js
 * @author Christopher D. Canfield
 */

/**
 * Updates the form to reflect a correct clue code.
 */
var correctClueFormUpdates = function(troopId, clueCode, modalId) {
	$("#clue" + clueCode).css( "visibility", "visible");
	$("#input" + clueCode).hide();
	$("#submitText" + clueCode).hide();
	$("#incorrect" + clueCode).hide();
	
	$("#submitButton" + clueCode).html("Open Timeline");
	$("#form" + clueCode).submit(function() {
		$("#" + modalId).modal("hide");
		$("#timeline").modal("show");
	});
	
	$.post("server/new_clue.php",
			{troop: troopId, clue: clueCode}
	);
};

/**
 * Closes the specified modal and opens the timeline.
 */
var closeModalOpenTimeline = function(modalId)
{
	$("#" + modalId).modal("hide");
	$("#timeline").modal("show");
};

var clueCodeIncorrect = function(clueCode) {
	$("#incorrect" + clueCode).css("visibility", "visible");
};

/**
 * Determines whether the clue code is correct, and updates the form based on whether it is
 * correct or not.
 * @param {troopId} troopId the troop's id.
 * @param {int} clueCode the correct clue code.
 * @param {String} modalId the modal's html id.
 */
var validateClue = function(troopId, clueCode, modalId) {
	if (clueCode == $('#input' + clueCode).val())
	{
		correctClueFormUpdates(troopId, clueCode, modalId);
	}
	else
	{
		clueCodeIncorrect(clueCode);
	}
};

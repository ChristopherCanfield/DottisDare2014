/**
 * ValidateClue.js
 * @author Christopher D. Canfield
 */

/**
 * Updates the form to reflect a correct clue code.
 */
var clueCodeCorrect = function(troopId, clueCode, modalId) {
	$("#clue" + clueCode).css( "visibility", "visible");
	$("#input" + clueCode).hide();
	$("#submitText" + clueCode).hide();
	$("#incorrect" + clueCode).hide();
	
	$("#submitButton" + clueCode).html("Open Timeline");
	$("#form" + clueCode).submit(function() {
		$("#" + modalId).modal("hide");
		$("#timeline").modal("show");
	});
	
	addClueCode(troopId, clueCode);
};

var addClueCode = function(troopId, clueCode)
{
	$.post("server/new_clue.php",
			{troop: troopId, clue: clueCode}
	);
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
		clueCodeCorrect(troopId, clueCode, modalId);
	}
	else
	{
		clueCodeIncorrect(clueCode);
	}
};

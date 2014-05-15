/**
 * ValidateClue.js
 * @author Christopher D. Canfield
 */


/**
 * Updates the form to reflect a correct clue code.
 */
var clueCodeCorrect = function(clueCode) {
	$("#clue" + clueCode).css( "visibility", "visible");
	$("#input" + clueCode).hide();
	$("#submitText" + clueCode).hide();
	$("#submitButton" + clueCode).text("Open Timeline");
	$("#incorrect" + clueCode).hide();
};

var clueCodeIncorrect = function(clueCode) {
	$("#incorrect" + clueCode).css("visibility", "visible");
};

/**
 * Determines whether the clue code is correct, and updates the form based on whether it is
 * correct or not.
 * @param {int} clueCode the correct clue code.
 */
var validateClue = function(clueCode) {
	if (clueCode == $('#input' + clueCode).val())
	{
		clueCodeCorrect(clueCode);
	}
	else
	{
		clueCodeIncorrect(clueCode);
	}
};

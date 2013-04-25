var current_type_id = 1;
//
function addMultipleChoice() {
//Save html elements to a variable
	var new_html = '<div class="answer_option"><input type="radio" name="mc.correct" value="<id>"><textarea name="mc.answer.<id>"></textarea></div> ';
//count how many textarea elements there is in #multiple-choice-options
	var id = $('#multiple-choice-options textarea').length;
//replaces the <id> element in new_html with new value
	new_html = new_html.replace(/<id>/g, id+1);

//search for element with id multiple-choice-options and append it new_html
	$('#multiple-choice-options').append(new_html);
	//return false;
}

function addMultipleResponse() {

	var html = '<div class="answer-option"><input type="checkbox" name="mr.correct" value="<id>">&nbsp<textarea name="mr.answer.<id>"></textarea></div> ';
	var id = $('#multiple-response-answer-option textarea').length;
	html = html.replace(/<id>/g, id+1);
	$('#multiple-response-answer-option').append(html);
	return false;
}
//remove function
function removeMultipleChoice() {
//if there is more than one textarea element in div multiple-choice-options
	//then take the last answer-option class element and remove it
	if ($('#multiple-choice-options textarea').length > 1) {
		$('#multiple-choice-options .answer-option:last').remove();

	}
	return false;
}

function removeMultipleResponse() {

	if ($('#multiple-response-answer-option textarea').length > 1) {
		$('#multiple-response-answer-option .answer-option:last').remove();
	}
	return false;
}

function checkForm() {
//Find all elements that have id type_id_+ current_type_id and have input with a type checkbox or radio
	var elements = $('#type_id_' + current_type_id + 'input[type=checkbox],#type_id_' + current_type_id + 'input[type=radio]');
	var textboxes = $('#type_id_' + current_type_id + 'textarea');
//Loop through elements
	//if  elements have attribute checked and their text box is not left empty return true
	for (i = 0; i < elements.length; i++) {
		if ($(elements[i]).attr('checked') && $.trim($(textboxes[i]).val()) != "") {
			return true;
		}
	}
	//if the code does not execute the if content give alert and return false
	alert('palun märgi õige vastus');
	return false;

}
$(function () {
/*searches all the html elements that have the id answer-template
 and inside of them searches for answer-template class. Makes an object out of them. Hides the object*/
	$('#answer-template .answer-template').hide();

	//shows the html element with id  type_id_+current_type_id(defined at the top of the file)
	$('#type_id_' + current_type_id).show();

	//Add event to html element with id type_id
	$('#type_id').bind('change', function (event) {

/*if #type_id value is different from current_type_id,
then hide all my answer-template classes inside div answer-template*/
		if ($(this).val() != current_type_id) {
			$('#answer-template .answer-template').hide();

//reset current_type_id and show element with that current_type_id
			current_type_id = $(this).val();
			$('#type_id_' + current_type_id).show();
		}
	});
	//make a variable of the element type_id option
	var list = $('#type_id option');
//Loop through the list and check if $(list[i]) value is equal to current_type_id
	// if true, then set $(list[i]) element attribute selected value selected
	for (var i = 0; i < list.length; i++) {
		if ($(list[i]).val() == current_type_id) {
			$(list[i]).attr('selected', 'selected');
		}
	}
//set focus on the first input element in the code
	$('input:first').focus();
});

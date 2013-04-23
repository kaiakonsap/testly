var current_type_id = 2;

function addMultipleChoice() {

	var html = '<div class="answer_option"><input type="radio" name="mc.correct" value="<id>"><textarea name="mc.answer.<id>"></textarea></div> ';
	var id = $('#multiple-choice-options textarea').length;
	html = html.replace(/<id>/g, id);
	$('#multiple-choice-options').append(html);
	return false;
}

function addMultipleResponse() {

	var html = '<div class="answer-option"><input type="checkbox" name="mr.correct" value="<id>">&nbsp<textarea name="mr.answer.<id>"></textarea></div> ';
	var id = $('#multiple-response-answer-option textarea').length;
	html = html.replace(/<id>/g, id);
	$('#multiple-response-answer-option').append(html);
	return false;
}

function removeMultipleChoice() {

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

	var elements = $('#type_id' + current_type_id + 'input[type=checkbox]:not[.shuffle_answers],#type_id' + current_type_id + 'input[type=radio]:not(#shuffle_answers)');
	var textboxes = $('#type_id' + current_type_id + 'textarea');

	for (i = 0; i < elements.length; i++) {
		if ($(elements[i]).attr('.checked') && $.trim($(textboxes[i]).val()) != "") {
			return true;
		}
	}
	alert('palun märgi õige vastus');
	return false;

}
$(function () {
	$('#answer-template .answer-template').hide();
	$('#type_id_' + current_type_id).show();
	$('#type_id').bind('click change focus', function (event) {
		if ($(this).val() != current_type_id) {
			$('#answer-template .answer-template').hide();
			current_type_id = $(this).val();
			$('#type_id_' + current_type_id).show();
		}
	});
	var list = $('#type_id option');
	for (var i = 0; i < list.length; i++) {
		if ($(list[i]).val() == current_type_id) {
			$(list[i]).attr('selected', 'selected');
		}
	}
	$('textarea:first').focus();
});

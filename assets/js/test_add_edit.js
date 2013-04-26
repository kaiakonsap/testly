//
var current_type_id=2;

function addMultipleChoice(){
	//save html elements to a variable
	var html='<div class="answer-option"><input type="radio" name="mc.correct" value="<id>">&nbsp;<textarea name="mc.answer.<id>"></textarea></div>'
	//count how many textarea elements there is in #multiple-choice-options
	var id=$('#multiple-choice-option textarea').length;
	//replaces the <id> element in html with new value
	html=html.replace(/<id>/g,id+1);
	// search for element with id #multiple-choice-option and append it new_html
	$('#multiple-choice-option').append(html);
	return false;
}
function addMultipleResponse(){
	var html='<div class="answer-option"><input type="checkbox" name="mr.correct" value="<id>">&nbsp;<textarea name="mr.answer.<id>"></textarea></div>'
	var id=$('#multiple-response-answer-option textarea').length;
	html=html.replace(/<id>/g,id);
	$('#multiple-response-answer-option').append(html);
	return false;
}
//remove function
function removeMultipleChoice(){
	//if there is more than one textarea element in #multiple-choice-option
	// then take the last answer-option class element and remove it
	if($('#multiple-choice-option textarea').length>1){
		$('#multiple-choice-option .answer-option:last').remove();
	}
	return false;
}
function removeMultipleResponse(){
	if($('#multiple-response-answer-option textarea').length>1){
		$('#multiple-response-answer-option .answer-option:last').remove();
	}
	return false;
}
function checkForm(){
//Find all elements that have id type_id_ + current_type_id and have input with a type checkbox or radio
	var elements=$('#type_id_' + current_type_id + 'input[type=checkbox]:not(.shuffle_answers), #type_id_' + current_type_id + 'input[type=radio]:not(#shuffle)');
	var textboxes=$('#type_id_' + current_type_id + 'textarea');
	//loop through elements
	// if elements have attribute checked and their text box is not left empty return true
	for(var i=0; i<elements.length; i++){
		if($(elements[i]).attr('checked')&& $.trim($(textboxes[i]).val())!=""){
			return true;
		}
	}
	//if code doesn't execute the if content then it give alert; return false
	alert("Palun m2rgi 6ige vastus");
	return false;
}
$(function(){
	$('#answer-template .answer-template').hide();
	$('#type_id_' + current_type_id).show();
	$('#type_id').bind('click change focus', function(event){
		if($(this).val() != current_type_id){
			$('#answer-template .answer-template').hide();
			current_type_id = $(this).val();
			$('#type_id_' + current_type_id).show();
		}
	});
	//make variable of the element type_id option
	var list = $('#type_id option');

	//Loop through the list and check if $(list[i]) value is equal to current_type_id
	// if true, then set  $(list[i]) element attribute selected value selected
	for(var i=0; i<list.length; i++){
		if($(list[i]).val() == current_type_id){
			$(list[i]).attr('selected', 'selected');
		}
	}

	// set focus on the first input element in the code
	$('textarea:first').focus();
});
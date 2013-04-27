//võtab id tests_index_view.php'st.
function remove_test_ajax(id) {
	//saadab serverile pärinug ilma sisuta
	$.post(BASE_URL + "tests/remove/" + id)

		// .done saab vajaliku info .post'ilt ja salvestab data'sse
		.done(function (data) {
			if (data == 'OK') {
				$('table#tests-table>tbody>tr#test' + id).remove();
				alert("Test kustutatud")

			}
			else{
				alert("Viga\n\nServer vastas: '" + data + "'.\n\nKontakteeru arendajaga.");
			}
		});
}

$(document).ready(function(){
//when html element with id add_test clicked
	$('#add_test').click(function(){
		//saves the first #add_test element of #confirmOverlay
		var elem = $(this).closest('#confirmOverlay');

//popup  menu
		$.confirm({
			'title'		: 'Confirmation',
			'message'	: 'Alusta uue testi loomist<br />Lisa Nimi',
			//buttons, salvesta returns POST entered
			'buttons'	: {
				'Salvesta'	: {
					'class'	: 'blue',
					'action':function add(){
						return $.ajax({
							type:'POST',
							name:'test_name',
							dataType:'json',
							url:BASE_URL + 'tests/add',
							async:false
						})
							.done(function(msg){}).responseText;
					}
				},
				'Loobu': {
					'class':'gray',
					'action': function (){}
		// hides the window
				}
			}
		});

	});

});

(function($){

	$.confirm = function(params){

		if($('#confirmOverlay').length){
			// A confirm is already shown on the page:
			return false;
		}

		var buttonHTML = '';
		$.each(params.buttons,function(name,obj){

			// Generating the markup for the buttons:

			buttonHTML += '<a href="#" class="button '+obj['class']+'">'+name+'<span></span></a>';
// MA EI TEE JU MITTEMIDAGI SIIN??
			if(!obj.action){
				obj.action = function(){};
			}
		});
	//save a string out of array with html elements
		var markup = [
			'<div id="confirmOverlay">',
			'<div id="confirmBox">',
			'<h1>',params.title,'</h1>',
			'<p>',params.message,'</p>',
			'<input name="test_name" type="text">',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div></div>'
		].join('');
	//alert(markup.text('input').val());
		//hide my elements and append to html body, fade in
		$(markup).hide().appendTo('body').fadeIn();
//buttons=+ i ?????
		var buttons = $('#confirmBox .button'),
			i = 0;

		$.each(params.buttons,function(name,obj)
		{
			buttons.eq(i++).click(function()
			{
				// Calling the action attribute when a
				// click occurs, and hiding the confirm.

				obj.action();
				$.confirm.hide();
				return false;
			});
		});
	};

//function that hides and removes the div
	$.confirm.hide = function (){
		$('#confirmOverlay').fadeOut(function(){
			$(this).remove();
		});
	};

})(jQuery);
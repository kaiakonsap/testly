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

	$('#add_test').click(function(){
		var elem = $(this).closest('#confirmOverlay');

		$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'You are about to delete this item. <br />It cannot be restored at a later time! Continue?',
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
		// Nothing to do in this case. You can as well omit the action property.
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

			if(!obj.action){
				obj.action = function(){};
			}
		});

		var markup = [
			'<div id="confirmOverlay">',
			'<div id="confirmBox">',
			'<h1>',params.title,'</h1>',
			'<input name="test_name" type="text">',
			'<p>',params.message,'</p>',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div></div>'
		].join('');

		$(markup).hide().appendTo('body').fadeIn();

		var buttons = $('#confirmBox .button'),
			i = 0;

		$.each(params.buttons,function(name,obj){
			buttons.eq(i++).click(function(){

				// Calling the action attribute when a
				// click occurs, and hiding the confirm.

				obj.action();
				$.confirm.hide();
				return false;
			});
		});
	};


	$.confirm.hide = function (){
		$('#confirmOverlay').fadeOut(function(){
			$(this).remove();
		});
	};

})(jQuery);
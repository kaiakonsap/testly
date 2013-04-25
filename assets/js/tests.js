//removes my tests, takes id from the tests_index_view.php
function remove_test_ajax(id) {
	//sends a request without content to the server(that initializes remove function)
	$.post(BASE_URL + "tests/remove/" + id)

		//.done receives info required by .post and saves it into 'data'
		.done(function (data) {
			if (data == 'OK') {
				$('table#tests-table>tbody>tr#test' + id).remove();
				alert("Test kustutatud")
			}
			else {
				alert("Viga\n\nserver vastas:'" + data + "'.\n\nkontakteeru arendajaga");
			}

		}
	);

}

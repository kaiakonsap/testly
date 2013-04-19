function remove_test_ajax(id) {
	$.post(BASE_URL + "tests/remove/" + id)
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

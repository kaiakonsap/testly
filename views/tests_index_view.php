<p><a class="btn btn-large btn-primary" href="<?BASE_URL?>tests/add">Lisa uus test </a>
</p>
<table id="tests-table" class="table table-bordered table striped">
	<thead>
	<th>Testi nimi</th>
	<th>Koostaja</th>
	<th>Aeg</th>
	<th>Tegevused</th>
	</thead>
	<tbody>
	<? if (! empty($tests)):foreach ($tests as $test): ?>
		<tr id="test<?= $test['test_id'] ?>">
			<td><?= $test['name'] ?></td>
			<td><?= $test['username'] ?></td>
			<td><?= substr($test['date'], 0, 10) ?></td>
			<td>
				<a href="<?=BASE_URL?>tests/edit/<?=$test['test_id']?>">
				<i class="icon-pencil"></i>
				</a>

				<!--if users status is not empty and is set to be teacher, then show me delete button and ask for delete
				function-->
				<?if (!empty($status)&&$status=='teacher'):?>
				<!--if clicked then ask to confirm delete,if confirmed -start remove_test_ajax()
				 if not confirmed, return false, if you fail, return false-->
				<a href="#" onclick="if(!confirm('Oled kindel?') )return false;
					remove_test_ajax(<?= $test['test_id'] ?>);return false">
					<i class="icon-trash"></i>Kustuta</a><?endif?>

			</td>

		</tr>
	<? endforeach;endif ?>
	</tbody>

</table>
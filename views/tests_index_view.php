<p> <a class="btn btn-large btn-primary" href="https://www.google.ee">Lis uus test </a>
</p>
<table id="tests-table" class="table table-bordered table striped">
	<thead>
	<th>Testi nimi</th>
	<th>Koostaja</th>
	<th>Aeg</th>
	<th>Tegevused</th>
	</thead>
	<tbody>
	<?if (!empty($tests)):foreach($tests as $test):?>
<tr id="test"><?=$test['test_id']?>>
	<td><?=$test['name']?></td>
	<td><?=$test['username']?></td>
	<td><?=$test['date']?></td>
	<td><?="vasta"?> <i class="icon-pencil"></i> </td>
</tr>
	<?endforeach;endif?>
	</tbody>

</table>
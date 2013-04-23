<!-- gives the forms so that user can add  test info-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
<!-- makes my tabs look like tabs in javascript -->
<script>
	$(function () {
		$("#tabs").tabs();
	});
</script>

<!-- huge tabs div and tab headlines -->
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Üldine</a></li>
		<li><a href="#tabs-2">Mitteyld dolor</a></li>
		<li><a href="#tabs-3">Kolmas</a></li>
	</ul>

	<!-- tab 1 that has form to fill in the general info -->
	<div id="tabs-1">
		<form method="post">
			<label>Küsimuse nimi</label>
			<input type="text" name="name" value="<?= $test['name'] ?>">
			<label>Sissejuhatus</label>
			<textarea name="introduction"><?= $test['introduction'] ?></textarea>
			<label>Kokkuvõte</label>
			<textarea name="conclusion"><?= $test['conclusion'] ?></textarea>
			<label>Passcode</label>
			<input type="text" name="passcode" value="<?= $test['passcode'] ?>">
		</form>
	</div>

	<!-- tab to fill in the question and the type of answer expected and the right one -->
	<div id="tabs-2">
		<label>Küsimus</label>
		<textarea name="question_text"><?=$question['question_text'] ? $question['question_text'] : '' ?></textarea>
		<label>Tüüp</label>
		<select name="type_id" id="type_id">
			<option value="1">Õige/vale</option>
			<option value="2" selected="selected">Mitu õiget</option>
			<option value="3">Mitu valikut</option>
			<option value="4">Täida tühikud</option>
		</select>
		<div id="answer-template">
			<div id="type_id_1" class="answer-template">
				<label>Sisesta kaks vastust ja märgi ära õige vastus</label>
				<input type="radio" name="tf.correct" value="0" checked="checked">
				<textarea name="answer.0">True</textarea>
				<input type="radio" name="tf.correct" value="1">
				<textarea name="answer.1">False</textarea>
			</div>
			<div id="type_id_2" class="answer-template">
				<label>Sisesta vastuse variandid ja märgi ära, milline variant on õige</label>

				<!--  multiple-choice-options version-->
				<div id="multiple-choice-options">
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="0" checked="checked">
						<textarea name="mc.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="1">
						<textarea name="mc.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="2">
						<textarea name="mc.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="radio" name="mc.correct" value="3">
						<textarea name="mc.answer.3"></textarea>
					</div>
				</div>
				<!-- add or delete a choice cluster -->
				<a href="#" onclick="return addMultipleChoice()">Add</a>/<a href="#" onclick="return removeMultipleChoice()
				">remove</a>vastusevariant
			</div>

			<div id="type_id_3" class="answer-template">
				<label>Sisesta vastuse variandid ja märgi ära, millised variandid on õiged</label>

				<!--  multiple-response-answer-option version-->
				<div id="multiple-response-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.0"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.1"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.2"></textarea>
					</div>
					<div class="answer-option">
						<input type="checkbox" name="mr.correct" value="1">
						<textarea name="mr.answer.3"></textarea>
					</div>
				</div>
				<a href="#" onclick="return addMultipleResponse()">Add</a>/<a href="#" onclick="return removeMultipleResponse()
				">remove</a>vastusevariant
			</div>
			<div id="type_id_4" class="answer-template">
				<label>Sisesta võimalikud vastuse variandid(Üks vastus ühte kasti)</label>
				<!--  fill-in-the-blank-answer-option version-->
				<div id="fill-in-the-blank-answer-option">
					<div class="answer-option">
						<input type="checkbox" name="fitb.correct" checked="checked" disabled="true">
						<textarea name="fitb.answer.0"></textarea>
					</div>
				</div>
				<a href="#" onclick="return_addMultipleChoice()">Add</a>/<a href="#" onclick="return_removeMultipleChoice()
				">remove</a><p> vastusevariant</p>
			</div>
		</div>
	</div>
	<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi
			neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora
			torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque.
			Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a,
			lacus.</p>

		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi.
			Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel
			pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed
			nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean
			vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero
			vitae lectus hendrerit hendrerit.</p>
	</div>
</div>

<!-- gives the forms so that user can add  test info-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>
<!-- makes my tabs look like tabs in javascript -->
<script>
	$(function () {
		$("#tabs").tabs();
	});
</script>
<div style="clear: both; margin: 15px 0">
	<a class="btn btn-large btn-inverse" href="<?=BASE_URL?>tests">Loobu</a>
	<button class="btn btn-large btn-primary" type="button" onclick="submit1()">Salvesta</button>
</div>
<!-- huge tabs div and tab headlines -->
<div id="tabs" style="opacity: 0.8">
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
			<textarea name="introduction"><??></textarea>
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
				<!-- add or delete a choice cluster -->
				<a href="#" onclick="return addMultipleChoice()">Add</a>/<a href="#" onclick="return removeMultipleChoice()
				">remove</a> vastusevariant
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

			</div>

			<div id="type_id_3" class="answer-template">
				<label>Sisesta vastuse variandid ja märgi ära, millised variandid on õiged</label>
				<!-- add or delete a choice cluster -->
				<a href="#" onclick="return addMultipleResponse()">Add</a>/<a href="#" onclick="return removeMultipleResponse()
				">remove</a> vastusevariant
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

			</div>
		</div>
	</div>

</div>

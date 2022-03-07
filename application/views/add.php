<div class="alert alert-primary">
	Agregar una pregunta.
</div>
<form action="" action="<?php echo site_url('quiz/add') ?>">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label for="question_id">Número de Pregunta</label>
			<input type="number" min="1" class="form-control" id="question" name="question_id" value="">
		</div>

		<div class="form-group col-md-8">
			<label for="question">Pregunta</label>
			<input type="text"  class="form-control" id="question" name="question_text" value="">
		</div>

		<div class="form-group col-md-6">
			<label for="choice1">Alternativa 1</label>
			<input type="text"  class="form-control" id="choice1" name="choices[]" value="">
		</div>


		<div class="form-group col-md-6">
			<label for="choice2">Alternativa 2</label>
			<input type="text"  class="form-control" id="choice2" name="choices[]" value="">
		</div>


		<div class="form-group col-md-6">
			<label for="choice3">Alternativa 3</label>
			<input type="text"  class="form-control" id="choice3" name="choices[]" value="">
		</div>


		<div class="form-group col-md-6">
			<label for="choice4">Alternativa 4</label>
			<input type="text"  class="form-control" id="choice4" name="choices[]" value="">
		</div>

		<div class="form-group col-md-6">
			<label for="choice5">Alternativa 5</label>
			<input type="text"  class="form-control" id="choice5" name="choices[]" value="">
		</div>

		<div class="form-group col-md-6">
			<label for="is_correct">Número de respuesta correcta</label>
			<input type="number" min="1"  class="form-control" id="is_correct" name="is_correct" value="">
		</div>

		<button type="submit" class="btn btn-primary"> Agregar Pregunta</button>



	</div>
</form>
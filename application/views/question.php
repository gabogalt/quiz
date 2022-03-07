<div class="alert alert-dark">
  Pregunta <?php echo $question->questions_id ;?> de <?php echo $count_question ;?>
</div>
<p class="font-weight-bolder">
  <?php echo $question->questions_text; ?>
</p>

<form method="post" action="<?php echo site_url('quiz/process'); ?>">
  
      <?php foreach ($choices as $key => $choice): ?>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="choice_text" id="<?php echo $choice->id; ?>"  value="<?php echo $choice->id; ?>">
          <label class="form-check-label" for="<?php $choice->id; ?>">
           <?php echo $choice->choice_text;  ?>

          </label>
        </div>

        <input type="hidden" name="question_id" value="<?php echo $question->questions_id ?>"> 
        
      <?php endforeach ?>


      
     
      
  <input type="submit" value="Enviar" class="btn btn-primary mt-3">
</form>
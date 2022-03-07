<h2>Muy bien, terminaste!</h2>
<p> Felicitaciones ! has completado el examen</p>
<p><?php echo $this->session->userdata('score') ?></p>
<a href="<?php echo site_url('quiz/question/1');?>" class="btn btn-outline-primary"> Empezar de nuevo</a>
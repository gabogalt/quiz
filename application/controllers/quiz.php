<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('quizModel');
	}

	public function index()
	{
		$data['count_question'] = $this->quizModel->get_count_question();
		$data['subview'] = 'index';
		$this->load->view('quiz-layout', $data);
	}

	public function question($question_id)
	{	
		$data['question'] = $this->quizModel->get_question($question_id);
		$data['count_question'] = $this->quizModel->get_count_question();
		$data['choices'] = $this->quizModel->get_choice($question_id);
		$data['subview'] = 'question';
		$this->load->view('quiz-layout', $data);
	}

	public function process(){
		if (!$this->session->userdata('score')) {
			
			$this->session->userdata('score', 0);
		}

		$question_id = $this->input->post('question_id');
		$selected_choice = $this->input->post('choice_text');
		$next_question = $question_id+1;

		$row = $this->quizModel->get_correct_chioce($question_id);
		$correct_choice = $row->id;

		if ($selected_choice == $correct_choice) {
			$this->session->score++;
		}

		$total = $this->quizModel->get_count_question();

		if ($question_id == $total) {
			redirect('quiz/end');
		}else{
			redirect('quiz/question/'.$next_question);
		}
	}
	

	public function end()
	{
		$this->session->sess_destroy();
		$data['subview'] = 'end';
		$this->load->view('quiz-layout', $data);
	}

	public function add()
	{
		$rules = $this->quizModel->rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			# code...
			$question_data = $this->quizModel->array_from_post(['questions_id', 'questions_text']);
			print_r($question_data);
			if ($this->quizModel->save_question($question_data)) {
				# code...
				foreach ($this->input->post('choices') as $key => $value){
					# code...
					if ($this->input->post('is_correct') == $key+1) {
						# code...
						$is_correct = 1;
					}else{
						$is_correct = 0;
					}

					$choices_data = ['questions_id' => $this->input->post('questions_id'), 'is_correct' => $is_correct, 'choice_text' => $value];
					if ($this->quizModel->save_choice($choices_data)) {
						# code...
						continue;
					}

					$this->session->flashdata('msg', 'Pregunta guardada correctamente');
					redirect('quiz/add','refresh');

				}
			}
		}
		$data['count_question'] = $this->quizModel->get_count_question();
		$data['subview'] = 'add';
		$this->load->view('quiz-layout', $data);
	}

}

/* End of file quiz.php */
/* Location: ./application/controllers/quiz.php */
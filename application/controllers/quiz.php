<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
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
		$data['subview'] = 'add';
		$this->load->view('quiz-layout', $data);
	}

}

/* End of file quiz.php */
/* Location: ./application/controllers/quiz.php */
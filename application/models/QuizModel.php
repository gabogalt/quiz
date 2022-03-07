<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {

	public $rules = array(
		'questions_id' => array(
			'field'=> 'questions_id',
			'label' => 'Número',
			'rules' => 'trim|required'
		),
		'question_text' => array(
			'field' => 'questions_text',
			'label' => 'Pregunta',
			'rules' => 'trim|required'
		),
		'choices' => array(
			'field' => 'choices[]',
			'label' => 'Alternativa',
			'rules' => 'trim|required'
		),
		'is_correct' => array(
			'field' => 'is_correct',
			'label' => 'Respuesta',
			'rules' => 'trim|required'
		)
	);

	public function get_count_question (){
		return $this->db->count_all('questions');
	}

	public function get_question ($questions_id){
		 $this->db->where('questions_id', $questions_id);
		 return $this->db->get('questions')->row();
	}

	public function get_choice ($questions_id){
		
			$this->db->where('questions_id', $questions_id);
		 return $this->db->get('choices')->result();
	}

	public function get_correct_chioce ($questions_id){

		$this->db->where(['questions_id' => $questions_id, 'is_correct'=>1]);
		return $this->db->get('choices')->row();
	}

	public function save_question($data){
		$result = $this->db->insert('questions', $data);
		return $result ? TRUE : FALSE;

	}

	public function save_choice($data){
		$result = $this->db->insert('choices', $data);
		return $result ? TRUE : FALSE;
		
	}

	public function array_from_post($fields){
		$data = [];
		
		foreach ($fields as $key => $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}


}

/* End of file quizModel.php */
/* Location: ./application/models/quizModel.php */
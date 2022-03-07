<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {

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



}

/* End of file quizModel.php */
/* Location: ./application/models/quizModel.php */
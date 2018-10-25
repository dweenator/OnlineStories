<?php
defined('BASEPATH') or exit('No direct script access allowed');

class review_model extends CI_Model{
	
	public function check_author_review($user_id, $author_id){
	$this->db->select('author_review_id');
	$this->db->from('author_review');
	$this->db->where('user_id', $user_id);
	$this->db->where('author_id', $author_id);
	$query = $this->db->get();
	return $query->num_rows();	
	}
	
	public function check_biased_review($user_id, $story_id){
		
	$this->db->select('*');
	$this->db->from('story');
	$this->db->where('story_id', $story_id);
	$this->db->where('user_id', $user_id);
	$query = $this->db->get();

		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function story_review_exists($user_id, $story_id){
	$this->db->select('story_review_id');
	$this->db->from('story_review');
	$this->db->where('user_id', $user_id);
	$this->db->where('story_id', $story_id);
	$query = $this->db->get();
		if($query->num_rows() > 0){
			return TRUE;
		}else{ 
			return FALSE;
		}
	}
	
	public function check_chapter_review($user_id, $chapter_id){
	$this->db->select('chapter_review_id');
	$this->db->from('chapter_review');
	$this->db->where('user_id', $user_id);
	$this->db->where('chapter_id', $chapter_id);
	$query = $this->db->get();
	return $query->num_rows();		
	}
	
	public function insert_author_review($data){
	return $this->db->insert('author_review', $data);
	}
	
	public function insert_story_review($data){
	return $this->db->insert('story_review', $data);
	}
	
	public function insert_chapter_review($data){
	return $this->db->insert('chapter_review', $data);
	}
	
	









}
?>
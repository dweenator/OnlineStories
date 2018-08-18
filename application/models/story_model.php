<?php
class story_model extends CI_Model {
	
	public function story_exist($story_id){
	$this->db->select();
	$this->db->from('published_story');
	$this->db->where('story_id', $story_id);
	$count = $this->db->count_all_results();
	if($count === 1){
		return TRUE;
	}else{
		return FALSE;
	}
	}
	
	public function get_genre(){
	$this->db->select('genre_id,genre_name');
	$query = $this->db->get('genre')->result();
	foreach($query as $row){
	$data[$row->genre_id] = $row->genre_name;}
	return $data;
	}
	
	public function get_tags(){
	$this->db->select('tag_id,tag_name');
	$query = $this->db->get('tags')->result();
	foreach($query as $row){
	$data[$row->tag_id] = $row->tag_name;}
	return $data;
	}
	
	public function get_content_warning(){
	$this->db->select('content_warning_id,content_warning_name');
	$query = $this->db->get('content_Warning')->result();
	foreach($query as $row){
	$data[$row->content_warning_id] = $row->content_warning_name;}
	return $data;
	}
	
	
	public function get_published_ids($user_id){
	$data = array();
	$this->db->select('story_id');
	$query = $this->db->get_where('published_story', array('user_id' => $user_id))->result();
	$counter = 0;
	foreach($query as $row){
		$data[$counter] = $row->story_id;
		$counter++;
	}
	return $data;
	}
	
	public function get_bookmarked_ids($user_id){
	$data = array();
	$this->db->select('story_id');
	$this->db->from('bookmark');
	$this->db->where('user_id', $user_id);
	$query = $this->db->get()->result_array();
	
	}
	
	public function check_bookmark($story_id, $user_id){
	$this->db->where('story_id', $story_id);
	$this->db->where('user_id', $user_id);
	$this->db->from('bookmark');
		if($this->db->count_all_results() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_stories($ids){
		if(count($ids) > 0 )
		{
			foreach($ids as $id)
			{
				$this->db->select('story_id, story_title');
				$this->db->from('story');
				$this->db->where('story_id', $id);
				$query = $this->db->get();
				foreach($query->result() as $row)
				{
				$data[$row->story_id]['image'] = null;
				$data[$row->story_id]['story_title'] = $row->story_title;
				}
			}
		return $data;
		}
		else{ 
		return NULL; 
		}
	}
	
	public function get_chapters($story_id){
	$data = array();
	$this->db->select('chapter_id,chapter_number,chapter_title');
	$this->db->from('chapters');
	$this->db->where('story_id', $story_id);
	$query = $this->db->get();
	if($query->num_rows() > 0){
		foreach($query->result() as $row){
			$data[$row->chapter_id]['number'] = $row->chapter_number;
			$data[$row->chapter_id]['title'] = $row->chapter_title;
		}
	}
	return $data;
	}
	
	public function get_chapter_content($chapter_id){
	$data = array();
	$this->db->select('story_id,chapter_id,chapter_number,chapter_title, chapter_content');
	$this->db->from('chapters');
	$this->db->where('chapter_id', $chapter_id);
	$query = $this->db->get();
	if($query->num_rows() > 0){
		foreach($query->result() as $row){
			$data['story_id'] = $row->story_id;
			$data['chapter_id'] = $row->chapter_id;
			$data['chapter_number'] = $row->chapter_number;
			$data['chapter_title'] = $row->chapter_title;
			$data['chapter_content'] = $row->chapter_content;
		}
	}
	return $data;
	}
	
	public function get_previous_chapter_id($story_id,$number){
	$data = array();
	if($story_id != NULL AND $number > 1){
		$prev = $number - 1; 
	}else{ 
		$prev = $number; 
	}
	$this->db->select('chapter_id');
	$this->db->from('chapters');
	$this->db->where('story_id', $story_id);
	$this->db->where('chapter_number', $prev);
	$query = $this->db->get();
	if($query->num_rows() > 0){
		foreach($query->result() as $row){
			$data['chapter_id'] = $row->chapter_id;
		}
	}
	return $data;
	}
	
	public function get_next_chapter_id($story_id,$number){
	$data = array();
	if($story_id != NULL AND $number > 1){
		$next = $number + 1; 
	}else{ 
		$next = $number; 
	}
	$this->db->select('chapter_id');
	$this->db->from('chapters');
	$this->db->where('story_id', $story_id);
	$this->db->where('chapter_number', $next);
	$query = $this->db->get();
	if($query->num_rows() > 0){
		foreach($query->result() as $row){
			$data['chapter_id'] = $row->chapter_id;
		}
	}
	return $data;		
	}
	
	



	
	
	

	
	


	
	
	




}
?>
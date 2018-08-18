<?php
defined('BASEPATH') or exit('No direct script access allowed');

class publish_model extends CI_Model{
	
	public function image_type($type){
	$this->db->select('type_id');
	$query = $this->db->get_where('image_type', array('name' => $type))->result();
	foreach($query as $row){
		return $row->type_id;}
	}
	
	public function insert_story_image($data){
	$query = $this->db->insert('profile_image', $data);
	if($query){ return $this->db->insert_id(); }
	}
	
	public function new_story($data){
	$query = $this->db->insert('story', $data);
	if($query){ return $this->db->insert_id(); }
	}
	
	public function insert_publish_story($data){
	return $this->db->insert('published_story', $data);
	}
	
	public function insert_genre($story_id, $genre){
	$error_counter = 0;
	foreach($genre as $genre){
	$data['story_id'] = $story_id;
	$data['genre_id'] = $genre;
	if(!$this->db->insert('story_genre', $data)){ 
		$error_counter++; }
	}
	if($error_counter == 0){ return TRUE; }else{ return FALSE; }
	}
	
	public function insert_tags($story_id, $tags){
	$error_counter = 0;
	foreach($tags as $tag){
	$data['story_id'] = $story_id;
	$data['tag_id'] = $tag;
	if(!$this->db->insert('story_tag', $data)){
		$error_counter++; }
	}
	if($error_counter == 0){ return TRUE; }else{ return FALSE; }
	}
	
	public function insert_content_warning($story_id, $content_warning){
	$error_counter = 0;
	foreach($content_warning as $warning){
	$data['story_id'] = $story_id;
	$data['content_warning_id'] = $warning;
	if(!$this->db->insert('story_content_warning', $data)){
		$error_counter++; }
	}
	if($error_counter == 0){ return TRUE; }else{ return FALSE; }
	}
	
	public function get_chapter_num($story_id){
	$this->db->select('chapter_number');
	$this->db->from('chapters');
	$this->db->where('story_id', $story_id);
	$this->db->order_by('chapter_number', 'DESC');
	$query = $this->db->get();
	if($query->num_rows() > 0){
		foreach($query->result() as $row){
		return $row->chapter_number;}
	}else{
		return 1;}
	}
	
	public function insert_chapter($data){echo 'aw';
	return $this->db->insert('chapters', $data);
	}
	





}
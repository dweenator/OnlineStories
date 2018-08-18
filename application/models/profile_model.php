<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile_model extends CI_Model{

	public function story_profile($story_id){	
	$this->db->select('story.story_id,display_name,story_title,synopsis,date_added');
	$this->db->from('published_story');
	$this->db->join('story', 'story.story_id = published_story.story_id');
	$this->db->join('user_profile', 'user_profile.user_id = published_story.user_id');
	$this->db->where('published_story.story_id',$story_id);
	$query = $this->db->get()->result();
	$data = array();
	
	foreach($query as $row){
	$data['id'] = $row->story_id;
	$data['title'] = $row->story_title;
	$data['synopsis'] = $row->synopsis;
	$data['published'] = $row->date_added;
	$data['author'] = $row->display_name;
	
		$this->db->select('story.image_id, file_path');
		$this->db->from('story');
		$this->db->join('profile_image', 'profile_image.image_id = story.image_id');
		$this->db->where('story_id', $story_id);
		$query = $this->db->get()->result();
		
		foreach($query as $row){
		$data['image'] = $row->file_path;
		}
		
		$this->db->select('story_genre.genre_id,genre_name');
		$this->db->from('story_genre');
		$this->db->join('genre', 'genre.genre_id = story_genre.genre_id');
		$this->db->where('story_id', $story_id);
		$query = $this->db->get()->result();
		
		foreach($query as $row){
		$data['genre'][$row->genre_id] = $row->genre_name;}
		
		$this->db->select('story_tag.tag_id,tag_name');
		$this->db->from('story_tag');
		$this->db->join('tags', 'tags.tag_id = story_tag.tag_id');
		$this->db->where('story_id', $story_id);
		$query = $this->db->get()->result();
		
		foreach($query as $row){
		$data['tags'][$row->tag_id] = $row->tag_name;}
		
		$this->db->select('tag_id,tag_name');
		$this->db->from('tags');
		$query = $this->db->get()->result();
		
		foreach($query  as $row){
		$data['new_tags'][$row->tag_id] = $row->tag_name;}
		
		foreach($data['new_tags'] as $id=>$tag){
			foreach($data['tags'] as $id1=>$tag1){
				if($id == $id1){
				unset($data['new_tags'][$id]);}
			}
		}

		$this->db->select('story_content_warning.content_warning_id,content_warning_name');
		$this->db->from('story_content_warning');
		$this->db->join('content_warning', 'content_warning.content_warning_id = story_content_warning.content_warning_id');
		$this->db->where('story_id', $story_id);
		$query = $this->db->get()->result();
		
		foreach($query as $row){
		$data['content_warning'][$row->content_warning_id] = $row->content_warning_name;}
		
		$this->db->select('chapter_id,chapter_number,chapter_title');
		$this->db->from('chapters');
		$this->db->where('story_id', $story_id);
		$query = $this->db->get()->result();
		
		foreach($query as $row){
		$data['chapters'][$row->chapter_id]['number'] = $row->chapter_number;
		$data['chapters'][$row->chapter_id]['title'] = $row->chapter_title;}
	}
	return $data;
	}
	
	public function story_profile_reviews($story_id){
	
	
	}
	
	public function user_profile($user_id){
		
		
	}
	
	











}
?>
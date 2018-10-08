<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_story_model extends CI_Model{

	public function get_story($story_id){
	$this->db->select('story.story_id,story_title,synopsis,display_name');
	$this->db->from('story');
	$this->db->join('user_profile', 'user_profile.user_id = story.user_id');
	$this->db->where('story.story_id', $story_id);
	$story = $this->db->get()->result();
	foreach($story as $row){
		$data['story_id'] = $row->story_id;
		$data['image'] = NULL;
		$data['title'] = $row->story_title;
		$data['synopsis'] = $row->synopsis;
		$data['author'] = $row->display_name;
	
		$this->db->select('genre_name');
		$this->db->from('genre');
		$all_genre = $this->db->get()->result();
		$counter = 0;
		foreach($all_genre as $row){
			$data['genre'][$counter]['genre_name'] = $row->genre_name;
			$data['genre'][$counter]['is_checked'] = FALSE;
			$counter++;
		}
	
		$this->db->select('genre_name');
		$this->db->from('story_genre');
		$this->db->join('genre', 'genre.genre_id = story_genre.genre_id');
		$this->db->where('story_genre.story_id', $story_id);
		$genre = $this->db->get()->result();
		foreach($genre as $row){
			foreach($data['genre'] as $id=>$val){
				if($val['genre_name'] == $row->genre_name){
					$data['genre'][$id]['is_checked'] = TRUE;
				}
			}
		}
		
		$this->db->select('tag_name');
		$this->db->from('tags');
		$all_tags = $this->db->get()->result();
		$counter = 0;
		foreach($all_tags as $row){
			$data['tags'][$counter]['tag_name'] = $row->tag_name;
			$data['tags'][$counter]['is_checked'] = FALSE;
			$counter++;
		}
		
		$this->db->select('tag_name');
		$this->db->from('story_tag');
		$this->db->join('tags', 'tags.tag_id = story_tag.tag_id');
		$this->db->where('story_tag.story_id', $story_id);
		$tags = $this->db->get()->result();
		foreach($tags as $row){
			foreach($data['tags'] as $id=>$val){
				if($val['tag_name'] == $row->tag_name){
					$data['tags'][$id]['is_checked'] = TRUE;
				}
			}
		}
		
		$this->db->select('content_warning_name');
		$this->db->from('content_warning');
		$all_content_warning = $this->db->get()->result();
		$counter = 0;
		foreach($all_content_warning as $row){
			$data['content_warning'][$counter]['content_warning_name'] = $row->content_warning_name;
			$data['content_warning'][$counter]['is_checked'] = FALSE;
			$counter++;
		}
		
		$this->db->select('content_warning_name');
		$this->db->from('story_content_warning');
		$this->db->join('content_warning', 'content_warning.content_warning_id = story_content_warning.content_warning_id');
		$this->db->where('story_content_warning.story_id', $story_id);
		$content_warning = $this->db->get()->result();
		foreach($content_warning as $row){
			foreach($data['content_warning'] as $id=>$val){
				if($val['content_warning_name'] == $row->content_warning_name){
					$data['content_warning'][$id]['is_checked'] = TRUE;
				}
			}
		} 
	}
	return $data;
	}
	
	public function get_chapters($story_id){
	$this->db->select('story.story_id,chapter_id,story_title,chapter_number,chapter_title,chapters.date_added');
	$this->db->from('chapters');
	$this->db->join('story', 'story.story_id = chapters.story_id');
	$this->db->where('chapters.story_id', $story_id);
	$chapters = $this->db->get()->result();
	foreach($chapters as $row){
		$data['chapters'][$row->chapter_id]['chapter_number'] = $row->chapter_number;
		$data['chapters'][$row->chapter_id]['chapter_title'] = $row->chapter_title;
		$data['chapters'][$row->chapter_id]['date_added'] = $row->date_added;

	$data['story_id'] = $row->story_id;
	$data['title'] = $row->story_title;
	}
	return $data;
	}











}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller{
	
	private $username = NULL;
	private $user_id = NULL;
	
	public function __construct(){
	parent::__construct();
    
		$this->username = $this->session->userdata('username');
		$this->user_id = $this->account_model->get_userid($this->username);
		$this->upload_path = 'http://localhost/onlinestories/assets/uploaded_images/';
	}
	
	public function view_story_publish(){
	$data['genre'] = $this->story_model->get_genre();
	$data['tags'] = $this->story_model->get_tags();
	$data['content_warning'] = $this->story_model->get_content_warning();
	$data['title'] = 'New Story';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/story_publish');
	$this->load->view('template/footer');
	}
	
	public function publish_story(){
	$this->form_validation->set_rules('story-title', 'Story Title', 'required',
	array('required' => 'Story title is required'));
	$this->form_validation->set_rules('synopsis', 'Synopsis', 'required',
	array('required' => 'Synopsis is required'));
	$this->form_validation->set_rules('genre[]', 'Genre', 'required[genre[]]',
	array('required' => 'Select atleast one genre'));
	$this->form_validation->set_rules('tags[]', 'Tags', 'required[tags[]]',
	array('required' => 'Select atleast one tag'));
	$this->form_validation->set_rules('content-warning[]', 'Content Warning', 'required',
	array('required' => 'Select atleast one content warning'));
	$this->form_validation->set_rules('chapter-title', 'Chapter Title', 'required',
	array('required' => 'Chapter title required'));
	$this->form_validation->set_rules('chapter-content', 'Chapter Content', 'required',
	array('required' => 'Chapter content required'));
	
	if($this->form_validation->run() == FALSE){
	$form_error['story_title'] = form_error('story-title');
	$form_error['synopsis'] = form_error('synopsis');
	$form_error['genre'] = form_error('genre[]');
	$form_error['tags'] = form_error('tags[]'); 
	$form_error['content_warning'] = form_error('content-warning[]');
	$form_error['chapter_title'] = form_error('chapter-title');
	$form_error['chapter_content'] = form_error('chapter-content');
	$this->session->set_flashdata('form_error', $form_error);
	redirect('main/view_story_publish');
	}else{
	$image_id = NULL;
		if($this->upload->do_upload('cover')){
		$image_name = $this->upload->data('file_name');
	
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'C:\wamp64\www\OnlineStories/assets/uploaded_images/'.$image_name;
		$config['create_thumb'] = FALSE;
		$config['new_image'] = $this->input->post('title').'_story_image.jpeg';
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;
	
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	
			if($this->image_lib->resize()){
			$image['type_id'] = $this->publish_model->image_type('story');
			$image['file_name'] = $config['new_image'];
			$image['file_path'] = $this->upload_path.$config['new_image'];
			$image_id = $this->publish_model->insert_story_image($image);
			}		
		}
		
	$story['image_id'] = $image_id;
	$story['story_title'] = $this->input->post('story-title');
	$story['synopsis'] = $this->input->post('synopsis');
	
	$new_story = $this->publish_model->new_story($story);
	
		if($new_story > 0){
		$publish['story_id'] = $new_story;
		$publish['user_id'] = $this->user_id;
		$publish['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());
		$published = $this->publish_model->insert_publish_story($publish);
		
		$genre = $this->input->post('genre');
		$tags = $this->input->post('tags');
		$content_warning = $this->input->post('content-warning');
		
			if(!$this->publish_model->insert_genre($new_story,$genre)){
			
			}
			if(!$this->publish_model->insert_tags($new_story,$tags)){
				
			}
			if(!$this->publish_model->insert_content_warning($new_story,$content_warning)){
				
			}
		$chapter_number = $this->publish_model->get_chapter_num($new_story);
		
		$chapter['story_id'] = $new_story;
		$chapter['chapter_number'] = $chapter_number;
		$chapter['chapter_title'] = $this->input->post('chapter-title');
		$chapter['chapter_content'] = $this->input->post('chapter-content');
		$chapter['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());
		$result = $this->publish_model->insert_chapter($chapter);
		if($result){
		$this->session->set_flashdata('success', 'Story published');
		redirect('pages/storyprofile/'.$new_story);}else{
		$this->session->set_flashdata('error', 'Error adding chapter');
		redirect('pages/storyprofile/'.$new_story);}
		}
	}
	}
	
	public function story_review(){
	$story_id = $this->uri->segment(3);
	$this->form_validation->set_rules('hidden-rating', 'Rating', 'callback_rating_required');
	$this->form_validation->set_rules('review-content', 'Summary', 'required');
	
	
		if($this->form_validation->run() == FALSE AND $user_id == NULL){
		$this->session->set_flashdata('message', 'Rating/Summary required');
		redirect('pages/storyprofile/'.$story_id, 'refresh');
		}else{
		$check = $this->review_model->check_story_review($this->user_id,$story_id);
			if($check == 0){	
			$insert['user_id'] = $this->user_id;
			$insert['story_id'] = $story_id;
			$insert['rating'] = $this->input->post('hidden-rating');
			$insert['content'] = $this->input->post('review-content');
			$insert['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());
			$insert = $this->review_model->insert_story_review($insert);
				if($insert){
					redirect('pages/storyprofile/'.$story_id, 'refresh');
				}
			}
		}	
	}
	
	public function author_review(){
		
	}
	
	public function chapter_review(){
		
	}
	
	
	
	
	
	
	
	
	
	
	
	//form validation callback functions
	public function rating_required(){
	if($this->input->post('hidden-rating') > 0 ){
		return TRUE;
	}else{
		return FALSE;}
	}
	
	public function array_required($array){
	if(count($array) > 0){ return TRUE; }else{ return FALSE; }	
	}

	
	
	
	
	
}

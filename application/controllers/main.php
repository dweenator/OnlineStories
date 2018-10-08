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
	

	
	public function story_review(){
	$story_id = $this->uri->segment(3);
	$this->form_validation->set_rules('hidden-rating', 'Rating', 'callback_rating_required');
	$this->form_validation->set_rules('review-content', 'Summary', 'required');
	
	
		if($this->form_validation->run() == FALSE OR $this->user_id == NULL){
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

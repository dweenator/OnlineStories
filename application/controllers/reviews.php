<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reviews extends CI_Controller{
	
	private $username = NULL;
	private $user_id = NULL;
	
	public function __construct(){
	parent::__construct();
    
		$this->username = $this->session->userdata('username');
		$this->user_id = $this->account_model->get_userid($this->username);
		$this->upload_path = 'http://localhost/onlinestories/assets/uploaded_images/';
    }
    
	
	public function story_review(){
	$story_id = $this->uri->segment(3);
		
		if($this->review_model->check_biased_review($this->user_id,$story_id) == TRUE){
			redirect('pages/storyprofile/'.$story_id, 'refresh');
		}else{
		$this->form_validation->set_rules('hidden-rating', 'Rating', 'callback_rating_required');
		$this->form_validation->set_rules('review-content', 'Summary', 'required');
	
			if($this->form_validation->run() == FALSE OR $this->user_id == NULL){
			$this->session->set_flashdata('message', 'Rating/Summary required');
			redirect('pages/storyprofile/'.$story_id, 'refresh');
			}else{
			$check = $this->review_model->story_review_exists($this->user_id,$story_id);
				
				if($check == TRUE){
				redirect('pages/storyprofile/'.$story_id, 'refresh');
				}elseif($check == FALSE){	
				$insert['user_id'] = $this->user_id;
				$insert['story_id'] = $story_id;
				$insert['rating'] = $this->input->post('hidden-rating');
				$insert['content'] = $this->input->post('review-content');
				$insert['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());
				$insert = $this->review_model->insert_story_review($insert);
					if($insert == TRUE){
						redirect('pages/storyprofile/'.$story_id, 'refresh');
					}
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
	
	
	
}

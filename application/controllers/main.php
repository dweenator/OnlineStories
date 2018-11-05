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

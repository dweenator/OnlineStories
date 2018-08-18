<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pages extends CI_Controller {


	public function home(){
	
	$num_rows = $this->pagination_model->count_rows('story',NULL);
	$config['base_url'] = base_url().'pages/home/';
	$config['total_rows'] = $num_rows;
	$config['per_page'] = 6;
	$config['num_links'] = $num_rows;

	$offset = $this->uri->segment(3);
	$data['stories'] = $this->pagination_model->get_all_rows('story');
		
	$data['title'] = 'Homepage';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/home');
	$this->load->view('template/footer');	
	}
	
	public function story_not_found(){
	$data['title'] = 'Not Found';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/page_not_found');
	$this->load->view('template/footer');
	}
	
	public function login(){
	$data['title'] = 'Login';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/login');
	$this->load->view('template/footer');
	}
	
	public function register(){
	$data['title'] = 'Register';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/registration');
	$this->load->view('template/footer');
	}
	
	public function storyprofile(){
	$story_id = $this->uri->segment(3);
	$story_exists = $this->story_model->story_exist($story_id);
		if($story_exists){
		$data['story'] = $this->profile_model->story_profile($story_id);
		$data['reviews'] = $this->profile_model->story_profile_reviews($story_id);
		$data['chapters'] = $this->story_model->get_chapters($story_id);
		$data['title'] = $data['story']['title'];
	
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar');
		$this->load->view('pages/storyprofile');
		$this->load->view('template/footer');
		}else{
		redirect('pages/story_not_found','refresh');
		}
	}
	
	public function chapter(){
	$chapter_id = $this->uri->segment(3);
	
	$data['chapter']['current'] = $this->story_model->get_chapter_content($chapter_id);
	$number = $data['chapter']['current']['chapter_number'];
	$story_id = $data['chapter']['current']['story_id'];
	$data['story_id'] = $story_id;
	$data['chapter']['previous'] = $this->story_model->get_previous_chapter_id($story_id,$number);
	$data['chapter']['next'] = $this->story_model->get_next_chapter_id($story_id,$number);
	
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/chapter');
	$this->load->view('template/footer');
	}
	

	
	
	
	
	
}




?>
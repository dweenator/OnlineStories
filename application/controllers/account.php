<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {
	
	public function register(){
	$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[20]');
	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
	$this->form_validation->set_rules('gender', 'Gender', 'trim|required|in_list[Male,Female,Other]');
	$this->form_validation->set_rules('birthdate', 'Birthdate', 'trim|required|callback_valid_date',
	array('valid_date' => 'Invalid Date of birth'));
	
	if($this->form_validation->run() == FALSE){
	$form_error = array('username' => form_error('username'),
			'password' => form_error('password'),
			'confirm_password' => form_error('confirm_password'),
			'gender' => form_error('gender'),
			'birthdate' => form_error('birthdate'));
	$this->session->set_flashdata('error', $form_error);
	redirect('pages/register');
	}else{ 
	$data = array('username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'),PASSWORD_BCRYPT),
				'gender' => $this->input->post('gender'),
				'birthdate' => $this->input->post('birthdate'),
				'date_created' => mdate('%Y-%m-%d',time()),
				'last_login' => mdate('%Y-%m-%d',time()));
	if($this->account_model->create_account($data)){
	$this->session->set_flashdata('message','Registration Successful');
	redirect('pages/login');
	}else{
	$this->session->set_flashdata('message','Registration Failed');
	redirect('pages/register');}}
	}
	
	//form_validation callback
	public function valid_date($birthdate){
	$temp = explode('-',$birthdate);
	$year = $temp[0];
	$month = $temp[1];
	$day = $temp[2];
	if(checkdate($month,$day,$year)){return TRUE;}else{return FALSE;}
	}
	
	
	
	public function login(){
	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	
	if($this->form_validation->run() == FALSE){
	$form_error = array('username' => form_error('username'),
					'password' => form_error('password'));
	$this->session->set_flashdata('error',$form_error);
	redirect('pages/login');
	}else{
	$data = array('username' => $this->input->post('username'),
			'password' => $this->input->post('password'));
	$result = $this->account_model->login_account($data);
	if($result   ){
	$new_session = array('username' => $result,
						'is_logged_in' => TRUE);	
	$this->session->set_userdata($new_session);
	redirect('pages/home');
	}else{
	$message = $this->session->set_flashdata('message', 'Incorrect Username/Password');
	redirect('pages/login');
	}}
	}
	
	public function logout(){
		$logout = array('username','is_logged_in');
		$this->session->unset_userdata($logout);
		$this->session->sess_destroy();
		redirect('pages/home','refresh');
	}
	
	public function userprofile(){
	$username = $this->session->userdata('username');
	$data = array('user_id' => $this->account_model->get_userid($username),
				'join_date' => $this->account_model->get_datecreated($username),
				'last_login' => $this->account_model->get_lastlogin($username));
	$data['profile'] = $this->account_model->get_userprofile($data['user_id']);
	if($data['profile']['birthdate'] != null){
	$birth = date_create($data['profile']['birthdate']);
	$now = date_create(mdate('%Y-%m-%d',time()));
	$interval = date_diff($birth,$now);
	$data['profile']['age'] = $interval->format('%y');}
	
	
	$data['title'] = 'Profile';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/userprofile_index',$data);
	$this->load->view('template/footer');
	}
	
	public function userprofile_published_stories(){
	$username = $this->session->userdata('username');
	$data['profile']['display_name'] = $username;
	$user_id = $this->account_model->get_userid($username);
	$published_ids = $this->story_model->get_published_ids($user_id);
	
		if(count($published_ids) > 0)
		{
		$where = array('user_id' => $user_id);
		$num_rows = $this->pagination_model->count_rows('published_story', $where);
	
		$data['stories'] = $this->story_model->get_stories($published_ids);
		}
	
	$data['title'] = 'Published Stories';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/userprofile_publishedstories');
	$this->load->view('template/footer');
	}
	
	public function userprofile_bookmarked_stories(){
	$username = $this->session->userdata('username');
	$data['profile']['display_name'] = $username;
	$user_id = $this->account_model->get_userid($username);
	$bookmarked_ids = $this->story_model->get_bookmarked_ids($user_id);
	if(!empty($bookmarked_ids)){
	$data['bookmarked_stories'] = $this->story_model->get_story_details($bookmarked_ids);}	
	
	$data['title'] = 'Bookmarked Stories';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/userprofile_bookmarkedstories',$data);
	$this->load->view('template/footer');
	}
	
	

	
	
	
	
	
}




?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profile_user extends CI_Controller{

    public function profile(){
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

    public function published_stories(){
        $username = $this->session->userdata('username');
        $data['profile']['display_name'] = $username;
        $user_id = $this->account_model->get_userid($username);
        $story_ids = $this->story_model->get_story_ids($user_id);
        
            if(count($story_ids) > 0)
            {
            $where = array('user_id' => $user_id);
            $num_rows = $this->pagination_model->count_rows('story', $where);
        
            $data['stories'] = $this->story_model->get_stories($story_ids);
            }
        
        $data['title'] = 'Published Stories';
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar');
        $this->load->view('pages/userprofile_publishedstories');
        $this->load->view('template/footer');
    }

    public function bookmarked_stories(){
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account_model extends CI_Model {
	
	public function create_account($data){
	$user_insert = array('username' => $data['username'],
						'password' => $data['password'],
						'date_created' => $data['date_created'],
						'last_login' => $data['last_login']);
	$result = $this->db->insert('users',$user_insert);
	if($result){
	$profile_insert = array('user_id' => $this->db->insert_id(),
							'display_name' => $data['username'],
							'birthdate' => $data['birthdate'],
							'gender' => $data['gender']);
	return $this->db->insert('user_profile',$profile_insert);
	}else{ return FALSE; }
	}
	
	public function login_account($data){
	$query = $this->db->get_where('users', array('username' => $data['username']))->result();
	if($query){
	foreach($query as $row){
	if(password_verify($data['password'], $row->password)){
	$update_login['last_login'] = mdate('%Y-%m-%d-%h-%i-%s',time());
	$this->db->where('user_id',$row->user_id);
	$this->db->update('users',$update_login);
	return $row->username;}else{ return FALSE;}}
	}else{ return FALSE; }
	}
	
	public function get_userid($username){
	$this->db->select('user_id');
	$query = $this->db->get_where('users',array('username' => $username))->result();
	foreach($query as $row){
	return $row->user_id;}
	}
	
	public function get_datecreated($username){
	$this->db->select('date_created');
	$query = $this->db->get_where('users',array('username' => $username))->result();
	foreach($query as $row){
	return $row->date_created;}
	}
	
	public function get_lastlogin($username){
	$this->db->select('last_login');
	$query = $this->db->get_where('users',array('username' => $username))->result();
	foreach($query as $row){
	return $row->last_login;}
	}
	
	public function get_userprofile($userid){
	$this->db->select('display_name,birthdate,gender');
	$query = $this->db->get_where('user_profile', array('user_id' => $userid))->result();
	$profile = array();
	foreach($query as $row){
	$profile['display_name'] = $row->display_name;
	$profile['birthdate'] = $row->birthdate;
	$profile['gender'] = $row->gender;
	return $profile;}
	}
	

	

	

	

}
?>
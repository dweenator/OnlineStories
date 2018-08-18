<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pagination_model extends CI_Model{

	public function count_rows($table_name,$where){
	$this->db->select();
	$this->db->from($table_name);
	if(count($where) > 0){
	foreach($where as $col=>$val){
	$this->db->where($col,$val);}}
	$total = $this->db->count_all_results();
	return $total;	
	}

	
	public function get_all_rows($table_name){
	$query = $this->db->get($table_name);
	if($query->num_rows() > 0){
	foreach($query->result() as $row){
	$data[$row->story_id]['title'] = $row->story_title;}
	return $data;}else{ return NULL; }
	}
	
	public function my_stories($user_id){
	
	}
	
	public function my_bookmark($user_id){
		
	}











}
?>
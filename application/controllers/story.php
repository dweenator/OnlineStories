<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class story extends CI_Controller {	

	private $username = NULL;
	private $user_id = NULL;
	
	public function __construct(){
	parent::__construct();
    
		$this->username = $this->session->userdata('username');
		$this->user_id = $this->account_model->get_userid($this->username);
		$this->upload_path = 'http://localhost/onlinestories/assets/uploaded_images/';
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
	
	if($this->form_validation->run() == FALSE)
	{
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
		if($this->upload->do_upload('cover'))
		{
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
	$story['user_id'] = $this->user_id;
	$story['story_title'] = $this->input->post('story-title');
	$story['synopsis'] = $this->input->post('synopsis');
	$story['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());

	$new_story = $this->publish_model->new_story($story);
	
		if($new_story > 0){
			/** 
		$new_chapter['story_id'] = $new_story;
		$chapter['chapter_number'] = $chapter_number;
		$new_chapter['chapter_title'] = $this->input->post('chapter-title');
		$new_chapter['chapter_content'] = $this->input->post('chapter-content');
		$new_chapter['date_added'] = mdate('%Y-%m-%d %h:%i:%s', time());
		$new_chapter_id = $this->publish_model->new_chapter($new_chapter);	
		*/

		$genre = $this->input->post('genre');
		$tags = $this->input->post('tags');
		$content_warning = $this->input->post('content-warning');
		
			if(!$this->publish_model->insert_genre($new_story,$genre)){
			
			}
			if(!$this->publish_model->insert_tags($new_story,$tags)){
				
			}
			if(!$this->publish_model->insert_content_warning($new_story,$content_warning)){
				
			}
		
		$chapter_number = $this->story_model->get_chapter_num($new_story);
		
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

	public function published(){
	if(!$this->upload->do_upload('cover'))
	{
		$error['cover'] = $this->upload->display_errors();
	}
	
	$image_name = $this->upload->data('file_name');
	$config['image_library'] = 'gd2';
	$config['source_image'] = 'C:\wamp64\www\OnlineStories/assets/uploaded_images/'.$image_name;
	$config['create_thumb'] = TRUE;
	$config['maintain_ratio'] = TRUE;
	$config['width'] = 200;
	$config['height'] = 200;
	$this->image_lib->initialize($config);
	$this->image_lib->resize();
	
	$story = array('author' => $this->session->userdata('username'),
	'title' => $this->input->post('title'),
	'synopsis' => $this->input->post('synopsis'),
	'date_added' => mdate('%Y-%m-%d %H-%i-%s',time()) );
	
	$new_storyid = $this->story_model->new_story($story);
	
	if($new_storyid != NULL){
	$image['story_id'] = $new_storyid;
	$image['original'] = $image_name;
	$image['thumbnail'] = $this->upload->data('raw_name').'_thumb';
	
	$insert_image = $this->story_model->new_story_cover($image);
	
	$genre = $this->input->post('genre');
	for($temp=0;$temp<count($genre);$temp++)
	{
		$genres[$temp] = array('story_id' => $new_storyid,
					'genre_name' => $genre[$temp]);
	}
	
	$insert_genre = $this->story_model->new_story_genre($genres);
	
	$tag = $this->input->post('tags');
	for($temp=0;$temp<count($tag);$temp++)
	{
		$tags[$temp] = array('story_id' => $new_storyid,
					'tag_name' => $tag[$temp]);
	}
	
	$insert_tags = $this->story_model->new_story_tags($tags);
	
	$content_warning = $this->input->post('content_warning');
	for($temp=0;$temp<count($content_warning);$temp++)
	{
		$content_warnings[$temp] = array('story_id' => $new_storyid,
				'content_warning_name' => $content_warning[$temp]);
	}
	
	$insert_content_warning = $this->story_model->new_story_content_warning($content_warnings);
	
	$chapter = array('story_id' => $new_storyid,
	'chapter_number' => 1, 'chapter_title' => $this->input->post('chapter_title'),
	'chapter_content' => $this->input->post('chapter_content'),
	'chapter_number' => 1, 'date_added' => mdate('%Y-%m-%d %h-%i-%s',time()));	
	
	$add_chapter = $this->story_model->add_chapter($chapter);
	
	if(!$insert_genre || !$insert_tags || !$insert_content_warning || !$add_chapter){
	$data['error'] = array('genre_error' => $insert_genre, 'tags_error' => $insert_tags,
				'content_warning_error' => $insert_content_warning,
				'chapter_error' => $add_chapter);
	$this->session->set_flashdata($data['error']);
	redirect('account/userprofile_published_stories');}else{ redirect('account/userprofile_published_stories'); }}
	}
	
	public function read(){
	$story_id = $this->uri->segment(3);
	$username = $this->session->userdata('username');
	$user_id = $this->account_model->get_userid($username);
	
	}
	

	public function bookmark(){
	$story_id = $this->uri->segment(3);
	$user = $this->session->userdata('username');
	$user_id = $this->account_model->get_userid($user);
	$check_bookmark = $this->story_model->check_bookmark($story_id,$user_id);
	if($check_bookmark){
	$remove_bookmark = $this->story_model->unbookmark($story_id,$user_id);
	redirect('pages/storyprofile/'.$story_id);
	}else{
	$bookmarked = $this->story_model->bookmarked($story_id,$user_id);
	if($bookmarked != NULL){
	$type = 'bookmark';
	$date_added = mdate('%Y-%m-%d %h:%i:%s',time());
	$notified = $this->story_model->insert_notification($story_id,$user_id,$type,$bookmarked,$date_added);
	redirect('pages/storyprofile/'.$story_id);
	}
	else{ $message = 'Cannot Bookmark, please try again later'; 
	$this->session->set_flashdata($message);
	redirect('pages/storyprofile/'.$story_id);}}
	}
		
	public function submit_review(){
	$data['story_id'] = $this->uri->segment(3);
	$data['user_id'] = $this->account_model->get_userid($this->session->userdata('username'));
	$data['rating'] = $this->input->post('hidden-rating');
	$data['summary'] = $this->input->post('review-content');
	$data['date_added'] = mdate('%Y-%m-%d %H-%i-%s', time());
	$result = $this->story_model->insert_review($data);
	if($result == TRUE){
	redirect('pages/storyprofile/'.$data['story_id']);
	}else{
	$this->session->flash_data('review_message','Cannot submit review, try again later');
	redirect('pages/storyprofile/'.$data['story_id']);}
	}
	
	public function like(){
	$story_id = $this->uri->segment(3);
	$data['review_id'] = $this->uri->segment(4);
	$data['liker_id'] = $this->account_model->get_userid($this->session->userdata('username'));
	$result = $this->story_model->review_like($data);

	if($result){	
	$this->story_model->add_like($data['review_id']);
	redirect('pages/storyprofile/'.$story_id);	
	}else{
	$this->story_model->minus_like($data['review_id']);
	redirect('pages/storyprofile/'.$story_id);}
	}
	
	public function suggest_tags(){
	$story_id = $this->uri->segment(3);
	$this->form_validation->set_rules('suggest_tag', 'Suggested Tag', 'required');
		if($this->form_validation->run() == FALSE)
		{
		redirect('pages/storyprofile/'.$story_id);
		}
		else
		{
		$suggested_tag = $this->input->post('suggest_tag');
		$suggested_tag_id = $this->story_model->tag_id($suggested_tag);
		$user_id = $this->account_model->get_userid($this->session->userdata('username'));
		$result = $this->story_model->suggest_tag($story_id,$user_id,$suggested_tag_id);
			if($result)
			{
			redirect('pages/storyprofile/'.$story_id);
			}
			else
			{
			redirect('pages/storyprofile/'.$story_id);	
			} 
		}
	}
	
	public function last_read(){
	$story_id = $this->uri->segment(3);
	$user_id = $this->account_model->get_userid($this->session->userdata('username'));
	$data['chapter'] = $this->story_model->last_read_chapter($story_id,$user_id);
	$data['story_id'] = $story_id;
	$data['title'] = $data['chapter']['current']['story_title'];
	
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/chapter');
	$this->load->view('template/footer');
	}
	
	public function story_dashboard(){
	$story_id = $this->uri->segment(3);
	$data['story'] = $this->dashboard_story_model->get_story($story_id);
	if(!empty($data['story'])){
		if($data['story']['image'] == null){
		$data['story']['cover_image'] = 'http://placehold.it/200x200';}else{
		$data['story']['cover_image'] = 'http://localhost/OnlineStories/assets/uploaded_images/'.$data['story']['image'];}
	//$data['total_rating'] = $this->story_model->total_rating($story_id);
	//$data['average_rating'] = $this->story_model->average_rating($story_id);
	//$data['bookmarks'] = $this->story_model->bookmarks($story_id);
	//$data['pending_tags'] = $this->story_model->pending_tags($story_id);
	//$data['notifications'] = $this->story_model->get_notifications($story_id);
	$data['title'] = '';
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/story_dashboard');
	$this->load->view('template/footer'); }
	}
	
	public function dashboard_story_edit(){
	$story_id = $this->uri->segment(3);
	
	$data['story'] = $this->story_model->get_story($story_id);
	$data['title'] = $data['story']['title'];
	
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/dashboard_story_edit');
	$this->load->view('template/footer');
	}
	
	public function dashboard_story_chapters(){
	$story_id = $this->uri->segment(3);
	
	$data['story'] = $this->story_model->get_chapters($story_id);
	$data['title'] = $data['story']['title'];
	
	$this->load->view('template/header',$data);
	$this->load->view('template/navbar');
	$this->load->view('pages/dashboard_story_chapters');
	$this->load->view('template/footer');
	}
	
	public function accept_pending_tag(){
	$story_id = $this->uri->segment(3);
	$tag_id = $this->uri->segment(4);
	$insert = $this->story_model->insert_pending_tag($story_id,$tag_id);
	if($insert){
		$delete = $this->story_model->delete_pending_tag($story_id,$tag_id); 
		redirect('story/story_dashboard/'.$story_id); } else{ 
		$this->session->set_flashdata('error', 'Could not accept pending tag');
		redirect('story/story_dashboard/'.$story_id); }
	}
	
	public function decline_pending_tag(){
	$story_id = $this->uri->segment(3);
	$tag_id = $this->uri->segment(4);
	$delete = $this->story_model->delete_pending_tag($story_id,$tag_id);
	if($delete){
	redirect('story/story_dashboard/'.$story_id);
	}else{ 
	$this->session->set_flashdata('error', 'Could not decline pending tag');
	redirect('story/story_dashboard/'.$story_id); }
	}
	

	
	
	
	

	
	
	
	
	
	
	
	
}
?>
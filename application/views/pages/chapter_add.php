<body>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">
    </div>
    <div class="col-sm-10 text-left"> 
	<table class="table">
	<tbody>
	<form method="post" action="<?php echo base_url(); ?>story/add_chapter">
	<tr>
	<div class="form-group">
		<td><label for="story_id">New Chapter</label></td>
		<td><input class="form-control sr-only" id="story_id" name="story_id" value="<?php echo $story_id?>"></input></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="chapter_title">Chapter Title</label></td>
		<td><input class="form-control" id="chapter_title" name="chapter_title" type="text"></input>
		<?php echo form_error('chapter_title'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="chapter_content">Chapter Content</label></td>
		<td><textarea class="form-control" id="chapter_content" name="chapter_content"></textarea>
		<?php echo form_error('chapter_content'); ?></td>
	</div>	
	</tr>
	<tr>
	<td><button class="btn btn-success" type="submit">Submit</button>
		<button class="btn btn-danger" type="reset">Cancel</button></td>
	</tr>
	</form>
	</tbody>
	</table>
    </div>
    <div class="col-sm-1 sidenav">
    </div>
  </div>
</div>

</body>

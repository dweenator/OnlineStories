
<?php $error = $this->session->flashdata('form_error'); ?>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-lg-1 sidenav">
    </div>
    <div class="col-lg-10 text-left"> 
	<table class="table">
	<tbody>
	<form method="post" action="<?php echo base_url(); ?>story/publish_story" enctype="multipart/form-data">
	<tr>
	<div class="form-group">
		<td><label for="cover">Cover</label></td>
		<td><input type="file" id="cover" name="cover"></td>
	</div>
	</tr>
	<tr>
	<div class="form-group has-error">
		<td><label for="story-title">Title</label></td>
		<td><input class="form-control" id="story-title" name="story-title" type="text"></input>
		<?php echo $error['story_title']; ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="synopsis">Synopsis</label></td>
		<td><textarea class="form-control" id="synopsis" name="synopsis"></textarea>
		<?php echo $error['synopsis']; ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="genre">Genre</label></td>
		<td>
		<?php foreach($genre as $id=>$genre){ ?>
		<div class="col-lg-2">
		<input type="checkbox" name="genre[]" value="<?php echo $id; ?>">
		<?php echo $genre; ?>
		</input>
		</div>
		<?php } ?>
		<div class="col-lg-12">
		<?php echo $error['genre']; ?>
		</div>
		</td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="tag">Tags</label></td>
		<td>
		<?php foreach($tags as $id=>$tag){ ?>
		<div class="col-lg-2">
		<input type="checkbox" name="tags[]" value="<?php echo $id; ?>">
		<?php echo $tag; ?>
		</input>
		</div>
		<?php } ?>
		<div class="col-lg-12">
		<?php echo $error['tags']; ?>
		</div>
		</td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="content-warning">Content Warning</label></td>
		<td>
		<?php foreach($content_warning as $id=>$content_warning){ ?>
		<div class="col-lg-2">
		<input type="checkbox" name="content-warning[]" value="<?php echo $id; ?>">
		<?php echo $content_warning; ?>
		</input>
		</div>
		<?php } ?>
		<div class="col-lg-12">
		<?php echo $error['content_warning']; ?>
		</div>
		</td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="chapter-title">Chapter Title</label></td>
		<td><input class="form-control" id="chapter-title" name="chapter-title" type="text"></input>
	<?php echo $error['chapter_title']; ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="chapter-content">Chapter Content</label></td>
		<td><textarea class="form-control" id="chapter-content" name="chapter-content"></textarea>
	<?php echo $error['chapter_content']; ?></td>
	</div>
	</tr>
	<tr>
	<td>
	<div>
	<button class="btn btn-danger" type="reset">Cancel</button>
	</div>
	</td>
	<td>
	<div align="right">
	<button class="btn btn-success" type="submit">Submit</button>
	</div>
	</td>
	</tr>
	</tbody>
	</table>
	</form>
    </div>
    <div class="col-sm-1 sidenav">
    </div>
  </div>
</div>

<script>
tinymce.init({ 

selector:'textarea' 

});
</script>




</body>

<style>
.card a{
	color:black;
	text-decoration:none;
	font-weight:bold;
}
.card .glyphicon{
	font-size:30px;
}

#dashboard-navigation{
	margin:20px;
	margin-bottom:30px;
}
#dashboard-overview{
	margin:20px;
}
#dashboard-overview .glyphicon{
	font-size:50px;
	width:50px;
}
</style>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-lg-1 sidenav">
    </div>
    <div class="col-lg-10"> 
	<div class="row" id="dashboard-navigation">
	<div class="col-lg-3">
	<div class="card">
	<span class="glyphicon glyphicon-dashboard"></span>
	<div class="card-body">
	<h5 class="card-title"><a href="<?=base_url().'story/story_dashboard/'.$story['story_id']?>">Dashboard</a></h5>
	</div>
	</div>
	</div>
	<div class="col-lg-3">
	<div class="card">
	<span class="glyphicon glyphicon-edit"></span>
	<div class="card-body">
	<h5 class="card-title"><a href="<?=base_url().'story/dashboard_story_edit/'.$story['story_id']?>">Edit</a></h5>
	</div>
	</div>
	</div>
	<div class="col-lg-3">
	<div class="card">
	<span class="glyphicon glyphicon-book"></span>
	<div class="card-body">
	<h5 class="card-title"><a href="<?=base_url().'story/dashboard_story_chapters/'.$story['story_id']?>">Chapters</a></h5>
	</div>
	</div>
	</div>
	<div class="col-lg-3">
	<div class="card">
	<span class="glyphicon glyphicon-pencil"></span>
	<div class="card-body">
	<h5 class="card-title"><a href="">Reviews</a></h5>
	</div>
	</div>
	</div>
	</div>
	
	<div class="row">
	<table class="table">
	<tbody>
	<form method="post" action="<?php echo base_url(); ?>story/published" enctype="multipart/form-data">
	<tr>
	<div class="form-group">
		<td><label for="cover">Cover</label></td>
		<td><input type="file" id="cover" name="cover"></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="title">Title</label></td>
		<td><input class="form-control" id="title" name="title" type="text" value="<?=$story['title'] ?>"></input>
		<?=form_error('title'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="synopsis">Synopsis</label></td>
		<td><textarea class="form-control" id="synopsis" name="synopsis" value="<?=$story['synopsis']?>"></textarea>
		<?=form_error('synopsis'); ?></td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="genre">Genre</label></td>
		<td>
		<?php foreach($story['genre'] as $val){ ?>
		<div class="col-lg-2">
		<input type="checkbox" <?php if($val['is_checked']){ echo 'checked'; }?> name="genre[]" value="<?=$val['genre_name']?>">
		<?=$val['genre_name']?>
		</input>
		</div>
		<?php } ?>
		</td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="tag">Tags</label></td>
		<td>
		<?php foreach($story['tags'] as $val){ ?>
		<div class="col-lg-2">
		<input type="checkbox" <?php if($val['is_checked']){ echo 'checked'; }?> name="tags[]" value="<?=$val['tag_name']?>">
		<?=$val['tag_name']?>
		</input>
		</div>
		<?php }?>
		</td>
	</div>
	</tr>
	<tr>
	<div class="form-group">
		<td><label for="content_warning">Content Warning</label></td>
		<td>
		<?php foreach($story['content_warning'] as $val){ ?>
		<div class="col-lg-2">
		<input type="checkbox" <?php if($val['is_checked']){ echo 'checked'; } ?> name="content_warning[]" value="<?=$val['content_warning_name']?>">
		<?=$val['content_warning_name']?>
		</input>
		</div>
		<?php } ?>
		</td>
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
	
	</div>
    <div class="col-lg-1 sidenav">
    </div>
  </div>
</div>

<script>
tinymce.init({ 

selector:'textarea' 

});
</script>




</body>

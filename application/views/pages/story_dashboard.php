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
#dashboard-story-details h2{
	text-align:left;
}

.total-rating{
	font-size:14px;
	font-weight:bold;
}
.average-rating{
	font-size:30px;
}
.bookmark{
	font-size:30px;
}
.panel-body a{
	margin:5px;
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
	
	<div class="row" id="dashboard-overview">
	<div class="col-lg-4">
	<div class="card">
	<h4 class="card-title">Total Rating</h4>
	<div class="card-body">
	<span class="col-lg-4 glyphicon glyphicon-user"></span>
	<small class="col-lg-8 total-rating">
	<?=$total_rating?> user(s) rated this
	</small>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="card">
	<h4 class="card-title">Average Rating</h4>
	<div class="card-body">
	<span class="col-lg-4 glyphicon glyphicon-star"></span>
	<small class="col-lg-8 average-rating">
	<?=round($average_rating, 2)?>
	</small>
	</div>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="card">
	<h4 class="card-title">Bookmarks</h4>
	<div class="card-body">
	<span class="col-lg-4 glyphicon glyphicon-user"></span>
	<small class="col-lg-8 bookmark">
	<?=$bookmarks?>
	</small>
	</div>
	</div>
	</div>
	</div>	
	
	<div class="row" id="dashboard-story-details">
	<div class="col-lg-12">
	<div class="panel">
	<h2 class="panel-heading"><?=$story['title']?></h2>
	<hr>
	<div class="panel-body">
	<img class="col-lg-4" src="<?=$story['cover_image']?>">
	<p class="col-lg-8"><?=$story['synopsis']?></p>
	</div>
	</div>
	</div>
	</div>
	
	<div class="row" id="dashboard-story-assoc">
	<div class="col-lg-12">
	<div class="col-lg-6 panel">
	<h4 class="panel-heading">Genre</h4>
	<div class="panel-body">
	<?php foreach($story['genre'] as $val){ ?>
	<a href="#" class="btn btn-<?php if($val['is_checked']){echo 'info'; }else{ echo 'default';}?>"><?=$val['genre_name']?></a>
	<?php } ?>
	</div>
	</div>
	<div class="col-lg-6 panel">
	<h4 class="panel-heading">Tags</h4>
	<div class="panel-body">
	<?php foreach($story['tags'] as $val){ ?>
	<a href="#" class="btn btn-<?php if($val['is_checked']){ echo 'info';}else{echo 'default';}?>"><?=$val['tag_name']?></a>
	<?php } ?>
	</div>
	</div>
	</div>
	</div>

	<div class="row" id="dashboard-pending-tags">
	<div class="col-lg-12 panel">
	<h4 class="panel-heading">Pending Tags</h4>
	<div class="panel-body">
	<table class="table" id="pending-tags">
	<thead>
	<tr>
	<td>Tag name</td>
	<td>Total suggestions</td>
	<td>Action</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach($pending_tags as $tag_id=>$val){ ?>
	<tr>
	<td><?=$val['tag_name']?></td>
	<td><?=$val['total']?></td>
	<td><a href="<?=base_url().'story/accept_pending_tag/'.$val['story_id'].'/'.$tag_id?>" class="btn btn-success">Accept</a>
	<a href="<?=base_url().'story/decline_pending_tag/'.$val['story_id'].'/'.$tag_id?>" class="btn btn-danger">Decline</a></td>
	</tr>
	<?php } ?>
	</tbody>
	<table>
	</div>
	</div>
	</div>
	
	<div class="row" id="notification">
	<div class="col-lg-12">
	<div class="panel">
	<span class="panel-heading glyphicon glyphicon-bell">
	Notifications</span>
	<div class="panel-body">
	
	
	
	</div>
	</div>
	</div>
	</div>
	
    </div>
    <div class="col-lg-1 sidenav">
    </div>
  </div>
</div>

</body>
<script>
$(document).ready(function() {
    $('#pending-tags').DataTable( {
    } );
} );
</script>

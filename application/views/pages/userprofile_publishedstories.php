<style>
#story-card{
	padding-top:10px;
	margin-bottom:10px;
}
</style>
<div class="container-fluid">    
  <div class="row content">
    <div class="col-lg-1 col-md-1 sidenav">
    </div>
    <div class="col-lg-10 col-md-10"> 
	<div class="col-lg-2 col-md-2">
	<div class="row">
	<div class="col-lg-12 col-md-12" align="center">
	<img class="img-circle" src="http://placehold.it/100x100" style="padding-top:10px;">
	<h3><?php echo $profile['display_name'];?></h3>
	</div>
	</div>
	<div class="row">
	<div class="navbar-default" role="navigation">
		<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
		<li><a href="<?=base_url();?>profile_user/profile/">Profile</a></li>
		<li><a href="<?=base_url();?>profile_user/published_stories/">Published</a></li>
		<li><a href="<?=base_url();?>profile_user/bookmarked_stories/">Bookmarked</a></li>
		</ul>
		</div>
	</div>
	</div>
	</div>
	<div class="col-lg-10">
	<div class="col-lg-4">
	<div class="card">
	<img class="card-img-top" src="http://placehold.it/200x200" style="padding-top:10px;">
	<div class="card-body">
    <h4 class="card-title"></h4>
    <a href="<?=base_url().'main/view_story_publish'?>" class="btn btn-default">New Story</a>
	</div>
	</div>	
	</div>
	<?php if(isset($stories)){ ?>
	<?php foreach($stories as $id=>$stories){ ?>
	<div class="col-lg-4" id="story-card">
	<div class="card">
	<img class="card-img-top" src="<?php echo $stories['image']; ?>">
	<div class="card-body">
    <h4 class="card-title">
	<a href="<?php echo base_url().'pages/storyprofile/'.$id; ?>"><?php echo $stories['story_title']; ?></a></h4>
    <div class="dropdown show">
	<a class="btn btn-default dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
	</a>
	<ul class="dropdown-menu">
    <li><a class="dropdown-item" href="<?=base_url().'story/story_dashboard/'.$id?>">Dashboard</a></li>
    <li><a class="dropdown-item" href="#">Add Chapter</a></li>
    <li><a class="dropdown-item" href="#">Delete</a></li>
	</ul>
	</div>
	</div>
	</div>	
	</div>
	<?php } }?>
	</div>
	</div>
    </div>
	<div class="col-lg-1 col-md-1 sidenav">
    </div>
  </div>
</div>

</body>

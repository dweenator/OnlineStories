
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-1 sidenav">
    </div>
    <div class="col-lg-10"> 

	<div id="story-pagination">
	<?php
	if(isset($stories)){
	foreach($stories as $id=>$val){ ?>
	<div class="col-lg-4" id="story-card">
	<div class="card">
	<img class="card-img-top" src="http://placehold.it/300x300">
	<div class="card-body">
    <h4 class="card-title">
	<a href="<?=base_url().'pages/storyprofile/'.$id?>"><?=$val['title']?></a></h4>
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
	<?php } } ?>
	
	
	<?php echo $this->pagination->create_links(); ?>  
    </div>
	</div>
	

    <div class="col-sm-1 sidenav">
    </div>
  </div>
</div>

</body>

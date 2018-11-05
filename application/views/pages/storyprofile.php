<style>
#author{
	font-size: 25px;
	color: #A9A9A9;
	text-decoration: none;
}
#story-details{
	padding-top:10px;
	text-align:left;
}
#story-details a{
	margin-top:10px;
	margin-bottom:10px;
	margin-right:5px;
}

#read{
	width:125px;
	margin-top:10px;
	margin-bottom:10px;
	margin-left:0px;
	margin-right:15px;
}
#bookmark{
	width:125px;
	margin-top:10px;
	margin-bottom:10px;
	margin-left:15px;
	margin-right:0px;
}
#about{
	text-align:left;
}
#chapters{
	text-align:left;
}
#chapters strong{
	font-size:15px;
	margin-right:10px;
}
#chapters a{
	color:gray;
}
#ToC-notice{
	text-align:left;
	margin-top:15px;
	margin-bottom:5px;
	margin-left:15px;
	margin-right:0px;
}
#review{
	margin-top:15px;
	margin-bottom:25px;
	margin-left:0px;
	margin-right:0px;
}
#review-status{
	margin-top:10px;
	margin-bottom:15px;
}
#review-status h4{
	display:inline-block;
}
#chapter{
	text-align:left;
}
#chapter a, label{
	display:inline-block;
	font-size:15px;
	font-weight:bold;
	text-decoration:none;
	color:gray;
}
#cover-image{
	height:300px;
	width:300px;
	margin-bottom:20px;
}


.img-rounded{
	margin-top:25px;
	margin-bottom:25px;
	margin-left:0px;
	margin-right:0px;
}
.panel-body img{
	margin-top:0px;
	margin-bottom:5px;
	magin-left:0px;
	margin-right:10px;
}
.btn-group{
	margin-top:10px;
	margin-bottom:10px;
}
.nav-tabs a{
	font-size:Large;
	color:black;
}
.fade h1,p{
	text-align:left;
}
.panel a{
	margin-top:0px;
	margin-bottom:10px;
	margin-left:0px;
	margin-right:10px;
}
.panel-danger .panel-body a{
	margin-top:0px;
	margin-bottom:0px;
	margin-left:0px;
	margin-right:0px;	
}
.star-rating{
	margin-bottom:15px;
}
.panel-danger{
	margin-top:15px;
	margin-left:10px;
	margin-right:10px;
	margin-bottom:15px;
	width:40%;
}
.panel-danger .panel-heading{
	text-align:center;
}

</style>

<div class="container-fluid text-center">    
	<div class="col-lg-1 sidenav"> </div>
	<div class="content col-lg-10">
	
	<div class="row">
		<div class="col-lg-4" id="cover-image">
		<?php if(isset($story['image'])){ ?>
		<img class="img-rounded" src="<?php echo $story['image']; ?>">
		<?php } else{ ?>
		<img class="img-rounded" src="http://placehold.it/200x200">
		<?php } ?>
		</div>
		<div class="col-lg-8" id="story-details">
		<h1><?php echo $story['title']; ?></h1> 
		<small>by <a id="author" href=""><?php echo $story['author']; ?></a></small>
		<div id="story-rating"></div>
		<div id="action">
		<a type="button" class="btn btn-default">Read</a>
		<a type="button" class="btn btn-default" href="<?php echo base_url().'story/bookmark/'.$story['id']; ?>">Bookmark</a>
		</div>
		</div>
	</div>
	
	<div class="row">
	<div class="panel-group col-lg-12">
	<div class="panel-body">
	
		<ul class="nav nav-tabs">
		<li class="active">
		<a href="#about" data-toggle="tab">About</a>
		</li>
		<li>
		<a id="tab-toc" href="#ToC" data-toggle="tab">Table of Contents</a>
		</li>
		</ul>
		
	<div class="tab-content">
		<div class="tab-pane fade in active" id="about">
			
			<h1>Synopsis</h1>
			<p><?php echo $story['synopsis']; ?></p>
			<div class="panel">
			<div class="panel-header">
			<h3>Genre</h3>
			</div>
			<div class="panel-body">
			<?php foreach($story['genre'] as $genre){ ?>
			<a href="#" class="btn btn-info"><?php echo $genre; ?></a>
			<?php } ?>
			</div>
			</div>
			<div class="panel">
			<div class="panel-header">
			<h3>Tags</h3>
			</div>
			<div class="panel-body">
			<?php foreach($story['tags'] as $tag){ ?>
			<a href="#" class="btn btn-info"><?php echo $tag; ?></a>
			<?php } ?> 
			<p><a href="#" data-toggle="modal" data-target="#add_tag">Suggest tag</a></p>
				<div id="add_tag" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close"  data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New tag for <?php echo $story['title']; ?></h4>
					</div>
					<form action="<?php echo base_url().'story/suggest_tags/'.$story['id']; ?>" method="post">
					<div class="modal-body">
					<?php foreach($story['new_tags'] as $id=>$tag){?>
					<input type="radio" name="suggest_tag" value="<?php echo $id; ?>">
					<?php echo $tag; ?>
					<?php } ?>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-default">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					</div>
					</form>
					</div>
				</div>
				</div>
			</div>
			</div>
			<div class="panel">
			<div class="panel-header">
			<h3>Content Contains</h3>
			<div class="panel-body">
			<?php foreach($story['content_warning'] as $warning){ ?>
			<a href="#" class="btn btn-danger"><?php echo $warning; ?></a>
			<?php } ?>
			</div>			
			</div>
			</div>
			<h2>You'll also like</h2>
			<?php if(isset($recommendation)){foreach($recommendation as $key=>$val){?>
			<div id="recommendations" class="panel col-lg-2">
			<div class="panel-body">
			<img class="img-rounded" src="http://placehold.it/150x150">
			<h4><?=$val['story_title']?></h4>
			</div>
			</div>
			<?php } } ?>			
			<h2>Reviews</h2>
			<div>
			<form id="submit-review" action="<?=base_url()?>reviews/story_review/<?=$story['id']?>" method="post">
				<div class="form-group">
				<label for="review-rating">Rate the story</label>
				<div name="review-rating" value="" class="form-control" id="review-rating"></div>
				<input type="hidden" name="hidden-rating" id="hidden-rating">
				</div>
				<div class="form-group">
				<label for="review-content">Write your review</label>
				<textarea class="form-control" name="review-content"></textarea>
				</div>
			<button class="btn btn-default" id="submit-review">Submit Review</button>
			</form>
			<div>
			</div>
			</div>
		</div>
		
		<div class="tab-pane fade" id="ToC">
			<div class="row">
			<div id="ToC-notice" class="col-lg-4">
			<h5>Latest Release:</h5>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-12">
			<?php foreach($chapters as $id=>$val){?>
			<div id="chapter" class="col-lg-6">
			<label for="chapter-title"><?=$val['number']?></label>
			<a href="<?=base_url()?>pages/chapter/<?php echo $id; ?>" id="chapter-title"><?=$val['title']?></a>
			</div>
			<?php } ?>
			</div>
			</div>
		</div>
	
	</div>
	</div>

	</div>
	<div class="col-lg-1 sidenav"></div>
	</div>
</div>
<script>
$(document).ready(function () {

	tinymce.init({ 
	selector:'textarea' 
	});

	$("#story-rating").rateYo({
    rating: 4,
	readOnly: true
	});

	$("#review-rating").rateYo({
	starWidth:"25px",
	halfStar: true
	});
  
	$("#submit-review").submit(function(){
	var rating = $("#review-rating").rateYo("rating");
	$("#hidden-rating").val(rating);
	});
 
});	

</script>
</body>

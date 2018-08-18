<style>
#story-title{
	color:black;
	text-decoration:none;
}
#chapter-links a{
	color:black;
	font-weight:bold;
}
#chapter-header{
	margin-top:15px;
	margin-bottom:15px;
	margin-left:15px;
	margin-right:15px;
}
#chapter-footer{
	margin-top:15px;
	margin-bottom:15px;
	margin-left:15px;
	margin-right:15px;
}
#chapter-content p{
	text-align:left;
	margin-top:10px;
	margin-bottom:20px;
	margin-left:20px;
	margin-right:20px;
}
#next{
	text-align:right;
}
#prev{
	text-align:left;
}
</style>
<body>
<div class="container-fluid">    
  <div class="row content">
    <div class="col-lg-1 sidenav">
    </div>
    <div class="col-lg-10">
		<div class="row">
		<div class="col-lg-12" id="chapter-header">
		<h3><a id="story-title" href="<?php echo base_url().'pages/storyprofile/'.$chapter['current']['story_id']; ?>"><?php echo $chapter['current']['chapter_title']; ?></a>/Chapter <?php echo $chapter['current']['chapter_number']; ?> :
		<?php echo $chapter['current']['chapter_title']; ?>
		</h3>
		<div id="chapter-links">
		<?php if(isset($chapter['previous']['chapter_id'])){?>
		<a class="col-lg-6" id="prev" href="<?=base_url()?>pages/chapter/<?=$chapter['previous']['chapter_id']?>">Previous Chapter</a>
		<?php } else{ echo "<div class='col-lg-6'></div>"; }
		if(isset($chapter['next']['chapter_id'])){?>
		<a class="col-lg-6" id="next" href="<?=base_url()?>pages/chapter/<?=$chapter['next']['chapter_id']?>">Next Chapter</a>
		<?php } ?>
		</div>
		</div>
		</div>
		<hr>
		<div class="row">
		<div class="col-lg-12" id="chapter-content">
		<p><?php echo $chapter['current']['chapter_content']; ?></p>
		</div>
		</div>
		<hr>
		<div class="row">
		<div class="col-lg-12" id="chapter-footer">
		<div id="chapter-links">
		<?php if(isset($chapter['previous']['chapter_id'])){?>
		<a class="col-lg-6" id="prev" href="<?=base_url().'pages/chapter/'.$chapter['previous']['chapter_id']?>">Previous Chapter</a>
		<?php } else{ echo "<div class='col-lg-6'></div>"; }
		if(isset($chapter['next']['chapter_id'])){?>
		<a class="col-lg-6" id="next" href="<?=base_url().'pages/chapter/'.$chapter['next']['chapter_id']?>">Next Chapter</a>
		<?php } ?>
		</div>
		</div>
		</div>
		<div class="row chapter-comments">
		
		</div>
    </div>
    <div class="col-lg-1 sidenav">
    </div>
  </div>
</div>

</body>

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
	<h5 class="card-title"><a href="">Chapters</a></h5>
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
	<div class="col-lg-12 panel">
	<h4 class="panel-heading">Chapters</h4>
	<div class="panel-body">
	<table class="table" id="chapters">
	<thead>
	<tr>
	<td>#</td>
	<td>Title</td>
	<td>Date added</td>
	<td>Action</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach($story['chapters'] as $id=>$val){ ?>
	<tr>
	<td><?=$val['chapter_number']?></td>
	<td><?=$val['chapter_title']?></td>
	<td><?=$val['date_added']?></td>
	<td><a href="#" class="btn btn-default">Edit</a>
	<a href="#" class="btn btn-danger">Delete</a>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
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
    $('#chapters').DataTable( {
    } );
} );
</script>
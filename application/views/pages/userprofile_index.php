<style>

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
	<div class="col-lg-8 col-md-7">
	<div class="row">
	<div class="col-lg-12">
	<h3>Personal Information</h3>
	<table id="personal-information" class="table" align="left">
	<tbody>
	<tr>
	<td>Joined:</td>
	<td><?=$join_date;?></td>
	</tr>
	<tr>
	<td>Last Active:</td>
	<td><?=$last_login;?></td>
	</tr>
	<tr>
	<td>Gender:</td>
	<td><?=$profile['gender'];?></td>
	</tr>
	<tr>
	<td>Age:</td>
	<td><?=$profile['age'];?></td>
	</tr>
	<tr>
	<td>About me:</td>
	<td></td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>

	</div>
    </div>
	<div class="col-lg-1 col-md-1 sidenav">
    </div>
  </div>
</div>

</body>

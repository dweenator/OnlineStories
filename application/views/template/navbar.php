<style>
#user-interface{
	margin-top:5px;
	margin-bottom:5px;
	margin-left:5px;
	margin-right:5px;
}
#notification{
	margin-top:5px;
	margin-bottom:5px;
	margin-left:5px;
	margin-right:5px;
}

.dropdown{
	display:inline;
}
.dropdown li{
	width:250px;
}

</style>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>pages/home">Home</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <div class="dropdown">
	  <a id="notification" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	  <span class="glyphicon glyphicon-bell"></span></a>
	  <ul class="dropdown-menu">
	  <?php if($this->session->userdata('is_logged_in') == TRUE){
	  if(isset($notification)){
		//foreach loop?>
		<li>
		<a href="">
		<div>
		<i class="glyphicon glyphicon-comment"></i>New Comment
		<span class="pull-right text-muted">10 minutes ago</span>
		<p>
		</div>
		</a>
		</li>
		<li class="divider"></li>
	  <?php } } ?>
	 
		<li>
		<a href="">
		<div>
		<i class="glyphicon glyphicon-comment"></i>New Comment
		<span class="pull-right text-muted small">10 minutes ago</span>
		<p>
		</div>
		</a>
		</li>
		<li class="divider"></li>
	  	
		<li>
		<a href="">
		<div>
		<i class="glyphicon glyphicon-comment"></i>New Comment
		<span class="pull-right text-muted small">15 minutes ago</span>
		<p>
		</div>
		</a>
		</li>
		<li class="divider"></li>
	  
	  
	  
	  
	  
	  </ul>
	  </div>
	  <div class="dropdown">
	  <a id="user-interface" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	  <span class="glyphicon glyphicon-user"></span></a>
	  <ul class="dropdown-menu">
	  <?php if($this->session->userdata('is_logged_in') == TRUE){?>
	  <li><a href="<?php echo base_url();?>profile_user/profile">Profile</a></li>
	  <li><a href="<?php echo base_url();?>account/logout">Logout</a></li><?php }else{ ?>
      <li><a href="<?php echo base_url();?>pages/register">Register</a></li>
      <li><a href="<?php echo base_url();?>pages/login">Login</a></li><?php } ?>
      </ul>
      </div>
	  </ul>
    </div>
  </div>
</nav>
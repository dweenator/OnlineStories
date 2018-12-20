
<div class="container">
    <div class="row">
	<div class="col-md-3">
	</div>	
    <div class="col-md-6">
	<?php
	$message = $this->session->flashdata('message');
	$form_error = $this->session->flashdata('error');
	?>
	<div class="lg-md-2"><?php if(isset($message)){ echo $message; }?></div>
		<form method="post" action="<?php echo base_url();?>account/login">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text">
			<div id="form_error"><?php echo $form_error['username']; ?></div>
		  </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" id="password" name="password" type="password">
			<div id="form_error"><?php echo $form_error['password']; ?></div>
		  </div>
		  <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
		<div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url();?>pages/register_user">Register an Account</a>
        </div>       
    </div>
	<div class="col-md-3">
	</div>
    </div>
	
</div>



</body>

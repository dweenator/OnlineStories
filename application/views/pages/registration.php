
<div class="container">
    <div class="row">
		<div class="col-md-3">
		</div>
        <div class="col-md-6">
		<form method="post" action="<?php echo base_url();?>account/register">
		<?php $form_error = $this->session->flashdata('error'); ?>
          <div class="form-group">
			<label for="username">Username</label>
			<input class="form-control" id="username" name="username" type="input">
			<div id="form_error"><?php echo $form_error['username']; ?></div>
		  </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" name="password" type="password">
			<div id="form_error"><?php echo $form_error['password']; ?></div>
		  </div>
		  <div class="form-group">
			<label for="confirm_password">Confirm Password</label>
			<input class="form-control" id="confirm_password" name="confirm_password" type="password">
		  <div id="form_error"><?php echo $form_error['confirm_password']; ?></div>
		  </div>
		  <div class="form-group">
			<label for="gender">Gender</label>
			<select class="form-control" id="gender" name="gender">
				<option disabled selected value="">select a gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select>
			<div id="form_error"><?php echo $form_error['gender']; ?></div>
		  </div>
		  <div class="form-group">
			<label for="birthdate">Birthdate</label>
			<input class="form-control" id="birthdate" name="birthdate" type="date">
			<div id="form_error"><?php echo $form_error['birthdate']; ?></div>
		  </div>
		  
		  
		  
		  <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
		<div class="text-center">
        <a class="d-block small mt-3" href="<?php echo base_url();?>pages/login_user">Already have an account?</a>
        </div>
        </div>
		<div class="col-md-3">
		</div>
    </div>
</div>
</body>

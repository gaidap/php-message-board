<div class="card d-flex align-items-stretch">
  <div class="card-header">
    <h3>Register user.</h3>
  </div>
  <div class="card-body bg-light">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Name</label>
    		<input type="text" name="name" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control" />
    	</div>
      <div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" />
    	</div>
    	<input class="btn btn-primary btn-add-message" name="submitRegister" type="submit" value="Register" />
      <a class="btn btn-danger btn-add-message" href="<?php echo ROOT_URL; ?>">Cancel</a>
    </form>
  </div>
</div>
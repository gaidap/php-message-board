<div class="card d-flex align-items-stretch">
  <div class="card-header">
    <h3>Add a message.</h3>
  </div>
  <div class="card-body bg-light">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Message title</label>
    		<input type="text" name="title" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Message body</label>
    		<textarea name="message" class="form-control"></textarea>
    	</div>
    	<div class="form-group">
    		<label>Link</label>
    		<input type="text" name="link" class="form-control" />
    	</div>
    	<input class="btn btn-primary btn-add-message" name="submitMessage" type="submit" value="Add message" />
      <a class="btn btn-danger btn-add-message" href="<?php echo ROOT_URL . '/messages' ; ?>">Cancel</a>
    </form>
  </div>
</div>
<div>
  <a class="btn btn-success btn-share" href="<?php echo ROOT_URL . '/messages/add'; ?>">Add post</a>
  <?php foreach($view_model as $item) : ?>
      <div class="card card-body bg-light d-flex justify-content-between align-items-start">
        <h3><?php echo $item['title']; ?></h3>
        <small><?php echo $item['creation_date']; ?></small>
        <hr/>
        <p><?php echo $item['message']; ?></p><br>
        <a class="btn btn-info" href="<?php echo $item['link']; ?>" target="_blank">Go to website</a>
      </div>
  <?php endforeach; ?>
</div>
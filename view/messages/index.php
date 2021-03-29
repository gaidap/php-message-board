<div class="message-card">
  <a class="btn btn-success btn-message" href="<?php echo ROOT_URL . '/messages/add'; ?>">Add post</a>
  <?php foreach($view_model as $item) : ?>
      <div class="card d-flex align-items-stretch">
        <div class="card-header">
          <div class="card-title">
            <h3><?php echo $item['title']; ?></h3>
            <small><?php echo $item['creation_date']; ?></small>
          </div>
        </div>
        <div class="card-body bg-light">
          <div class="card-text">
            <p><?php echo $item['message']; ?></p>
          </div>
          <br>
          <a class="btn btn-info" href="<?php echo $item['link']; ?>" target="_blank">Go to website</a>
        </div>
      </div>
  <?php endforeach; ?>
</div>
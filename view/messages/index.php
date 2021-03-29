<div class="message-card">
  <a class="btn btn-success btn-message" href="<?php echo ROOT_URL . '/messages/add'; ?>">Add post</a>
  <?php foreach($view_model as $item) : ?>
      <div class="card d-flex align-items-stretch">
        <div class="card-header">
          <div class="card-title">
            <h3><?php echo $item['title']; ?></h3>
            <small><?php echo $item['creation_date']; ?></small>
          </div>
          <?php if($_SESSION['user_data']['id'] === $item['user_id']) : ?>
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="messageId" value="<?php echo $item['id']; ?>"/>
              <input type="hidden" name="userId" value="<?php echo $item['user_id']; ?>"/>
              <input class="btn btn-danger btn-sm" name="deleteMessage" type="submit" value="X" />
            </form>
          <?php endif; ?>
        </div>
        <div class="card-body bg-light">
          <div class="card-text">
            <p><?php echo $item['message']; ?></p>
          </div>
          <br>
          <a class="btn btn-info" <?php echo (empty($item['link']) ? 'hidden' : '') ; ?> href="<?php echo $item['link']; ?>" target="_blank">
          Go to website
          </a>
        </div>
      </div>
  <?php endforeach; ?>
</div>
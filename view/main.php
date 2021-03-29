<html>
  <head>
    <title>Message Board</title>
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>/assets/css/style.css">
    <link rel="icon" 
      type="image/png" 
      href="<?php echo ROOT_URL;?>/assets/icons/responsibility_128px.png">
  </head>
  <body>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Message Board</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL . '/home'; ?>">Home</a>
            </li>
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL . '/messages'; ?>">Messages</a>
              </li>
            <?php endif; ?>
          </ul>
          <ul class="navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL; ?>">Welcome <?php print_r($_SESSION['user_data']['name']); ?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL . '/users/logout'; ?>">Logout</a>
              </li>
            <?php else : ?> 
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?php echo ROOT_URL . '/users/register'; ?>">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo ROOT_URL . '/users/login'; ?>">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container">
      <div class="row row-whith-wide-cards">
        <?php require($view); ?>
      </div>
    </main>  
    <div class="freepik-disclaimer">Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
  </body>
</html>
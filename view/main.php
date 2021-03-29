<html>
  <head>
    <title>Message Board</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
            <li class="nav-item">
              <a class="nav-link" href="<?php echo ROOT_URL . '/messages'; ?>">Messages</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="container">
      <div class="row">
        <?php require($view); ?>
      </div>
    </main>  
  </body>
</html>
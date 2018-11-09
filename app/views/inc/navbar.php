<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URL_ROOT; ?>">
      <?php echo SITE_NAME; ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="">Trending</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="">Web development</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URL_ROOT;  ?>/pages/admin">Admin</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/register">Register</a>
        </li>
        <?php if(isset($_SESSION['logged_in'])): ?>
        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/logout">logout</a>
        </li>

        <?php else: ?>
        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/login">login</a>
        </li>
        <?php endif; ?>

        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URL_ROOT; ?>/pages/about">About</a>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="">Contact</a>
        </li>
      </ul>
      <form action="<?php echo URL_ROOT; ?>/pages/search" method="GET" class="form-inline ml-4 mt-2 mt-md-0">
      <?php $search = (isset($_GET['search'])) ? $_GET['search'] : ""; ?>
        <div class="input-group">
          <input type="text" class="form-control <?php echo (empty($search)) ? 'is-invalid' : ''; ?>" placeholder="Search blog" name="search" value="<?php echo htmlspecialchars($data['search']); ?>">
          
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
          </div>
      </form>
    </div>
  </div>
</nav>
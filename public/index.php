<?php include_once 'partials/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      
    <div class="login-form">
    <form action="home.php" method="post">
        <h2 class="text-center">Acesso Restrito</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
    </form>
</div>

  </div>
</div>

<?php include_once 'partials/footer.php'; ?>

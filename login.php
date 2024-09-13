<?php session_start() ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">User Login Form</h3>
                </div>
                <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?=$_SESSION['success']?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } unset($_SESSION['success'])?>
                    <form action="login_post.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email">
                            <?php if(isset($_SESSION['not_exist'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['not_exist']?></strong>
                            <?php } unset($_SESSION['not_exist'])?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            <?php if(isset($_SESSION['wrong_pass'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['wrong_pass']?></strong>
                            <?php } unset($_SESSION['wrong_pass'])?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                    <div class="mt-3">
                            <p>Don't have an account? <a href="register.php">Registration</a></p>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
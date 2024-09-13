<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .pass {
        position: relative;
    }
    .pass i {
        position: absolute;
        top: 32px;
        right: 0;
        width: 36px;
        height: 36px;
        background-color: green;
        color: #fff;
        text-align: center;
        line-height: 36px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header  bg-success">
                    <h1>Registration Form</h1>
                </div>
                <div class="card-body">
                   
                    <form action="register_post.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Enter Your Name</label>
                            <input type="text" class="form-control" name="name" value="<?= (isset($_SESSION['name'])?$_SESSION['name']:'')?>">
                            <?php if(isset($_SESSION['nam_err'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['nam_err']?></strong>
                            <?php } unset($_SESSION['nam_err'])?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter Your Email</label>
                            <input type="text" class="form-control" name="email" value="<?= (isset($_SESSION['email'])?$_SESSION['email']:'')?>">
                            <?php if(isset($_SESSION['email_err'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['email_err']?></strong>
                            <?php } unset($_SESSION['email_err'])?>
                        </div>
                        <div class="mb-3 pass">
                            <label class="form-label">Enter Your Password</label>
                            <input type="password" class="form-control" name="password" id="pass">
                            <?php if(isset($_SESSION['pass_err'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['pass_err']?></strong>
                            <?php } unset($_SESSION['pass_err'])?>
                            <i class="fa-regular fa-eye show"></i>
                            </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="pass">
                            <?php if(isset($_SESSION['conpass_err'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['conpass_err']?></strong>
                            <?php } unset($_SESSION['conpass_err'])?>
                        </div>   
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                    <div class="mt-3">
                            <p>Already have an account? <a href="login.php">Login here</a></p>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var pass = document.getElementById('pass');
    $('.show').click(function(){
        if(pass.type == 'password'){
            pass.type='text';
        }
        else{
            pass.type='password';
        }
    })
    
</script>
</body>
</html>

<?php
unset($_SESSION['name']);
unset($_SESSION['email']);
?>
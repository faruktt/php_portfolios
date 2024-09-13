<?php
    require '../db.php';
    require '../includes/header.php';
    
 ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Profile Info</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['info_update'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['info_update']?></div>
                <?php } unset($_SESSION['info_update'])?>
                <form action="profile_post.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?=$after_logged_user_assoc['name']?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?=$after_logged_user_assoc['email']?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Change Password</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['pass_update'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['pass_update']?></div>
                <?php } unset($_SESSION['pass_update'])?>
                <form action="pass_update.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control">
                        <?php if(isset($_SESSION['old_pass_err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['old_pass_err']?></strong>
                        <?php } unset($_SESSION['old_pass_err'])?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if(isset($_SESSION['pass_err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['pass_err']?></strong>
                        <?php } unset($_SESSION['pass_err'])?>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control">
                        <?php if(isset($_SESSION['conpass_err'])){ ?>
                            <strong class="text-danger"><?=$_SESSION['conpass_err']?></strong>
                        <?php } unset($_SESSION['conpass_err'])?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
        <?php if(isset($_SESSION['err'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['err']?></div>
                <?php } unset($_SESSION['err'])?>
            <div class="card-header bg-primary"><h3 class="text-white">Profile photo</h3></div>
            <div class="card-body">
              <form action="profile_photo_post.php" method="POST" enctype="multipart/form-data">
              <div class="mt-3">
                <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <div>
                <img id="blah" src="/iawd2403/upload/profile/<?=$logo_assoc['image']?>" alt="" width="200">
                </div>
                
              </div>
              <div class="mt-3">
              <button type="submit" class="btn btn-primary">upload</button>
              </div>
              </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>
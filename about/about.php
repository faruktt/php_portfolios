<?php require '../db.php'; ?>
<?php require  '../includes/header.php'?>
<?php

$select = " SELECT * FROM abouts WHERE id=1";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Update about information</h3></div>
            <div class="card-body">
            <?php if(isset($_SESSION['update_info'])){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?=$_SESSION['update_info']?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } unset($_SESSION['update_info'])?>
                <form action="update_info.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" value="<?=$after_assoc['designation']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">name</label>
                        <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Short Desp</label>
                       <textarea name="desp" id="" class="form-control" rows="4" ><?=$after_assoc['desp']?></textarea>
                    </div>
                    <div class="mb-3">
                       <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">update about image</h3>
            </div>
            <div class="card-body">
               <form action="update_image.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label for="" name="about_image" class="form-label">Upload Image</label>
                            <input type="file" name="about_image" class="form-control"onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                        <?php if(isset($_SESSION['errr'])){ ?>
                                        <strong class="text-danger"><?=$_SESSION['errr']?></strong>
                                    <?php } unset($_SESSION['errr'])?>
                                    <div>
                                        <img id="blah" src="/iawd2403/upload/about/<?=$after_assoc['image']?>" alt="" width="200">
                                    </div>
                        </div>
                        <div class="mb-3">
                           <button type="submit" class= "btn btn-primary">update</button>
                        </div>
               </form>
        </div>
    </div>
</div>

<?php require  '../includes/footer.php'?>

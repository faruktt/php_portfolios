
<?php require '../db.php';

$select = " SELECT * FROM logos WHERE id=1";
$select_res = mysqli_query($db_connection, $select);
$logo_assoc = mysqli_fetch_assoc($select_res);

?>
<?php require  '../includes/header.php'
 ?>



<div class="row">
    <div class="col-lg-12 m-auto">
        <div class="card">
        <?php  
        if(isset($_SESSION['err'])){ ?>
        <div class="alert alert-success"><?=$_SESSION['err']?></div>
        <?php  } unset($_SESSION['err'])?>
        <?php  
        if(isset($_SESSION['err2'])){ ?>
        <div class="alert alert-success"><?=$_SESSION['err2']?></div>
        <?php  } unset($_SESSION['err2'])?>

            <div class="card-header bg-primary"><h3 class="text-white">Change logo</h3></div>
            <div class="card-body">
                <form action="update_logo.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                            
                                <label for="" class="form-label">Change Header Logo</label>
                                <input type="file" class="form-control" name="header_logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        
                            <div>
                                <img id="blah" src="/iawd2403/upload/logo/<?=$logo_assoc['header_logo']?>" alt="" width="200">
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Change Footer Logo</label>
                                <input type="file" class="form-control" name="footer_logo" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                <?php if(isset($_SESSION['err2'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['err2']?></strong>
                            <?php } unset($_SESSION['err2'])?>
                            <div>
                                <img id="blah2" src="/iawd2403/upload/logo/<?=$logo_assoc['footer_logo']?>" alt="" width="200">
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 m-auto">
                            <div class="mt-5">
                               <button type="submit" class="btn btn-primary ">Upade logo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require  '../includes/footer.php' ?>
<?php require '../db.php';
 require  '../includes/header.php';

 $id = $_GET['id'];
$update = "SELECT * FROM portfolios WHERE id=$id";
$update_res = mysqli_query($db_connection, $update);
$affter_assoc = mysqli_fetch_assoc($update_res);

 ?>
 <div class="row">
    
 <div class="col-lg-6 m-auto">
 <div class="card">
     <div class="card-header bg-primary"><h3 class="text-white">Edit portfolios</h3></div>
     <div class="card-body">
         <?php  
           if(isset($_SESSION['update'])){ ?>
           <div class="alert alert-success"><?=$_SESSION['update']?></div>
           <?php  } unset($_SESSION['update'])
         ?>
     <form action="update.php" method="POST" enctype="multipart/form-data">
         <div class="mb-3">
            <input type="hidden" name="id" value="<?=$affter_assoc['id']?>" >
             <label for="" name="title" class="form-label">title</label>
             <input type="text" name="title" class="form-control" value="<?=$affter_assoc['title']?>">
         </div>
         <div class="mb-3">
            <input type="hidden" name="id" value="<?=$affter_assoc_port['id']?>">
             <label for="" name="sub_title" class="form-label" >sub title</label>
             <input type="text" name="sub_title" class="form-control" value="<?=$affter_assoc['sub_title']?>">
             <div class="mb-3">
                                <label for="" class="form-label">Upload image</label>
                                <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">>
                                <?php if(isset($_SESSION['err'])){ ?>
                                <strong class="text-danger"><?=$_SESSION['err']?></strong>
                            <?php } unset($_SESSION['err'])?>
                            <div>
                                <img id="blah" src="/iawd2403/upload/portfolios/<?=$logo_assoc['image']?>" alt="" width="200">
                            </div>
                            </div>
         </div> 
            <button type="submit" class="btn btn-primary">Update Portfolios</button>
         </div>
     </form>
     </div>
 </div>
</div>
 </div>
<?php
 require  '../includes/footer.php'; ?>h1>
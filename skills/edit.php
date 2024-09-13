<?php require '../db.php';
 require  '../includes/header.php';

 $id = $_GET['id'];
$select = "SELECT * FROM skills WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$affter_assoc = mysqli_fetch_assoc($select_res);

 ?>
 <div class="row">
    
 <div class="col-lg-6 m-auto">
 <div class="card">
     <div class="card-header bg-primary"><h3 class="text-white">Edit Skill</h3></div>
     <div class="card-body">
         <?php  
           if(isset($_SESSION['update'])){ ?>
           <div class="alert alert-success"><?=$_SESSION['update']?></div>
           <?php  } unset($_SESSION['update'])
         ?>
     <form action="update.php" method="POST">
         <div class="mb-3">
            <input type="hidden" name="id" value="<?=$affter_assoc['id']?>" >
             <label for="" name="tittle" class="form-label">tittle</label>
             <input type="text" name="tittle" class="form-control" value="<?=$affter_assoc['tittle']?>">
         </div>
         <div class="mb-3">
             <label for="" name="percentage" class="form-label" >percentage</label>
             <input type="text" name="percentage" class="form-control" value="<?=$affter_assoc['percentage']?>">
         </div> 
            <button type="submit" class="btn btn-primary">Update Skill</button>
         </div>
     </form>
     </div>
 </div>
</div>
 </div>
<?php
 require  '../includes/footer.php'; ?>
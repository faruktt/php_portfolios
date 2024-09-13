<?php require '../db.php';
 require  '../includes/header.php';

 $skill = "SELECT * FROM skills";
 $skill_result = mysqli_query($db_connection, $skill);
 ?>
 
 <div class="row">
     <div class="col-lg-8">
         <div class="card">
             <div class="card-header bg-primary">
                 <h3 class="text-white">skill List</h3>
             </div>

             <div class="card-body">
                <?php  
                  if(isset($_SESSION['status'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['status']?></div>
                  <?php  } unset($_SESSION['status'])
                ?>
                 <?php  
                  if(isset($_SESSION['delete_success'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['delete_success']?></div>
                  <?php  } unset($_SESSION['delete_success'])
                ?>
                 <?php  
                  if(isset($_SESSION['delete_error'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['delete_error']?></div>
                  <?php  } unset($_SESSION['delete_error'])
                ?>
                 <table class="table table-bordered">
                     <tr>
                         <th>SL</th>
                         <th>tittle</th>
                         <th>percentage</th>
                         <th>Status</th>
                         <th>action</th>
                     </tr>
                     <?php foreach($skill_result as $sl=>$skill){ ?>
                     <tr>
                         <td><?=$sl+1?></td>
                         <td><?=$skill['tittle']?></td>
                         <td><?=$skill['percentage']?></td>
                         <td><a href="status.php?id=<?=$skill['id']?>" class="badge badge-<?=($skill['status']==1?'success':'light')?>"><?=($skill['status']==1?'active' : 'deactive')?> </a>
                        </td>
                        
                        <td>
                        <a href="edit.php?id=<?=$skill['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-pencil"></i></a>

                        <a href="skill_delete.php?id=<?=$skill['id']?>"  class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                     <?php } ?>
                 </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary"><h3 class="text-white">Add New Skill</h3></div>
            <div class="card-body">
                <?php  
                  if(isset($_SESSION['add'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['add']?></div>
                  <?php  } unset($_SESSION['add'])
                ?>
            <form action="skill_post.php" method="POST">
                <div class="mb-3">
                    <label for="" name="tittle" class="form-label">tittle</label>
                    <input type="text" name="tittle" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" name="percentage" class="form-label">percentage</label>
                    <input type="text" name="percentage" class="form-control">
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Add Skill</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php require  '../includes/footer.php'
 ?>

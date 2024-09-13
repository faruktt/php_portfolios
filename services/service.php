<?php require '../db.php';
 require  '../includes/header.php';

 $service = "SELECT * FROM services";
 $service_result = mysqli_query($db_connection, $service);
 ?>
 
 <div class="row">
    <div class="col-lg-8">
         <div class="card">
             <div class="card-header bg-primary">
                 <h3 class="text-white">service List</h3>
             </div>

             <div class="card-body">
                <?php  
                  if(isset($_SESSION['add'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['add']?></div>
                  <?php  } unset($_SESSION['add'])
                ?>
                 <?php  
                  if(isset($_SESSION['delete_success'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['delete_success']?></div>
                  <?php  } unset($_SESSION['delete_success'])
                ?>
                 <?php  
                  if(isset($_SESSION['status'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['status']?></div>
                  <?php  } unset($_SESSION['status'])
                ?>


                 <table class="table table-bordered">
                     <tr>
                         <th>SL</th>
                         <th>tittle</th>
                         <th>descrition</th>
                         <th>Status</th>
                         <th width="100" >action</th>
                     </tr>
                     <?php foreach($service_result as $sl=>$service){ ?>
                     <tr>
                         <td><?=$sl+1?></td>
                         <td><?=$service['title']?></td>
                         <td><?=$service['Desp']?></td>
                         <td><a href="status.php?id=<?=$service['id']?>" class="badge badge-<?=($service['status']==1?'success':'light')?>"><?=($service['status']==1?'active' : 'deactive')?> </a>
                        </td>
                        
                        <td>
                        <a href="edit.php?id=<?=$service['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-pencil"></i></a>

                        <a href="service_delete.php?id=<?=$service['id']?>" class="btn btn-info shadow btn-xs sharp del"
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
            <div class="card-header bg-primary"><h3 class="text-white">Add New Services</h3></div>
            <div class="card-body">
                <?php  
                  if(isset($_SESSION['add'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['add']?></div>
                  <?php  } unset($_SESSION['add'])
                ?>
            <form action="service_post.php" method="POST">
                <div class="mb-3">
                    <label for="" name="title" class="form-label">title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" name="desp" class="form-label">descrition</label>
                    <input type="text" name="desp" class="form-control">
                </div>
                <div class="mb-3">
                   <button type="submit" class="btn btn-primary">Add service</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php require  '../includes/footer.php'
 ?>

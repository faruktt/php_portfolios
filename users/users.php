<?php 
require '../db.php';
require '../includes/header.php';

$users = "SELECT * FROM users";
$user_result = mysqli_query($db_connection, $users);
?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
        <?php  
                  if(isset($_SESSION['delete_success'])){ ?>
                  <div class="alert alert-success"><?=$_SESSION['stadelete_successtus']?></div>
                  <?php  } unset($_SESSION['delete_success'])
                ?>

            <div class="card-header bg-primary">
                <h3 class="text-white">Users List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($user_result as $sl=>$user){ ?>
                    <tr>
                        <td><?=$sl+1?></td>
                        <td><?=$user['name']?></td>
                        <td><?=$user['email']?></td>
                        <td> 
                            <a href="delete_user.php?id=<?=$user['id']?>" class="btn btn-danger shadow btn-xs sharp del"
                            ><i class="fa fa-trash"></i></a>
                        </td>
                    </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>
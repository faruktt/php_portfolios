<?php
require '../db.php';
require  '../includes/header.php';

$message = "SELECT * FROM messages";
$message_result = mysqli_query($db_connection, $message);
?>
<div class="row">
    <div class="col-lg-10 m-auto">
    <div class="card">
    <?php  
           if(isset($_SESSION['delete_success'])){ ?>
           <div class="alert alert-success"><?=$_SESSION['delete_success']?></div>
           <?php  } unset($_SESSION['delete_success'])
         ?>
        <div class="card-header bg-primary"><h3 class="text-white">All Message</h3></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>name</th>
                    <th>email</th>
                    <th>subject</th>
                    <th>message</th>
                    <th width="15%">action</th>
                </tr>
                <?php foreach($message_result as $sl=>$message){ ?>
                     <tr>
                         <th><?=$sl+1?></th>
                         <th><?=$message['name']?></th>
                         <th><?=$message['email']?></th>
                         <th><?=$message['subject']?></th>
                         <th><?=$message['message']?></th>

                        
                         <th>
                         <a href="view.php?id=<?=$message['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-eye"></i></a>

                        <a href="message_delete.php?id=<?=$message['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-trash"></i></a>
                        </th>
                     </tr>
                     <?php } ?>
            </table>
        </div>
    </div>
    </div>
</div>

<?php
require  '../includes/footer.php';
?>
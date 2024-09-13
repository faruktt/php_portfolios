<?php require '../db.php';
 require  '../includes/header.php';

$select = "SELECT * FROM reviews ORDER BY id DESC";

$result = mysqli_query($db_connection, $select);


?>

<div class="row">
    <div class="col-lg-10 ">

    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php } unset($_SESSION['success']) ?>

    <?php if(isset($_SESSION['delete_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_success'] ?></div>
    <?php } unset($_SESSION['delete_success']) ?>

    <?php if(isset($_SESSION['delete_error'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_error'] ?></div>
    <?php } unset($_SESSION['delete_error']) ?>
    
    <?php if(isset($_SESSION['success_reviews'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_reviews'] ?></div>
    <?php } unset($_SESSION['success_reviews']) ?>

    <?php if(isset($_SESSION['update_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['update_success'] ?></div>
    <?php } unset($_SESSION['update_success']) ?>
    <table class="table table-boarderd text-center">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Profession</th>
            <th scope="col">Email</th>
            <th scope="col">Review</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($result as $index=>$show){ ?>

        <a href="view.php?id=<?= $show['id'] ?>">
        <tr >
            <th scope="col"><?= $index+1 ?></th>
            <th><?= $show['name'] ?></th>
            <th><?= $show['profession'] ?></th>
            <th><?= $show['email'] ?></th>
            <th><?= $show['review'] ?></th>
            <td><a href="status.php?id=<?=$show['id']?>" class="badge badge-<?=($show['status']==1?'success':'light')?>"><?=($show['status']==1?'active' : 'deactive')?> </a>
            </td>
             <th>
             <a href="view.php?id=<?=$show['id']?>" class="btn btn-info shadow btn-xs sharp del"
                ><i class="fa fa-eye"></i></a>

                <a href="review_delete.php?id=<?=$show['id']?>" class="btn btn-info shadow btn-xs sharp del"
                ><i class="fa fa-trash"></i></a>
            </th>
        </tr>
        </a>

        <?php } ?>
        </tbody>
    </table>
    </div>
</div>
            
 <?php require '../includes/footer.php' ?>
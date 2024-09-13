<?php require '../db.php';
 require  '../includes/header.php';
 $select = "SELECT * FROM portfolios ORDER BY id DESC";
$result = mysqli_query($db_connection, $select);
?>
<div class="row">
    <div class="col-lg-8">
        
    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
    <?php } unset($_SESSION['success']) ?>

    <?php if(isset($_SESSION['delete_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_success'] ?></div>
    <?php } unset($_SESSION['delete_success']) ?>

    <?php if(isset($_SESSION['delete_error'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['delete_error'] ?></div>
    <?php } unset($_SESSION['delete_error']) ?>
    
    <?php if(isset($_SESSION['success_portfolio'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['success_portfolio'] ?></div>
    <?php } unset($_SESSION['success_portfolio']) ?>

    <?php if(isset($_SESSION['update_success'])){ ?>
        <div class="alert alert-success"><?= $_SESSION['update_success'] ?></div>
    <?php } unset($_SESSION['update_success']) ?>
    
    <table class="table table-bordered">
                     <tr>
                         <th>SL</th>
                         <th>title</th>
                         <th>sub_title</th>
                         <th>image</th>
                         <th>status</th>
                         <th width="100" >action</th>
                     </tr>
                     <?php foreach($result as $sl=>$show){ ?>
                     <tr>
                         <td><?=$sl+1?></td>
                         <td><?=$show['title']?></td>
                         <td><?=$show['sub_title']?></td>
                        <th><img src="../../iawd2403//upload/portfolios/<?= $show['image'] ?>" width="60px"></th>
                   <th><a href="status.php?id=<?= $show['id'] ?>" class="btn btn-<?= ($show['status'] == 1 ? 'success':'danger') ?> btn-sm"><?= ($show['status'] == 1 ? 'Active':'Deactivted') ?></a></th>
                    
                   <th>
                     <a href="portfolio_edit.php?id=<?=$show['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-pencil"></i></a>

                        <a href="portfolio_delete.php?id=<?=$show['id']?>" class="btn btn-info shadow btn-xs sharp del"
                        ><i class="fa fa-trash"></i></a>
                   </th>
        </tr>
        <?php } ?>
      
    </table>
    </div>
   <div class="col-lg-4 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-center text-white">Add new Portfolio</h1>
            </div>
            <div class="card-body">
            <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" value="<?= (isset($_SESSION['title'])? $_SESSION['title']:'') ?>" name="title" class="form-control" placeholder="Enter your portfolio title!">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sub Title</label>
                    <input type="text" value="<?= (isset($_SESSION['title'])? $_SESSION['sub_title']:'') ?>" name="sub_title" class="form-control" placeholder="Enter your sub title!">
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                    <img id="img" class="mt-3 rounded" width="200"/>
                    <?php if(isset($_SESSION['error_image'])){ ?>
                    <strong class="alret alert-dagner"><br><?=$_SESSION['error_image']?></strong>
                    <?php } 
                    unset($_SESSION['error_image']);
                    unset($_SESSION['title']);
                    unset($_SESSION['sub_title']);
                    ?>
                </div>
                <div class="mb-3">
                    <button type="submit" name="portfoilo" class="btn btn-primary">Add Portfolio</button>
                </div>
                </form>



            </div>
       </div>
   </div>
</div>
            
 <?php include '../includes/footer.php' ?>
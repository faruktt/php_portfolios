<?php
require '../db.php';
$id = $_GET['id'];


$select = "SELECT * FROM reviews WHERE id = $id";
$result = mysqli_query($db_connection, $select);
$reviews = mysqli_fetch_assoc($result);


if ($reviews['status'] == 0) {
    $update = "UPDATE reviews SET status = 1 WHERE id = $id";
    mysqli_query($db_connection, $update);
}

require '../includes/header.php';
?>

<div class="row">
    <div class="col-lg-10">
        <table class="table table-bordared">
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?= $reviews['name'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Eamil</td>
                    <td><?= $reviews['profession'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Subject</td>
                    <td><?= $reviews['email'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Message</td>
                    <td><?= $reviews['review'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require '../includes/footer.php'; ?>
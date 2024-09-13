<?php
require '../db.php';
$id = $_GET['id'];


$select = "SELECT * FROM messages WHERE id = $id";
$result = mysqli_query($db_connection, $select);
$message = mysqli_fetch_assoc($result);


if ($message['status'] == 0) {
    $update = "UPDATE messages SET status = 1 WHERE id = $id";
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
                    <td><?= $message['name'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Eamil</td>
                    <td><?= $message['email'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Subject</td>
                    <td><?= $message['subject'] ?></td>
                </tr>
                <tr>
                    <td width="10%">Message</td>
                    <td><?= $message['message'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require '../includes/footer.php'; ?>
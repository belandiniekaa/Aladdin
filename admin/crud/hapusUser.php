<?php
session_start();

include "../../functions/koneksi.php";


if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    if ($user_id!="") {
        $row=mysqli_fetch_array(mysqli_query($conn, "select * from users where user_id='$user_id' "));
        $hapus = "delete from users where user_id='$user_id'";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>alert("User has been successfully deleted.");window.location='../users.php';</script>
            <?php
        }
    }
    }
?>
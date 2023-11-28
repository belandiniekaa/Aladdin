<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../../login.php");
    if(cek_role($_SESSION['user'])){
        header("location:../games/carilampu.php");
        exit();
    }else{
        header("location:../berandaadmin.php");
        exit();
    }
}
include "../../functions/koneksi.php";
include "../../functions/user.php";


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
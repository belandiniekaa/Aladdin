<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../../login.php");
    if(cek_role($_SESSION['user'])){
        header("location:../games/carilampu.php");
        exit();
    }else{
        header("location:../admin/berandaadmin.php");
        exit();
    }
}
include "../../functions/koneksi.php";
include "../../functions/user.php";

if(cek_role($_SESSION['user'])){
    
    header("location:../../games/carilampu.php");
        exit();
    }else{
        header("location:../admin/berandaadmin.php");
        exit();
    }

//delete
if(isset($_GET['id'])){
	$id=$_GET['id'];
	if($id!=""){
	$row=mysqli_fetch_array(mysqli_query($conn, "select * from permintaan where id='$id' "));
	$filefoto=$row['foto'];
	unlink($filefoto);
	$hapus="delete from permintaan where id='$id' ";
	$query=mysqli_query($conn, $hapus);
	if($query){
		?>
		<script>alert("Wishes successfully deleted.");window.location='../pilihanadmin.php';</script>
		<?php
	}else{
		?>
		<script>alert("Failed to delete the wish. Please check your permissions and try again.");window.location='../pilihanadmin.php';</script>
		<?php
	}
}
}
?>
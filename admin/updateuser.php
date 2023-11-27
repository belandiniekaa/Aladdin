
<?php
session_start();
include "../functions/koneksi.php";
if(!cek_role($_SESSION['user'])){
    header("location:../games/carilampu.php");
        exit();
    }

$idupdate = isset($_GET['user_id']) ? $_GET['user_id'] : '';
$row = [];

if (!empty($idupdate)) {
    $result = mysqli_query($conn, "select * from users where user_id='$idupdate'");
    
    if ($result) {
        $row = mysqli_fetch_array($result);
    }
}

if(isset($_POST['update'])){
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $update = mysqli_query($conn, "update users set username='$username', password='$password', role='$role' WHERE user_id='$idupdate'");
        
    if($update){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['role'] = $role;
        ?>
        <script>alert("User has been updated.");
        document.location='users.php';</script>';
        <?php
    } else {
        ?>
        <script>alert("Failed to update user");
        document.location='users.php?user_id=<?php echo $idupdate;?>';</script>';
        <?php
    }
}

mysqli_close($conn);

?>
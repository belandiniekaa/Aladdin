
<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../login.php");
}

include "koneksi.php";
include "user.php";

if (isset($_POST['insert'])) {
    $role = $_POST['role'];
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    
    if (empty(trim($username)) ||  empty(trim($password))) {
        ?>
        <script>
        alert('Username and password are required.');
        document.location='../admin/users.php';
        </script>
        <?php
    }else{
        if(cek_usn($username)!=0){
            ?>
            <script>alert('Username already exists.');
            document.location='../admin/users.php';
            </script>
            <?php
        }else{
            $password = password_hash($password, PASSWORD_DEFAULT);
            $insert = "insert into users (username, password, role) VALUES ('$username', '$password', '$role')";
            $query=mysqli_query($conn, $insert);
            ?>
            <script>
                alert("User has been successfully added.");
                document.location = '../admin/users.php';
            </script>
            <?php
        }
    }
}

//UPDATE
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $username=$_POST['username'];
    $role=$_POST['role'];
    $sql="update users set username='$username', role='$role' where user_id='$id";
    $query=mysqli_query($conn, $sql);

    if($query){
        ?>
        <script>alert("Data has been successfully added.")</script>
        header("location:../admin/users.php");
        exit();
        <?php
    }
}
?>
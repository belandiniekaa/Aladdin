 <!-- DELETE -->
 <?php
    if(isset($_GET['username'])){
        $username=$_GET['username'];
        if($username!=''){
            $row=mysqli_fetch_array(mysqli_query($conn, "select * from users where username='$username'"));
            
            $query=mysqli_query($conn, "delete from users where username='$username'");
            if($query){
                echo "<script>alert('The user has been successfully deleted.')</script>";
                    echo "<script>location.reload();</script>";
                    header("location:../admin/users.php");
                    exit();
            }
        }
    }
    ?>
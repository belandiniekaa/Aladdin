<?php
include "../config/koneksi.php";

$userUpdate=isset($_GET['password'])?$_GET['password']:'';
            if(isset($_POST['update'])){
                $username=$_POST['username'];
                $role=$_POST['role'];

                $result=mysqli_query($conn, "update users set username='$username', role='$role' where password='$userUpdate'");
                if($result){
                    echo "<script>alert('User has been successfully updated.')</script>";
                    echo "<script>location.reload();</script>";
                    header("location:../admin/users.php");
                    exit();
                }

            }
            $row=mysqli_fetch_array(mysqli_query($conn, "select * from users where password='$userUpdate' 
"));
//cek apakah ada yg akan dihapus
if($row!=null && $row['password']!=""){
    ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" >
                <table border="0">
                    <tr>
                        <td class="td1" id="popupID" hidden></td>
                    </tr>
                    <tr>
                        <td class="td1">Username</td>
                        <td class="td1" id="username"><input type="text" name="username" id="username" value="<?php echo $row['username'];?>"></td>
                    </tr>
                    <tr>
                        <td class="td1">Role</td>
                        <td class="td1" id="role">
                            <select name="role" id="role">
                                <option value="User" <?php if($row['role']=='User') echo "selected";?> >User</option>
                                <option value="Admin" <?php if($row['role']=='Admin') echo "selected";?> >Admin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input name="update" type="submit" value="Update"></td>
</tr>
                </table>
        </form>
      <?php 
    }
    ?>
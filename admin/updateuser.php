
<?php
    include "../functions/koneksi.php";

?>
                        <html>
                            <head>
                                <title>update</title>
    </head>
    <body><?php
    $userUpdate=isset($_GET['user_id'])?$_GET['user_id']:'';
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $role=$_POST['role'];

        $result=mysqli_query($conn, "update users set username='$username', role='$role' where user_id='$userUpdate'");
        if($result){
            echo "<script>alert('User has been successfully updated.')</script>";
            echo "<script>location.reload();</script>";
            
            exit();
        }

    }
    $row=mysqli_fetch_array(mysqli_query($conn, "select * from users where user_id='$userUpdate' 
    "));
    
    if($row!=null && $row['user_id']!=""){
                        ?>
                        <div id="popup" class="popup" style="display: none;">
        <form name="update" action="updateuser.php" method="post" >
            <div class="judul">
                Edit User
            </div>
            <input name="id" type="hidden" value="<?php echo $user['user_id'];?>">
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1">Username</td>
                        <td class="td1" id="username"><input type="text" name="username" id="username" value="<?php echo $user['username'];?>"></td>
                    </tr>
                    <tr>
                        <td class="td1">Role</td>
                        <td class="td1" id="role">
                            <select name="role" id="role">
                                <option value="User" <?php if($user['role']=='User') echo "selected";?> >User</option>
                                <option value="Admin" <?php if($user['role']=='Admin') echo "selected";?> >Admin</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button name="update" type="submit">Save</button>
                <button type="button" onclick="closePopup()">Cancel</button>
            </div>
        </form>
    </div>
    <?php
    }

    ?>
    </body>
    </html>

<?php 
include "../functions/koneksi.php";
$user_id = $_GET['user_id'];
$read ="SELECT * FROM users WHERE user_id = '$user_id'";
$query = mysqli_query($conn, $read);
$row = mysqli_fetch_array($query);
if(isset($_POST['update'])){
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $sql = "UPDATE users SET user_id='$user_id', username='$username', role='$role' WHERE user_id='$user_id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        ?>
        <script>
            alert("Anda berhasil mengupdate data");
            document.location='users.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Anda gagal mengupdate data");
            document.location='users.php';
        </script>
        <?php
    }
}
if($row['user_id']!="") {
?>

<html>
    <body>
<form name="update"  action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="formPopup" enctype="multipart/form-data">
           
<div class="judul">
    Edit User
</div>
<input name="user_id" type="hidden" id="popupID" value="<?php echo $row['user_id']; ?>">
<div class="isi">
    <table border="0">
        <tr>
            <td class="td1">Username</td>
            <td class="td1" id="username"><input type="text" name="username" id="username" value="<?php echo $row['username']; ?>"></td>
        </tr>
        <tr>
            <td class="td1">Role</td>
            <td class="td1" id="role">
                <select name="role" id="role">
                    <option value="Admin" <?php echo ($row['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="User" <?php echo ($row['role'] == 'User') ? 'selected' : ''; ?>>User</option>
                </select>
            </td>
        </tr>
    </table>
    <button name="update" type="submit">Save</button>
    <a href="users.php"><button type="button" >Cancel</button></a>
</div>
</form>
</body>
</html>
<?php
}?>
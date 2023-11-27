<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../login.php");
}

include "../functions/koneksi.php";
include "../functions/user.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aladin&family=Alata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="editpilihan.css">
    <style>
        .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            box-align: center;
            width: 100%;
            height: 70px;
            background-color: #0c133f;
        }

        .isinavbar {
            color: white;
            display: flex;
            padding: 0px 15px 0px 15px;
        }

        a {
            color: white;
            font-weight: 900;
            font-size: 25px;
            text-decoration: none;
        }

        a:hover {
            color: #f4a763;
        }

        .disini {
            color: #f4a763;
        }

        @media only screen and (max-width: 900px) {
            .navbar, a, a:hover, .disini {
                width: 100%;
            }
        }

        body {
            background-color: #0c133f;
            background-image: url('../img/Untitled50_20231114055535.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            font-family: alata;
        }

        .table {
            margin-top: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 70px 60px 70px 60px;
            text-align: center;
            font-size: 20px;
            color: #0c133f;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .th {
            background-color: #f4a763;
            font-size: 26px;
        }

        .td {
            border-bottom: 2px solid #3e3092;
            font-size: 21px;
            background-color: #f2cc81;
            color: #3e3092;
        }

        .no {
            width: 150px;
        }

        .username {
            width: 300px;
            text-align: left;
        }

        .role {
            width: 300px;
        }

        .ubah {
            width: 150px;
        }

        .judulnya {
            height: 50px;
        }

        .edit {
            width: 30px;
        }

        .isi {
            height: 65px;
        }

        img {
            cursor: pointer;
        }

        button {
            background-color: #0c133f;
            color: #f2cc81;
            border-radius: 10%;
            padding: 5px 15px 5px 15px;
            margin: 20px 15px 20px 15px;
        }

        .popup {
            font-size: 17px;
            width: 427px;
            height: 240px;
            background-color: #f2cc81;
            border: #0c133f 3px solid;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .td1 {
            padding: 5px 10px 5px 10px;
        }

        input {
            text-decoration: none;
            border: white;
            height: 20px;
            width: 270px;
        }

        .judul {
            background-color: #f4a763;
            font-size: 20px;
            font-weight: 600;
            border-bottom: #0c133f 3px solid;
            padding: 0px 10px 0px 10px;
            width: 407px;
        }

        .close-btn {
            cursor: pointer;
            font-size: 20px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .tambah{
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: 600;
        }
    </style>
    <title>Users</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a href="berandaadmin.php">Home</a>
        </div>
        <div class="isinavbar">
            <a href="storyadmin.php">Story</a>
        </div>
        <div class="isinavbar">
            <a class="disini">Users</a>
        </div>
        <div class="isinavbar">
            <a href="pilihanadmin.php">Wishes</a>
        </div>
        <div class="isinavbar">
            <a href="aboutusadmin.php">About Us</a>
        </div>
    </div>
    
    <div onclick="tambahPopup()" class="tambah">
        <br>Add Users
    </div>
    <table border="0" class="table">
        <tr>
            <th class="th no judulnya">No</th>
            <th class="th username judulnya">Username</th>
            <th class="th role judulnya">Role</th>
            <th colspan="2" class="th ubah judulnya"></th>
        </tr>

        <?php
        $result=mysqli_query($conn, "select * from users");
        $count=1;
        
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                ?>

        <tr>
            <td class='td no isi'><?php echo $count;?></td>
            <td class='td username isi'><?php echo $row['username'];?></td>
            <td class='td role isi'><?php echo $row['role'];?></td>
            <td class='td'>
                <img src='../img/edit (1).png' alt='' class='edit' onclick='editPopup()'>
            </td>
            <td class='td'><a href='hapusUser.php?user_id=<?php echo $row['user_id'];?>'><img src='../img/trash (1).png' alt='' class='edit' ></a></td>
        </tr><?php
        $count=$count+1;
            }
        }
    
        ?>
    </table>

    <!-- UPDATE -->
    <?php
    
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
        <form name="update" action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="formPopup">
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

    <div id="popup1" class="popup" style="display: none;">
        <form name="insert" action="../functions/insertUser.php" method="post" id="formPopup1">
            <div class="judul">
                Add User
            </div>
            
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1" id="popupContent1">Username</td>
                        <td class="td1" id="username"><input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td class="td1">Password</td>
                        <td class="td1"><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td class="td1">Role</td>
                        <td class="td1" id="role">
                            <select name="role" id="role">
                                <option value="Admin" >Admin</option>
                                <option value="User" >User</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button name="insert" type="submit">Save</button>
                <button type="button" onclick="closePopup1()">Cancel</button>
            </div>
        </form>
    </div>
    <script>
        function editPopup(id) {
            document.getElementById('popupID').innerText = id;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <script>
        function tambahPopup() {
            document.getElementById('popup1').style.display = 'flex';
        }

        function closePopup1() {
            document.getElementById('popup1').style.display = 'none';
        }
    </script>
</body>

</html>

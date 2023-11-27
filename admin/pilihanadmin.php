<?php 
session_start();
include "../functions/koneksi.php";
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
        .navbar{
            display: flex;
            align-items: center;
            justify-content: center;
            box-align: center;
            width: 100%;
            height: 70px;
            background-color: #0c133f;
        }

        .isinavbar{
            color: white;
            display: flex;
            padding: 0px 15px 0px 15px;
        }

        a{
            color: white;
            font-weight: 900;
            font-size: 25px;
            text-decoration: none;
        }

        a:hover{
            color: #f4a763;
        }

        .disini{
            color: #f4a763;
        }

        @media only screen and (max-width: 900px){
            .navbar, a, a:hover, .disini{
                width:100%;
            }
        }

        body{
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

        img{
            cursor: pointer;
        }

        .table{
            margin-top: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 70px, 60px, 70px, 60px;
            text-align: center;
            font-size: 20px;
            color: #0c133f;
            border-collapse: collapse;
            border-spacing: 0;
        }
        
        .gambar{
            width: 180px;
            height: 100px;
            border-radius: 20px;
            padding: 10px;
        }

        .th{
            background-color: #f4a763;
            font-size: 26px;
        }
        
        .td{
            border-bottom: 2px solid #3e3092;
            font-size: 21px;
            background-color: #f2cc81;
            color: #3e3092;
        }

        .id{
            width: 150px;
        }

        .untukgambar{
            width: 300px;
        }
        .name{
            width: 300px;
        }

        .ubah{
            width: 150px;
        }

        .judulpilihan{
            height: 50px;
        }

        .editpilihan{
            width: 30px;
        }

        .isi{
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
    <title>Wishes</title>
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
            <a href="users.php">Users</a>
        </div>
        <div class="isinavbar">
            <a class="disini">Wishes</a>
        </div>
        <div class="isinavbar">
            <a href="aboutusadmin.php">About Us</a>
        </div>
    </div>
    <div onclick="tambahPopup()" class="tambah">
        <br>Add Wishes</div>
    <table border="0" class="table">
        <tr>
            <th class="th id judulpilihan">ID</th>
            <th class="th untukgambar judulpilihan"></th>
            <th class="th name judulpilihan">Name</th>
            <th colspan="2" class="th ubah judulpilihan"></th>
        </tr>
        <?php
        $result=mysqli_query($conn, "select * from permintaan");
        
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo "
        <tr>
            <td class='td id isi'>$row[id]</td>
            <td class='td untukgambar isi'><img src='$row[foto]' alt='' class='gambar'></td>
            <td class='td name isi'>$row[nama]</td>
            <td class='td'><img src='../img/edit (1).png' alt='' class='editpilihan' onclick='editPopup('1111')'></td>
            <td class='td'><a href='pilihanadmin.php'><img src='../img/trash (1).png' alt='' class='editpilihan'></a></td>
        </tr>";
            }
        }
        ?>
        
    </table>
    <!-- UPDATE -->
    <?php
    $userUpdate=isset($_GET['id'])?$_GET['id']:'';
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $nama=$_POST['nama'];

        if($_FILES['foto']['error']===UPLOAD_ERR_OK){
            $foto=$_FILES['foto']['name'];
            $upload='../img/'.$foto;

            if(move_uploaded_file($_FILES['foto']['tmp_name'], $upload)){
                $update="update permintaan set nama='$nama', foto='$foto' where id='$id'";
                $query=mysqli_query($conn, $update);

                if($query){
                    echo "<script>alert('Wish has been successfully updated.')</script>";
                    echo "<script>location.reload();</script>";
                    header("location:pilihanadmin.php");
                    exit();
                }else{
                    echo "<script>alert('Failed to update wish.')</script>";
                    echo "<script>location.reload();</script>";
                    header("location:pilihanadmin.php");
                    exit();
                }
            }else{
                echo "<script>alert('Failed to upload image.')</script>";
                echo "<script>location.reload();</script>";
                header("location:pilihanadmin.php");
                exit();
            }
        }else{
            $update="update permintaan set nama='$nama' where id='$id'";
            $query=mysqli_query($conn, $update);

            if($query){
                echo "<script>alert('Wish has been successfully updated.')</script>";
                echo "<script>location.reload();</script>";
                header("location:pilihanadmin.php");
                exit();
            }else{
                echo "<script>alert('Failed to update wish.')</script>";
                echo "<script>location.reload();</script>";
                header("location:pilihanadmin.php");
                exit();
            }
        }
    }
    ?>
    <div id="popup" class="popup" style="display: none;">
        <form action="pilihanadmin.php" id="formPopup">
            <div class="judul">
                Edit Wishes
            </div>
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1"  id="popupID">ID</td>
                        <td class="td1"><input name="id" value="<?php echo $row['id'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td class="td1">Picture</td>
                        <td class="td1" id="picture">
                            <img src="<?php echo "../img/".$row['foto'];?>"><input type="file" name="foto" id="file" accept="image/png, image/jpeg, image/svg+xml"></td>
                    </tr>
                    <tr>
                        <td class="td1">Name</td>
                        <td class="td1" id="name"><input name="nama" type="text" value="<?php echo $row['nama'];?>"></td>
                    </tr>
                </table>
                <input name="update" type="submit">Save
                <button type="button" onclick="closePopup()">Cancel</button>
            </div>
        </form>
    </div>

    <!-- INSERT -->
    <?php
    if(isset($_POST['insert'])){
        $id=$_POST['id'];
        $nama=$_POST['nama'];

        if(isset($_FILES['foto']) && $_FILES['foto']['error']===UPLOAD_ERR_OK){
            $foto=$_FILES['foto']['name'];
            $upload=$_FILES['foto']['tmp_name']

            if(move_uploaded_file($_FILES['foto']['tmp_name'], $upload)){
                $insert="insert into permintaan (id, nama, foto) values('$id','$nama','$foto')";
                $query=mysqli_query($conn, $insert);

                if($query){
                    echo "<script>alert('Wish has been successfully added.')</script>";
                }else{
                    echo "<script>alert('Failed to add wish.')</script>";
                }
            }else{
                echo "<script>alert('Failed to upload image.')</script>";
                
            }
        }else{
            echo "<script>alert('Failed to upload image.')</script>";
            
            
        }
    }
    ?>
    <div id="popup1" class="popup" style="display: none;">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" id="formPopup1">
            <div class="judul">
                Add Wishes
            </div>
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1" id="popupContent1">ID</td>
                        <td class="td1" id="id"><input type="text" name="id" id="id" placeholder="A1" maxlength=2 pattern="[A-Z][0-9]"></td>
                    </tr>
                    <tr>
                        <td class="td1">Picture</td>
                        <td class="td1" id="picture"><input type="file" name="foto" accept="image/jpeg, image/png, image/svg+xml" id="file"></td>
                    </tr>
                    <tr>
                        <td class="td1">Name</td>
                        <td class="td1" id="name"><input name="nama" type="text"></td>
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

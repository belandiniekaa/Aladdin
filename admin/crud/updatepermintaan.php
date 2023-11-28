<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../../login.php");
    if(cek_role($_SESSION['user'])){
        header("location:../../games/carilampu.php");
        exit();
    }else{
        header("location:../admin/berandaadmin.php");
        exit();
    }
}
include "../../functions/koneksi.php";
include "../../functions/user.php";

$id=isset($_GET['id'])?$_GET['id']:'';
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $nama=$_POST['nama'];

    $row = mysqli_fetch_array(mysqli_query($conn, "select * from permintaan where id='$id' "));
    
    if($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $uploadDir = '../../img';
        $uploadPath = $uploadDir . $foto;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadPath)) {
            if(!empty($row['foto'])){
                unlink($uploadDir. $row['foto']);
            }
            $update="update permintaan set nama='$nama', foto='$foto' where id='$id' ";
        } else {
            ?>
            <script>alert("Failed to upload file.");
            header("location:../pilihanadmin.php");
            </script>
            <?php
        }
    }else{
        //Jika foto tidak diubah
        $update = "update permintaan set nama='$nama' where id='$id'";
    }

    $query=mysqli_query($conn, $update);
    if($query){
        ?>
        <script>
            alert("The wish updated successfully.");
            document.location='../pilihanadmin.php';
        </script>
        <?php
    }
}
if(isset($_POST['cancel'])){
    header("location:../pilihanadmin.php");
}

$row=mysqli_fetch_array(mysqli_query($conn, "select * from permintaan where id='$id' "));

if($row!=null && $row['id']!=""){
    ?>

    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aladin&family=Alata&display=swap" rel="stylesheet">
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

        body {
            background-color: #0c133f;
            background-image: url('../../img/Untitled50_20231114055535.png');
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
            height: 195px;
            background-color: #f2cc81;
            width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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
            width: 480px;
            margin-top: 70px;
            text-align: center;
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

        .luar{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 400px;
        }
    </style>
    <script>
        function confirmCancel() {
            return confirm("Are you sure you want to cancel? Any unsaved changes will be lost.");
        }
    </script>
    <title>Wishes</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a href="../../berandaadmin.php">Home</a>
        </div>
        <div class="isinavbar">
            <a href="../../storyadmin.php">Story</a>
        </div>
        <div class="isinavbar">
            <a href="../../users.php">Users</a>
        </div>
        <div class="isinavbar">
            <a class="disini">Wishes</a>
        </div>
        <div class="isinavbar">
            <a href="../../aboutusadmin.php">About Us</a>
        </div>
    </div>
    
    <div class="luar">
   
        <form method="post" action="updatepermintaan.php" id="formPopup" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    
            <div class="judul">
                Edit Wishes
            </div>
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1">Picture</td>
                        <td class="td1" id="picture"><input type="file" name="foto" id="file" accept="image/png, image/jpeg, image/svg+xml"></td>
                    </tr>
                    <tr>
                        <td class="td1">Name</td>
                        <td class="td1" id="name"><input name="nama" type="text" value="<?php echo $row['nama'];?>" required></td>
                    </tr>
                    <tr>
                        <td>
                            <button name="update" type="submit">Save</button>
                        </td>
                        <td>
                            <button name="cancel" type="submit" onclick="return confirmCancel();">Cancel</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        
    </div>
</div>
</body>
</html>
<?php
    }
    ?>

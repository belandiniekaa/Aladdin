<?php
include "../functions/koneksi.php";
$id = $_GET['id'];
$read ="SELECT * FROM permintaan WHERE id = '$id'";
$query = mysqli_query($conn, $read);
$row = mysqli_fetch_array($query);
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $uploadDir = '../img/';
        $uploadPath = $uploadDir . $foto;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadPath)) {
            $update = "update permintaan set id='$id', nama='$nama', foto='$foto' where id='$id'";
            $query = mysqli_query($conn, $sql);
        } else {
            ?>
            <script>
                alert("Failed to upload file.");
                window.location = 'pilihanadmin.php';
                exit();
            </script>
            <?php
        }
    }
    if($query){
            ?>
            <script>
                alert("Anda berhasil mengupdate data");
                document.location='pilihanadmin.php';
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Anda gagal mengupdate data");
                document.location='pilihanadmin.php';
            </script>
            <?php
        }
    }

    ?>
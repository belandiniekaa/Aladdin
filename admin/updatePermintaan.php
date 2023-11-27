<?php
include "../functions/koneksi.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

$select ="select * from permintaan where id = '$id'";
$query = mysqli_query($conn, $select);
$row = mysqli_fetch_array($query);
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $uploadDir = '../img/';
        $uploadPath = $uploadDir . $foto;

        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadPath)) {
            $update = "update permintaan set nama='$nama', foto='$foto' where id='$id'";
            
        } else {
            ?>
            <script>
                alert("Failed to upload file.");
                window.location = 'pilihanadmin.php';
                exit();
            </script>
            <?php
        }
    } else {
        $update = "update permintaan set nama='$nama' where id='$id'";
        
    }

    
    $query = mysqli_query($conn, $update);
    if($query){
        ?>
        <script>
            alert("Wishes has been updated.");
            document.location='pilihanadmin.php';
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Failed to update data.");
            document.location='pilihanadmin.php';
        </script>
        <?php
    }
}?>
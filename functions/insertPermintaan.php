<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
include "koneksi.php";


if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];

    $query=mysqli_query($conn, 'select max(id) from permintaan');
    $data=mysqli_fetch_array($query);

    if($data['max(id)']==""){
        $id='W1';
    }else{
        $id=$data['max(id)'];

        $urutan=(int) substr($id, 1, 2);
        $urutan++;
        $id='W'.$urutan;
    }
    // Periksa error pengunggahan file
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $uploadDir = '../img/';
        $uploadPath = $uploadDir . $foto;

        // Pindahkan file ke direktori yang diinginkan
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadPath)) {
            $insert = "insert into permintaan (id, nama, foto) VALUES ('$id', '$nama', '$foto')";
            
            $query = mysqli_query($conn, $insert);

            if ($query) {
                ?>
                <script>
                    alert("Wishes successfully added.");
                    document.location = '../admin/pilihanadmin.php';
                </script>
                <?php
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo "Failed to upload file.";
        }
    } 
}
?>
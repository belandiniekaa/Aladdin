<?php
session_start();

include "../../functions/koneksi.php";


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
        $uploadDir = '../../img/';
        $uploadPath = $uploadDir . $foto;

        // Pindahkan file ke direktori yang diinginkan
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $uploadPath)) {
            $insert = "insert into permintaan (id, nama, foto) VALUES ('$id', '$nama', '$foto')";
            
            $query = mysqli_query($conn, $insert);

            if ($query) {
                ?>
                <script>
                    alert("The wish has been added successfully.");
                    document.location = '../pilihanadmin.php';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Failed to add wish.");
                    document.location = '../pilihanadmin.php';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Failed to upload file.");
                document.location = 'insertPermintaan.php';
            </script>
            <?php
        }
    } 
}
?>
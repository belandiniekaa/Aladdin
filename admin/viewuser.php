<?php
include "../functions/koneksi.php";
?>
<div class="tambah">
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
                echo "
        <tr>
            <td class='td no isi'>$count</td>
            <td class='td username isi'>$row[username]</td>
            <td class='td role isi'>$row[role]</td>
            <td class='td'>
            <a href='updateuser.php?user_id=$row[user_id]'> <img src='../img/edit (1).png' alt='' class='edit' onclick='editPopup()' width=10></a>
            </td>
            <td class='td'><a href='hapusUser.php?user_id=$row[user_id]'><img src='../img/trash (1).png' alt='' class='edit' width=10></td>
        </tr>";
        $count=$count+1;
            }
        }
        ?>
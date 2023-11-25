<?php
function tambahUser($conn){
    if(isset($_POST['insert'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=$_POST['role'];

        $result=mysqli_query($conn, "insert into users (username, password, role) values('$username','$password','$role')");
        if($result){
            echo "<script>alert('User successfully added.')</script>";
            echo "<script>location.reload();</script>";
            exit();
        }else{
            echo "<script>alert('Failed to add user. Username already exist.')</script>";
            echo "<script>location.reload();</script>";
        }
    }
}

function deleteUser($conn){
    if(isset($_GET['username'])){
        $username=$_GET['username'];
        if($username!=''){
            $row=mysqli_fetch_array(mysqli_query($conn, "select * from users where username='$username'"));
            $hapus="delete from users where username='$username'";
            $query=mysqli_query($conn, $hapus);
            if($query){
                echo "<script>alert('The user has been successfully deleted.')</script>";
            }
        }
    }
}

function viewUser($conn){
    $result=mysqli_query($conn, "select * from users");
    $count=1;
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "
    <tr>
        <td class='td no isi'>$count</td>
        <td class='td username isi'>$row[username]</td>
        <td class='td role isi'>$row[role]</td>
        <td class='td'><img src='../img/edit (1).png' alt='' class='edit' onclick='editPopup()'></td>
        <td class='td'><img src='../img/trash (1).png' alt='' class='edit'></td>
    </tr>";
    $count=$count+1;
        }
    }
}
?>
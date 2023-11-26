<?php

//mendaftarkan user
function register_user($username, $password){
    global $conn;

    //mencegah sql injection
    $username=escape($username);
    $password=escape($password);

    //enkripsi
    $password=password_hash($password, PASSWORD_DEFAULT);

    $query="insert into users (username, password) values('$username','$password')";
    if(mysqli_query($conn, $query)){
        return true;
    }else{
        
        return false;
    }
}

//cek username sudah ada atau belum
function cek_usn($username){
    global $conn;
    $username=escape($username);

    $query="select * from users where username='$username'";

    if($result=mysqli_query($conn, $query)) return mysqli_num_rows($result);
}

//login
function cek_data($username, $password){
global $conn;

$username=escape($username);
$password=escape($password);

$query="select password from users where username='$username'";
$result=mysqli_query($conn, $query);
$hash=mysqli_fetch_assoc($result)['password'];

if(password_verify($password, $hash)){
    return true;
    }else{
        return false;
    }
}

//cegah injection (pangkas kode mysqli_real_escape_string => escape)
function escape($data){
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

//games redirect 
function redirect_login($username){
    header("location:../login.php");
}

//cek role
function cek_role($username){
    global $conn;
    $username=escape($username);

    $query="select role from users where username='$username'";

    $result=mysqli_query($conn, $query);
    $role=mysqli_fetch_assoc($result)['role'];
    
    if($role=='Admin'){
        return true;
    }else{
        return false;
    }
}
?>
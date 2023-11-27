<?php
session_start();
include "koneksi.php";
include "user.php";

if (isset($_POST['insert'])) {
    $role = $_POST['role'];
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);

    // Validate and escape inputs
    if (empty(trim($username)) || empty(trim($password))) {
        echo "<script>alert('Username and password are required.')</script>";
        echo "<script>document.location='../users.php';</script>";
        exit();
    }

    // Enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $query)) {
        if (cek_usn($username) == 0) {
            if (register_user($username, $password)) {
                echo "<script>alert('Account successfully added.')</script>";
                echo "<script>document.location='../users.php';</script>";
                exit();
            } else {
                echo "<script>alert('Failed to register this account.')</script>";
            }
        } else {
            echo "<script>alert('Username already exists.')</script>";
        }
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
    }
}
?>

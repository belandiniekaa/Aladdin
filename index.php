<?php
session_start();
include "functions/koneksi.php";
include "functions/user.php";
if(isset($_SESSION['login'])){
    $username=$_SESSION['username'];
    if(cek_role($username)){
        $_SESSION['role']='Admin';
        header("location:admin/berandaadmin.php");
    }else{
        $_SESSION['role']='User';
        header("location:games/carilampu.php");
    }
}
    
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
            background-image: url('img/Untitled50_20231114055535.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            font-family: alata;
        }

        .beranda{
            height: 550px;
            background-image: url('img/Picsart_23-11-22_15-34-41-816.png');
            background-position-x: center;
            background-size: 60%;
            background-repeat: no-repeat; 
            justify-content: center;
        }

        img{
            width: 800px;
        }

        .join{
            width: 70px;
            height: 40px;
            text-align: center;
            justify-content: center;
            background-color: #f2cc81;
            border-radius: 20px;
            margin-top: 25px;
            color: black;
            font-family: alata;
            font-size: 27px;
            font-weight: 700;
        }

        .join:hover{
            background-color: white;
        }
        p{
            font-size: 20px;
            color: white;
        }
        .text{
            padding: 135px 0px 0px 350px ;
        }
    </style>
    <title>Beranda</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a class="disini">Home</a>
        </div>
        <div class="isinavbar">
            <a href="story.php">Story</a>
        </div>
        <div class="isinavbar">
            <a href="aboutus.php">About Us</a>
        </div>
    </div>
    <div class="beranda">
        <div class="text">
            <p>
                Embark on a magical <br> journey and discover <br> a whole new world! <br> Ready to join my adventure?
            </p>
            <div class="join">
                <a href="login.php">Join</a>
            </div>
        </div>
    </div>
</body>
</html>
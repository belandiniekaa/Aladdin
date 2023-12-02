<?php
session_start();

include "../functions/koneksi.php";

if(!isset($_SESSION['login'])){
    header('location:../index.php');
    exit;
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
    <style>
        .navbar{
            display: flex;
            align-items: center;
            justify-content: center;
            box-align: center;
            width: 100%;
            height: 70px;
            background-color: #0c133f;
            font-weight: 900;
            font-size: 25px;
        }

        .isinavbar{
            color: white;
            display: flex;
            padding: 0px 15px 0px 15px;
        }


        @media only screen and (max-width: 900px){
            .navbar{
                width:100%;
            }
        }

        body{
            background-image: url('../img/Empty-Backdrop-from-Aladdin-disney-crossover-29212922-1099-648.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
            font-family: alata;
        }

        img{
            width: 60%;
        }
        .lampu{
            position: fixed;
            bottom: 10%;
            right: 0%;
        }

        .aladin{
            position: fixed;
            bottom: 2%;
            left: 15%;
        }

        .lampu1{
            position: fixed;
            bottom: 52%;
            right: 3%;
        }

        .aladin1{
            position: fixed;
            bottom: 48%;
            left: 17%;
        }
        
        span{
            color: #0c133f;
            font-size: 15px;
            font-weight: 600;
        }
        .text1{
            position: fixed;
            bottom: 74%;
            right: 24%;
            text-align: justify;
        }

        a{
            color: #1b2da2;
            text-decoration: none;
        }

        .text2{
            position: fixed;
            bottom: 74%;
            left: 23%;
        }
    </style>
    <title>Permintaan 1</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <h3>Home</h3>
        </div>
        <div class="isinavbar">
            <h3>Story</h3>
        </div>
        <div class="isinavbar">
            <h3>About Us</h3>
        </div>
    </div>
    <div>
        <span class="aladin"><img src="../img/Group 11.png" alt=""></span>
        <span class="lampu"><img src="../img/Group 12.png" alt=""></span>
        <span class="lampu1"><img src="../img/Group 1.png" alt="">
            <span class="text1">I'm right here for <br> your wish fulfillment.  <br>Three wishes, to be exact.  <br>What's your first wish?</span>
        </span>
        <span class="aladin1"><img src="../img/Group 2.png" alt="">
            <span class="text2">I want to get out of <a href="permintaan1-1.php">here.</a></span>
        </span>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
    </div>
</body>
</html>
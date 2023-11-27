<?php
session_start();
include "../functions/koneksi.php";
include "../functions/user.php";


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
            background-image: url('../img/darkcave.jpg');
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

        .text{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 70px;
            padding: 20px;
            color: white;
            width: 800px;
            height: 200px;
            background-color: #0c133f94;
            border-radius: 20px;
            font-size: 20px;
        }
        img{
            height: 500px;
        }

    </style>
    <title>Finish</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a>Home</a>
        </div>
        <div class="isinavbar">
            <a>Story</a>
        </div>
        <div class="isinavbar">
            <a>About Us</a>
        </div>
    </div>
    <div class="text">
        <h1>You are Greedy!</h1>
        <h3>You will replace the genie in the magic lamp forever</h3>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hartaImage = document.getElementById('hartaImage');

            hartaImage.addEventListener('click', function() {
                alert("Cari yang bisa membantu kamu keluar dari gua ini!");
            });
        });
    </script>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
</body>
</html>
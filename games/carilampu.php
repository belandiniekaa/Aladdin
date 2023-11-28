<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../login.php");
    if(!cek_role($_SESSION['user'])){
        header("location:../games/carilampu.php");
            exit();
        }else{
            header("location:../admin/berandaadmin.php");
            exit();
        }
}
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

        .text{
            margin-top: 70px;
            padding: 20px;
            color: white;
            width: 800px;
            height: 200px;
            background-color: #f4a763da;
            border-radius: 20px;
            font-size: 20px;
        }
        img{
            width: 90px;
        }
        .lampu{
            position: fixed;
            bottom: 18%;
            right: 20%;
        }
        .harta{
            position: fixed;
            bottom: 28%;
            left: 5%;
        }
    </style>
    <title>Cari Lampu</title>
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
    <div class="text">
        In the center of the golden cave, Aladdin finds himself surrounded by the enchanting light of the treasure. The air was filled with impatience as he searched for a way out of the dazzling maze of wealth. Each step echoed in the cave and the shimmering walls seemed to hide unspeakable secrets. As Aladdin travels through the golden maze, he comes across an ancient treasure that hints at the path to freedom. Find images you can click to reveal the secrets that lead freedom.
    </div>
    <div class="lampu">
        <a href="permintaan1.php"><img src="../img/lampu-removebg-preview.png" alt=""></a> 
    </div>
    <img src="../img/harta-removebg-preview.png" alt="" class="harta" id="hartaImage">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hartaImage = document.getElementById('hartaImage');

            hartaImage.addEventListener('click', function() {
                alert("Look for items that can help you get out of this cave!");
            });
        });
    </script>
    <br><br><br><br><br><br><br><br>
</body>
</html>
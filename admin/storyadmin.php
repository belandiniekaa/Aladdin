<?php
session_start();
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
            background-image: url('../img/bgaladdin.jpeg');
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

        .kotakstory{  
            text-align: center; 
            margin-top: 70px;
            width: 1000px;
            height: 370px;
            background-color: #3f309290;
            border-radius: 20px;
        }

        .judulstory{
            font-size: 55px;
            font-weight: 500;
            font-family: aladin;
            color: #f5b57d;
            margin: 20px;
        }

        .story{
            font-size: 22px;
            text-align: justify;
            font-family: alata;
            color: white;
            padding: 0px 40px 0px 40px;
        }

        img{
            width: 20px;
        }

        button{
            margin-top: 10px;
            color: #0c133f;
            font-size: 20px;
            font-weight: 500;
            font-family: alata;
        }

        @media only screen and (max-width: 900px){
            body, .kotakstory, .story, .judulstory{
                width:100%;
                height: 100%;
            }
        }
    </style>
    <title>Story</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a href="berandaadmin.php">Home</a>
        </div>
        <div class="isinavbar">
            <a class="disini">Story</a>
        </div>
        <div class="isinavbar">
            <a href="users.php">Users</a>
        </div>
        <div class="isinavbar">
            <a href="pilihanadmin.php">Wishes</a>
        </div>
        <div class="isinavbar">
            <a href="aboutusadmin.php">About Us</a>
        </div>
    </div>
    <div class="kotakstory">
        <div class="judulstory">
            Here's The Story
        </div>
        <div class="story" >
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Aladdin, a poor young man in a fictional Middle Eastern city, Agrabah, is recruited by a sorcerer to retrieve a magical oil lamp from a dangerous cave. After finding the lamp, Aladdin releases a powerful genie who can grant three wishes. Aladdin uses his wishes to improve his social and financial status, aiming to win the heart of Princess Jasmine. However, an antagonist, a sorcerer or Jafar, seeks to control the lamp's power, leading to conflicts and deceptions. In the end, Aladdin outsmarts the villain, sets the genie free, and marries Princess Jasmine, living a prosperous life.
        </div>
    </div>
</body>
</html>
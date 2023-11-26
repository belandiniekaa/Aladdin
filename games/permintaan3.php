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
    <style>
        .navbar {
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

        .isinavbar {
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
            background-image: url('../img/luargua.jpg');
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

        table{
            margin-top: 70px;
            display: flex;
            text-align: center;
            justify-content: center;
        }

        .jinfree{
            position: fixed;
            bottom: 4%;
            right: 10%;
        }

        img{
            width: 60%;
        }

        .yes{
            display: flex;
            text-align: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            color: #0c133f;
            align-items: center;
            width: 90px;
            height: 45px;
            background-color: #f4a763;
            border-radius: 20px;
            position: fixed;
            top: 45%;
            left: 42%;
        }

        .yes:hover, .no:hover, a:hover{
            color: #f4a763;
            background-color: #0c133f;
        }
        .no{
            display: flex;
            text-align: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 600;
            color: #0c133f;
            align-items: center;
            width: 90px;
            height: 45px;
            background-color: #f4a763;
            border-radius: 20px;
            position: fixed;
            bottom: 37%;
            left: 42%;
        }

        a{
            color: #0c133f;
            text-decoration: none;
        }

        .pertanyaan{
            position: fixed;
            top: 28%;
            left: 38.5%;
            color: #0c133f;
            font-size: 18px;
            font-weight: 600;
        }
        .kotaktanya{
            position: fixed;
            bottom: 43%;
            right: 24%;
        }

        @media only screen and (max-width: 900px){
            table,  .pertanyaan, .yesno, .jinfree, img, body{
                width:100%;
            }
        }

    </style>
    <title>Free</title>
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
    <div class="free">
        <div class="kotaktanya"><img src="../img/Group 1.png" alt=""><div class="pertanyaan">
            Do you want to set me free?
        </div></div>
        <div class="jinfree"><img src="../img/Group 13.png" alt=""></div>
        <div class="yes"><a href="permintaan3-yes.php">Yes</a></div>
        <div class="no"><a href="permintaan3-no.php">No</a></div>
        
    </div>
    <br><br><br><br> <br><br>
    <br><br><br><br> <br><br>
    <br><br><br><br> <br><br>
</body>
</html>
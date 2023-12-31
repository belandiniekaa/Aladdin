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
        
        table{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-top: 120px;
        }

        .nama{
            color: #f4a763;
            font-family: aladin;
            font-size: 25px;
        }
        
        .tugas{
            color: white;
            font-family: alata;
            font-size: 22px;
        }

        th{
            padding: 30px;
        }

        img{
            width: 220px;
            border-radius: 50%;
            position: relative;
            bottom: 10%;
        }

        .bulet{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 190px;
            width: 190px;
            border-radius: 50%;
            background-color: #5770c2;
        }
    </style>
    <title>About Us</title>
</head>
<body>
    <div class="navbar">
        <div class="isinavbar">
            <a href="beranda.php">Home</a>
        </div>
        <div class="isinavbar">
            <a href="story.php">Story</a>
        </div>
        <div class="isinavbar">
            <a class="disini">About Us</a>
        </div>
    </div>
    <div>
        <table border="0">
            <tr>
                <th>
                    <div class="bulet">
                        <img src="img/hasna.png" alt="">
                    </div>
                </th>
                <th>
                    <div class="bulet">
                        <img src="img/ebel.png" alt="">
                    </div>
                </th>
                <th>
                    <div class="bulet">
                        <img src="img/regita.png" alt="">
                    </div>
                </th>
            </tr>
            <tr class="nama">
                <td>Hasna Mumtazah</td>
                <td>Eka Belandini</td>
                <td>Regita Maulia</td>
            </tr>
            <tr class="tugas">
                <td>UI/UX Designer</td>
                <td>Frontend Developer</td>
                <td>Backend Developer</td>
            </tr>
        </table>
    </div>
</body>
</html>
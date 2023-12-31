<?php
session_start();

include "../functions/koneksi.php";
include "../functions/user.php";

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
            margin: 0;
            padding: 0;
            font-family: alata;
        }

        table{
            display: flex;
            box-align: center;
            text-align: center;
            justify-content: center;
        }

        .kotakpilihan1{
            display: flex;
            flex-direction: row;
            margin: 30px;
            align-items: center;
            justify-content: center;
            width: 300px;
            height: 150px;
            background-color: #f4a76391;
            border-radius: 20px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s;
            cursor: pointer;
        }

        img{
            width: 300px;
            height: 150px;
            border-radius: 20px;
        }

        .kotakpilihan1.flipped{
            transform: rotateY(180deg);
        }

        .depan{
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            background-color: #f4a76337;
        }

        .belakang{
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            background-color: #3498db;
            transform: rotateY(180deg);
        }


        h1{
            font-family: aladin;
            text-align: center;
        }
        .judul{
            font-family: aladin;
            text-align: center;
            font-size: 35px;
        }

        p{
            text-align: center;
        }

        @media only screen and (max-width: 900px){
            body, .kotakpilihan1, .kotakpilihan1.kotakpilihan1.flipped, .depan, .belakang, h1, p, img, table{
                width:100%;
            }
        }
    </style>
<script>
    let selectedKotakpilihan1 = null;

    function flipkotakpilihan1(kotakpilihan1) {
        if (selectedKotakpilihan1 === null) {
            if (!kotakpilihan1.classList.contains('flipped')) {
                kotakpilihan1.classList.add('flipped');

                selectedKotakpilihan1 = kotakpilihan1;

                setTimeout(function(){
                    window.location.href = 'permintaan3.php';
                }, 5000);
            }
        }
    }
</script>
    
    
    <title>Pilihan</title>
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
        <br>
        <h1 class="judul">Choose your second wish!</h1>
    </div>
    <div>
    <table border="0">
        <tr>
            <?php
            $query="select * from permintaan";
            $sql=mysqli_query($conn, $query);
            $counter=0; //inisialisasi counter

            while($result=mysqli_fetch_assoc($sql)) {
                echo "
                <td>
                    <div class='kotakpilihan1' onclick='flipkotakpilihan1(this)'>
                        <div class='depan'>
                            <h1>$result[nama]</h1>
                        </div>
                        <div class='belakang'>
                            <img src='../img/$result[foto]' alt=''>
                        </div>
                    </div>
                </td>";
                $counter++;

                //kalo udah 3 kolom, buat baris baru
                if($counter % 3 == 0) {
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>
</div>

</body>
</html>
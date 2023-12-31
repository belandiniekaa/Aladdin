<?php
session_start();

include "functions/koneksi.php";
include "functions/user.php";

if(isset($_SESSION['login'])){
    $username=$_SESSION['username'];
    if(cek_role($username)){
        $_SESSION['role']='Admin';
        header("location:admin/berandaadmin.php");
        exit;
    }else{
        $_SESSION['role']='User';
        header("location:games/carilampu.php");
        exit;
    }
}

//validasi
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    //trim =menghilangkan jarak kosong di awal dan akhir string
    if(!empty(trim($username)) && !empty(trim($password))){
        if(cek_usn($username)!=0){

        if(cek_data($username, $password)){
            $_SESSION['login']=true;
            $_SESSION['username']=$username;
            
            if(cek_role($username)){
                $_SESSION['role']='Admin';
                header("location:admin/berandaadmin.php");
                exit;
            }else{
                $_SESSION['role']='User';
                header("location:games/carilampu.php");
                exit;
            }
            
        }else{
            echo "<script>
            alert('Username or password does not match.');
            document.location='login.php';
            </script>";
        }

    }else{
        echo "<script>
            alert('Username not yet registered. Please sign up!');
            document.location='login.php';
            </script>";
    }
}else{
    echo "<script>
    alert('Username and password must be filled in.');
    document.location='login.php';
    </script>";
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
    <style>
        body{
            min-height: 100vh;
            background-image: url('img/luargua.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            font-family: alata;
        }

        .kotaklogin{
            margin-top: 70px;
            align-items: center;
            padding: 20px 55px 55px 55px;
            background-color: #f4a763c5;
            border-radius: 20px;
        }

        .kotakinput{
            border: white;
            height: 50px;
            width: 270px;
            background-color: white;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .kotaksubmit{
            border: white;
            font-family: alata;
            padding: 10px 60px 10px 60px;
            justify-content: center;
            background-color: #0c133f;
            border-radius: 15px;
            margin-top: 25px;
            color: white;
        }
        
        .kotaksubmit:hover{
            background-color: white;
            color: #0c133f;
        }

        .judul{
            color: #0c133f;
            font-weight: 700;
            font-size: 38px;
            font-family: aladin;
            text-align: center;
        }
        
        input{
            padding: 0px 10px 0px 10px;
            color: #0c133f;
            font-family: alata;
            font-size: 18px;
            font-weight: bold;
        }
        
        td, p, a{
            color: #0c133f;
            font-family: alata;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
        }

        td{
            text-align: left;
        }

        .tengah{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        table{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .abu{
            height: 270px;
            position: fixed;
            bottom: 0;
            left: 13%;
        }

        .aladin{
            height: 420px;
            position: fixed;
            bottom: 0;
            right: 14%;
        }

        @media only screen and (max-width: 900px){
            .kotakinput, .kotaksubmit, .tengah, td, p, a, table, .judul{
                width: 100%;
            }
        }
        
        @media only screen and (max-width: 900px){
            .aladin{
                max-width: 40%;
                position: fixed;
                bottom: 0;
                right: 0;
            }
        }
        @media only screen and (max-width: 900px){
            .abu{
                max-width: 40%;
                position: fixed;
                bottom: 0;
                left: 0;
            }
        }
    </style>    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form');
  
            form.addEventListener('submit', function(event) {
                var username = document.querySelector('.kotakinput[type="text"]').value;
                var password = document.querySelector('.kotakinput[type="password"]').value;
  
                if (username === '' && password === '') {
                    alert('Username and Password must be filled in!');
                    event.preventDefault();
                } else if (username === '') {
                    alert('Username must be filled in!');
                    event.preventDefault();
                } else if (password === '') {
                    alert('Password must be filled in!!');
                    event.preventDefault();
                }
            });
        });
    </script>
    <title>Login</title>
</head>
<body>
  <div>
    <div>
      <img src="img/_ABU___Aladdin-removebg-preview.png" alt="" class="abu">
    </div>
      <div class="kotaklogin">
          <div class="judul">Welcome Back!</div>
          <br>
          <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
              <table border="0">
                  <tr>
                      <td>Username</td>
                  </tr>
                  <tr>
                      <td><input name="username" type="text" class="kotakinput"></td>
                  </tr>
                  <tr>
                      <td>Password</td>
                  </tr>
                  <tr>
                      <td><input name="password" type="password" class="kotakinput"></td>
                  </tr>
                  <tr>
                      <td class="tengah" >
                          <input name="login" type="submit" value="Login" class="kotaksubmit submit">
                      </td>
                  </tr>
              </table>
          </form>
          <p style="color: white;">
              Don't have an account yet? <br>
              <a href="register.php">Sign up here</a>
          </p>
      </div>
    <div>
      <img src="img/jernih.png" alt="" class="aladin">
    </div>
  </div>
</body>
</html>
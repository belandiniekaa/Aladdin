<?php
include "koneksi.php";

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
            padding: 20px 55px 18px 55px;
            background-color: #f4a763c5;
            border-radius: 20px;
        }

        .kotakinput{
            border: white;
            height: 45px;
            width: 270px;
            background-color: white;
            border-radius: 15px;
        }

        .kotaksubmit{
            border: white;
            font-family: alata;
            padding: 10px 60px 10px 60px;
            justify-content: center;
            background-color: #0c133f;
            border-radius: 15px;
            margin-top: 18px;
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
            font-size: 17px;
            font-weight: bold;
        }
        
        td, p, a{
            color: #0c133f;
            font-family: alata;
            font-size: 19px;
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
            right: 13%;
        }

        .aladin{
            height: 420px;
            position: fixed;
            bottom: 0;
            left: 14%;
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
                left: 0;
            }
        }
        @media only screen and (max-width: 900px){
            .abu{
                max-width: 40%;
                position: fixed;
                bottom: 0;
                right: 0;
            }
        }
    </style>    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.querySelector('form');
      
                form.addEventListener('submit', function(event) {
                    var username = document.querySelector('.kotakinput[type="text"]').value;
                    var password = document.querySelector('.kotakinput[type="password"]').value;

                    if(typeof errorMessage!=='undefined' && errorMessage!=null){
                        alert(errorMessage);
                        event.preventDefault(); //menghentikan proses submit jk ada kesalahan
                    }else{
                        if (username === '' && password === '') {
                            alert('Username dan Password harus diisi!');
                            event.preventDefault();
                        } else if (username === '') {
                            alert('Username harus diisi!');
                            event.preventDefault();
                        } else if (password === '') {
                            alert('Password harus diisi!');
                            event.preventDefault();
                        }
                    }
                });
            });
        </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var form = document.querySelector('form');
        
                    form.addEventListener('submit', function(event) {
                        var password = document.querySelector('.kotakinput[type="password"]').value;
                        var confirmPassword = document.querySelectorAll('.kotakinput[type="password"]')[1].value;
        
                        if (password !== confirmPassword) {
                            alert('Password dan Confirm Password haruslah sama!');
                            event.preventDefault();
                        }
                    });
                });
            </script>
    <title>Register</title>
</head>
<body>
  <div>
    <div>
        <img src="img/jernih1.png" alt="" class="aladin">
    </div>
      <div class="kotaklogin">
          <div class="judul">Create Account</div>
          <br>
          <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
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
                        <td>Confirm Password</td>
                    </tr>
                    <tr>
                        <td><input name="confirm_password" type="password" class="kotakinput"></td>
                      </tr>
                  <tr>
                      <td class="tengah" >
                          <input name="regist" type="submit" value="Signup" class="kotaksubmit submit">
                      </td>
                  </tr>
              </table>
          </form>
          <p style="color: white;">
              Already have an account?<br>
              <a href="login.html">Sign in here.</a>
          </p>
      </div>
    <div>
      <img src="img/_ABU___Aladdin-removebg-preview1.png" alt="" class="abu">
    </div>
  </div>
</body>
</html>
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
            font-family: alata;
        }
        button{
            background-color: #0c133f;
            color: #f2cc81;
            border-radius: 10%;
            padding: 5px 15px 5px 15px;
            margin: 20px 15px 20px 15px;
        }

        .edit{
            font-size: 17px;
            width: 600px;
            height: 200px;
            background-color: #f2cc81;
            border: #0c133f 3px solid;
        }

        .td1{
            padding: 5px 10px 5px 10px;
        }
        
        input{
            text-decoration: none;
            border: white;
            height: 20px;
            width: 400px;
        }

        .judul{
            background-color: #f4a763;
            font-size: 20px;
            font-weight: 600;
            border-bottom: #0c133f 3px solid;
            padding: 5px 10px 5px 10px;
        }
    </style>
    <title>Hapus</title>
</head>
<body>
    <form action="">
        <div class="edit">
            <div class="judul">
                Edit User
            </div>
            <div class="isi">
                <table border="0">
                    <tr>
                        <td class="td1">Username</td>
                        <td class="td1"><input type="text" name="" id=""></td>
                    </tr>
                    <tr>
                        <td class="td1">Role</td>
                        <td class="td1"><input type="text"></td>
                    </tr>
                </table>
                <button type="submit">Save</button>
                <button>Cancel</button>
            </div>
        </div>
    </form>
</body>
</html>
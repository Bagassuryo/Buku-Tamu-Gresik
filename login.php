<?php
session_start();

require 'config/config.php';

// Proses login 
if (isset($_POST["login"])) {
    $username = $_POST['USERNAME_ADMIN'];
    $password = $_POST['PASSWORD'];

    $result = $conn -> prepare("select * from admin where USERNAME_ADMIN = ? ");
    $result -> execute([$username]);
    
    $row = $result -> fetch(PDO::FETCH_ASSOC);
    
    if ($row){
        
        if (password_verify($password, $row["PASSWORD"]) ) {
            
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["USERNAME_ADMIN"];

            header("location: berhasil.php");
            exit;
        }
    }
    $error = "username atau password salah ! ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body{
        display:flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(to bottom, #1B75BC, #2E3192);
    }

    .main{
        margin: 0 15px;
    }

    .logo{
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .logo img{
        height: 60px;       
    }

    .form-box{
        width: 500px;
        background: #D9D9D9;
        border-radius: 4px;
        box-shadow: 8px 4px 6px black;
        padding: 35px;
    }

    h2{
        font-size: 35px;
        text-align: center;
        margin-bottom: 30px;
    }

    h4{
        margin-bottom: 5px;
    }

    input{
        width: 100%;
        padding: 12px;
        background: #D9D9D9;
        border-radius: 6px;
        outline: none;
        font-size: 13px;
        color: black;
        margin-bottom: 20px;
    }

    input[type = checkbox]{
        width: auto;
        margin: 0;
    }
    
    .checkbox{
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;        
    }

    button{
        width: 100%;
        background: #2550A5;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 15px;
        color: white;
    }

    button:hover{
        background: #1a3d8f;
        transform: translateY(-2px);
        box-shadow: 0 3px 5px black;
    }

    .error-msg {
        margin-bottom: 5px;
        color: #cc0000;
    }

</style>

</head>
<body>

    <div class="logo">
        <img src="image/gresik.png">
        <img src="image/kominfo.png">
    </div>

    <div class="main">
            <h2>Login Administrator</h2>
        <div class="form-box">

    <form action="login.php" method="POST">
            <label>Username</label>
            <input type="text" name="USERNAME_ADMIN" placeholder="masukkan username" required>
            <label> Password</label>
            <input type="password" id="password" name="PASSWORD" placeholder="masukkan password" required>
            <div> 
                <input type="checkbox" onclick="lihatpassword()"> 
                <label> Tampilkan Password </label>
            </div>
                    
    <?php if (isset($error)): ?>
        <div class="error-msg"><?= $error ?></div>
    <?php endif; ?>

        <button type="submit" name= "login" class="button">Login</button>
    </form>

    </div>

    <?php include "footer.php"; ?>    

    <script>
        function lihatpassword(){
            var pass = document.getElementById("password");
            if(pass.type == "password"){
                pass.type="text";
            }else {
                pass.type = "password";
            }
        }
    </script>

</body>
</html>
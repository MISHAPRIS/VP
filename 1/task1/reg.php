<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Регистрация</title>
    <style>
        .width-50
        {
            width: 20%;
            /* margin: auto; */
        }
        .container
        {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
    <header>
        <h2>Регистрация</h2>
    </header>
    
    <main>
        <div class="width-50">
        <form action="reg.php" method="get" class="row g-3">
            <div class="col-md-6">
            <label for="login" class="form-label">Введите логин
                <input type="text" name="login" id="login" class="form-control" pattern="[a-z]+"  required>
            </label>
            </div>
            <div class="col-md-6">
            <label for="pass" class="form-label">Введите пароль
                <input type="password" name="pass" id="pass" class="form-control" required>
            </label>
            </div>
            <div>
            <input type="submit" value="Зарегистрироваться" class="btn btn-outline-primary">
            </div>

        </form>
    </div>
    </main>
    <footer>
        <div>Присухин Михаил, 2013 </div>
    </footer>
</div>
    
</body>
</html>
<?php
    if(isset($_REQUEST['login']) && isset($_REQUEST['pass']) ){
        require("bd.php");
        $a = "select * from `bd` where `login`='".$_REQUEST['login']."'";
        $res = mysqli_query($con, $a);//проверка логина
        $user = mysqli_fetch_assoc($res);

        if(empty($user) && empty($pass)){
            $name=$_REQUEST['login'];
            $pass=$_REQUEST['pass'];
            
            $s="INSERT INTO `bd`(`id`, `login`, `password`) VALUES (NULL,'$name','$pass')";
            mysqli_query($con, $s) or die("ddd");//s передаем в бд
            
            header('Location: /task1/listuser.php');//переброс на нужную страницу
        }
        else{
            ?><script>alert('Пользователь с таким именем пользователя уже существует')</script><?php
        }
    }
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require("bd.php");
    $l = "";
    if  (isset($_REQUEST['login']) && isset($_REQUEST['password']))
    {
        $a = "select * from bd where login ='".$_REQUEST['login']."' and password = '".$_REQUEST['password']."'";
        $res = mysqli_query($con, $a);//проверка логина
        $user = mysqli_fetch_assoc($res);

        if($user != null)
        {
            $_SESSION['login']=$_REQUEST['login'];
            $_SESSION['password']=$_REQUEST['password'];
            header("Location: listuser.php");
        }
        else
        {
            $l = "Invalid login or password";
        }
    }
?>
<body>
    <main>
        <form action="auth.php" method="POST">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Вход">
            <a href="reg.php">Зарегистрироваться</a>
            <?php
                print("<p>".$l."</p>");
            ?>
        </form>
    </main>
</body>
</html>
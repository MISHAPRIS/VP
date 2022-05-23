<?php
    //Подключение шапки
    include("header.php");
?>
<?php
    if (isset($_SESSION['login']) && isset($_SESSION['password']))
    {

    }
    if (isset($_REQUEST['Exit']))
    {
        session_destroy();
        header("Location: auth.php");
    }
?>
<table border = 1>
<?php
    include("bd.php");
        $sql= 'SELECT * FROM `bd`';
        $res = mysqli_query($con, $sql);


    while($row = mysqli_fetch_row($res)){
        echo"<tr><td>";
        echo $row[0];
        echo "</td><td>";
        echo $row[1];
        echo "</td><td>";
        echo $row[2];
        echo "</td></tr>";
        
    }
?>
</table>
<?php
    include("footer.php");
?>
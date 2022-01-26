<?php
require("connectdb.php");
session_start();

$name = htmlspecialchars(trim($_POST['name']));
$login = htmlspecialchars(trim($_POST['login']));
$pass = htmlspecialchars(trim($_POST['password']));

$_SESSION['name'] = $name;
$_SESSION['login'] = $login;
$_SESSION['password'] = $pass;

if (!empty($_POST)){
    if(trim($name) == ""){
        echo '<script type="text/javascript">alert("Имя пользователя не было введено!")</script>';
    }
    else if(strlen(trim($name)) <= 1)
        echo '<script type="text/javascript">alert("Такого имени не существует")</script>';
    
    else if(trim($login) == "")
        echo '<script type="text/javascript">alert("Логин не был введен!")</script>';
    
    else if(trim($pass) == "")
        echo '<script type="text/javascript">alert("Пароль не был введен!")</script>';
    
    else if(strlen(trim($pass)) <= 1)
        echo '<script type="text/javascript">alert("Пароль должен быть больше 1-ого символа")</script>';

    else{
    $result = mysqli_query($connect, "SELECT * FROM users WHERE login=\"".$_POST['login']."\"");
    
    if(mysqli_num_rows($result) == 0){
        mysqli_query($connect, "INSERT INTO users (name, login, password) VALUES (
            \"".$_POST["name"]."\", 
            \"".$_POST["login"]."\",
            \"".md5($_POST["password"])."\"
            )"
        );
    }
    
    header("Location: authorization.php");
    }
}

$title = "Регистрация";
$content = "
<h1 class = 'heading'>Регистрация</h1>
<div class = 'search-form'>

<form  method=\"POST\">
    <div class = 'fortext'>
        <label>Имя</label>
        <input class = 'fortext' type=\"text\" name=\"name\" value = '".$_SESSION['name']."'>
    </div>
    
    <div class = 'fortext'>
        <label>Логин</label>
        <input class = 'fortext'  onkeyup='checkParams()' type=\"text\" name=\"login\" value = '".$_SESSION['login']."'>
    </div>
    
    <div class = 'fortext'>
        <label>Пароль</label>
        <input class = 'fortext'  type=\"password\" name=\"password\" >
    
        <button class = 'btnreg'>Регистрация</button>
        </div>
</form>
</div>
";

require("template.php");
?>
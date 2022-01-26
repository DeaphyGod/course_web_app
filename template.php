<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <nav class="heading header">
            <div class="menu">
                <a href="main.php">Главная</a>
                <a href="contact.php">Контакты</a>
            </div>
            <div class="right menu">
                <?php if(isset($session_user) && $session_user != ""):?> 
                    <label>Вы авторизованы как <?=$_SESSION['user']['name']?></label>
                    <a href="logout.php">Выйти</a>
                <?php else:?>
                    <a href="authorization.php">Войти</a>
                <?php endif;?>
            </div>
            <div  class = "unauth">
                <?php if(!isset($session_user) || $session_user == ""):?> 
                    <label>Неавторизованному пользователю доступны не все возможности</label>
                <?php endif;?>
            </div>
        </nav>
        </header>
        <p><?=$content;?></p>
    </body>
</html>
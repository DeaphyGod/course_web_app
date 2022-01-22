<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <nav class="heading header">
            <div class="">
                <a href="main.php">Главная</a>
                <a href="contact.php">Контакты</a>
            </div>
            <div class="">
                <?php if(isset($session_user) && $session_user != ""):?> 
                    <label>Вы авторизованы как <?=$_SESSION['user']['name']?></label>
                    <a href="logout.php">Выйти</a>
                <?php else:?>
                    <a href="authorization.php">Войти</a>
                <?php endif;?>
            </div>
        </nav>
        </header>
        <p><?=$content;?></p>
    </body>
    
</html>
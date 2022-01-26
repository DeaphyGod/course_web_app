<?php
require("session.php");
$title = "Курсовая работа";

$content = "
<div class=\"form\">
    <h1 class = \"heading\">Введите название района, в котором Вы хотели бы<br>найти велосипедные дорожки и велопарковки.</h1>
<div class=\"search-form\"> 
    <form action=\"searchedparks.php\" method=\"POST\" class=\"container\">
        
        <input placeholder=\"Введите название района...\" class=\"search-field\" type=\"text\" name=\"request\">
        <button href=\"\" class=\"search-btn\">Найти</button>
    </form>
</div>
</div>
";

require("template.php");
?>


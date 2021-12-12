<?php
$content = "
<div class=\"form\">
    <h1 class = \"heading\">Введите название района, в котором Вы хотели бы<br>найти велосипедные дорожки и станции проката.</h1>
<div class=\"search-form\"> 
    <form action=\"searched.php\" class=\"container\">
        <input placeholder=\"Введите название района...\" type=\"text\" class=\"search-field\" value=\"".$request."\" required>
        <button href=\"\" class=\"search-btn\">Найти</button>
    </form>
</div>
</div>
";
require("template.php");
?>
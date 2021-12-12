<?php

$content = "
<div>
            <h1 class = \"heading\">Введите название района, в котором Вы хотели бы<br>найти велосипедные дорожки и станции проката.</h1>
            <div class=\"search-form\"> 
                <form action=\"index.html\" class=\"container\">
                    <input type=\"text\" class=\"search-field\" value=\"".$_POST['request']."\">
                    <button href=\"\" class=\"search-btn\">Найти</button>
                </form>
            </div>
        </div>
        <div>
            <div class=\"form2\">
                <div class = \"container2\">
                    <img class=\"img\" src=\"img/map.jpg\" alt=\"\">
                    <p>Количество станций проката:<br><br>Общая протяженность дорожек:<br><br>.....<br><br>.....</p>
                </div>
            </div>
        </div>
";
require("template.php");
?>
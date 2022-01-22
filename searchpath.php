<?php
require("connectdb.php");
require("session.php");
// $connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1525_course", "12345678", "std_1525_course");

$result = mysqli_query($connect, "SELECT * FROM paths WHERE global_id = '".$_POST["id1"]."' ");
$arr = mysqli_fetch_assoc($result);
$name = $arr["Name"];
$district = $arr["District"];
$width = $arr["Width"];
$address = $arr["Location"];
$phone =  $arr["ObjectOperOrgPhone"];

$title = "Курсовая работа";
$content = "
 <div>
             <h1 class = \"heading\">Введите название района, в котором Вы хотели бы<br>найти велосипедные дорожки и станции проката.</h1>
             <div class=\"search-form\"> 
                 <form action=\"searchedparks.php\" method = \"POST\" class=\"container\">
                    
                 <input placeholder=\"Введите название района...\" class=\"search-field\" type=\"text\" name=\"request\" value=\"".$_POST["request2"]."\">
                     <button href=\"\" class=\"search-btn\">Найти</button>
                 </form>
             </div>
         </div>
        <div>
            <div class=\"form2\">
                <div class = \"container2\">
                    <div class = \"about\"> <p><a>Название: </a>".$name."<br><br><a>Ширина: </a>".$width."<br><br><a>Район: </a> ".$district."<br><br><a>Адрес: </a>".$address."<br><br><a>Телефон: </a> +7 ".$phone."</p> </div>
                </div>
            </div>
        </div>
";
require("template.php");
?><
    <!-- input type=\"text\" class=\"search-field\" for=\"request\"> -->
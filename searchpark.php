<?php
require("connectdb.php");
require("session.php");
// $connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1525_course", "12345678", "std_1525_course");

$result = mysqli_query($connect, "SELECT * FROM parkings WHERE global_id = '".$_POST["id"]."' ");
$arr = mysqli_fetch_assoc($result);
$name = $arr["Name"];
$district = $arr["District"];
$address = $arr["Address"];
$phone =  explode(":", $arr["ObjectOperOrgPhone"]);
$capacity = $arr["Capacity"];
$lon = $arr["Latitude_WGS84"];
$lat = $arr["Longitude_WGS84"];

$title = "Курсовая работа";
$content = "
 <div>
             <h1 class = \"heading\">Введите название района, в котором Вы хотели бы<br>найти велосипедные дорожки и станции проката.</h1>
             <div class=\"search-form\"> 
                 <form action=\"searchedparks.php\" method = \"POST\" class=\"container\">
                    
                 <input placeholder=\"Введите название района...\" class=\"search-field\" type=\"text\" name=\"request\" value=\"".$_POST["request1"]."\">
                     <button href=\"\" class=\"search-btn\">Найти</button>
                 </form>
             </div>
         </div>
        <div>
            <div class=\"form2\">
                <div class = \"container2\">
                <div id=\"yandexmap\" style=\"width: 500px; height: 500px\"></div>
                    <div class = \"about\"> <p><a>Название: </a>".$name."<br><br><a>Количество мест: </a>".$capacity."<br><br><a>Район: </a> ".$district."<br><br><a>Адрес: </a>".$address."<br><br><a>Телефон: </a> +7 ".$phone[1]."</p> </div>
                </div>
            </div>
        </div>
        <script src=\"https://api-maps.yandex.ru/2.1/?lang=ru_RU\" type=\"text/javascript\"></script>
        <script>
        var map;
        var marker;
        function initMap () {
            map = new ymaps.Map(\"yandexmap\", {
                center: [".$lon.", ".$lat."],
                zoom: 16
            });

            marker = new ymaps.Placemark([".$lon.", ".$lat."], {
                hintContent: 'Расположение',
                balloonContent: 'Велопарковка'
                });
              map.geoObjects.add(marker);
        }
        ymaps.ready(initMap);
        </script>
        
";
        
require("template.php");
?><
    <!-- input type=\"text\" class=\"search-field\" for=\"request\"> -->
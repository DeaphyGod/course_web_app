<?php
require("connectdb.php");
require("session.php");


$title = "Информация";

$query = "SELECT Name, District, Address, ObjectOperOrgPhone, global_id FROM parkings WHERE District LIKE '%".$_POST["request"]."' ";
$result = mysqli_query($connect, $query);
$query1 = "SELECT Type, District, Location, ObjectOperOrgPhone, global_id FROM paths WHERE District LIKE '%".$_POST["request"]."' ";
$result1 = mysqli_query($connect, $query1);


$content = '<h1>Результаты поиска по району '.$_POST["request"].':</h1>';

if((!$result1 || mysqli_num_rows($result1) == 0) && (!$result || mysqli_num_rows($result) == 0)){
    $content .= '<h2>По вашему запросу '.$_POST["request"].' ничего не было найдено. Попробуйте другой запрос.</h2> ';
}
elseif(!$result || mysqli_num_rows($result) == 0){
    $content .= '<h2>По вашему запросу '.$_POST["request"].' не было найдено велосипедных парковок. Попробуйте другой запрос.</h2> ';
}
elseif(!$result1 || mysqli_num_rows($result1) == 0){
    $content .= '<h2>По вашему запросу '.$_POST["request"].' не было найдено велосипедных дорожек.</h2> ';
}

if(empty($_POST["request"])){
    $content = '<h2>Вы не ввели запрос в строку поиска. </h2> '; 
}
else{
    if(isset($session_user) && $session_user != ""){
        while($arr = mysqli_fetch_assoc($result)){
            $name = $arr["Name"];
            $district = $arr["District"];
            $address = $arr["Address"];
            $phone =  explode(":", $arr["ObjectOperOrgPhone"]);
            $content .= '
            <div class="tableparks">
            
            <table>
                <tr>    
                    <form  action = "searchpark.php" method = "POST"> 
                        
                        <td colspan="2"><button class = "btn">'.$name.' </button> </td>
                        <input hidden value="'.$arr["global_id"].'" type="text" name="id">
                        <input hidden value="'.$_POST["request"].'" type="text" name="request1">
                    </form>
                </tr>
                <tr>
                    <td style="width: 70px;">Район</td>
                    <td>'.$district.'</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Адрес</td>
                    <td>'.$address.'</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Телефон</td>
                    <td> +7 '.$phone[1].'</td>
                </tr>
            </table>
        </div>
            ';
        }
        while($arr1 = mysqli_fetch_assoc($result1)){
            $type = trim(trim($arr1["Type"], "["), "]");
            $district1 = $arr1["District"];
            $address1 = $arr1["Location"];
            $phone1 =  $arr1["ObjectOperOrgPhone"];
            
            $content .= '
            <div class="tableparks">
            <table>
                    <tr>    
                        <form  action = "searchpath.php" method = "POST"> 
                            <td colspan="2"><button class = "btn">'.$type.' </button> </td>
                            <input hidden value="'.$arr1["global_id"].'" type="text" name="id1">
                            <input hidden value="'.$_POST["request"].'" type="text" name="request2">
                        </form>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Район</td>
                        <td>'.$district.'</td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Адрес</td>
                        <td>'.$address.'</td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Телефон</td>
                        <td> +7 '.$phone.'</td>
                    </tr>
                </table>
            </div>
        ';
        }
    }
    else{
        while($arr = mysqli_fetch_assoc($result)){
            $name = $arr["Name"];
            $district = $arr["District"];
            $address = $arr["Address"];
            $phone =  explode(":", $arr["ObjectOperOrgPhone"]);
            $content .= '
            <div class="tableparks">
            <table>
                <tr>
                    <td colspan="2">'.$name.'</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Район</td>
                    <td>'.$district.'</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Адрес</td>
                    <td>'.$address.'</td>
                </tr>
                <tr>
                    <td style="width: 70px;">Телефон</td>
                    <td> +7 '.$phone[1].'</td>
                </tr>
            </table>
        </div>
            ';
        }
    
        while($arr1 = mysqli_fetch_assoc($result1)){
            $type = trim(trim($arr1["Type"], "["), "]");
            $district1 = $arr1["District"];
            $address1 = $arr1["Location"];
            $phone1 =  $arr1["ObjectOperOrgPhone"];
            
            $content .= '
            <div class="tableparks">
            <table>
                    <tr>    
                        <td colspan="2">'.$type.'</td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Район</td>
                        <td>'.$district.'</td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Адрес</td>
                        <td>'.$address.'</td>
                    </tr>
                    <tr>
                        <td style="width: 70px;">Телефон</td>
                        <td> +7 '.$phone.'</td>
                    </tr>
                </table>
        </div>
            ';
        }
    }
}

require("template.php");

?>
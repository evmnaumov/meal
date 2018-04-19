<?php
include ("session.php");
include ("bd.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Выгрузка ответов</title>
</head>
<body>
<?php
$location = mysqli_query($link, 'SELECT * FROM `locations`');
while($loc_row = mysqli_fetch_row($location)){
    echo "<h3>".$loc_row[1]."</h3>";
    echo "<table border=\"1\">
    <tr><td rowspan=\"2\" textalign=\"center\">Фамилия и Имя</td>
    <td colspan=\"5\" textalign=\"center\">Понедельник</td>
    <td colspan=\"5\" textalign=\"center\">Вторник</td>
    <td colspan=\"5\" textalign=\"center\">Среда</td>
    <td colspan=\"5\" textalign=\"center\">Четверг</td>
    <td colspan=\"5\" textalign=\"center\">Пятница</td></tr>
    <tr>";
    for ($i=1;$i<=5;){
        echo "
        <td>Салат</td>
        <td>Первое</td>
        <td>Основное</td>
        <td>Гарнир</td>
        <td>Десерт</td>";
        $i=$i+1;
    }
    echo "</tr>";    
    $user = mysqli_query($link, 'SELECT * FROM `users` WHERE location="'.$loc_row[0].'"');
    while($user_row = mysqli_fetch_row($user)){
        echo "<tr><td><b>".$user_row[4]." ".$user_row[3]."</b></td>";
        for ($j=1;$j<=5;){
            switch($j){
                case 1: $day = "mon";
                break;
                case 2: $day = "tue";
                break;
                case 3: $day = "wen";
                break;
                case 4: $day = "thu";
                break;
                case 5: $day = "fri";
                break;
            }
            $answer = mysqli_query($link, 'SELECT `'.$day.'` FROM `answers` WHERE user_id="'.$user_row[0].'"');
            while ($answer_row = mysqli_fetch_row($answer)){
                print_r($answer_row);
                echo "<br>";
            if(empty($answer_row)){
                for($d=1;$d<=25;){
                    echo "<td>-----</td>";
                    $d=$d+1;
                }
            }else{    
                $dishes = explode(",", $answer_row[0]);
                foreach($dishes as $value){
                    if($value=="non"){
                        echo "<td>-----</td>";
                    }else{
                    $dish = mysqli_query($link, 'SELECT `name` FROM `dish` WHERE dish_id = "'.$value.'"');
                    while($dish_name = mysqli_fetch_row($dish)){
                        echo "<td>".$dish_name[0]."</td>";
                    }
                    mysqli_free_result($dish);
                    }
                }
            }
            } 
            $j=$j+1;
        }
        mysqli_free_result($answer);
        echo "</tr>";   
    }
    mysqli_free_result($user);
    echo "</table>";
}
mysqli_free_result($location);
?>


</body>
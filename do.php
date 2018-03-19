<?php
    // Соединяемся, выбираем базу данных

$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$tabs_db = mysqli_select_db($link,'dish');

$mon=$_POST['mon'];
        $mon_1 = explode("\n",$mon[1]);
        $mon_2 = explode("\n",$mon[2]);
        $mon_3 = explode("\n",$mon[3]);
        $mon_4 = explode("\n",$mon[4]);
        $mon_5 = explode("\n",$mon[5]);

        for($i=1;$i<=5; ){
        foreach(${'mon_'.$i} as $value){
            $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$value.'","1","'.$i.'")';
            mysqli_query($link, $query);
        }
        $i=$i+1;
        }
        
/*
$tue=$_POST['tue'];
        $tue_1 = explode("\n",$tue[1]);
        $tue_2 = explode("\n",$tue[2]);
        $tue_3 = explode("\n",$tue[3]);
        $tue_4 = explode("\n",$tue[4]);
        $tue_5 = explode("\n",$tue[5]);
        echo="$tue_1, $tue_2, $tue_3, $tue_4, $tue_5 <br>"

$wen=$_POST['wen'];
        $wen_1 = explode("\n",$wen[1]);
        $wen_2 = explode("\n",$wen[2]);
        $wen_3 = explode("\n",$wen[3]);
        $wen_4 = explode("\n",$wen[4]);
        $wen_5 = explode("\n",$wen[5]);
        echo="$wen_1, $wen_2, $wen_3, $wen_4, $wen_5 <br>"

$thu=$_POST['thu'];
        $thu_1 = explode("\n",$thu[1]);
        $thu_2 = explode("\n",$thu[2]);
        $thu_3 = explode("\n",$thu[3]);
        $thu_4 = explode("\n",$thu[4]);
        $thu_5 = explode("\n",$thu[5]);
        echo="$thu_1, $thu_2, $thu_3, $thu_4, $thu_5 <br>"

$fri=$_POST['fri'];
        $fri_1 = explode("\n",$fri[1]);
        $fri_2 = explode("\n",$fri[2]);
        $fri_3 = explode("\n",$fri[3]);
        $fri_4 = explode("\n",$fri[4]);
        $fri_5 = explode("\n",$fri[5]);
        echo="$fri_1, $fri_2, $fri_3, $fri_4, $fri_5 <br>"

       /* $title = $value["title"];
        $price = $value["price"];
        $desc = $value["description"];
        echo "$image, $title, $price, $desc<br>";
        $query = 'INSERT INTO test (image, title, price, description) VALUES ("'.$image.'","'.$title.'","'.$price.'","'.$desc.'")';
        echo "$query <br>";
        mysqli_query($link, $query);*/



mysqli_close($link);
?>
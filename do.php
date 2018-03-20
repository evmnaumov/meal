<?php
    // Соединяемся, выбираем базу данных

$link = mysqli_connect('localhost', 'meal', 'dbywtckfd');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($link,'meal');
mysqli_query($link, 'DELETE FROM `dish`');
mysqli_query($link,"SET NAMES 'utf8'");

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
            echo $query."<br>";
        }
        $i=$i+1;
        }
        

$tue=$_POST['tue'];
        $tue_1 = explode("\n",$tue[1]);
        $tue_2 = explode("\n",$tue[2]);
        $tue_3 = explode("\n",$tue[3]);
        $tue_4 = explode("\n",$tue[4]);
        $tue_5 = explode("\n",$tue[5]);
        for($i=1;$i<=5; ){
            foreach(${'tue_'.$i} as $value){
                $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$value.'","2","'.$i.'")';
                mysqli_query($link, $query);
                echo $query."<br>";
            }
            $i=$i+1;
            }

$wen=$_POST['wen'];
        $wen_1 = explode("\n",$wen[1]);
        $wen_2 = explode("\n",$wen[2]);
        $wen_3 = explode("\n",$wen[3]);
        $wen_4 = explode("\n",$wen[4]);
        $wen_5 = explode("\n",$wen[5]);
        for($i=1;$i<=5; ){
            foreach(${'wen_'.$i} as $value){
                $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$value.'","3","'.$i.'")';
                mysqli_query($link, $query);
                echo $query."<br>";
            }
            $i=$i+1;
            }

$thu=$_POST['thu'];
        $thu_1 = explode("\n",$thu[1]);
        $thu_2 = explode("\n",$thu[2]);
        $thu_3 = explode("\n",$thu[3]);
        $thu_4 = explode("\n",$thu[4]);
        $thu_5 = explode("\n",$thu[5]);
        for($i=1;$i<=5; ){
            foreach(${'thu_'.$i} as $value){
                $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$value.'","4","'.$i.'")';
                mysqli_query($link, $query);
                echo $query."<br>";
            }
            $i=$i+1;
            }

$fri=$_POST['fri'];
        $fri_1 = explode("\n",$fri[1]);
        $fri_2 = explode("\n",$fri[2]);
        $fri_3 = explode("\n",$fri[3]);
        $fri_4 = explode("\n",$fri[4]);
        $fri_5 = explode("\n",$fri[5]);
        for($i=1;$i<=5; ){
            foreach(${'fri_'.$i} as $value){
                $query = 'INSERT INTO dish (name, day, meal) VALUES ("'.$value.'","5","'.$i.'")';
                mysqli_query($link, $query);
                echo $query."<br>";
            }
            $i=$i+1;
            }
mysqli_close($link);

echo "Данные сохранены!";
?>
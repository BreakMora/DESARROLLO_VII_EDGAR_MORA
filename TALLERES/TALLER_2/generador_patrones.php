<?php
    $a = "*";
    $acumulador = 1;

    for($i=0; $i<5; $i++){
        for($y=0; $y<$acumulador; $y++){
            echo "*";
        }
        echo "<br>";
        $acumulador = $acumulador+1;
    }

    echo "<br><br>";

    $acumulador = 0;
    while($acumulador<20){
        $acumulador ++;
        if($acumulador%2 != 0){
            echo $acumulador."<br>";
        }
    }

    echo "<br><br>";

    $acumulador = 10;
    do{
        $acumulador--;
        if($acumulador!=5){
            print $acumulador."<br>";
        }
    }while($acumulador>0);
?>
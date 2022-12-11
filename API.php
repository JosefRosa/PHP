<?php

/*
Jak se spousti kod: http://localhost/API/index.php/?op=pridat&A=prvni cislici&B=druhou cislici (samozrejme tam nesmi byt hacky, carky ani zavorky) 
    Omlouvam se za primou cestu()
operace: 
 1.scitani - sci
 2.odcitani - odc
 3.nasobeni - nas
 4.deleni - del 
 Delano s Filipem Kucerem 
*/

$operation = htmlentities($_GET["op"]);
$number = htmlentities($_GET["A"]);
$number2 = htmlentities($_GET["B"]);
if(!$number || !$number2 || !is_numeric($number) || !is_numeric($number2)){
    print_r(["hlaseni" => "neplatne cislo "]);
    exit;
}
switch($operation){
    default:
        print(["hlaseni" => "neplatny operator "]);
    case "odc":
        $number3 = $number - $number2;
        break;
    case "pridat" || "sci":
        $number3 = $number + $number2;
        break; 
    case "nas":
            $number3 = $number * $number2;
            break;
    case "del":
        $number3 = $number / $number2;
        break;
    
       
}
print_r(["Vsechno je v poradku", "vysledek " => $number3]);
?>

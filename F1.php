<?php

$operation = htmlentities($_GET["o"]);
$number = htmlentities($_GET["n"]);
$number = explode(',',$number);
$count = sizeof($number);
$result = $number[0];
if($number[0] == NULL || $operation == NULL){
    print_r(json_encode(["report" => "Operator or number not filled"]));
    exit;
}
for ($t = 0; $t < $count; $t++){
    if(!$number[$t] || !is_numeric($number[$t])){
        print_r(json_encode(["report" => "Not a valid number"]));
        exit;
    }
}
switch($operation){
    default:
        print_r(json_encode(["report" => "Not a valid operator"]));
        exit;
    case "add":
    case "sum":
        for($t = 1; $t < $count; $t++){
            $result = $result + $number[$t];
        }
        break;
    case "sub":
    case "min":
        for($t = 1; $t < $count; $t++){
            $result = $result - $number[$t];
        }
        break;
    case "mul":
        for($t = 1; $t < $count; $t++){
            $result = $result * $number[$t];
        }
        break;
    case "div":
        for($t = 1; $t < $count; $t++){
            $result = $result / $number[$t];
        }
        break;
}
print_r(json_encode(["report" => "All good", "result " => $result]));

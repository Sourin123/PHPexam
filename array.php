<?php
$array = ["a","b","C"];

print_r($array);

array_push($array,"d","e","f");

print_r($array);

$array[2] = "al bl cl";

print_r($array);

array_pop($array);
print_r($array);

sort($array);
print_r($array);


?>
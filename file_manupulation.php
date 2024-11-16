<?php 
//READING FILE AND PRINTING
// echo readfile("./test.txt");
function read($path){
$myfile = fopen($path, "r") or die("Unable to open file!");
echo fread($myfile,filesize("./test.txt"));
fclose($myfile);
}

// $myfile = fopen("./test.txt","w");
//WRITING FILE
// echo fwrite($myfile,"Hello World");
function write($path,$content){
    $myfile = fopen($path, "w");
    fwrite($myfile,$content);
    fclose($myfile);
}

$path= "./test.txt";
$content = "this is great man";

write($path,$content);



?>
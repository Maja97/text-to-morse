<?php

$obj = json_decode($_GET["myData"]);

$name = $obj->name;
$text = $obj->text;

if($name != "")
echo "Your name in morse code:\n";
$nameChar = str_split($name);
convertToMorse($nameChar);

if($text != "")
echo "\nYour text in morse code:\n";
$textChar = str_split($text);
convertToMorse($textChar);

function convertToMorse($txt){
    $data = json_decode(file_get_contents('morseCode.txt'));
    $i = 0;
    foreach($txt as $char){
        if($txt=="")break;

        if(ctype_alpha($char) || ctype_digit($char) ||$char == "(" ||
        $char == ")" || $char == "." || $char == "," || $char == "?" ||
        $char == "!" || $char == "-" || $char == "/" || $char == "@"){
           foreach ($data as $key => $value) {
               if(strcasecmp($char, $key)==0){
                   echo $value, " ";
               }
           }
           $i++;
       }
   
       else if(ctype_space($char)){
           if($i != 0)
                   echo "   ";
               
               $i++;
           }
    }
}
?>
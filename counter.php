<?php

$get = $_GET;

$kalendari = array("icalendar", "googlecalendar","outlook", "outlookonline", "yahoo");

if(isset($_GET["name"]) and in_array($get["name"], $kalendari)){
    $filename = $get['name'] . '.txt';

    if(!file_exists($filename)){
        $fp = fopen($filename, "x+");
    }else{
        // Open the file for reading
        $fp = fopen($filename, "r+");
    }

    $count = fread($fp, 1024);
    fclose($fp);

    if(is_numeric($count)){
        $count = $count + 1;
    }else{
        $count = 1;
    }

    $fp = fopen($filename, "w");
    fwrite($fp, $count);
    fclose($fp);
}
?>
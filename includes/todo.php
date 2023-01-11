<?php

  if (isset($_GET["submit"])){

    $name = $_GET["name"];
    $date = $_GET["date"];
    $myfile = fopen("tasks.txt", "a") or die("Unable to open your file!");
    $fline = $name . "#" . $date . "\n";
    
    fwrite($myfile, $fline);

    fclose($myfile);
    header("location: ../index.php?submit='set'");
    
  }else{
    header("location: ../index.php");
  }
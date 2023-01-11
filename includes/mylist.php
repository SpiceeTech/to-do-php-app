<?php

  $myfile = fopen("tasks.txt", "r+") or die("Unable to open my tasks file!");
  $i = 0;
  $j = 0;
  $undeleted_tasks = array();

  while (!feof($myfile)){
    $fline = fgets($myfile);
    $task = $_GET["task" . strval($i)];

    if (!empty($fline)){
      if ($task != "on"){
        $undeleted_tasks[$j] = $fline;
        $j++;
      }
    }

    $i++;
  }

  fclose($myfile);

  $myfile = fopen("tasks.txt", "w") or die ("Unable to open my tasks file!");
  $i = 0;

  for ($i=0; $i<=$j; $i++){
    fwrite($myfile, $undeleted_tasks[$i]);
  }

  fclose($myfile);

  header("location: ../index.php?submit='set'");
  
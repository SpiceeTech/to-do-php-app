<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="default.css">
</head>
<body>

  <header>
    <!--This is my header-->
  </header>

  <center><h2>To Do App</h2></center>
  
  <!--All my to do app surface-->
  <section class="primary">

    <div class="mylist">
      <form action="includes/mylist.php" method="get">
        
        <p>These are your tasks</p>
        <br>
        <hr>
          <ul>
            <li>Task name</li>
            <li>Due date</li>
          </ul>
          <hr>

          <?php 
              
              #open my textfile with my tasks
            $myfile = fopen("includes/tasks.txt", "r") or die("Unable to open your tasks");
            $i = 0;
            $tasks = array();
                     
            while(!feof($myfile)){
              $fline = fgets($myfile);    #get each line from my textfile
              
              if (!empty($fline)){  #we don't want to display an empty line
                $ipos = stripos($fline, "#");
                $taskName = substr($fline, 0 , $ipos);
                $dueDate = substr($fline, $ipos+1);
                
                echo "<div class='wrapper'>";    #div wrapping each and every task displayed with it's checkbox
                  echo "<input type='checkbox' id='" . $i . "' class='list-check' name='task" . $i . "' >";
                  #each task is displayed as an unordered list
                  echo "<ul class='task-info-ul'>";
                  #list item for task name and 1 list item for date, these u lists will all have 2 list items            
                  echo "<li>" . "<label for='" . $i . "'>" . $taskName . "</li>" . "<li>" . "<label for='" . $i . "'>" . $dueDate . "</li>" . "<br>";     
                  echo "</ul>";
                echo "</div>";
                $i++;
              }else{
                echo "<p style='color: grey; margin-left: 30px;'> add new task -> </p>";
              }
                          
            }
              
            fclose($myfile);
            
          ?>
          
        <button type="submit" class="delete">Delete Task</button>
      </form>
    </div>

    <div class="add-todo">
      <form action="includes/todo.php" method="get">
        <label for="name">Task name:</label>
        <input type="text" id="name" name="name" placeholder="Enter the name of your task...">
        <br> <br> 
        <label for="date">Deadline date:</label>
        <input type="date" id="date" name="date">
        <br> <br>
        <center>
        <input type="submit" value="Add Task" class="add-button" name="submit">
        </center>
      </form>
    </div>

  </section>

  <?php
    echo "Hello world!";
  ?>

</body>
</html>


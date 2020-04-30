<?php
include ("dbconfig.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title> todolist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="container-fluid" style="background-color:#84C1FF;" >
<h1>login area</h1>

<form class="form-inline" action="controller.php" method = "post">
  <label for="text"> Account :  </label>
  <input type="email" class="form-control" placeholder="input" name = "input_name" >
  <label for="pwd"> Password :  </label>
  <input type="password" class="form-control" placeholder="Enter password" name = "input_password"> 
  <button type="submit" class="btn btn-primary" name="btn_login"> Login </button>
</form>
    <!--
    <form action="test_post.php" method="post">　
    姓名: <input type="text" name="Email"/>
　  <input type="submit" value="送出表單"/>
    <button type="button" class="btn btn-secondary">Secondary</button>
    -->
    <br>
    please login first<br>
    <br>

</form>
</div>
<div class="container-fluid" style="background-color:#FFF8D7;">
    <form class="form-inline" action="controller.php" method = "post">
    <h1>About task </h1>
    <input type="text"  name = "input_task">
    <!-- <button type="submit" class="btn btn-primary" name="input_task" > add </button> -->
    <input type="submit" name="input_task" value=" add "/>
</form>


    <table class="table">
    <thead>
      <tr>
        <th width="10%">#</th>
        <th width="40%">代辦事項</th>
        <th width="20%">建立時間</th>
        <th width="10%">進度</th>
        <th width="10%"></th>
      </tr>
    </thead>
    <tbody>
      <form method = "post"  action="controller.php" >
        <?php   
            $sql_query_showAll = "select id `ID`, content `Task`, finsishOrNot `Status`, creat_at `Time` from tasks where user_id = '1'";
            $sql = mysqli_query($connectDB, $sql_query_showAll);  
            $row_showAll = mysqli_num_rows($sql) ;
            
            $i=0;
            if ($row_showAll != 0 ){
              while($result_showAll = mysqli_fetch_assoc($sql)){
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$result_showAll['Task']."</td>";
                echo "<td>".$result_showAll['Time']."</td>";
                echo "<td>";
                $task_status = $result_showAll['Status'] ;
                $task_id = $result_showAll['ID'] ;
                if($task_status == 0) {
                  echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"btn_done\"  value = \"$task_id\" > 完成 </button>";
                }else{
                  echo "已完成";
                }
                echo "</td>";
                echo "<td>";
                echo "<button type=\"submit\" class=\"btn btn-outline-dark\" name=\"btn_more\" > more </button>";
                echo "</td>";
                echo "</tr>";
              }
            }
          ?>  
        </form> 

    </tbody>
  </table>
</div>



<a href="" onclick="removeday(event)" class="deletebtn">Delete</a>


<script>
  async function removeday(e) {
    e.preventDefault(); 
    document.body.innerHTML = '<br>'+ await(await fetch('?remove=1')).text();
  }
</script>




<?php
  function removeday() { echo 'Day removed'; }

  if (isset($_GET['remove'])) { return removeday(); }
  
?>



</div>
</html>

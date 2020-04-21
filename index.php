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

<form class="form-inline" action="/action_page.php">
  <label for="email"> Account :  </label>
  <input type="email" class="form-control" placeholder="input" >
  <label for="pwd"> Password :  </label>
  <input type="password" class="form-control" placeholder="Enter password"> 
  <button type="submit" class="btn btn-primary"> Login </button>
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
    <h1>About task </h1>
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
      <!-- <tr>
        <td>001</td>
        <td>test </td>
        <td>2020-04-14 20:20</td>
        <td>
        <a href="#" class="btn btn-info" role="button">finish</a>
        <button type="button" class="btn btn-warning">Warning</button> -->
        <!-- </td>
      </tr> -->
      <?php 
					$sql_query_showAll = "select id `ID`, content `Task`, finsishOrNot `Status`, creat_at `Time` from tasks where user_id = '1'";
					$sql = mysqli_query($connectDB, $sql_query_showAll);  
          $row_showAll = mysqli_num_rows($sql) ;
          
					// $sql_query_showAll = "select id ID, content Task, finsishOrNot Status, creat_at Time from tasks where user_id = '1'";
          // $showAllrow = 0 
          //$row_showAll = showAllResult($sql_query_showAll);
          $i=0;
					if ($row_showAll != 0 ){
						while($result_showAll = mysqli_fetch_assoc($sql)){
              $i++;
              echo "<tr>";
              echo "<td>".$i."</td>";
              // echo "<td>".$result_showAll['index']."</td>";
							// echo "<td>".$result_showAll['ID']."</td>";
              echo "<td>".$result_showAll['Task']."</td>";
              echo "<td>".$result_showAll['Time']."</td>";
              if  ($result_showAll['Status'] == 0 ){
                echo "<td>"."未完成"."</td>";
              }else{
                echo "<td>"."完成"."</td>";
              }
              //echo "<td>".$result_showAll['Status']."</td>";
              // echo "<td><input type=\"submit\" name=\"more\" value=\"more\">  
              echo "<td>";
              echo "<button type=\"button\" class=\"btn btn-outline-dark\">more</button>";
              echo "</td>";
							echo "</tr>";
						}
					}
					?>
    </tbody>
  </table>
</div>



</div>
</html>

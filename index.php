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
<h1>login area</h1>    please login first<br>

<form class="form-inline" action="controller.php" method = "post">
  <label for="text"> Account :  </label>
  <input type="email" class="form-control" name = "input_name" >
  <label for="pwd"> Password :  </label>
  <input type="password" class="form-control" name = "input_password"> 
  <button type="submit" class="btn btn-warning" name="btn_login"> Login </button>
</form>
<br>    
</div>
<div class="container-fluid" style="background-color:#FFF8D7;">
    <h1>About task </h1>
    <form class="form-inline" action="controller.php" method = "post">
    <input type="text"  name = "input_task">
    <!-- <button type="submit" class="btn btn-primary" name="task_add" > add </button> -->
    <input type="submit" name="task_add" value=" add "/>
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
            $queryshowAll = "select id `ID`, content `Task`, done `Status`, creat_at `Time` from tasks where user_id = '1'";
            $sql = mysqli_query($connectDB, $queryshowAll);  
            $rowShowAll = mysqli_num_rows($sql) ;
            
            $i=0;
            if ($rowShowAll != 0 ){
              while($resultShowAll = mysqli_fetch_assoc($sql)){
                $i++;
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$resultShowAll['Task']."</td>";
                echo "<td>".$resultShowAll['Time']."</td>";
                echo "<td>";
                $taskStatus = $resultShowAll['Status'] ;
                $taskId = $resultShowAll['ID'] ;
                if($taskStatus == 0) {
                  echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"btn_done\"  value = \"$taskId\" > 完成 </button>";
                }else{
                  echo "已完成";
                }
                echo "</td>";
                echo "<td>";
                //echo "<button type=\"submit\" class=\"btn btn-outline-dark\" name=\"btn_more\" > more </button>";
                echo "<button type=\"submit\" class=\"btn btn-danger\" name=\"btn_delete\" value = \"$taskId\" > delete </button>";

                echo "</td>";
                echo "</tr>";
              }
            }
          ?>  
        </form> 

    </tbody>
  </table>
</div>


<div>
<!-- 當頁點擊事件偵測 會導致原本的按鈕沒有反應-->
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
<div>
<!-- 當頁點擊事件傳值 -->





</div>



</div>
</html>

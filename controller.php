<?php
include ("dbconfig.php");


/*  login  */
if ((isset($_POST['btn_login'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    $nameFromInput = $_POST['input_name'];
    $passwordFromInput= $_POST['input_password'];

    $queryLogin = "select id userId, name userName, password userPassword from users where name ='$nameFromInput' " ;

    //$queryLogin sql_checkMember
    $checkMember = mysqli_query($connectDB, $queryLogin);  
    $row_checkMember = mysqli_num_rows($checkMember) ;
    
    if ($row_checkMember != 0 ){
        $result_checkMember = mysqli_fetch_assoc($queryLogin);
		$passwordFromInput= $_POST['input_password'];
        $userId_check = $result_checkMember['userId'];

		if($passwordFromInput == $result_checkMember['userPassword']){
            echo "login successs" ;
        }else{
            echo "login failure" ;
        }
    }else{
        echo "帳號???";
    }
}



/* add task */
if ((isset($_POST['task_add'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    $taskContent = $_POST['input_task'];
    $queryInsert = "INSERT INTO tasks (user_id, content, creat_at) VALUES (1 ,'$taskContent' ,now())" ;
    mysqli_query($connectDB, $queryInsert);   
    header('Location: index.php');
}




/*  更新task完成資料狀態  */
if ((isset($_POST['btn_done'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    $updateId = $_POST['btn_done'];
    $queryUpdate = "UPDATE tasks SET done = true ,update_at = now() WHERE id = $updateId ";
    mysqli_query($connectDB, $queryUpdate);  
    header('Location: index.php');
}


  
  
  /*  delete task  */
if ((isset($_POST['btn_delete'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    $deleteId = $_POST['btn_delete'];
    $queryDelete = "delete from tasks where id = $deleteId ";
    mysqli_query($connectDB, $queryDelete);  
    header('Location: index.php');
}


?>
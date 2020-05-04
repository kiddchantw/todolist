<?php
include ("dbconfig.php");


/*  登入  */
if ((isset($_POST['btn_login'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    $name_check = $_POST['input_name'];
    $password_check = $_POST['input_password'];

    $sql_query_checkMember = "select id userId, name userName, password userPassword from users where name ='$name_check' " ;

    $sql_checkMember = mysqli_query($connectDB, $sql_query_checkMember);  
    $row_checkMember = mysqli_num_rows($sql_checkMember) ;
    
    if ($row_checkMember != 0 ){
        $result_checkMember = mysqli_fetch_assoc($sql_checkMember);
		$password_check = $_POST['input_password'];
        $userId_check = $result_checkMember['userId'];

		if($password_check == $result_checkMember['userPassword']){
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
     //echo "input_task click <br>" ;
    $task_content = $_POST['input_task'];
     //echo "task : $task_content <br>";
    var_dump($task_content);
    $insert_query = "INSERT INTO tasks (user_id, content, creat_at) VALUES (1 ,'$task_content' ,now())" ;
    // echo "sql_query_add : $sql_query_add  <br>";

    mysqli_query($connectDB, $insert_query);   
    header('Location: index.php');
}




/*  更新task完成資料狀態  */
if ((isset($_POST['btn_done'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    echo "btn_done";
    // var_dump($_POST['btn_done']);
    $update_id = $_POST['btn_done'];
    $update_query = "UPDATE tasks SET done = true ,update_at = now() WHERE id = $update_id ";
    mysqli_query($connectDB, $update_query);  
    header('Location: index.php');
}


  
  
  /*  delete task  */
if ((isset($_POST['btn_delete'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    //echo "btn_more";
    // header('Location: index.php');
    $delete_id = $_POST['btn_delete'];
    $delete_query = "delete from tasks where id = $delete_id ";
    mysqli_query($connectDB, $delete_query);  
    header('Location: index.php');
}


?>
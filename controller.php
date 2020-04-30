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
if ((isset($_POST['input_task'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    echo "input_task click <br>" ;
    $task_content = $_POST['input_task'];
    echo "task : $task_content";
}




/*  更新task完成資料狀態  */
if ((isset($_POST['btn_done'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    echo "btn_done";
    // var_dump($_POST['btn_done']);
    $update_id = $_POST['btn_done'];
    $sql_query_update = "UPDATE tasks SET finsishOrNot = true WHERE id = $update_id ";
    mysqli_query($connectDB, $sql_query_update);  
    header('Location: index.php');
}


  
  
  
if ((isset($_POST['btn_more'])) && ($_SERVER["REQUEST_METHOD"] == "POST" ) ) {
    echo "btn_more";
    // header('Location: index.php');

}


?>
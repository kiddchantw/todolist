<?php

$host = '127.0.0.1';
$user = 'root';
$password = '1234';
$useDB = 'dbtest001';
$connectDB =  mysqli_connect($host, $user, $password, $useDB);

// $GLOBALS['connectDB'] =  mysqli_connect($host, $user, $password, $useDB ); 


function connectMySQL()
{
    global $connectDB;
    if (!$connectDB) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    // else{
    //     echo "db ok";
    // }
}


// search用mvc方式不推，因為要生成ui還是在index做比較方便
// function showAllResult($query)
// {
//     global $connectDB;
//     //$sql_query_showAll = "select id `ID`, content `Task`, finsishOrNot `Status`, creat_at `Time` from tasks where user_id = '1'";
//     //$sql = mysqli_query($connectDB, $sql_query_showAll);  
//     $sql = mysqli_query($connectDB, $query);
//     $row1_showAll = mysqli_num_rows($sql);
//     if ($row1_showAll != 0) {
//         return $row1_showAll;
//     } else {
//         return 0;
//     }
// }

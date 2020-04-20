<?php

$host = '127.0.0.1';
$user = 'root';
$password = '1234';
$useDB = 'dbtest001';
$connectDB =  mysqli_connect($host, $user, $password, $useDB );

if (! $connectDB){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}
// else{
//     echo "db ok";
// }
  

?>
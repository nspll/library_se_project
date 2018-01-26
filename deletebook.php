<?php

$isbn = $_GET['isbn'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lb";
;
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname)or die("Error Connect to Database");//เรียกฐานข้อมูล
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql2 = "SELECT * FROM transaction WHERE `isbn` = $isbn";
$result2 = mysqli_query($conn,$sql2);

if (mysqli_num_rows($result2) > 0){
	while($row = mysqli_fetch_assoc($result2)){
		$returnDate=$row['returnDate'];
		if($returnDate=="0"){
	echo "ไม่สามารถลบได้เนื่องยังไม่ได้คืนหนังสือหมายเลข isbn = ". $isbn ."";
	return;
		}
	
	
	}
}
$sql = "DELETE FROM `book` WHERE `book`.`isbn` = $isbn;";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);
?>
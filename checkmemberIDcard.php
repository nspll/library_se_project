<?php
$member_id = $_GET['member_id'];
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

//echo "หมายเลขสมาชิก ";
$member_id = $_GET['member_id'];
$sql = "SELECT * FROM member WHERE idcard= $member_id";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) == 0){
	echo "ไม่มีหมายเลขบัตรประชาชนนี้ในระบบ";
}

mysqli_close($conn);
?>
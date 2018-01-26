<?php 

//$id_employee = $_GET['employee_id'];
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

$idcard = $_GET['idcard'];
$lname = $_GET['lname'];
$sname  = $_GET['sname'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$position = $_GET['position'];
$sql2 = "SELECT * FROM member WHERE `idcard` = $idcard";
$result2 = mysqli_query($conn,$sql2);
$wrong = false;
if (mysqli_num_rows($result2) > 0){
	echo "หมายเลขบัตรประชาชนนี้มีผู้ใช้อยู่แล้ว";
	return;
}

$sql = "INSERT INTO `member` (`idcard`, `surname`, `lastname`, `tel`, `email`, `position`) VALUES ('$idcard', '$sname', '$lname', '$phone', '$email', '$position');";
$result = mysqli_query($conn,$sql);
echo "สมัครสมาชิกสำเร็จ";


mysqli_close($conn);
?>



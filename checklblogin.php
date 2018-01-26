<?php
$user = $_GET['user'];
$loginpass = $_GET['password'];
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


//$user = $_GET['user'];
$sql = "SELECT * FROM librarians WHERE idcard = '$user' && password = '$loginpass'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) == 0){
	echo "500";
}
else
{
	echo "200";
}
mysqli_close($conn);
?>
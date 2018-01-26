<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lb";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname)or die("Error Connect to Database");//เรียกฐานข้อมูล
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        
$isbn = $_GET['isbn'];
$sql2 = "SELECT * FROM book WHERE `isbn` = $isbn";
$result2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($result2) > 0){
	echo "ไม่สามารถเพิ่มได้เนื่องจากมีหมายเลข isbn = " . $isbn . " อยู่ในฐานข้อมูลแล้ว";
	return;
}


echo "YES";
mysqli_close($conn);
?>



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
$idcard  = $_GET['member_id'];

$sqlbook = "SELECT * FROM book WHERE `isbn` = $isbn";
$resultbook = mysqli_query($conn,$sqlbook);
if (mysqli_num_rows($resultbook) == 0){
		echo "ไม่สามารถยืมได้เนื่องจากมีหมายเลข isbn = " . $isbn . " ไม่อยู่ในฐานข้อมูล";
		return;
}
$rowbook = mysqli_fetch_assoc($resultbook);
$booktotal = $rowbook['booktotal'];
if($booktotal <=0){
	echo "จำนวนหนังสือของหมายเลข isbn = " . $isbn . " มีจำนวนไม่พอที่จะให้ยืม";
	return;
}


echo "YES";
mysqli_close($conn);
?>



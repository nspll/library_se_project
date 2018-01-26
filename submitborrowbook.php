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
$booktype = $rowbook['booktype'];
/*
$sqltype = "SELECT * FROM type WHERE `booktype` = $booktype";
$resulttype = mysqli_query($conn,$sqltype);
$rowtype = mysqli_fetch_assoc($resulttype);
$finePerDay = $rowtype['finePerDay']; */

$sqlmember = "SELECT * FROM member WHERE `idcard` = $idcard";
$resultmember = mysqli_query($conn,$sqlmember);
$rowmember = mysqli_fetch_assoc($resultmember);
$position= $rowmember['position'];

$sqlposition = "SELECT * FROM position WHERE `position` = $position";
$resultposition = mysqli_query($conn,$sqlposition);
$rowposition = mysqli_fetch_assoc($resultposition);
$durationBorrow	= $rowposition['durationBorrow'];

$borrowDate = date("Y-m-d");
$finalDate = date('Y-m-d', strtotime("+" . $durationBorrow ." days"));

//update booktotal
$booktotal--;
$sqlupdatebook = "UPDATE `book` SET `booktotal` = '$booktotal' WHERE `isbn` = '$isbn';";
$resultupdatebook = mysqli_query($conn,$sqlupdatebook );

//update credit
$sqlupdate3 = "UPDATE `member` SET credit = (credit-1) WHERE `idcard` = '$idcard';";
$resultupdate3 = mysqli_query($conn,$sqlupdate3);

$sql = "INSERT INTO `transaction` (`transactionID`, `idcard`, `isbn`, `borrowDate`, `finalDate`, `returnDate`, `fine`) VALUES (NULL, '$idcard', '$isbn', '$borrowDate', '$finalDate', '0', '0');";
$result = mysqli_query($conn,$sql);



echo "";
mysqli_close($conn);
?>



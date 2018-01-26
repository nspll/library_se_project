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
$bname = $_GET['bname'];
$byear  = $_GET['byear'];
$bauthor = $_GET['bauthor'];
$btype = $_GET['btype'];
$btotal = $_GET['btotal'];
$bpublisher  = $_GET['bpublisher'];

$sql2 = "SELECT * FROM book WHERE `isbn` = $isbn";
$result2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($result2) > 0){
	echo "ไม่สามารถเพิ่มได้เนื่องจากมีหมายเลข isbn = " . $isbn . " อยู่ในฐานข้อมูลแล้ว";
}
else if (mysqli_num_rows($result2) == 0){
	
$sql = "INSERT INTO `book` (`isbn`, `bookyear`, `bookname`, `booktotal`, `bookauthor`, `booktype`, `bookpublisher`) VALUES ('$isbn', '$byear', '$bname', '$btotal', '$bauthor', '$btype', '$bpublisher');";
$result = mysqli_query($conn,$sql);
echo "เพิ่มหนังสือที่มีหมายเลข isbn = " . $isbn . " เรียบร้อย";

}

mysqli_close($conn);
?>


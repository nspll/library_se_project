<?php



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





//[-------------------------------------------------------------------------เหลือแก้ไขเพิ่มเติมเยอะแยะะะ-------------------------------------------------------------------]

//$sql = "SELECT * FROM `book`  WHERE $searchtype = \'$q\' ";
$isbn = $_GET['isbn'];
$bname = $_GET['editbname'];
$byear  = $_GET['editbyear'];
$bauthor =  $_GET['editbauthor'];
$btype = $_GET['editbtype'];
$btotal = $_GET['editbtotal'];
$bpublisher  = $_GET['editbpublisher'];

$sqlupdate = "UPDATE `book` SET `bookname` = '$bname', `bookyear` = '$byear', `bookauthor` = '$bauthor', `booktype` = '$btype' , `booktotal` = '$btotal', `bookpublisher` = '$bpublisher' WHERE `isbn` = '$isbn';";
//$resultupdate = mysqli_query($conn,$sqlupdate );


//$sqlupdate = "UPDATE book SET bookname = '$bname' WHERE isbn = '$isbn';";
$resultupdate = mysqli_query($conn,$sqlupdate );

/*if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
 echo "<tr>";
	echo "<td>" . $row['isbn']."</td>";
	echo "<td>" . $row['bookname'] ."</td>" ;
	echo "<td>" . $row['bookauthor']."</td>" ;
	echo "<td>" . $row['booktype'].</td>;
	echo "<td>" . $row['bookpublisher']."</td>" ;
	echo "<td>" . $row['bookyear']."</td>";
	echo "<td>" . $row['booktotal']."</td>";
	echo "<button class="button button1" onclick ="deletebook($row['isbn'])">ลบ</button>&nbsp&nbsp<button class="button button1" onclick ="editbook($row['isbn'])">แก้ไข</button>";
    echo "</tr>";
 
 
}
}
*/
echo $isbn;
mysqli_close($conn);
?>

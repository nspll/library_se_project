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


$member_id = $_GET['member_id'];

$sql = "SELECT * FROM `transaction` RIGHT JOIN book ON book.isbn = transaction.isbn WHERE idcard = '$member_id' && returnDate = '0'";
$result =  mysqli_query($conn,$sql);

if (mysqli_num_rows($result)==0)
{
	
	echo "0";
}
echo "<table>
<tr>

<th>transactionID</th>
<th>isbn</th>
<th>รายชื่อหนังสือ</th>
<th>วันที่ยืม</th>
<th>กำหนดการคืน</th>
<th>ค่าปรับ</th>
<th>คืน</th>
</tr>";


if (mysqli_num_rows($result) > 0)
{
	echo " .";
while($row = mysqli_fetch_assoc($result)) 
{
    echo "<tr>";
   
	//echo "<td><input id=\"isbn"+$row['isbn']+"\" type=\"text\"size=\"10\" /></td>";
	echo "<td>" . $row['transactionID']."</td>";
	$tid = $row['transactionID'];
	echo "<td>" . $row['isbn'] ."</td>" ;
	echo "<td>" . $row['bookname']."</td>";
	echo "<td>" . $row['borrowDate'] ."</td>" ;
	echo "<td>" . $row['finalDate']."</td>";
	/* cal fine */
	$finalDate = $row['finalDate'];
	$diff= date_diff(date_create($finalDate),date_create(date("Y-m-d")));
    $diffdays = ($diff->format("%a"));
	$booktype = $row['booktype'];
	$sql2 = "SELECT * FROM `type` WHERE booktype = '$booktype'";
    $result2 =  mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($result2);
	if( $diff->format("%R") == "+" )
	$myfine = $row2['finePerDay'] * $diffdays;
    else $myfine = 0;
	//update fine
$sqlupdatefine = "UPDATE `transaction` SET `fine` = '$myfine' WHERE `transactionID` = '$tid';";
$resultupdatefine = mysqli_query($conn,$sqlupdatefine );
	/* end cal fine*/
	echo "<td>" . $myfine ."</td>" ;
	echo " <td><input name =\"mycheckboxes\" type=\"checkbox\" value = \"".$row['transactionID']."\"></td>";
    echo "</tr>";
}
echo "</table>";
echo " <button type=\"submit\" onclick = \"returnBook()\">ยืนยันการคืน</button> ";
}

mysqli_close($conn);
?>

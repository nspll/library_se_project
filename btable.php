<?php
$member_id =$_GET['member_id'];
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

//echo "หมายเลขสมาชิก ";
//$member_id = $_GET['member_id'];
$sql = "SELECT * FROM member WHERE idcard= '$member_id'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result)==0)
{
	echo "0";
}
if (mysqli_num_rows($result) > 0)
{
	//echo " .";
while($row = mysqli_fetch_assoc($result)) 
{
  echo "<br>"." เลขบัตรประชาชน ".$row['idcard'] . "   คุณ ".$row['surname']." ".$row['lastname']."";
  echo "<br>"."จำนวนสิทธิ์การยืมคงเหลือ   ".$row['credit']."<br>";
  echo "<br>";
  
  $credit = $row['credit'];

}
}

mysqli_close($conn);
?>

<table class="table table-striped" style="" id = "borrowtable" width="1200">

     <tr>

		
        <td>   &nbsp;&nbsp;หมายเลขIDหนังสือ : <input type="search" id = "bookid0" type="search" name="bookid" value =""  > </td>
		<td>   <button id="0" onclick = "remove_adding_borrow(id)" >ลบ</button></td>
    </tr>
 
</table>
<br>
  <button onclick = "adding_borrow(<?php echo $credit ;?>)">เพิ่มรายการยืม</button>
   <button class="button button4" onclick = "checksubmitborrowbook(<?php echo $member_id ;?>)">ยืม</button>
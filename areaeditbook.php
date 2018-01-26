
<?php

	$isbn = $_GET['isbn'];
	
	$bookname="";
	$bookauthor="";
	$booktype="";
	$bookpublisher="";
	$bookyear="";
	$booktotal="";
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







$sql = "SELECT * FROM `book`  WHERE isbn = $isbn ";
$result = mysqli_query($conn,$sql);



if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
	//$isbn =	$row['isbn'];
	$bookname=$row['bookname'];
	$bookauthor=$row['bookauthor'];
	$booktype=$row['booktype'];
	$bookpublisher=$row['bookpublisher'];
	$bookyear=$row['bookyear'];
	$booktotal=$row['booktotal'];

 }
}

?>

<h4>แก้ไขข้อมูลหนังสือที่เลือกไว้</h4>
   <table>
   <td>รหัสISBN<input id = "" type="text" name="isbn" value ="<?php echo $isbn?>" size="10" disabled> </td>
    <td>      &nbsp;&nbsp;ชื่อหนังสือ<input id = "editbname" type="text" name="bname" value ="<?php echo $bookname?>" ></td>
    <td>      &nbsp;&nbsp;   ปีที่พิมพ์ <input id = "editbyear" type="text" name="byear" size="4" value="<?php echo $bookyear?>"> </td>
	<td>	   &nbsp;&nbsp;&nbsp;&nbsp;    ผู้แต่ง     <input id = "editbauthor" type="text" name="bauthor" value ="<?php echo $bookauthor?>" ></td>
    <td>      &nbsp;&nbsp;    ประเภท 
		                                <select name="editbtype" id="editbtype" type = "text" form="categories" >
											<option value="1">นวนิยาย</option>
											<option value="2">สารคดี</option>
											<option value="3">วิทยาศาสตร์</option>
											<option value="4">มนุษยศาตร์</option>
											<option value="5">จิตวิทยา</option>
											<option value="6">เทคโนโลยี</option>
									        <option value="7">อื่นๆ</option>
											

										</select>
										</td>
	  
	  <td> &nbsp;&nbsp;   สำนักพิมพ์<input id = "editbpublisher" type="text" name="bpublisher" value ="<?php echo $bookpublisher?>" </td>
	  <td> &nbsp;&nbsp;  จำนวน(เล่ม)<input id = "editbtotal" type="text" name="btotal" value ="<?php echo $booktotal?>" ></td>
	   </table>
	   <button  class="btn btn-default" onclick = "submiteditbook(<?php echo $isbn ?>)" style="float: right;">บันทึกการแก้ไข</button>

	<?php mysqli_close($conn);?>
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





echo "หมายเลขสมาชิก คือ ";

$sql = "SELECT * FROM member ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($conn,$sql);



if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
  echo "".$row['id']." เลขบัตรประชาชน ".$row['idcard'] . "   คุณ".$row['surname']." ".$row['lastname']."";
  
 
 
}
}

mysqli_close($conn);
?>

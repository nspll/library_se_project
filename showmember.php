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







$sql = "SELECT * FROM member ";
$result = mysqli_query($conn,$sql);

echo " <table class=\"table table-condensed\"><thead>
<tr>
<th>idcard(บัตรประชาชน)</th>
<th>ชื่อ</th>

</tr></thead>
<tbody>";
if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo "<tr>";
	echo "<td>" . $row['idcard']."</td>";
	echo "<td>" . $row['surname'] ." ".$row['lastname']."</td>" ;
    echo "</tr>";
}
echo "</tbody></table>";
}

mysqli_close($conn);
?>

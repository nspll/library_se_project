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







$sql = "SELECT * FROM book ";
$result = mysqli_query($conn,$sql);

echo "<table class=\"table table\">
<tr class =\"primary\">
<th>ISBN</th>
<th>bookname</th>
<th>year</th>
<th>author</th>
<th>&nbsp publisher</th>
<th>&nbsp amount</th>


</tr>";

if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo "<tr >";
    echo "<td>" . $row['isbn'] . "</td>";
	echo "<td>" . $row['bookname']."</td>";
	echo "<td>" . $row['bookyear'] ."</td>" ;
	echo "<td>" . $row['bookauthor']."</td>";
	echo "<td>" . $row['bookpublisher'] ."</td>" ;
	echo "<td>" . $row['booktotal']."</td>";
	

    echo "</tr>";
}
echo "</table>";
}

mysqli_close($conn);
?>

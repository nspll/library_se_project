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


$transactionID = $_GET['transactionID'];
$sql = "SELECT * FROM transaction WHERE transactionID= '$transactionID'";
$result = mysqli_query($conn,$sql);
$rowfine = mysqli_fetch_assoc($result);
$fine	= $rowfine['fine'];
$isbn	= $rowfine['isbn'];
$idcard	= $rowfine['idcard'];
/*
$mydate = (date("Y-m-d"));
$sqlupdate = "UPDATE `transaction` SET `returnDate` = '$mydate' WHERE `transactionID` = '$transactionID';";
$resultupdate = mysqli_query($conn,$sqlupdate );
$sqlupdate2 = "UPDATE `book` SET booktotal = (booktotal+1) WHERE `isbn` = '$isbn';";
$resultupdate2 = mysqli_query($conn,$sqlupdate2);
$sqlupdate3 = "UPDATE `member` SET credit = (credit+1) WHERE `idcard` = '$idcard';";
$resultupdate3 = mysqli_query($conn,$sqlupdate3);
*/

echo $fine;
mysqli_close($conn);
?>


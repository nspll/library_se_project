<?PHP
     
    session_start();
     
    $_SESSION['sess_name'] = "amplysoft";
    // echo "session = ".$_SESSION['sess_name'];
     
    //echo "<br/>";
     

     
?>
<?php 
//connect
//$servername = "localhost";
//$username = "zorthr";
//$password = "Zorthr12345";
//$dbname = "zorthr";
$servername = "localhost";
$username = "";
$password = "";
$dbname = "lb";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname)or die("Error Connect to Database");//เรียกฐานข้อมูล

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php

        //session_start();
		
		
        $user = $_GET["idcard1"];
		$password= $_GET["password1"] ;
        $sql = "SELECT * FROM librarians WHERE password='".$password."' && member_id='".$user."'" ;
		//$sql = "SELECT * FROM permission INNER JOIN employee ON employee.position_id = permission.position_id WHERE employee.password='".$password."' && employee.username='".$user."'";

		$result = mysqli_query($conn,$sql);
		
		$activityarray3=array();
	    if (mysqli_num_rows($result) > 0)
	    {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
	        {
			  $employee_id=$row["ID"];
              $j_name = $row["username"] ;
              $activity =array();
	          $activity['name'] = $j_name;
	          $activityarray3[]=$activity;
			 
   			  $name = $row["name"];
			  $position_id =$row["position_id"];//get position id 
			  $approve_leave = $row["approve_leave"];
			  $approve_payment = $row["approve_payment"];
			  $authorized_payment = $row["authorized_payment"];
			  
            }
	    }
		
        $jsonact = json_encode($activityarray3);

	if(count($activityarray3)==0)
		echo 0;
	else
	{
	if($activityarray3[0]["name"]==$user)
	{
		echo 1;
		$username=$activityarray3[0]["name"];
	
		$_SESSION['login_user']= $name;
		$_SESSION['approve_payment'] = $approve_payment;
	    $_SESSION['id_employee'] = $employee_id;
     	$_SESSION['approve_leave'] = $approve_leave;
		$_SESSION['authorized_payment'] = $authorized_payment;
	
	}
	else
	{
		echo 0;
	}
	}		  

?>
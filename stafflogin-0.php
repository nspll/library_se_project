<html>
<header>
<script>
function login()
{
  var loginstatus =" ";
  var str1 = document.getElementById("idtest1").value;   
  var str2 = document.getElementById("idtest2").value;
    if (str1.length == 0 && str2.length) { 
        document.getElementById("scoreja").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            loginstatus =  this.responseText;
			  //document.getElementById("scoreja").innerHTML =  this.responseText;
            }
        };
        xmlhttp.open("GET", "login.php?idtest1=" + str1+"&idtest2="+str2, true);
		xmlhttp.send();
		
    }
	
	if(loginstatus!="username correct")
	{
	   alert("success");
	   window.location.href = 'localhost/seproject/hitest4.php';
	   
	}
	else 
	 alert("log in failed password or username wrong");
}
</script>
</header>
<body>
username: <input type="text" name="idcard" id="idcard1"  value = "">
password: <input type="password" name="password" id="password1"  value = ""> 
<br><button onclick ="login()" > submit </button>
<p>RESULT: <span id="scoreja"></span></p> 
</body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title><?php echo $_SESSION['hello11'];?></title>
 <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<style>
body {font-family: "Lato", sans-serif;}

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ffffff;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ffffff;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 3px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: #F5A9A9; 
    color: white; 
    border: 2px solid #F5A9A9;
}

.button1:hover {
    background-color: #FBEFF8;
    color: #DF013A;
}
.button2 {
    background-color: #2E64FE; 
    color: white; 
    border: 2px solid #2E64FE;
}

.button2:hover {
    background-color: #0080FF;
    color: #CEE3F6;
}
.button3 {
    background-color: #FE2E2E; 
    color: white; 
    border: 2px solid #FE2E2E;
}

.button3:hover {
    background-color: #F5A9A9 ;
    color: #CEE3F6;
}
.button4 {
    background-color: #008000; 
    color: white; 
    border: 2px solid #ffffff;
}

.button4:hover {
    background-color: #1aff1a ;
    color: #CEE3F6;
}
<style type="text/css">
    .container.custom-container {
      padding: 0 1px;
    }
</style>
</style>

</head><body background="pic02.png"style="background-color:black;">
<?php
//echo $_SESSION['login_user'];//echo $_SESSION['id_employee'];
?>
<?php
/*
 if($_SESSION['approve_leave'] == "yes")
 { $tab1 = "";} 
 else
 {$tab1 = "display:none";
 }

 if($_SESSION['approve_payment'] == "yes")
 { $tab2 = "";} 
 else
 {$tab2 = "display:none";
 }
 
 
 if($_SESSION['authorized_payment'] == "yes")
 { $tab3 = "";} 
 else
 {$tab3 = "display:none";
 }
 
 */
 
 ?>
 

    
      <div style="margin-left:90%; margin-top:1%;"> 
        <a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
		
      </div> <br>
     



<div class="custom-container container" >

<div class="tab">
  <button class="tablinks" onclick="createtab(event, 'searchbook');" style ="background-color:#ffcccc;">ค้นหาหนังสือ</button>
  <button class="tablinks" onclick="createtab(event, 'addbook');"    style ="background-color:lightblue;">เพิ่มหนังสือใหม่</button>
  <button class="tablinks" onclick="createtab(event, 'borrowbook');setborrownum();" style ="background-color:lightgreen;<?php echo ""?> ">ยืมหนังสือ</button>
  <button class="tablinks" onclick="createtab(event, 'returnbook');" style ="background-color:#6699FF	;<?php echo "display:none"?> ">คืนหนังสือ</button>
  <button class="tablinks" onclick="createtab(event, 'register');"   style ="background-color:#F57272	;<?php echo ""?> ">สมัครสมาชิก</button>
  <button class="tablinks" onclick="createtab(event, 'member');showmember();" style ="background-color:#CCFF33;<?php echo ""?> ">รายชื่อสมาชิก</button>
  <button class="tablinks" onclick="createtab(event, 'sruppayment');" style ="background-color:#FFF176;<?php echo "display:none"?> ">อื่นๆ</button>
  </div>


  <div id="register" class="tabcontent" style ="background-color:#F57272;">
 
            หมายเลขบัตรประชาชน&nbsp&nbsp<input type="text" name = " idcard"value = "" id="idcard"/>
    <br><br>ชื่อ&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name = " sname"value = "" id="sname"/>
    &nbsp&nbspสกุล&nbsp&nbsp<input type="text" name = "lname"value = "" id="lname"/>
    <br><br>เบอร์โทรศัพท์&nbsp&nbsp<input type="text" name = "phone"value = "" id="phone"/>
	&nbsp&nbspemail&nbsp&nbsp<input type="text" name = "email"value = "" id="email"/>
	<br><br> สถานะ<br>
	
		<input type="radio" name="position" onclick="myPosition(this.value)" value = 1> อาจารย์<br>
		<input type="radio" name="position" onclick="myPosition(this.value)" value = 2 > นักเรียน <br> 
		<input type="radio" name="position" onclick="myPosition(this.value)" value = 3> เจ้าหน้าที่<br>
	
    <br><br><button type="submit" onclick = "regis()">บันทึก</button>

  </div>
  <div id="sruppayment" class="tabcontent" style ="background-color:#FFF176;" >
  <span id = "damo5"></span>
  </div>
<div id="searchbook" class="tabcontent" style ="background-color:#ffcccc;">
  <h3>ค้นหาหนังสือ</h3><br>
  
  <br>
  <h4>หมายเลขIDหนังสือ : <input type="search" id = "book_id" type="search" name="book_id" value =""  >  
  <br> หรือ  
  <h4>ชื่อหนังสือ : <input id = "book_name" type="search" name="book_name" value ="" > &nbsp;&nbsp; 
                  ชื่อผู้แต่ง : <input id = "book_author" type="search" name="book_author" value ="" >   
  </h4>
  <h4>สำนักพิมพ์ : <input id = "book_publish" type="search" name="book_publish" value ="" >   &nbsp;&nbsp;
                   ปีที่พิมพ์ : <input id = "book_year" type="search" name="book_year" value ="" >    &nbsp;&nbsp;
	       ประเภท :   <select name="" id="book_type" form="categories" >
											<option value="1">นวนิยาย</option>
											<option value="2">สารคดี</option>
											<option value="3" >วิทยาศาสตร์</option>
											<option value="4">มนุษยศาตร์</option>
											<option value="5">จิตวิทยา</option>
											<option value="6" >เทคโนโลยี</option>
									        <option value="7">อื่นๆ</option>
										
											
										</select>		   
  </h4>
  
   <button type="submit"class="btn btn-danger" onclick="searchingbook()"><span class="glyphicon glyphicon-search"></span>ค้นหา</button>

   <br>
   <br>
  
   <br> <span id="bookdata"></span>
   <br>
 <!--
  <button class="button button1" onclick = "bookhistory(1)">คลาสปุ่มสวยๆ</button>

 
   <br>


   <div id="bookhistory"><b>ผลจากการกด คลาสปุ่มสวยๆ</b></div>

   <br>
 -->
   
</div>



<div id="addbook" class="tabcontent" style ="background-color:lightblue;">

  
  
  
 <p>
<script> 
var currdate = new Date().toLocaleDateString('ko-KR');
 document.write(currdate);
 </script>

</p>

<h5>เพิ่มรายการหนังสือ
  </h5>
  <br>
  
<table style="" id = "mytable" width="">

     <tr>
	     
		<td>รหัสISBN<input id = "isbn" type="text" name="isbn" value ="" size="10" ></td>
        <td>   &nbsp;&nbsp;ชื่อหนังสือ<input id = "bname" type="text" name="bname" value ="" ></td>
        <td>   &nbsp;&nbsp;   ปีที่พิมพ์ <input id = "byear" type="text" name="byear" size="4"></td> 
		<td>   &nbsp;&nbsp;&nbsp;&nbsp;    ผู้แต่ง     <input id = "bauthor" type="text" name="bauthor" value ="" ></td>
        <td>   &nbsp;&nbsp;    ประเภท 
		                                <select name="btype" id="btype" type = "text" form="categories" >
											<option value="1">นวนิยาย</option>
											<option value="2">สารคดี</option>
											<option value="3">วิทยาศาสตร์</option>
											<option value="4">มนุษยศาตร์</option>
											<option value="5">จิตวิทยา</option>
											<option value="6">เทคโนโลยี</option>
									        <option value="7">อื่นๆ</option>
											
										</select>
										
	   </td>
	   <td>   &nbsp;&nbsp;   สำนักพิมพ์<input id = "bpublisher" type="text" name="bpublisher" value ="" ></td>
	    <td>   &nbsp;&nbsp;  จำนวน(เล่ม)<input id = "btotal" type="text" name="btotal" value =" " > </td>
		<td>&nbsp&nbsp <button id="0" onclick="remove_adding(0)" >ลบ</button></td>
    </tr>
 
</table>

<button class="button button2" onclick = "adding()">เพิ่มรายการ</button>   
<button class="button button3" onclick = "checksubmitaddingbook()">ยืนยัน</button>   
   <br>





</div>

<div id="borrowbook" class="tabcontent" style ="background-color:lightgreen;">
<h3>ทำการยืม-คืนหนังสือ</h3>
 <p>
<script> 
var currdate = new Date().toLocaleDateString('ko-KR');
 document.write(currdate);
 </script>

</p>
  รหัสสมาชิก: <input id = "member_id" type="text" name="member_id" value ="" > 
  <button onclick="checkmemberIDcard()">ยืนยัน</button>
  <br><br>
  <span id="btable"></span>
  

<div id="showleave"<b>ตารางแสดงรายการยืมและกำหนดส่ง</b></div>
</div>
<div id="returnbook" class="tabcontent" style ="background-color:#6699FF;">
<h3>คืนหนังสือ</h3><span id="aptest" ></span>
<span id="sshowpayment">loading....</span>

</div>

<div id="member" class="tabcontent"   style ="background-color:#CCFF33;" >
<span id="showmember" >loading...</span>
</div>

<script type="text/javascript">
        var number = 0;
		var iaddbook = [];
		iaddbook[number] = number;
		var borrownum = 1;
		var addingbooknum = 1;
		var countiaddborrow = 0;
		var iaddborrow = [];
		iaddborrow[countiaddborrow] = countiaddborrow;
        function show() { document.getElementById('area').style.display = ''; }
        function hide() { document.getElementById('area').style.display = 'none'; }
      
	    
        function adding()
        {
			
			number++;
            document.getElementById("mytable").insertRow(number).innerHTML =  "<tr><td>&nbsp;&nbsp;รหัสISBN <input id=\"isbn"+(number)+"\" type=\"text\"size=\"10\" /></td><td>&nbsp;&nbsp;ชื่อหนังสือ <input id=\"bname"+(number)+"\" type=\"text\" /></td><td>ปีที่พิมพ์ <input id=\"byear"+(number)
			+"\" type=\"text\" size=\"4\" /></td><td>&nbsp;&nbsp;&nbsp;ผู้แต่ง    <input id=\"bauthor"+(number)
			+"\" type=\"text\" /></td><td>&nbsp;&nbsp;&nbsp;ประเภท<select id=\"btype"
			+(number)+"\" ><option value=\"1\">นวนิยาย</option><option value=\"2\">สารคดี</option><option value=\"3\" >วิทยาศาสตร์</option><option value=\"4\">มนุษยศาสตร์</option><option value=\"5\">จิตวิทยา</option><option value=\"6\" >เทคโนโลยี</option><option value=\"7\">อื่นๆ</option></select> </td><td>&nbsp;&nbsp;&nbsp;สำนักพิมพ์<input id=\"bpublisher"+(number)
			+"\" type=\"text\" /></td><td>&nbsp;&nbsp;&nbsp;จำนวน(เล่ม)<input id=\"btotal"+(number)
			+"\" type=\"text\" /></td><td>&nbsp;&nbsp;&nbsp;<button  id=\""+(number)+"\"onclick=\"remove_adding(this.id)\">ลบ</button></td></tr>";
			iaddbook[number] = number;
			addingbooknum++;
			
        }  
				
		
	    function remove_adding(id)
        {
			document.getElementById("mytable").rows[id].innerHTML="";
			iaddbook[id] = -1;
		addingbooknum--;
					
        }
		
function checksubmitaddingbook()
{   
var check=true;
var count=0;
for(var i = 0 ; i<=number;i++){
	if(iaddbook[i]==-1) continue;
	if(iaddbook[i]==0) iaddbook[i]="";
	
	var isbn   = document.getElementById("isbn"+iaddbook[i]+"").value; 
		alert("isbn = "+isbn+"");
	var bname    = document.getElementById("bname"+iaddbook[i]+"").value;  
	var byear   = document.getElementById("byear"+iaddbook[i]+"").value; 
	var bauthor = document.getElementById("bauthor"+iaddbook[i]+"").value;
	var btype   = document.getElementById("btype"+iaddbook[i]+"").value;
	var bpublisher   = document.getElementById("bpublisher"+iaddbook[i]+"").value;
	var btotal   = document.getElementById("btotal"+iaddbook[i]+"").value;
	
if(isbn=="" || bname=="" || byear==""||bauthor ==""||btype==""||bpublisher==""||btotal=="")
    {
		check=false;
		}
    else 
    {
	 if (window.XMLHttpRequest) { 
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                //document.getElementById("idcard").innerHTML = this.responseText;
				if(this.responseText.trim() != "YES"){
			     alert(""+this.responseText);
				} else count++;
				
				if(count == addingbooknum && check == true) submitaddingbook();
				
            }
			
        };
        xmlhttp.open("GET","checksubmitaddingbook.php?isbn="+isbn+"&bname="+bname+"&byear="+byear+"&bauthor="+bauthor+"&btype="+btype+"&bpublisher="+bpublisher+"&btotal="+btotal,true);
        xmlhttp.send();
	}
    }
	if(check==false)  alert("กรุณากรอกข้อมูลให้ครบ");
	
}

function submitaddingbook()
{   

for(var i = 0 ; i<=number;i++){
	if(iaddbook[i]==-1) continue;
	if(iaddbook[i]==0) iaddbook[i]="";
	
	var isbn   = document.getElementById("isbn"+iaddbook[i]+"").value; 
	var bname    = document.getElementById("bname"+iaddbook[i]+"").value;  
	var byear   = document.getElementById("byear"+iaddbook[i]+"").value; 
	var bauthor = document.getElementById("bauthor"+iaddbook[i]+"").value;
	var btype   = document.getElementById("btype"+iaddbook[i]+"").value;
	var bpublisher   = document.getElementById("bpublisher"+iaddbook[i]+"").value;
	var btotal   = document.getElementById("btotal"+iaddbook[i]+"").value;
	

	 if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                //document.getElementById("idcard").innerHTML = this.responseText;
	
				
            }
			
        };
        xmlhttp.open("GET","submitaddingbook.php?isbn="+isbn+"&bname="+bname+"&byear="+byear+"&bauthor="+bauthor+"&btype="+btype+"&bpublisher="+bpublisher+"&btotal="+btotal,true);
        xmlhttp.send();
	
    }
	 alert("เพิ่มหนังสือเรียบร้อย");
	 location.reload();

}
		

function checksubmitborrowbook(member_id)
{   
var check=true;
var count=0;
for(var i = 0 ; i<=countiaddborrow;i++){
	 
	if(iaddborrow[i]==-1) continue;
	
	var isbn   = document.getElementById("bookid"+iaddborrow[i]+"").value; 
		alert("isbn = "+isbn+"");
	
if(isbn=="")
    {
		check=false;
		}
    else 
    {
	 if (window.XMLHttpRequest) { 
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                //document.getElementById("btable").innerHTML = this.responseText;
				if(this.responseText.trim() != "YES"){
			     alert(""+this.responseText);
				} else count++;
				
				if(count == borrownum && check == true) submitborrowbook(member_id);
			}
			
			
        };
        xmlhttp.open("GET","checksubmitborrowbook.php?isbn="+isbn+"&member_id="+member_id,true);
        xmlhttp.send();
	}
    }
    if(check==false) alert("กรุณากรอกข้อมูลให้ครบ");

	
}

function submitborrowbook(member_id)
{   

for(var i = 0 ; i<=countiaddborrow;i++){
 
	if(iaddborrow[i]==-1) continue;
	
	var isbn   = document.getElementById("bookid"+iaddborrow[i]+"").value; 

	 if (window.XMLHttpRequest) { 
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
                //document.getElementById("btable").innerHTML = this.responseText;
		
            }
			
        };
        xmlhttp.open("GET","submitborrowbook.php?isbn="+isbn+"&member_id="+member_id,true);
        xmlhttp.send();
		 
	}
       alert("ยืมหนังสือเรียบร้อย");
		 location.reload();
	
}
		
		function remove_adding_borrow(id)
		{
			document.getElementById("borrowtable").rows[id].innerHTML="";
			borrownum--;
			 iaddborrow[id]=-1;
		}
		
		function setborrownum()
		{
			document.getElementById("borrowtable").innerHTML = "<tr></tr>";
			borrownum=0;
		}
		
		function adding_borrow(amount_max)
		{
		   
			if(borrownum<amount_max)
			{
				countiaddborrow++;
		      document.getElementById("borrowtable").insertRow(countiaddborrow).innerHTML = "<tr><td><br>&nbsp;&nbsp;หมายเลขIDหนังสือ : <input type=\"search\" id = \"bookid"+countiaddborrow+"\" type=\"search\" name=\"bookid\" value =\"\"  /></td><td><button id=\""+countiaddborrow+"\" onclick= \"remove_adding_borrow(id)\" >ลบ</button></td></tr>";
	          borrownum++;
			  iaddborrow[countiaddborrow]=countiaddborrow;
			}
			else if (borrownum>=amount_max)
			{
				alert("ครบจำนวนสิทธ์ที่ยืมได้แล้ว");
			}
			
		}
			
	
      
		
		
 </script>       
<script>
var positiontype = "ยังไม่ได้กำหนดค่า ";
var positionID = "";    
		  function myPosition(position){
			  positionID = position;
		  if(position==1) 
		   positiontype = "อาจารยื";
	      else if(position==2) 
		   positiontype = "นักเรียน";
	      else if(position==3) 
		   positiontype = "เจ้าหน้าที่ี";
		  }
		  
function createtab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function regis()
{   var check = true;
	
	var idcard   = document.getElementById("idcard").value; 	
	var sname    = document.getElementById("sname").value;  
	var lname    = document.getElementById("lname").value; 
	var phone    = document.getElementById("phone").value;
	var email    = document.getElementById("email").value;

if(idcard=="" || sname=="" || lname==""||phone==""||email==""||positionID==0)
    {alert("กรุณากรอกข้อมูลให้ครบ");}
   else 
    {
		
	 if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
              // document.getElementById("damo5").innerHTML = this.responseText;
			   if(this.responseText.trim()=="หมายเลขบัตรประชาชนนี้มีผู้ใช้อยู่แล้ว"){
			   alert(""+this.responseText);
			   return;
			   }
           }
			
        };
        xmlhttp.open("GET","regismember.php?phone="+phone+"&idcard="+idcard+"&sname="+sname+"&lname="+lname+"&email="+email+"&position="+positionID,true);
        xmlhttp.send();
		
    
    showidmember();
	location.reload();
	
    }
	alert("สมัครสมาชิกเสร็จเรียบร้อย");
	
}

function showidmember()
{

	var id;
	if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                id = this.responseText;
				
            }
        };
        xmlhttp.open("GET","showid.php",true);
        xmlhttp.send();
		
		
}

function checkmemberIDcard(){
	var member_id = document.getElementById("member_id").value; 
   if(member_id=="")
    {alert("กรุณาใส่หมายเลขสมาชิก");}
    else 
    {
		
	 if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
			
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				//document.getElementById("btable").innerHTML = this.responseText;
			   if(this.responseText.trim()=="ไม่มีหมายเลขบัตรประชาชนนี้ในระบบ"){
			    alert(""+this.responseText);
			   } else showdatamember(member_id);
				
            }
			
        };
		  
        xmlhttp.open("GET","checkmemberIDcard.php?member_id="+member_id,true);		
        xmlhttp.send();

   }
}

function showdatamember(member_id)
{
alert(member_id);
	 if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
			
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
               document.getElementById("btable").innerHTML = this.responseText;
	
            }
			
        };
		  
        xmlhttp.open("GET","btable.php?member_id="+member_id,true);		
        xmlhttp.send();

}




function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}

function showmember()
{
   if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
			
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
               document.getElementById("showmember").innerHTML = this.responseText;
			   
				
            }
			
        };
		  
        xmlhttp.open("GET","showmember.php",true);
        xmlhttp.send();
}


</script>
     
</body>
</html> 

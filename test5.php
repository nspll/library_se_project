<?php session_start();?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-flat.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title><?php echo $_SESSION['hello11'];?></title>
 <meta charset="UTF-8">
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
<style> 
input[type=text] {
    //width: 50px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
   font-size: 16px;
   color : black ;
    background-color: white;
   // background-image: url('searchicon.png');
   // background-position: 10px 10px; 
   // background-repeat: no-repeat;
    padding: 1px 1px 2px 1px;
    //-webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

//input[type=text]:focus {
//    width:50%;
//}
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
    background-color: #0080FF; 
    color: white; 
    border: 1px solid #045FB4;
	border-radius: 5px;
}

.button1:hover {
    background-color:#A9E2F3;
    color: white;
	border-radius: 5px;
	border: 2px solid white;
}

.resizedTextbox {width: 10px; height: 20px}
<style type="text/css">
    .container.custom-container {
      padding: 0 1px;
    }
	
</style>
</style>

</head><body background="pic02.png"style="background-color:black;">



    
      <div style="margin-left:90%; margin-top:1%;"> 
        <a href="lblogin.html" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-in" ></span> Log in
        </a>
		
      </div> <br>
     





 
 
<div class="w3-container w3-flat-peter-river">
  <h3>ค้นหาหนังสือ</h3><br>
  
  <br>

 
  <!--button type="submit"class="btn btn-danger" onclick="searchingbook()"><span class="glyphicon glyphicon-search"></span>ค้นหา</button-->
 


  

  <h5>ค้นหาด้วย
  <select style =" "class="selectpicker show-tick"  data-width="fit" name="searchType" id="searchType" form="catagories" >
  <option value="isbn">                                 รหัสisbn          </option>
  <option value="bookname">                    ชื่อหนังสือ                         </option>
  <option value ="bookpublisher">        สำนักพิมพ์                       </option>
  <option value="bookauthor">                        ผู้แต่ง                              </option>
</select>
<input id="book_id" value="" type="text" name="book_id" STYLE='color=#000000' />
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button type="submit"class="btn btn-primary" onclick="searchingbook()"><span class="glyphicon glyphicon-search" >ค้นหา</button>
</h5>

  
 <h4>
 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
 
   <br>
    <span id="txtSearchbook"></span>
   <br>
   
  
   <br>
    <button class="button button1" onclick = "showallbook()" data-toggle="collapse" data-target="#showallBooks"  >แสดงรายการหนังสือทั้งหมด</button>
   <span class="collapse" id="showallBooks"> </span>
    
   <br> <span id="bookdata"></span>
   <br>
   
</div>
 
   





<script type="text/javascript">
      

var checkedValue = null; 
    var inputElements = document.getElementsByClassName('messageCheckbox');
    for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
           break;
      }
	}
	var checkedBoxes = document.querySelectorAll('input[name=mycheckboxes]:checked');
	var n = checkedBoxes.length;


function showallbook() 
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
			
              // document.getElementById("showallbooks").innerHTML = this.responseText;
			   document.getElementById("showallBooks").innerHTML = this.responseText;
				
            }
			
        };
		  
        xmlhttp.open("GET","showallbook.php",true);
        xmlhttp.send();
}



function searchingbook()
{
	
	var str =  document.getElementById("book_id").value;  
	var e = document.getElementById("searchType");
        searchtype = e.options[e.selectedIndex].value;
	 
	
	
	 if (window.XMLHttpRequest) { 
            // code for IE7+, Firefox, Chrome, Opera, Safari
			
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) { 
			
              // document.getElementById("showallbooks").innerHTML = this.responseText;
			   document.getElementById("txtSearchbook").innerHTML = this.responseText;
				
            }
			
        };
		  
        xmlhttp.open("GET","searchbookui.php?q="+str+"&searchtype="+searchtype,true);
        xmlhttp.send();
}




</script>
     
</body>
</html> 

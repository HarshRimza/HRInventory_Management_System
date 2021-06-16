<!Doctype html>
<html>
<head>
<title>Inventory Management System</title>
<style>
.title
{
font-size:40px;
color:#00C4FF;
text-align:center;
font-weight:bold;
}
.aim
{
font-size:17px;
margin-left:10px;
text-align:center;
margin-bottom:15px;
}
body
{
margin: 0 auto;
background-position: center;
background-size: contain;
}
.menu
{
position: sticky;
top: 0;
background-color: #0081A2;
padding:10px 0px 10px 0px;
color:white;
margin: 0 auto;
overflow: hidden;
}
.menu a
{
float: left;
color: white;
display : block;
text-align: center;
padding: 14px 16px;
text-decoration:none;
font-size: 20px;
}
.menu_log
{
right:auto;
float:right;
}
footer 
{
width:100%;
bottom:0px;
background-color:#CED9C8;
position:sticky;
padding-top:30px;
padding-bottom:60px;
text-align:center;
color:#878E83;
font-size:30px;
font-weight:bold;
}

button
{
color: #878E83;
background-color: #CED9C8;
font-weight: bold;
border: 1px solid #878E83;
font-size: 16px;
}

.body_sec
{
text-align: center;
color: #878E83;
font-size:18px;
font-weight:bold;
line-height: 30px;
}

table.scrolldown
{
width:100%;
border-spacing:0;
}

table.scrolldown tbody 
{ 
width:100%;
height: 150px;  
overflow-y: scroll;  
overflow-x: hidden;  
} 
th,td
{
text-align: left;
padding: 8px;
}
tr:nth-child(even){background-color:#f2f2f2}
th
{
background-color:#0081A2;
color:white;
}
</style>
</head>
<body>

<header>
<div class="title">INVENTORY MANAGEMENT SYSTEM</div>
<div class="aim">A PHP PROJECT</div>
</header>

<div class="menu">
<a href="homepage.php">HOME</a>
<a href="add.php" > ADD ITEM </a>
<a href="update.php">UPDATE ITEM</a>
<a href="delete.php">DELETE ITEM</a>
<div class="menu_log">
<a href="contact.php">CONTACT US</a>
</div>
</div>

<article>
<div class="body_sec">
<section id="Content">
<section id="form">
<div class="body_sec"><h3> ITEM ( " LIST DISPLAY "  )</h3></div>
<form name="reg_form" action="showItems.php" method="POST">
<div class="body_sec">SEARCH : <input type="text" placeholder="Item name" name="item"> <button type="submit" name="search" >SEARCH</button></div>
</form>
</section>
<br>
<table class="scrolldown">
<?php
$con=mysqli_connect('localhost','root','','item');
if($con===false)
{
die("ERROR:could not connect.".mysqli_connect_error());
}
$q="SELECT * FROM item";
$result=mysqli_query($con,$q);
if($result===false)
{
die("ERROR:Query not executed");
}
$count=mysqli_num_rows($result);
if($count>0)
{
echo"<thead>";
echo"<tr>";
echo"<th>ITEM CODE</th>";
echo"<th>ITEM NAME</th>";
echo"<th>ITEM PRICE</th>";
echo"<th>ITEM CATEGORY</th>";
echo"</tr>";
echo"</thead>";
echo"<tbody>";

for($i=1;$i<=$count;$i++)
{
$row=mysqli_fetch_array($result);
echo"<tr>";
echo"<td>".$row['code']."</td>";
echo"<td>".$row['item']."</td>";
echo"<td>".$row['price']."</td>";
echo"<td>".$row['category']."</td>";
echo"</tr>";
}
echo"</tbody>";
echo"</table>";
mysqli_free_result($result);
}
else
{
echo"No record found";
}
mysqli_close($con);
?>
</section>
</div>
</article>

<footer>BY SHRI VAISHNAV VIDYAPEETH VISHWAVIDHYALAYA, INDORE | All rights Reserved. </footer>
</body>
</html>
<?php
if(isset($_POST['search']))
{
$item=$_POST['item'] ;
if(!$item)
{
echo '<script language="javascript">';
echo 'alert("Please enter item name")';
echo '</script>';
exit();
}
$connection=new mysqli('localhost','root',"",'item');
if($connection->connect_error)
{
die("ERROR:Could not connect".$connection->connect_error);
}	
$statement="SELECT * FROM item WHERE item='$item' ";
if($result=$connection->query($statement)) 
{
if(mysqli_num_rows($result)>0)
{
$row=mysqli_fetch_array($result);
$code=$row['code'];
$item=$row['item'];
$price=$row['price'];
$category=$row['category'];
echo '<script language="javascript">';
echo 'alert("Item exist : \n  Code : '.$code.' \n  Name : '.$item.' \n  Price : '.$price.' \n  Category : '.$category.'")';
echo '</script>';
mysqli_free_result($result);
}
else 
{
echo '<script language="javascript">';
echo 'alert("Item does not exists")';
echo '</script>';
}
}
$connection->close() ;
}
?>    
   
  
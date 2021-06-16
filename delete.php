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
align
{
text-align: center;
color: #878E83;
font-size:18px;
font-weight:bold;
line-height: 30px;
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
position:absolute;
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
font-size: 18px;
font-weight: bold;
line-height: 30px;
}
</style>
</head>
<body>

<header>
<div class="title">INVENTORY MANAGEMENT SYSTEM</div>
<div class="aim">A PHP PROJECT</div>
</header>

<div class="menu">
<a href="homepage.php" >HOME</a>
<a href="add.php">ADD ITEM</a>
<a href="update.php">UPDATE ITEM</a>
<a href="showItems.php">SHOW LIST OF ITEM</a>
<div class="menu_log">
<a href="contact.php">CONTACT US</a>
</div>
</div>


<br>
<section id="form">
<div class="body_sec">ITEM ( " DELETE MODULE "  )</div><br>
<form name="item" action="delete.php" method="POST">
<div class="body_sec">ITEM CODE : <input type="text" placeholder="Item code" name="code"/></div><br>
	    <button type="submit" style="margin-left:39%;margin-top:2%" formaction="homepage.php">CANCEL</button>
                    <button type="submit" name="delete" style="margin-left:10%;margin-top:2%" >DELETE</button>

</form>
</section>

<footer>BY SHRI VAISHNAV VIDYAPEETH VISHWAVIDHYALAYA, INDORE | All rights Reserved. </footer>
</body>
</html>
</body>
</html>	   

<?php
if(isset($_POST['delete']))
{
$code=$_POST['code'] ;
if(!$code)
{
echo '<script language="javascript">';
echo 'alert("Please enter code")';
echo '</script>';
exit();
}
if($code<1)
{
echo '<script language="javascript">';
echo 'alert("Please enter code")';
echo '</script>';
exit();
}
$connection=new mysqli('localhost','root',"",'item');
if($connection->connect_error)
{
die("ERROR:Could not connect".$connection->connect_error);
}	
$statement="SELECT * FROM item WHERE code=$code";
if($result=$connection->query($statement)) 
{
if(mysqli_num_rows($result)>0)
{
$statement="DELETE FROM item WHERE code=$code";
if($connection->query($statement)===true)
{
echo '<script language="javascript">';
echo 'alert("Item deleted successfully")';
echo '</script>';
}
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
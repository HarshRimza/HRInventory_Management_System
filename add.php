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

<script type="text/javascript">
var ImgArray = [
  "images/m1.jpg",
  "images/m4.png",
  "images/m3.jpeg",
];

function ChangeImg(imgPtr) 
{
document.getElementById('CommonImg').src = ImgArray[imgPtr];
}
</script>

</head>
<body>

<header>
<div class="title">INVENTORY MANAGEMENT SYSTEM</div>
<div class="aim">A PHP PROJECT</div>
</header>

<div class="menu">
<a href="homepage.php">HOME</a>
<a href="update.php">UPDATE ITEM</a>
<a href="delete.php">DELETE ITEM</a>
<a href="showItems.php">SHOW LIST OF ITEM</a>
<div class="menu_log">
<a href="contact.php">CONTACT US</a>
</div>
</div>


<br>
<section id="form">
<div class="body_sec">ITEM ( " ADD MODULE "  )</div><br>
<form name="item" action="add.php" method="POST">
<div class="body_sec">ITEM NAME : <input type="text" placeholder="Item name" name="item"/></div><br>
<div class="body_sec">ITEM PRICE : <input type="text" placeholder="Item price" name="price"/></div><br>
<div class="body_sec">ITEM CATEGORY :  
                              <input type="radio" name="category" value="0" checked=true onclick="ChangeImg(this.value)" > FINISHED GOODS
                              <input type="radio" name="category" value="1" onclick="ChangeImg(this.value)" > RAW MATERIAL
                              <input type="radio" name="category" value="2" onclick="ChangeImg(this.value)" > CONSUMABLE
                              </div>  <br>
<center>
<img id="CommonImg" src="" alt="" height="100" width="125"></center>
<br>
	    <button type="submit" name="cancel" style="margin-left:40%;margin-top:2%" formaction="homepage.php">CANCEL</button>
                    <button type="submit" name="add" style="margin-left:10%;margin-top:2%" >ADD</button>

</form>
</section>

<footer>BY SHRI VAISHNAV VIDYAPEETH VISHWAVIDHYALAYA, INDORE | All rights Reserved. </footer>

</body>
</html>
</body>
</html>
	
<?php
if(isset($_POST['add']))
{
$item=$_POST['item'] ;
$price=$_POST['price'] ;
$category=$_POST['category'];
if(!$item)
{
echo '<script language="javascript">';
echo 'alert("Please enter name")';
echo '</script>';
exit();
}
if(!$price)
{
echo '<script language="javascript">';
echo 'alert("Please enter price")';
echo '</script>';
exit();
}
if($category=="0")
{
$category="Finished Goods";
}
if($category=="1")
{
$category="Raw Material";
}
if($category=="2")
{
$category="Consumable";
}
$connection=new mysqli('localhost','root',"",'item');
if($connection->connect_error)
{
die("ERROR:Could not connect".$connection->connect_error);
}	
$statement="INSERT INTO item (item,price,category) VALUES ('$item','$price','$category')";
if($connection->query($statement)===TRUE) 
{
echo '<script language="javascript">';
echo 'alert("Item added successfully")';
echo '</script>';
}
else 
{
echo '<script language="javascript">';
echo 'alert("Item exists")';
echo '</script>';
}
$connection->close() ;
}
?>   
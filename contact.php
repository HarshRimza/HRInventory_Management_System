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
position:fixed;
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
.error {color: #FF0000;}

</style>
</head>
<body>  
<header>
<div class="title">INVENTORY MANAGEMENT SYSTEM</div>
<div class="aim">A PHP PROJECT</div>
</header>

<div class="menu">
<a href="add.php" > HOME </a>
<a href="add.php" > ADD ITEM </a>
<a href="update.php">UPDATE ITEM</a>
<a href="delete.php">DELETE ITEM</a>
<a href="showItems.php">SHOW LIST OF ITEM</a>
<div class="menu_log">
<a href="contact.php">CONTACT US</a>
</div>
</div>

<div class="body_sec">
<section id="Content">
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<center>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<table>
<tr>
<td> NAME : </td>
<td><input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span></td>
</tr>
<tr>
<td> E-MAIL : </td>
<td><input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></td>
</tr>
<tr>
<td> WEBSITE : </td>
<td><input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span></td>
</tr>
<tr>
<td> COMMENT : </td>
<td><textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea></td>
</tr>
</tr>
<td> GENDER : </td>
<td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">FEMALE
       <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">MALE
       <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">OTHER  
       <span class="error">* <?php echo $genderErr;?></span></td>
</tr>
</table>  
<button type="submit" name="submit" >SUBMIT</button>  

</form>
</section>
</div>

<footer>BY SHRI VAISHNAV VIDYAPEETH VISHWAVIDHYALAYA, INDORE | All rights Reserved. </footer>
</body>
</html>
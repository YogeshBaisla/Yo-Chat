<html>
<head>
<title> CHAT </title>
</head>
<style>
div.a{
text-align: right;
}
body
{
  background-image: url('whatsapp.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<form action="msg.php" method="POST">
<div class="a"><input type="submit" name="chp" value="Change Password">
<input type="submit" name="sout" value="Sign Out">
<input type="submit" name="blog" value="WRITE BLOG"></div>
<input type="text" name="tname" placeholder="Name you want other to see">
<input type="text" name="msg" placeholder="Type your message">
<input type="submit" name="submit" value="submit"></form>
<?php
echo '<form action="show_msg.php" method="POST">
<div class="a"><input type="submit" name="almsg" value="ALL MESSAGE">
</div></form>';
echo '<form action="all_bog.php" method="POST">
<div class="a"><input type="submit" name="albgg" value="ALL BLOG">
</div></form>';
if(isset($_POST['submit']))
{ 
if($_POST['msg'] == "" || $_POST['tname'] == "")
{
 echo "<center>"."ONLY BLANK SPACE NOT ALLOWED in massage and name field"."</center>";
}
else {$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="yo_chat_dbs_yogesh";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{echo "Connected successfully";
$t=mysqli_real_escape_string($conn,$_POST['tname']);
$msg=mysqli_real_escape_string($conn,$_POST['msg']);
$sql="INSERT INTO yo_chat_dbs_users_msg (yo_chat_msg, yo_chat_user_name) VALUES (?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'ss',$msg,$t);
mysqli_stmt_execute($stmt);
$result=mysqli_affected_rows($conn);
if($result > 0)
{ echo '<center>'."Message Send".'</center>';}
}}}}

if(isset($_POST['chp']))
{
header("Location: change.php");
}
if(isset($_POST['sout']))
{
header("Location: login.php");
}

if(isset($_POST['blog']))
{
header("Location: blog.php");
}
?>
</body>
</html> 
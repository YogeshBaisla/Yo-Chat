<html>
<head>
<title> RECOVER </title>
</head>
<style>
body
{ 
  background-image: url('welcome.png');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<center><h1> WELCOME TO YOCHAT.COM </h1></center>
<form action="recover.php" method="POST">
<pre><center>
















<table>
<tr> PLEASE ENTER USER NAME<td><input type="text" name="uname" placeholder="username"></td></tr>
<tr> <td><input type="submit" name="sname" value="search"></td></tr>
</table> </center></pre>
</form>
<?php
if(isset($_POST['sname']))
{
if($_POST['uname'] == "")
{
 echo "<center>"."Please enter your username"."</center>";
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
$u=mysqli_real_escape_string($conn,$_POST['uname']);
$sql="select recover_question from yo_chat_dbs_users_details where yo_chat_user_name=?;";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'s',$u);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$detail=mysqli_fetch_assoc($result);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0)
{
echo '<form action="after_recover.php" method="POST">
  <center> <table>
  <tr><td><b>USER NAME</b></td>
  <td><input type="text" name="uiname" size="60" placeholder="username" value="'.$u.'"></td></tr>
  <tr><td><b>RECOVERY QUESTION</b> </td>  
  <td> <input type="text" name="rname" size="60" value="'.$detail['recover_question'].'"></td> </tr>
  <tr><td><b>ANSWER</b></td> 
  <td><input type="text" name="aname"></td></tr>
  <tr> <td><input type="submit" name="submit" value="submit"></td></tr>
  </table> </center>
  </form>';
}
else
{ echo "<center>"."WRONG USER NAME"."</center>";
}
}}}}
?>
</body>
</html>
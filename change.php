<html>
<head>
<title> Change Password
</title>
</head> <style>
body
{
  background-image: url('socialnetworkbuddypress.png');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<form action="change.php" method="POST">
<pre><center>
















<table>
<tr>
<td><b>User Name</b> </td>  
<td> <input type="text" name="uname"></td> </tr>
<tr><td><b>OLDER PASSWORD</b> </td>  
<td> <input type="password" name="opname"></td> </tr>
<tr><td><b>NEW PASSWORD</b></td> 
<td><input type="password" name="npname"></td></tr>
<tr><td><b>CONFIRM NEW PASSWORD</b></td> 
<td><input type="password" name="cnpname"></td></tr>
<tr> <td><input type="submit" name="submit" value="Apply"></td></tr>
</table> </center></pre>
</form>
<?php
if(isset($_POST['submit']))
{
{if($_POST['uname'] == "" || $_POST['opname'] == "" || $_POST['cnpname'] == "")
{
 echo "<center>"."Please enter the details"."</center>";
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
$op=mysqli_real_escape_string($conn,$_POST['opname']);
$np=mysqli_real_escape_string($conn,$_POST['npname']);
$cnp=mysqli_real_escape_string($conn,$_POST['cnpname']);
if($np !== $cnp)
{
echo '<center>'."new password doesn't match the confirmed password Please enter properly".'</center>';
}
else{$sql="UPDATE yo_chat_dbs_users_details SET yo_chat_pass=? Where yo_chat_user_name=? and yo_chat_pass=?;";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'sss',$np,$u,$op);
mysqli_stmt_execute($stmt);
$result=mysqli_affected_rows($conn);
if($result > 0)
{
echo '<center>'."Password Changed Successfully".'</center>';
}
else
{ echo "<center>"."WRONG ID OR PASSWORD"."</center>";
echo "<center>"."Forgotten Password Click Button Below"."</center>";
echo '<center> <form action="recover.php" method="POST"> <input type="submit" name="rec" value="recover"> </form> </center>';
if(isset($_POST['rec']))
{header("Location: recover.php");}
}}}}}
}} 
?>
</body>
</html>
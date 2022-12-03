<html>
<head>
<title> YOCHAT-Sign in/up </title>
</head>
<style>
body
{
  background-image: url('socialnetworkbuddypress.png');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<form action="login.php" method="POST">
<pre><center>
















<table>
<tr>
<td><b>LOGIN ID</b> </td>  
<td> <input type="text" name="lname"></td> </tr>
<tr><td><b>PASSWORD</b></td> 
<td><input type="password" name="pname"></td></tr>
<tr> <td><input type="submit" name="submit" value="sign in"></td>
<td> <input type="submit" name="sup" value="sign up"></td></tr>
</table> </center></pre>
</form>
<?php
if(isset($_POST['submit']))
{
kk();
}

if(isset($_POST['sup']))
{
header("Location: sign_up.php");
}  
function kk()
{if($_POST['lname'] == "" || $_POST['pname'] == "" )
{
 echo "<center>"."Please enter the right details"."</center>";
}
else{$dbServername="localhost";
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
$l=mysqli_real_escape_string($conn,$_POST['lname']);
$p=mysqli_real_escape_string($conn,$_POST['pname']);
$sql="select yo_chat_user_name,yo_chat_pass from yo_chat_dbs_users_details where yo_chat_user_name=? and yo_chat_pass=?;";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'ss',$l,$p);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0)
{
header("Location: msg.php");
}
else
{ echo "<center>"."WRONG ID OR PASSWORD"."</center>";
echo "<center>"."Forgotten Password Click Button Below"."</center>";
echo '<center> <form  action="recover.php" method="POST"> <input type="submit" name="rec" value="recover"> </form> </center>';
}}}}}
?>
</body>
</html>
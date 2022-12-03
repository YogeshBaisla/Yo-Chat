<html>
<head>
<title> RECOVER
</title>
</head>
<style>
body
{ 
  background-image: url('h.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<?php
if(isset($_POST['submit']))
{
if($_POST['aname'] == "")
{
 echo "<center>"."Please enter answer"."</center>";
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
$a=mysqli_real_escape_string($conn,$_POST['aname']);
$rq=mysqli_real_escape_string($conn,$_POST['rname']);
$ui=mysqli_real_escape_string($conn,$_POST['uiname']);
$sql="select  yo_chat_pass from yo_chat_dbs_users_details where recover_question=? and recover_answer=? and yo_chat_user_name=?;";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'sss',$rq,$a,$ui);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$detail=mysqli_fetch_assoc($result);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0)
{
echo '<form action="after_recover.php" method="POST">
  <center> <table>
  <tr>
  <td><b>Your Password</b> </td>  
  <td> <input type="text" name="rname" size="60" value="'.$detail['yo_chat_pass'].'"></td> </tr>
  </table> </center>
  </form>';
}
else
{ echo "<center>"."Please Enter The Correct Answer "."</center>";
}
}}}}
?>
</body>
</html>
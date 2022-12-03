<html>
<head>
<title> ALL MESSAGE </title>
</head>
<style>
div.a{
text-align: right;
}
body
{
  background-image: url('show_msg.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<form action="show_msg.php" method="POST">
<div class="a">
<input type="submit" name="reply" value="REPLY">
</div></form>
<?php  
if(isset($_POST['reply']))
{
header("Location: msg.php");
}
if(isset($_POST['almsg']))
{
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="yo_chat_dbs_yogesh";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
$sql="SELECT  yo_chat_msg_written_time, yo_chat_user_name, yo_chat_msg FROM yo_chat_dbs_users_msg WHERE 1";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$resultCheck = mysqli_num_rows($result);
$sms= array();
if($resultCheck > 0)
{while($detail=mysqli_fetch_assoc($result))
{
$sms[] = $detail;
}
foreach($sms as $mms)
{ echo htmlspecialchars($mms['yo_chat_msg_written_time'])." ".htmlspecialchars($mms['yo_chat_user_name'])." :- ".htmlspecialchars($mms['yo_chat_msg'])."<br>";
}}
else { echo "NO MESSAGE"; }
}}}

?>
</body>
</html>
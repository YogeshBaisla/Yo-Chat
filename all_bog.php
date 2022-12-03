<html>
<head>
<title> ALL BLOG</title>
</head>
</body>
<?php  
if(isset($_POST['albgg']))
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
$sql="SELECT blog_title, blog_author, blog_content, blog_time FROM yo_chat_dbs_users_blog WHERE 1;";
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
{$x = str_ireplace(array("\r","\n",'\r','\n')," 
", $mms['blog_content']);
$y  = str_ireplace(array("\r","\n",'\r','\n'),"
", $mms['blog_title']);
$z = str_ireplace(array("\r","\n",'\r','\n'),"
", $mms['blog_author']);
$k = str_ireplace(array("\r","\n",'\r','\n'),"
",$mms['blog_time']);
echo '<p><center><table>
<tr>
<td><b>TITLE OF BLOG</b> </td>';  
echo '<td> <input type="text" name="bname" size="100" value="'.$y.'" placeholder="Title" disabled></td> </tr>';
echo '<tr><td><b>WRITTER NAME</b></td>'; 
echo '<td><input type="text" name="wname" size="100" value="'.$z.'" placeholder="WRITTER NAME" disabled></td></tr>';
echo '<tr><td><b>UPLOADED ON</b></td>'; 
echo '<td><input type="text" name="dname" size="100" value="'.$k.'" placeholder="DATE OF UPLOAD" disabled></td></tr>';
echo '<tr><td>CONTENT<b></b></td>'; 
echo '<td><textarea name="cname" rows="45" cols="91" disabled> '.$x.' </textarea></td></tr>';
echo'</center></table></p>';
}}
else { echo "NO BLOG"; }
}}}

?>
</body>
</html>
<html>
<head>
<title> BLOG </title>
</head>
<body>
<?php
$berr = $werr= $cerr = "";
$b = $w= $c = "";
if(isset($_POST['upload']))
{$berr=$_POST['bname'];
$werr=$_POST['wname'];
$cerr=$_POST['cname'];
if($berr == "" )
{echo '<p style="color:Red;"> <center> PLEASE ENTER THE TITLE OF BLOG! </center> </p>';
}
else{$b= $berr; }
if($werr == "" )
{echo '<p style="color:Red;"> <center> PLEASE ENTER THE AUTHOR NAME! </center> </p>';
}else{ $w=$werr;}
if($cerr == "")
{echo '<p style="color:Red"> <center> PLEASE DONT SUBMIT BLANK CONTENT! </center> </p>';
}
else{ $c=$cerr;}
if($b == $berr && $w == $werr && $c == $cerr && $b != "" && $w != "" && $c != "")
{
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="yo_chat_dbs_yogesh";
$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
echo "Connected successfully"; 
$b = mysqli_real_escape_string($conn,$_POST['bname']);
$w = mysqli_real_escape_string($conn,$_POST['wname']);
$c = mysqli_real_escape_string($conn,$_POST['cname']);
$sql="INSERT INTO yo_chat_dbs_users_blog(blog_title, blog_author, blog_content) VALUES (?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'sss',$b,$w,$c);
mysqli_stmt_execute($stmt);
$result=mysqli_affected_rows($conn);
if($result <= 0)
{echo '<center>'."ERROR OCCURRED".'</center>'; }
else{
echo '<center>'."BLOG SUBMITTED".'</center>';
}}}}}
echo'<form action="blog.php" method="POST">
<center><table>
<tr>
<td><b>TITLE OF BLOG</b> </td>';
if($b == $berr)  
{echo '<td> <input type="text" name="bname" size="100" value="'.$b.'" placeholder="Title"></td> </tr>';}
else { echo '<td> <input type="text" name="bname" size="100" placeholder="Title"></td> </tr>';}
echo '<tr><td><b>WRITTER NAME</b></td>'; 
if($w == $werr)
{echo '<td><input type="text" name="wname" size="100" value="'.$w.'" placeholder="WRITTER NAME"></td></tr>';}
else{echo '<td><input type="text" name="wname" size="100" placeholder="WRITTER NAME"></td></tr>';}
echo '<tr><td>CONTENT<b></b></td>'; 
if($c == $cerr)
{echo '<td><textarea name="cname" rows="45" cols="91"> '.$c.' </textarea></td></tr>';}
else{echo '<td><textarea name="cname" rows="45" cols="91"></textarea></td></tr>';}
echo '<tr><td><input type="submit" name="upload" value="UPLOAD"></td></tr>
 </center></table>
</form>';
?>
</body>
</html>
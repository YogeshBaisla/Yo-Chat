<html>
<head>
<title> YOCHAT-Sign in/up </title>
</head>
<style>
body
{
  background-image: url('whatsapp.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
}
</style>
<?php
$ferr = $lerr= $uerr = $derr = $perr = $cperr = $merr = $eierr = $gerr = $rqerr = $aerr = "";
$f = $l= $u = $d = $p = $cp = $m = $ei = $g = $rq = $a = "";
if(isset($_POST['sup']))
{$ferr=$_POST['fname'];
$lerr=$_POST['lname'];
$uerr=$_POST['uname'];
$derr=$_POST['dob'];
$perr=$_POST['pname'];
$cperr=$_POST['cpname'];
$merr=$_POST['mname'];
$eierr=$_POST['einame'];
$gerr=$_POST['gender'];
$rqerr=$_POST['rqname'];
$aerr=$_POST['aname'];
if(!preg_match("/^[a-zA-Z]*$/", $ferr) || $ferr == "" )
{echo '<p style="color:Red;"> <center> PLEASE ENTER A VALID FIRST NAME! </center> </p>';
}
else{$f= $ferr; }
if(!preg_match("/^[a-zA-Z]*$/", $lerr) || $lerr == "" )
{echo '<p style="color:Red;"> <center> PLEASE ENTER A VALID LAST NAME! </center> </p>';
}else{ $l=$lerr;}
if(!preg_match('/^\w{5,20}$/', $uerr))
{echo '<p style="color:Red"> <center> PLEASE ENTER A VALID USER NAME! </center> </p>';
}
else{ $u=$uerr;}
if($derr == "" || $derr == NULL)
{echo '<p style="color:Red"> <center> PLEASE ENTER A VALID DATE OF BIRTH! </center> </p>';
}
else{ $d=$derr;}
if(!preg_match("/^[a-zA-Z][0-9a-zA-Z_!$@#^&]{5,20}$/", $perr))
{echo '<p style="color:Red;"> <center> PLEASE ENTER STRONG PASSWORD! </center> </p>';}
else{ $p=$perr;}
if($cperr != $perr)
{ echo '<p style="color:Red;"> <center> PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH! </center> </p>';}
else{ $cp=$cperr;}
if(!preg_match("/^[1-9][0-9]*$/", $merr))
{echo '<p style="color:Tomato;"> <center> PLEASE ENTER A VALID MOBILE NUMBER! </center> </p>';
}
else{ $m=$merr;} 
if (!filter_var($eierr, FILTER_VALIDATE_EMAIL))
{echo '<p style="color:Red;"> <center> PLEASE ENTER A VALID EMAIL! </center> </p>';}
else{$ei=$eierr;}
if($rqerr == "")
{ echo '<p style="color:Red;"> <center> PLEASE ENTER A RECOVERY QUESTION! </center> </p>';}
else{$rq=$rqerr;}
if($aerr == "")
{echo '<p style="color:Red;"> <center> PLEASE ENTER ANSWER OF RECOVERY QUESTION! </center> </p>';}
else{$a=$aerr;}
if($gerr == "" || $gerr == "--select--")
{ echo '<p style="color:Red;"> <center> PLEASE SELECT A GENDER! </center> </p>';}
else{$g=$gerr; }}
if($ferr == $f && $l= $lerr && $u == $uerr &&$d = $derr && $p == $perr && $cp = $cperr && $m == $merr && $ei = $eierr && $g == $gerr && $rq == $rqerr && $a == $aerr && $l != "" && $u != "" && $d != "" && $p != "" && $cp != "" && $m != "" && $ei != "" && $g != "" && $rq != "" && $a != "")
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
$f=mysqli_real_escape_string($conn,$_POST['fname']);
$l=mysqli_real_escape_string($conn,$_POST['lname']);
$u=mysqli_real_escape_string($conn,$_POST['uname']);
$d=mysqli_real_escape_string($conn,$_POST['dob']);
$p=mysqli_real_escape_string($conn,$_POST['pname']);
$cp=mysqli_real_escape_string($conn,$_POST['cpname']);
$m=mysqli_real_escape_string($conn,$_POST['mname']);
$ei=mysqli_real_escape_string($conn,$_POST['einame']);
$g=mysqli_real_escape_string($conn,$_POST['gender']);
$rq=mysqli_real_escape_string($conn,$_POST['rqname']);
$a=mysqli_real_escape_string($conn,$_POST['aname']);
$sql="INSERT INTO yo_chat_dbs_users_details(yo_chat_user_name, yo_chat_email_id, yo_chat_first_name, yo_chat_last_name, yo_chat_dob, yo_chat_gender, yo_chat_pass, yo_chat_mobile_id, recover_question, recover_answer) VALUES (?,?,?,?,?,?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql))
{ echo "SQL statement failed";}
else{ mysqli_stmt_bind_param($stmt,'ssssssssss',$u,$ei,$f,$l,$d,$g,$p,$m,$rq,$a);
mysqli_stmt_execute($stmt);
$result=mysqli_affected_rows($conn);
if($result <= 0)
{echo '<center>'."USER ALREADY EXIST".'</center>'; }
else{
header("Location: after_sign_up.php?");
}}}}
echo'<form action="sign_up.php" method="POST">
<pre><center>
















<table>
<tr>
<td><b>FIRST NAME</b> </td>';
if($f == $ferr)  
{echo '<td> <input type="text" name="fname" value="'.$f.'" placeholder="FIRST NAME"></td> </tr>';}
else { echo '<td> <input type="text" name="fname"  placeholder="FIRST NAME"></td> </tr>';}
echo '<tr><td><b>LAST NAME</b></td>'; 
if($l == $lerr)
{echo '<td><input type="text" name="lname" value="'.$l.'" placeholder="LAST NAME"></td></tr>';}
else{echo '<td><input type="text" name="lname" placeholder="LAST NAME"></td></tr>';}
echo '<tr><td><b>User NAME</b></td>'; 
if($u == $uerr)
{echo '<td><input type="text" name="uname" value="'.$u.'" placeholder="USER NAME"></td></tr>';}
else{echo '<td><input type="text" name="uname" placeholder="USER NAME"></td></tr>';}
echo '<tr><td><label for="dob"><b>DATE OF BIRTH:</b></label></td>';
if($d == $derr)
{echo '<td><input type="date" min="1920-01-01" max="2010-01-01" id="dob" name="dob" value="'.$d.'"></td></tr>';}
else{echo '<td><input type="date" min="1920-01-01" max="2010-01-01" id="dob" name="dob"></td></tr>';}
echo'<tr><td><b>PASSWORD</b></td>'; 
if($p == $perr)
{echo '<td><input type="password" name="pname" value="'.$p.'" placeholder="Password"></td></tr>';}
else{echo '<td><input type="password" name="pname" placeholder="Password"></td></tr>';}
echo '<tr><td><b>CONFIRM PASSWORD</b></td>'; 
if($cp == $cperr)
{echo '<td><input type="password" name="cpname" value="'.$cp.'" placeholder="Re-Enter Password"></td></tr>';}
else{echo '<td><input type="password" name="cpname" placeholder="Re-Enter Password"></td></tr>';}
echo '<tr><td><b>Mobile Number</b></td>'; 
if($m == $merr)
{echo '<td><input type="text" name="mname" value="'.$m.'" placeholder="Mob. No."></td></tr>';}
else{echo '<td><input type="text" name="mname" placeholder="Mob. No."></td></tr>';}
echo '<tr><td><b>Email-ID</b></td>'; 
if($ei == $eierr)
{echo '<td><input type="text" name="einame" value="'.$ei.'" placeholder="Email-ID"></td></tr>';}
else{echo '<td><input type="text" name="einame" placeholder="Email-ID"></td></tr>';}
echo '<td><b>RECOVERY Ques.</b> </td>';  
if($rq == $rqerr)
{echo '<td> <input type="text" name="rqname" value="'.$rq.'" placeholder="Re. Que."></td> </tr>';}
else{echo '<td> <input type="text" name="rqname" placeholder="Re. Que."></td> </tr>';}
echo '<tr><td><b>Answer</b></td>'; 
if($a == $a)
{echo '<td><input type="text" name="aname" value="'.$a.'" placeholder="ANS."></td></tr>';}
else{echo '<td><input type="text" name="aname" placeholder="ANS."></td></tr>';}
echo '<tr><td><b>GENDER:</b></td>';
if($g == $gerr)  
{echo'<td><select name="gender" value="'.$g.'">
  <option value="">--select--</option>
  <option value="male">male</option>
  <option value="female">female</option>
  <option value="other">other</option>
</select>';}
else{echo'<td><select name="gender">
  <option value=" ">--select--</option>
  <option value="male">male</option>
  <option value="female">female</option>
  <option value="other">other</option>
</select>';}
echo '</table>
<input type="submit" name="sup" value="sign up">
 </center></pre>
</form>';
?>
</body>
</html>
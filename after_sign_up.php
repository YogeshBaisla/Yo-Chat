<html>
<head>
<title> WELCOME </title>
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
<form action="after_sign_up.php" method="POST">
<pre><center>
















<table>
<tr> <td><input type="submit" name="submit" value="Go To Login Page"></td></tr>
</table> </center></pre>
</form>
<?php
if(isset($_POST['submit']))
{
header("Location: login.php");
}
?>
</body>
</html>
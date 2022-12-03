<html>
<head> <title> footer </title>
</head> 
<style>
div.a
{color: white}
div.b
{text-align: right}
body
</style>
<b><h1><center><div class="a">YO-CHAT.COM</div></center></h1></b>
<form action="footer.php" method="POST">
<div class="b"><input type="submit" name="l" value="Login">
<input type="submit" name="s" value="SignUP">
</div></form>
<?php
if(isset($_POST['l']))
{
header("Location: login.php");
}
if(isset($_POST['s']))
{
header("Location: sign_up.php");
}
?>
</body>
</html>
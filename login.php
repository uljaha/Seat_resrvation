<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>
<style>
body{
	background-image:url(blur.jpg);
	background-size:100%;
	background-position:cover;
}

</style>


</div>
<nav>
    <ul>
        <li><a href="admin.php"><span>Admin login<font color="black"></span></a></li>
        <li><a href="login.php"><span>User login<font color="black"></span></a></li>             
        <li><a href="sign.php"><span>User signup<font color="white"></span></a></li>
    </ul>
</nav>

<div class="container">
<form method="post" class="clogin">
<h3>User Login</h3>
<hr>
<input type="text" name="email" class="form-control" placeholder="email"><br>
<input type="password" name="pass" class="form-control"placeholder="password"><br>
<button class="btn btn-success" name="action" value="submit">login</button>
</form>
</div>

<h2 style="color: white;"></h2>	
</body>
</html>


<?php error_reporting($level = null);
$a=$_POST['email'];
$b=$_POST['pass'];
include('config.php');

if($_POST['action']=='submit') 
{
$sqll="select * from user where email='$a'";
$res=$conn->query($sqll);

while($row=$res->fetch_assoc()) 
{
$email=$row['email'];
$pass=$row['pass'];
$uname=$row['name'];
$dob=$row['dob'];
$phone=$row['phone'];


if($email==$a && $pass == $b) 
{
session_start();
$_SESSION['email']=$email;
$_SESSION['pass']=$pass;
$_SESSION['uname']=$uname;
$_SESSION['dob']=$dob;
$_SESSION['phone']=$phone;
$_SESSION['new']=$email;
if($_SESSION['new']==$email) 
{
header('Location:user_page.php');
}

}

}
{
echo '<script type="text/javascript">
alert("Name or password you entered is wrong");</script>';
}
}
?>
</div>
</div>    

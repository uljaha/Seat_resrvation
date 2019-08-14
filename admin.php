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
	background-image:url(2.jpg);
	background-size:100%;
	background-position:cover;
}

</style>

  </div>
</div>
</style>



<nav>
    <ul>
        <li><a href="admin.php"><span>Admin login</span></a></li>
        <li><a href="login.php"><span>UserLogin</span></a></li>          
        <li><a href="signup.php"><span>User signup</span></a></li>
    </ul>
</nav>
<div class="container">
<form method="post" class="alogin">
<h3>Admin Login</h3>
<hr>
<input type="text" name="name" class="form-control" placeholder="name"><br>
<input type="password" name="pass" class="form-control"placeholder="password"><br>
<button class="btn btn-success" name="action" value="submit">login</button>
</form>
</div>

<h2 style="color: white;"></h2>	
</body>
</html>

<?php error_reporting($level = null);
$a=$_POST['name'];
$b=$_POST['pass'];
//include('config.php');

	include('config.php');
if($_POST['action']=='submit') 
{
$sqll="select * from admin where name='$a'";
$res=$conn->query($sqll);

while($row=$res->fetch_assoc()) 
{
$name=$row['name'];
$pass=$row['pass'];


if($name==$a && $pass == $b) 
{
session_start();
$_SESSION['new']=$name;
if($_SESSION['new']==$name) 
{
header('Location:adminhome.php');
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

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
	background-image:url(al.jpg);
	background-size:100%;
	background-position:cover;
}

</style>	
</div>

</div>
<nav>
    <ul>
        <li><a href="admin.php"><span>Admin login<font color="black"></span></a></li>
        <li><a href="login.php"><span>User login<font color="black"></span></a></li>            
        <li><a href="s.php"><span>User signup<font color="white"></span></a></li>
    </ul>
</nav>

<div class="container">
 
<form method="post" class="csign">
<h3>User Signup</h3>
<hr>
<input type="text" name="name" class="form-control" placeholder="user name"><br>
<input type="date" name="dob" class="form-control" placeholder="dob"><br>
<input type="text" name="phno" class="form-control" placeholder="phno"><br>
<input type="mail" name="mail" class="form-control" placeholder="mail"><br>
<input type="password" name="pass" class="form-control" placeholder="password"><br>
<button class="btn btn-success" name="action" value="submit">Signup</button>
</form>
</div>

<h2 style="color: black;"></h2>	
</body>
</html>

<?php error_reporting($level = null);
define("UPLOAD_DIR", "citizen/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $namez = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }

    // set proper permissions on the new file
    chmod(UPLOAD_DIR . $name, 0644);
}

?>


<?php error_reporting($level = null);
include('config.php');
$names=$_POST['name'];
//echo $names;
$dob=$_POST['dob'];
$phno=$_POST['phno'];
$email=$_POST['mail'];
$password=$_POST['pass'];
//echo $email;

$query="select * from user where email='$email'";
$res=mysqli_query($conn,$query) or die("fail".mysqli_error($conn));
$num = mysqli_num_rows(mysqli_query($conn,$query));// or die(mysqli_error($conn));

//echo $num;
if($_POST['action']=='submit') 
{
$names=str_replace(" ","_", $names);
$int = intval(preg_replace('/[^0-9]+/', '', $names), 10);


if($int==0) 
{
$int = intval(preg_replace('/[^0-9]+/', '', $city), 10);
if($int==0) 
{
if (is_numeric($phno) && strlen($phno)==10) 
{
if($num!=0)
{
	echo "<script type='text/javascript'>
alert('This email already exists');
</script>
";	
}
else{
$sql="insert into user values('$names','$dob','$phno','$email','$password')";
$conn->query($sql);
echo "<script type='text/javascript'>
alert('Signed Successfully!');
</script>";
}
}



else 
{
echo "<script type='text/javascript'>
alert('Oops!Phone number should not contain any character and length should be 10');
</script>
";	
}
}
else 
{
echo "<script type='text/javascript'>
alert('Oops!City should not contain numbers!');
</script>
";	
}
} 


else 
{
echo "<script type='text/javascript'>
alert('Oops!Name should not contain numbers');
</script>";
}	
} 

?>
</div>
</div>    

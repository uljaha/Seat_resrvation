 <?php
	$host='localhost';
	$user = 'root';
	$pass = '';
	
$conn=mysqli_connect("$host","$user","$pass");
       if(!$conn)
	
	{
		echo("Database not connected");
	}
	if(!mysqli_select_db($conn,'project'))
	{
		echo 'database not selected';
	}
?>









<?php error_reporting($level = null);
include('config.php');
$sqll="select * from user";
$res=$conn->query($sqll);
$g=0; 
while($row=$res->fetch_assoc()) 
{
$g=$row['no'];
if($g == null) 
{
$g=0;
break;	
}
}
$g=$g+1;
?>
<?php error_reporting($level = null);
include('config.php');

$names=$_POST['name'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$phno=$_POST['phno'];
$mail=$_POST['mail'];
$city=$_POST['city'];
$password=$_POST['pass'];


//if($_POST['action']=='submit') 
//{
$names=str_replace(" ","_", $names);
$int = intval(preg_replace('/[^0-9]+/', '', $names), 10);


if($int==0) 
{
$int = intval(preg_replace('/[^0-9]+/', '', $city), 10);
if($int==0) 
{
if (is_numeric($phno) && strlen($phno)==10) 
{

$sql="insert into user(name,dob,phone,email,pass,no) values('$names','$dob','$phno','$mail','$password',$g)";
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
echo "<script type='text/javascript'>
alert('Signed Successfully!');
</script>";
header('Location:login.php');
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
//}
?>
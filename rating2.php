<?php
include('config.php');
session_start();
$rate=$_POST['rate'];
$busno=$_POST['busno'];
$uname=$_SESSION['uname'];
$email=$_SESSION['email'];
//$uname=$_SESSION['email'];
//echo $email;
//check if the logged in user has already rated the bus
$check="select * from rating where bus_no='$busno' and email='$email'" or die(mysqli_error($conn));
$res=mysqli_query($conn,$check) or die("huh");
$num=mysqli_num_rows(mysqli_query($conn,$check));
//echo $num;
if($num==0)
{
$query="insert into rating(bus_no,rating,email,uname) values('$busno',$rate,'$email','$uname')";
$res=mysqli_query($conn,$query) or die(mysqli_error($conn));
if($res)
{
		echo '<script type="text/javascript">
alert("Rating Successfull...!!!");</script>';
echo "<a href='user_page.php'>User Page</a>";

}
}
else
{
	echo '<script type="text/javascript">
alert("You have already rated this bus...!!!");</script>';
echo "<a href='user_page.php'>User Page</a>";
}

?>
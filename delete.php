

 <?php
	include('config.php');
$a=$_GET['san'];

$sqll="delete from bus where trip_code='$a'" or die(mysqli_error($conn));
$res=mysqli_query($conn,$sqll);
if($res)
{
	echo "deleted";
}
echo '<meta http-equiv="refresh" content="0.1; URL=busview.php">';
?>

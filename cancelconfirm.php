<?php
session_start();
    $pnr=$_GET['pnr'];
	$tripcode=$_SESSION['tripcode'];
	$seat=$_SESSION['seat'];
	//echo $pnr;
	include('config.php');
	//$pnr=$_GET['pnr'];
	//echo $pnr;
	$query="delete from passenger where pnr= $pnr ";
	$res=mysqli_query($conn,$query) or die(mysqli_error($conn));
	if($res)
	{
		echo "<font color='green' size='30'>Your ticket has been cancelled successfully</font>";
		}
	
 echo "<br>";
 echo "<br>";
 $oldseatlayout=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
//print_r($oldseatlayout);
$myquery="select seat_layout from bus where trip_code='$tripcode'";
 $result=mysqli_query($conn,$myquery) or die(mysqli_error($conn));
 
 
 while($row1=mysqli_fetch_array($result))
	{  
		$oldseatlayout=explode("-",$row1['seat_layout']);
	}
 
	//print_r($oldseatlayout);
	$seat--;
	//echo $seat;
$oldseatlayout[$seat]=0;
//print_r($oldseatlayout);	
$str=implode('-',$oldseatlayout);
$myquery2="update bus set seat_layout='$str' where trip_code='$tripcode';";
$res2=mysqli_query($conn,$myquery2) or die("Seat layout not updated".mysqli_error($conn));
if($res2)
{
	;
}
$num=0;
foreach($oldseatlayout as $i)
{
	if($i==0)
	{
		$num++;
	}
}
$mq2="update bus set avail_seats='$num' where trip_code='$tripcode';";
$r=mysqli_query($conn,$mq2);
echo '<br><br>';
 
echo "<a href='user_page.php'><font color='hotpink' size='20'>Back To home</font></a>";
	
?>
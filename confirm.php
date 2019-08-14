<?php
session_start();
$ss=$_SESSION['s'];
$val=$_SESSION['busid'];
$countr=$_SESSION['count'];
 print_r($ss);
$name=$_POST['name'];
echo "<br>";
 print_r($name);
 echo $name[0];
 $age=$_POST['Age'];

 $phone=$_POST['Phone'];
 $bp=$_POST['bp'];
 $dp=$_POST['dp'];
 $email=$_POST['Email'];
 $gen=$_POST['Gen'];
 $host="localhost";
	$username="root";
	$password="";
 $conn=mysqli_connect($host,$username,$password);
	if(!$conn)
	{
	echo("Database not connected");
	}
	if(!mysqli_select_db($conn,'p5'))
	{
		echo 'database not selected';
	}
	
	
 $myquery="select seat_layout from bus where bus_id='$val'";
 echo "<br>";
 echo $val;
 echo "<br>";
 $result=mysqli_query($conn,$myquery);
$oldseatlayout=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 $newseatlayout=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 $finalseatlayout=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
 while($row=mysqli_fetch_array($result))
	{   
		$oldseatlayout=explode("-",$row['seat_layout']);
	}
	//echo "old";
	print_r($oldseatlayout);
	echo "<br>";
	
	foreach($ss as $i)
	{
		$newseatlayout[$i-1]=1;
		
	}
	for($j=0;$j<40;$j++)
	{
		if($newseatlayout[$j]!=1)
		{
		$newseatlayout[$j]=0;
	    }
	}
	//$index=0;
	//while(($newseatlayout[$index]==0) and ($index<40))
	//{
		//$newseatlayout[$index]=0;
		//$index++;
	//}
	echo "new";
	print_r($newseatlayout);
for($k=0;$k<40;$k++)
{
	if(($oldseatlayout[$k]==1) or ($newseatlayout[$k]==1))
	{
			$finalseatlayout[$k]=1;
	}
	else
	{	
		$finalseatlayout[$k]=0;
	}
}
$count=0;
//while((($newseatlayout[$count]==1) or ($oldseatlayout[$count]==1)) and ($count<40))
//{
	//$finalseatlayout[$count]=1;
	//$count++;
//}

$str=implode('-',$finalseatlayout);
echo "<br>"."final";
print_r($finalseatlayout);
//for($c=1;$c<=sizeof($name);$c++)
		for($v=0;$v<count($name);$v++)
	{
		$c=0;
		echo "<br>"."hey soni"."<br>";
		echo $v."<br>";
		echo "<br>".$name[$v]."<br>";
		$myquery1="insert into passenger (Name,Phone,Email,Age,Gender,bus_id,seat_no,board_point,drop_point) values ('".$name[$v]."','".$phone[$v]."','".$email[$v]."','".$age[$v]."','".$gen[$v]."','".$val."','".$ss[$v]."','".$bp."','".$dp."');";
		$res=mysqli_query($conn,$myquery1) or die("Querry failed".mysqli_error($conn));
		echo $res;
		if($res)
		{
			echo "Inserted";
		}
	}
//}
echo $str;
echo $val."<br>";
$mq=mysqli_query($conn,"select seat_layout from bus where bus_id='$val';") or die("cant display".mysqli_error($conn));
while($row=mysqli_fetch_array($mq))
{
	echo $row['seat_layout'];
}

$myquery2="update bus set seat_layout='$str' where bus_id='$val';";
$res2=mysqli_query($conn,$myquery2) or die("Seat layout not updated".mysqli_error($conn));
if($res2)
{
	echo "Updated";
}
$r=mysqli_query($conn,"select seat_layout from bus where bus_id='$val';") or die("cant display".mysqli_error($conn));
while($row=mysqli_fetch_array($r))
{
	$avlseat=explode("-",$row['seat_layout']);
}
$num=0;
foreach($avlseat as $i)
{
	if($i==0)
	{
		$num++;
	}
}
$mq2="update bus set avail_seats='$num' where bus_id='$val';";
$r=mysqli_query($conn,$mq2);
if($mq2)
{
	echo "<br>"."aval seats updated";
}
//header("Location:ticket.php");



?>
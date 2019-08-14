<?php
session_start();
$ss=$_SESSION['s'];
$val=$_SESSION['tripcode'];
$countr=$_SESSION['count'];
 //print_r($ss);
$name=$_POST['name'];
//echo count($name);
echo "<br>";
 //print_r($name);
 //echo $name[0];
 $age=$_POST['Age'];

 $phone=$_POST['Phone'];
 $bp=$_POST['bp'];
 //$dp=$_POST['dp'];
 $email=$_POST['Email'];
 $gen=$_POST['Gen'];
 include('config.php');
	
	
 $myquery="select seat_layout from bus where trip_code='$val'";
 echo "<br>";
 //echo $val;
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
	//print_r($oldseatlayout);
	echo "<br>";
	$y=0;
	foreach($ss as $i)
	{
		//echo $gen[$y];
		if($gen[$y]=='Female'){
		//	echo "XXXXXXXXXXXXXXX";
		$newseatlayout[$i-1]=2;
		}
	elseif($gen[$y]=='Male')
	{
		//echo "YYYYYYYYYYYYYYYYY";
		$newseatlayout[$i-1]=1;
	}
		$y++;
	}
	$assign=0;
	for($j=0;$j<40;$j++)
	{

			
		if(($newseatlayout[$j]==1) || ($newseatlayout[$j]==2))
		{
			$assign++;
		//$newseatlayout[$j]=0;
	    }
		else{
			$newseatlayout[$j]=0;
		}
	}
	//echo "Ladies".$assign;
	//print_r($newseatlayout);
	$index=0;
	while(($newseatlayout[$index]==0) and ($index<40))
	{
		$newseatlayout[$index]=0;
		$index++;
	}
	//echo "new";
	//print_r($newseatlayout);
for($k=0;$k<40;$k++)
{
	if($oldseatlayout[$k]==$newseatlayout[$k])
	{
		$finalseatlayout[$k]=$oldseatlayout[$k];
	}
	else{
		$finalseatlayout[$k]=($oldseatlayout[$k]+$newseatlayout[$k]);
	}
}
$count=0;
while((($newseatlayout[$count]==1) or ($oldseatlayout[$count]==1)) and ($count<40))
{
	$finalseatlayout[$count]=1;
	$count++;
}
$counting=0;

$str=implode('-',$finalseatlayout);
$for=0;
		for($v=0;$v<count($name);$v++)
	{
		$c=0;
		$query="select * from passenger where seat_no=$ss[$v] and trip_code='$val'";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		$number=mysqli_num_rows(mysqli_query($conn,$query));
		//echo $number;
		if($number==0)
		{
			$myquery1="insert into passenger (Name,Phone,Email,Age,Gender,trip_code,seat_no,board_point) values ('".$name[$v]."','".$phone[$v]."','".$email[$v]."','".$age[$v]."','".$gen[$v]."','".$val."','".$ss[$v]."','".$bp."');";
			$res=mysqli_query($conn,$myquery1) or die("Querry failed".mysqli_error($conn));
			//echo $res;
			if(!$res)
			{
				echo "Something went wrong ";
			}
		}
		else
		{
			if($counting==0)
			{
			echo "<style>.warning{allign:center;background-color:skyblue; width:500px; height:120px; border:black;}</style>";
			echo "<div class=warning widdh='500px'>";
			echo "<br><br>"."<font color=hotpink size=6>";
			echo "Your ticket has already been booked";
			echo "</font>";
			echo "<br>"."<a href='user_page.php'>"."Back To Homepage"."</a>"."</div>";
			$counting++;
			}
		}
		$for++;
		
	}
	//echo $for;
//}
//echo $str;
//echo $val."<br>";
$mq=mysqli_query($conn,"select seat_layout from bus where trip_code='$val';") or die("cant display".mysqli_error($conn));
while($row=mysqli_fetch_array($mq))
{
	//echo $row['seat_layout'];
}

$myquery2="update bus set seat_layout='$str' where trip_code='$val';";
$res2=mysqli_query($conn,$myquery2) or die("Seat layout not updated".mysqli_error($conn));
if(!$res2)
{
	echo "Oops...!!! Something went wrong!!!";
}
else if($number==0)
{
	echo "<font color=darkgreen size=5>"."Your ticket has been booked successfully"."</font>";
echo "<style>.container{background-color:skyblue; width:480px;}</style>";	
echo	'<div class="container">';
echo "Trip Code: ".$val."<br>";
$fetchq="select date(departure),bus_no from bus where trip_code='$val'";
$r0=mysqli_query($conn,$fetchq)or die("Cant fetch departure");
while($row=mysqli_fetch_assoc($r0))
{
	echo "Date of journey:".$row['date(departure)']."<br>";
	echo "Bus No:".$row['bus_no']."<br>";
}
echo "Boarding point:".$bp."<br>";
$fetchq1="select btime from board where trip_code='$val' and board='$bp'";
$r0=mysqli_query($conn,$fetchq1)or die("Cant fetch board time");
while($row=mysqli_fetch_assoc($r0))
{
	echo "Departure Time:".$row['btime']."<br>";
}
echo "Passenger information:"."<br>";

echo '<table class="table" border="3" style="background-color:skyblue">
<tr>
<th>PNR</th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Category</th>
<th>Seat No</th>
</tr>';

		foreach($ss as $i)
		{
			//echo $i;
			$myq="select * from passenger where seat_no='$i' and trip_code='$val'";
			$r=mysqli_query($conn,$myq) or die(mysqli_error($conn));
			$num=mysqli_num_rows(mysqli_query($conn,$myq))or die("num not assigned");
			//if($r)
			
		
				//echo "hey";
					while($row=mysqli_fetch_assoc($r))
					{
						
						//echo "Date of journey:"."<br>";
						//echo "Boarding Point:"."<br>";
						//echo "Departure Time:"."<br>";
						//echo "No of seats:"."<br>";
						
						
						$pasid=$row['pnr'];
						$name=$row['name'];
						$age=$row['age'];
						$gender=$row['gender'];
						$seat=$row['seat_no'];
						$Category=$row['age_cat'];
						echo '<tr>
						<td>'.$pasid.'</td>
						<td>'.$name.'</td>
						<td>'.$age.'</td>
						<td>'.$gender.'</td>
						<td>'.$Category.'</td>
						<td>'.$seat.'</td>

						</tr>';
					}
			
			
		}
		
}
echo "</table></div>";
echo "<a href=user_page.php>Back To Home page</a>";
	

$r=mysqli_query($conn,"select seat_layout from bus where trip_code='$val';") or die("cant display".mysqli_error($conn));
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
$mq2="update bus set avail_seats='$num' where trip_code='$val';";
$r=mysqli_query($conn,$mq2);
if($mq2)
{
	//echo "<br>"."aval seats updated";
}
//header("Location:ticket.php");




?>
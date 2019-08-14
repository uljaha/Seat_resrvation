
<?php
    session_start();
	include('config.php');
	$trip=$_SESSION['tripcode'];
	if(!isset($_POST['seats']))
	{
		header("Location:seatsdb.php?val=$trip");
	}
	echo "<style>".
"body{
	background-image:url(x.jpg);
	background-size:100%;
	background-position:bottom;
}"."</style>";
echo "<font color='white' size='5'><b>";
	$selected=$_POST['seats'];
	$_SESSION['seatsbooked']=$selected;
	//print_r($_SESSION['seatsbooked']);
	$error=0;
	if($selected=="")
	{
		$error=1;
		echo "Please select a seat";
	}
	$_SESSION['s']=$selected;
	$tripcode=$_SESSION['tripcode'];
	$jdate=$_SESSION['jdate'];
	if($jdate==1)
	{
		$q="select cost_proc(cost) as cost from bus where trip_code='$tripcode' ";
		$r=mysqli_query($conn,$q) or die(mysqli_error($conn));
		while($row=mysqli_fetch_assoc($r))
		{
			$cost=$row['cost'];
		}
	}
	else
	{
		$q="select cost from bus where trip_code='$tripcode' ";
		$r=mysqli_query($conn,$q) or die(mysqli_error($conn));
		while($row=mysqli_fetch_assoc($r))
		{
			$cost=$row['cost'];
		}
	}
	//$cost=$_SESSION['cost'];
	//echo $cost."<br>";
	//print_r($selected);
	$numsel=sizeof($selected);
	//echo $numsel;
	$total_cost=$numsel*$cost;
	echo "<font color='white'>"."Total Cost  "."</font>";
	echo "<td><input type='text' value='$total_cost' disabled maxlength='5' style='width:50px;'/></td>"."<br><br>";
	$origin=$_SESSION['origin'];
	$dest=$_SESSION['dest'];
	echo "<font color='white'>"."From  "."</font>";
	echo "<td><input type='text' value='$origin' disabled maxlength='10'/></td>";
	echo "<font color='white'>"."To  "."</font>";
	echo "<td><input type='text' value='$dest' disabled maxlength='10'/></td>";
	
	//$procquery="CREATE PROCEDURE total_cost as declare @a,@b,@c,@sum int set @sum=@a+@b+@c";
	
	$seatlayout=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	foreach($selected as $i)
	{
		$seatlayout[$i-1]=1;
		
	}
	for($j=0;$j<40;$j++)
	{
		if($seatlayout[$j]!=1)
		{
		$seatlayout[$j]=0;
	    }
	}
	//print_r($seatlayout);
	$counter=0;
	foreach($seatlayout as $k)
	{
		if($k==1)
		{
			$counter++;
		}
	}
	//echo $counter;
	$_SESSION['count']=$counter;
	echo "<br>";
	//echo $_SESSION['count'];
	//echo "from ".$origin." to ".$dest;
	echo "<font color='white'>"."Your Details Here:"."</font>"."<br><br>";
	$r1=mysqli_query($conn,"Select board from board where trip_code='$tripcode'");
	//$r2=mysqli_query($conn,"Select stop from board_and_drop where place='$dest'");
	$y=0;
	for($x=1;$x<=$counter;$x++)
	{
		$y=$x-1;
	//echo "You selected these seats:"."<br><br>";
	echo "Passenger"." ".$x."&nbsp&nbsp&nbsp&nbsp";
	echo "Seat No: ";
	echo "<input type='text' value=$selected[$y] style='width:30px;' disabled>"."<br><br>";;
	echo "<form action='confirm2.php' method='POST'>";
	echo "Name:"."<input type='text' name='name[]' class='form-control' maxlength='30'/>"."<br><br>";
	echo "Phone:"."<input type='text' name='Phone[]' maxlength='20'/>"."<br><br>";
	echo "Email"."<input type='text' name='Email[]' maxlength='50'/>"."<br><br>";
	echo "Age"."<input type='text' name='Age[]'>"."<br><br>";
	echo "Gender"."<select name='Gen[]'>";
	echo "option selected disabled>Select</option>";
	echo "<option value='Male'>Male</option>'";
	echo "<option value='Female'>Female</option>'";
	echo "</select>"."<br><br><br>";
	}
	
	echo "Boarding Point"."<select name='bp'>";
	echo "<option selected disabled>Select</option>";
	while($row=mysqli_fetch_array($r1))
	{
		echo "<option value='".$row['board']."'>".$row['board']."</option>";
	}
	echo "</select>";
	
	//echo "Drop Point"."<select name='dp'>";
	//echo "<option selected disabled>Select</option>";
	//while($row1=mysqli_fetch_array($r2))
	//{
		//echo "<option value='".$row1['stop']."'>".$row1['stop']."</option>";
	//}
	//echo "</select>";
	
	echo "<br>";
	
	
	echo "<br>"."<input type='submit' value='Confirm My Booking'/>";
	echo "</font>";
	echo "</form>";
	
	
?>	
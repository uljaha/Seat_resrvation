<?php
    session_start();
	//session_start();
    $host="localhost";
	$username="root";
	$password="";
	$db_name="p1";
	
	$conn=mysqli_connect($host,$username,$password);
	if(!$conn)
	{
	echo("Database not connected");
	}
	if(!mysqli_select_db($conn,'p5'))
	{
		echo 'database not selected';
	}
	$selected=$_POST['seats'];
	$_SESSION['s']=$selected;
	$cost=$_SESSION['cost'];
	echo $cost."<br>";
	print_r($selected);
	$numsel=sizeof($selected);
	echo $numsel;
	$total_cost=$numsel*$cost;
	echo "Total Cost=".$total_cost;
	$origin=$_SESSION['origin'];
	$dest=$_SESSION['dest'];
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
	print_r($seatlayout);
	$counter=0;
	foreach($seatlayout as $k)
	{
		if($k==1)
		{
			$counter++;
		}
	}
	echo $counter;
	$_SESSION['count']=$counter;
	echo "<br>";
	echo $_SESSION['count'];
	echo "from ".$origin." to ".$dest;
	echo "Your details here"."<br><br>";
	$r1=mysqli_query($conn,"Select stop from board_and_drop where place='$origin'");
	$r2=mysqli_query($conn,"Select stop from board_and_drop where place='$dest'");
	
	for($x=1;$x<=$counter;$x++)
	{
	echo "You selected these seats:"."<br><br>";
	echo "Passenger"." ".$x."<br>";
	echo "<form action='confirm.php' method='POST'>";
	echo "Name:"."<input type='text' name='name[]' maxlength='100'/>"."<br><br>";
	echo "Phone:"."<input type='text' name='Phone[]' maxlength='20'/>"."<br><br>";
	echo "Email"."<input type='text' name='Email[]' maxlength='50'/>"."<br><br>";
	echo "Age"."<input type='text' name='Age[]'>"."<br><br>";
	echo "Gender"."<select name='Gen[]'>";
	echo "option selected disabled>Select</option>";
	echo "<option value='Male'>Male</option>'";
	echo "<option value='Female'>Female</option>'";
	echo "</select>"."<br>";
	}
	
	echo "Boarding Point"."<select name='bp'>";
	echo "<option selected disabled>Select</option>";
	while($row=mysqli_fetch_array($r1))
	{
		echo "<option value='".$row['stop']."'>".$row['stop']."</option>";
	}
	echo "</select>";
	
	echo "Drop Point"."<select name='dp'>";
	echo "<option selected disabled>Select</option>";
	while($row1=mysqli_fetch_array($r2))
	{
		echo "<option value='".$row1['stop']."'>".$row1['stop']."</option>";
	}
	echo "</select>";
	
	echo "<br>";
	
	
	echo "<br>"."<input type='submit' value='Confirm My Booking'/>";
	echo "</form>";
	
	
?>	
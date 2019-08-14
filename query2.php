

</head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>
  <font color='blue' size='5'>
<b>
<nav>
<ul>
<li><a href="admin.php">Admin</a></li>
<li><a href="user_page.php">User</a></li>
<li><a href="cancel.php">Cancel My Ticket</a></li>
<li><a href="user_page.php">Modify Search</a></li>
</ul>
</nav>
</b>
</font>
<style>
body{
	background-image:url(star.jpg);
	background-size:100%;
	background-position:cover;
}

</style>

  <?php
   
	session_start();
	include('config.php');
	if(!isset($_POST['FROM']))
	{
		//echo "From field cannot be empty";
		header("Location:user_page.php");
		echo '<script type="text/javascript">
alert("Name or password you entered is wrong");</script>';

		
	}
	elseif(!isset($_POST['TO']))
	{
		echo "To field cannot be empty";
		header("Location:user_page.php");
	}
	elseif(!isset($_POST['Day']))
	{
		echo "Please select travelling date";
		header("Location:user_page.php");
	}
	$FROM=$_POST['FROM'];
	$TO=$_POST['TO'];
	$Day=$_POST['Day'];
	//echo $Day."<br>";
	$timestamp = strtotime($Day);
	//echo $timestamp."<br>";
    $day1=date("d", $timestamp);
	$_SESSION['jdate']=$day1;
	//echo $day1;
	$_SESSION['origin']=$FROM;
	$_SESSION['dest']=$TO;
	//$val1=array(0,0,0,0,0);
	//$cost1=array(0,0,0,0,0);
	//$bus1=array(0,0,0,0,0);
	
	$i=0;
		$myquery0="select * from bus where origin='$FROM' and destination='$TO' and DATE(departure)='$Day'";
		$r=mysqli_query($conn,$myquery0) or die(mysqli_error($conn));
		while($row=mysqli_fetch_assoc($r))
		{
			$val1[$i]=$row['trip_code'];
			$cost1[$i]=$row['cost'];
			$bus1[$i]=$row['bus_no'];
			$i++;
		}
		//print_r($val1);
		//print_r($cost1);
		//print_r($bus1);
		$no=mysqli_num_rows(mysqli_query($conn,$myquery0));
		//echo $no;
		$j=0;
		if($no==0)
		{
			echo '<html><body><font size="10"/></body></html>';
			echo 'Sorry...!!! No bus found';
			echo '<br><font size="5"/>';
			echo '<a href="user_page.php">Modify Search</a>';
			exit;
		}
		
		//print_r($ratings);
		//echo "<br>"."rating"."<br>";
		
		
		else//buses found
		{	
			foreach($bus1 as $i)
		{
			$rate="select avg(rating) from rating where bus_no='$i'";
			$ra=mysqli_query($conn,$rate) or die(mysqli_error($conn));
			while($row=mysqli_fetch_assoc($ra))
			{
				$ratings[$j]=$row['avg(rating)'];
				$j++;
			}
		}
			echo '<link rel="stylesheet" type="text/css" href="a.css">';
			$next="seats_db.php";
			echo "<div class='container'>";
			echo "<table class='table' border='3' style='background-color:white'>";
			echo "<tr>
				  <th>Trip Code</th>
				  <th>Departure</th>
			   	  <th>Arrival</th>
				  <th>COST</th>
				  <th>SEATS AVAILABLE</th>
				  <th>Rating</th>
				  </tr>";
			if($no==1)
			{
				echo "<br><br><br><font color='blue' size='6'><b>".$no."  BUS FOUND (FROM ".$FROM."  TO  ".$TO.")"."</b></font><br><br>";
			}
			else
			{
				echo "<br><br><br><font color='blue' size='6'><b>".$no."  BUSES FOUND"."</b></font><br><br>";
			}
			//$count=0;
			$i=0;
			//while($i!=$no)
			//{
				if($day1==1)
				{
					$myquery="select b.trip_code as bt,b.departure,b.arrival,cost_proc(b.cost) as cost,b.avail_seats from bus b where b.origin='$FROM' and b.destination='$TO' and DATE(departure)='$Day'";	
				}
				else
				{
					$myquery="select b.trip_code as bt,b.departure,b.arrival,b.cost,b.avail_seats from bus b where b.origin='$FROM' and b.destination='$TO' and DATE(b.departure)='$Day'";
				}
				$result=mysqli_query($conn,$myquery) or die("oops".mysqli_error($conn));
	
				//$num=mysqli_num_rows(mysqli_query($conn,$myquery));	
				//echo "<br>".$num."<br>";
				
			//	if(!mysqli_query($conn,$myquery))
				//{
					//echo 'Error!!';
					
				//}
			
				//else//printing table headings
				//{
					//echo 'Displayed';
					
							$k=0;
						while($row=mysqli_fetch_assoc($result))//printing bus details
						{
							
							echo "<tr>";
							echo "<td>";
							$link=$row['bt'];
							//$cost=$row['cost'];
							echo "<a href='seatsdb.php?val=$link'>$link</a>";
							echo "</td>";
							echo "<td>";
							echo $row['departure'];
							echo "</td>";
							echo "<td>";
							echo $row['arrival'];
							echo "</td>";
							echo "<td>";
							echo $row['cost'];
							echo "</td>";
							echo "<td>";
							echo $row['avail_seats'];
							echo "</td>";
							echo "<td>";
							if($ratings[$k]==0)
							{
								echo "Not Yet Rated";
							}
							else
							{
							echo round($ratings[$k],2);
							}
							echo "</td>";
							echo "</tr>";
							//echo "Done";
							$k++;
						}
						
						echo "</table></div>";	

				//}//else for printing table headings 
				$i++;
		//}//while loop for printing buses
}//else buses found
	
?>
<?php
	session_start();
    include('config.php');
echo "<style>".
"body{
	background-image:url(seat1.jpg);
	background-size:100%;
	background-position:center;
}"."</style>";
	
	$val=$_GET['val'];
	$_SESSION['tripcode']=$val;
	//$_SESSION['cost']=$cost;
	$myquery="select seat_layout from bus where trip_code='$val'";
	$result=mysqli_query($conn,$myquery);
	//$seats=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	while($row=mysqli_fetch_array($result))
	{   
		$seatlayout=explode("-",$row['seat_layout']);
		//$seatlayout[3] = intval($seatlayout[3]) - 1;
									//$seats[$seatlayout[3]] = 1;
	}
		echo '<br>';
	$myq="select cost from bus where trip_code='$val'";
	$resmyq=mysqli_query($conn,$myq);
	while($row=mysqli_fetch_array($resmyq))
	{
		$cost=$row['cost'];
	}
	$_SESSION['cost']=$cost;
$count=0;
$count1=0;
echo "<img style='bottom:10px;position:relative ;left:8%;' src='dr.png' height='80px'>";
echo "<style>"."form{outline:black;}"."</style>";
//echo "<div>";
//echo "<style>"."div{border-left:thick solid black;position:relative;left:500px;}"."</style>";
echo "<style>".".container{width:500px;height:500px;}"."</style>";
echo "<style>";
echo ".div2{background:lightgray;width:200px;margin-left:250px;border: 4px solid white;}";
echo "</style>";
echo "<style>";
//echo "<style>".".left-div{float:left; margin-left:108px; background-color:skyblue;}"."</style>";
echo ".div1{width:90px;float:left; margin-left-108px;background-color:lightgray;width:200px;border: 4px solid white; height:500px;}";
echo "</style>";
echo "<div class='container'>";
echo "<div class=div1>";
echo "<form action='reserve2.php' method='POST'>";
echo "&nbsp&nbsp&nbsp";
for($i=01; $i<41; $i++)
{

	$j = $i - 1;
	if($seatlayout[$j] == 1)
	{
		//echo "<li class='span1'>";
		echo "<a href='#' class='thumbnail' title='Booked'>";
		//echo "<img src='red.png' height='50px' alt='Booked'/>";
		echo "<label class='checkbox'>";
		
		//echo "<img src='red.png' height='50px' alt='Available'/>";
		echo "<b style='font-family:courier;background-color:yellowgreen;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7' disabled><b></b></b>";
		//echo " ";
		
		echo "</label>";
		echo "</a>";
	}
	elseif($seatlayout[$j]==2)
	{
		//echo "<li class='span1'>";
		echo "<a href='#' class='thumbnail' title='Booked'>";
		//echo "<img src='red.png' height='50px' alt='Booked'/>";
		echo "<label class='checkbox'>";
		
		//echo "<img src='red.png' height='50px' alt='Available'/>";
		echo "<b style='font-family:courier;background-color:hotpink;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7' disabled><b></b></b>";
		
		
		echo "</label>";
		echo "</a>";
	}
	
	else
	{
	//echo "<li class='span1'>";
	echo "<a href='#' class='thumbnail' title='Available'>";
	//echo "<img src='green.png' height='50px' alt='Available'/>";
echo "<b style='font-family:courier;background-color:lightslategrey;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7'><b></b></b>";
//echo " ";
	echo "<label class='checkbox'>";
	echo "</label>";
	echo "</a>";
	//echo "</li>";
	}
	$count++;
	
	if($count%4==0 or $count%4==0)
	{
		echo "<br><br>";
		echo "&nbsp&nbsp&nbsp";
	}
		elseif($count%2==0)
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp";
	

		
}
echo "</div>";
//echo "<style>".".left-div{float:left; margin-left:108px; background-color:skyblue;}"."</style>";
echo "<div class='div2'>";

echo "<b style='font-family:courier;background-color:yellowgreen;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7' disabled><b></b></b>"."Booked"."<br>";
echo "<b style='font-family:courier;background-color:hotpink;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7' disabled><b></b></b>"."Ladies Booked"."<br>";
echo "<b style='font-family:courier;background-color:lightslategrey;font size:5'><input type='checkbox' name='seats[]' value=$i style='zoom:1.7' disabled><b></b></b>"."Available"."<br>";
echo "</div>";
echo "</div><br>";
echo "<input type='submit' onclick='runMyFunc()' value='Submit'/>";
echo "</form>";
echo '<script language="javascript">
function runMyFunc()
{
	if(document.getElementByName("seats")[0].value=="")
	{
		alert("Please enter details");
	}
	else{
		var form=document.getElementByName("form")[0];
		form.submit();

	}
	}
</script>';
?>






	

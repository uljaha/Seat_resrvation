<?php
echo "<style>".
"body{
	background-image:url('yy.jpg');
	background-size:100%;
	background-position:center;
}"."</style>";
session_start();
include('config.php');
	$tripcode=$_SESSION['tripcode'];
	$b=$_POST['boardpt'];
	$t=$_POST['boardtm'];
	//echo $tripcode;
//$board[0]=$b;
	//$board[1]=$t;
	//print_r($board);
	//$board1=implode($board);
	//echo $board1;
	//echo "<form method='get' action='addboard.php'><button class='btn btn-success btn-xs' name='san' value='.$board1.'>Add Boarding Point</button></form>";
	$query="insert into board (trip_code,board,btime) values ('$tripcode','$b','$t')";
	$result=mysqli_query($conn,$query);
	if($result)
	{
		echo "<font color='black' size='10'>";
		echo "<br><br><br><a href='board.php'>Add few more boarding points to the same bus</a><br><br><br><br>";
		echo "<a href='adminhome.php'>Return To Home Page</a>";
	}
	else
	{
		echo "Oops...!! Something went wrong!!";
	}
	?>

<?php
	$b=$_POST['boardpt'];
	$t=$_POST['boardtm'];
	echo $b;
	echo $t;
	$board[0]=$b;
	$board[1]=$t;
	//print_r($board);
	$board1=implode($board);
	echo $board1;
	echo "<form method='get' action='addboard.php'><button class='btn btn-success btn-xs' name='san' value='.$board1.'>Add Boarding Point</button></form>";
	?>
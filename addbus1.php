

<?php

	echo "<style>".
"body{
	background-image:url('bye.jpg');
	background-size:100%;
	background-position:center;
}"."</style>";
	echo "<font color='red' size='12'>"."Enter the bus details"."</font>";
	echo "<font color='blue' size='5'><b>";
	echo "<form action='add1.php' method='POST'>";
	echo "Trip Code"."<input type='text' name='tripcode' maxlength='20'/>"."<br><br>";
	echo "Bus No"."<input type='text' name='busno' maxlength='20'/>"."<br><br>";
	echo "From"."<input type='text' name='origin' maxlength='20'/>"."<br><br>";
	echo "To"."<input type='text' name='dest' maxlength='20'/>"."<br><br>";
	//echo "No of seats"."<input type='text' name='numseats' maxlength='20'/>"."<br><br>";
	echo "Departure"."<input type='text' name='dtime' maxlength='20'/>"."<br><br>";
	echo "Arrival"."<input type='text' name='atime' maxlength='20'/>"."<br><br>";
	$today=date("Y-m-d");
	echo "Cost"."<input type='text' name='cost' maxlength='10'/>"."<br><br>";
	
	echo "<br>"."<input type='submit' value='ADD'/>";
	echo "</form>";
	echo "</b></font>";
	//echo "<form method='get' action='addboard.php'><button class='btn btn-success btn-xs' name='san' value="'.$board[].'">Add Boarding Point</button></form>"
	
	
	
	


?>
<?php
	echo "<font color='blue' size='10'>"."Enter the bus details"."</font>";
	
	echo "<form action='add.php' method='POST'>";
	echo "Bus ID"."<input type='text' name='busid' maxlength='20'/>"."<br><br>";
	echo "Bus No"."<input type='text' name='busno' maxlength='20'/>"."<br><br>";
	echo "From"."<input type='text' name='origin' maxlength='20'/>"."<br><br>";
	echo "To"."<input type='text' name='dest' maxlength='20'/>"."<br><br>";
	//echo "No of seats"."<input type='text' name='numseats' maxlength='20'/>"."<br><br>";
	echo "Depart Time"."<input type='text' name='dtime' maxlength='20'/>"."<br><br>";
	echo "Arrival Time"."<input type='text' name='atime' maxlength='20'/>"."<br><br>";
	$today=date("Y-m-d");
	echo $today;
	echo "Depart Date"."<input type='date' name='ddate' min=$today />"."<br><br>";
	echo "Arrival Date"."<input type='date' name='adate' />"."<br><br>";
	echo "Cost"."<input type='text' name='cost' maxlength='10'/>"."<br><br>";
	echo
	echo "<br>"."<input type='submit' value='ADD'/>";
	echo "</form>";
	
	
	
	


?>
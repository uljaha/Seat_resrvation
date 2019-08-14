<font size='8'>
<font color='white'>
	<?php
	
		echo "<style>".
"body{
	background-image:url(sw.jpg);
	background-size:100%;
	background-position:bottom;
}"."</style>";
		echo "Please add boarding points";
		echo "<form action=addboard.php method='post'>";
		echo "Boarding Point"."<input type='text' name='boardpt'/>"."<br><br>";
		echo "Boarding Time"."<input type='time' name='boardtm'/>"."<br><br></post>";
		echo "<input type='submit' name='Add'><br><br>";
		echo "<a href='adminhome.php'>Go back</a>";
	?>
	</font>
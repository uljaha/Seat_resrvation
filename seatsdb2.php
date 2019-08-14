<?php
//Seats booked for this sample
$seats = array("B8","C7","A1","B1");

//The aisles.  Note E is walkway and single seat in back
$ais = array("A","B","E","C","D");

//Walkway or aisle seats
$aisle = array("E1","E2","E3","E4","E5","E6","E7","E8","E9");

echo "<table>\\r";
foreach($ais as $i){
	echo "<tr>\\r";
	for($r=1;$r<=10;$r++){
		$seat = $i.$r;
		if(in_array($seat,$seats)){
			$image = "<img src="seats.jpg" border=\\"0\\" width=\\"33\\" height=\\"26\\" alt=\\"\\" />";
		}elseif(!in_array($seat,$aisle)){
			$image = "<img src=\\"seats.jpg\\" border=\\"0\\" width=\\"33\\" height=\\"26\\" alt=\\"\\" />";
		}else{
			$image = "&nbsp;";
		}
		echo "<td>$image</td>\\r";
	}
	echo "</tr>\\r";
}
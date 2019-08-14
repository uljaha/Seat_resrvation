<?php
	for($i=0;$i<10+27;$i++){
		$number=base_convert($i,10,10+26);
		$number=str_pad($number,4,'0',STR_PAD_LEFT);
		echo " ".$number;
	}
?>
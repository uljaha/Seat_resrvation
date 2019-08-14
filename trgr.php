<?php
	if(new.age< 18)
then set new.age_cat = 'CHILD';
ELSEIF(new.age> 60)
then set new.age_cat = 'Senior Citizen';
else
set new.age_cat = 'ADULT';
end if


?>
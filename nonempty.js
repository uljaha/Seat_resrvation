function required()
{
	var empt=document.forms['1'].value;
if(empt=="")
{
alert("Please enter all the details");
return false;
}
else{
return true;
}
}
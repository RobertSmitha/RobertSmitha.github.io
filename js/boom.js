// initialize random test variable 1-4
test = Math.floor((Math.random() * 4) + 1);
function SetVals(id){	
	if (id == test)
	{
		document.getElementById(id).style.backgroundColor = "red";
		alert("GAME OVER");
	}else 
	{
		document.getElementById(id).style.backgroundColor = "grey";
	}
}
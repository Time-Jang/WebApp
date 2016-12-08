window.onload = function() {
	$("eat").onclick = eatClick;
};

function eatClick() {
	var foodname = $("foodname").value;
	var foodgroup = $("foodgroup").value;
	var remain = $$("img");
//	foodgroup = "food "+foodgroup;

	for(var i = 0; i < remain.length; i++)
	{
		if(remain[i].alt == foodname)
		{
			if(remain[0].hasClassName(foodgroup))
			{
				remain[i].parentNode.removeChild(remain[i]);
			}
		}
	}




}

//name : JangWonWoo, ID:2014038286, class : 2
document.observe("dom:loaded", function() {
	$("navigate").observe("click", navigateRequest);
	// requesting destinations to populate dropdown list
	// dropdown 리스트를 채우기 위하여 목적지 데이터 요청
//	<option> </option>
	new Ajax.Request("q3.php", {
		method: "get",
		parameters: {else: " "},
		onSuccess: loadDestinations
	});

});

// populating dropdown list of destinations
// 목적지 dropdown 리스트를 채우시오
function loadDestinations(ajax) {
	var text = ajax.responseXML.getElementsByTagName("destination");
	for(var i = 0; i < text.length; i++)
  {
    var dest = ajax.responseXML.getElementsByTagName("destination")[i].firstChild.nodeValue;
    var option = document.createElement("option");
    $("to").appendChild(option);
  }

}

// requesting navagational data for the selected destination
// 선택된 목적지에 맞는 방향(길찾기) 데이터 요청
function navigateRequest() {
	new Ajax.Request("q3.php", {
		method: "get",
		parameters: {to: $("to").value},
		onSuccess: injectDirections
	});
}

// reporting turn-by-turn direction to the destination
// 목적지까지의 방향 안내
function injectDirections(ajax) {
	while($("directions").firstChild)
	{
		$("directions").removeChild($("directions").firstChild);
	}
	var dir = JSON.parse(ajax.responseText);

	for(var i = 0; i < dir.directions.length; i++)
	{
		var li = document.createElement("li");
		if(dir.directions[i].turn != "arrive")
		{
			li.textContent = (i+1)+".";
			var img = document.createElement("img src=\""+dir.directions[i].turn+".png\" /");
			li.appendChild(img);
			li.textContent += dir.directions[i].distance+"km turn "+dir.directions[i].turn+" on "+dir.directions[i].street+"";
		}
		else
		{
			li.textContent = i+".";
			var img = document.createElement("img src=\""+dir.directions[i].turn+".png\" /");
			li.appendChild(img);
			li.textContent += dir.directions[i].distance+"km arrive "+dir.directions[i].turn+" at "+dir.to+"";
		}
		$("directions").appendChild(li);
	}

}

window.onload = function() {
	$("compare").observe("click", compareClick);
};

function compareClick() {
	// clear out previous items
	var expected_text = $("expected");
	var actual_text = $("actual");
	var text = expected_text.value;
	var text2 = actual_text.value;
	var expected = text.split("\n");
	var actual = text2.split("\n");

	while($("differences").firstChild)
  {
    $("differences").removeChild($("differences").firstChild);
  }

	var min_length = 0;
	if(expected.length < actual.length)
	{
		min_length = expected.length;
	}
	else if(expected.length > actual.length)
	{
		min_length = actual.length;
	}
	else {
		min_length = expected.length;
	}

	var check = 0;
	for(var i = 0; i < min_length; i++)
	{
		if(expected[i] == actual[i])
		{
			check++;
		}
		else if(expected[i].length != actual[i].length)
		{
			$("differences").innerHTML += "<li>Line "+(i+1)+":";
			if(expected[i].length > actual[i].length)
			{
				$("differences").innerHTML += "< "+expected[i];
				$("differences").innerHTML += "<br>";
				$("differences").innerHTML += "> "+actual[i];
				$("differences").innerHTML += "</li>";
			}
			else
			{
				$("differences").innerHTML += "< "+actual[i];
				$("differences").innerHTML += "<br>";
				$("differences").innerHTML += "> "+expected[i];
				$("differences").innerHTML += "</li>";
			}
		}
	}

	if(check == min_length)
	{
		$("differences").innerHTML += "<li id='nodiff'>No differences found</li>";
		$("nodiff").addClassName("nodiffs");
	}
	if(expected.length != actual.length)
	{

		if(expected.length > actual.length)
		{
			$("differences").innerHTML += "<li id='diff'>Lengths differ: < "+expected.length+", > "+actual.length+"</li>";
		}
		else
		{
			$("differences").innerHTML += "<li id='diff'>Lengths differ: > "+expected.length+", < "+actual.length+"</li>";
		}
		$("diff").addClassName("diffs");
	}

}

// helper function to add one 'li' tag to the page
function appendLi(text) {
	var li = $(document.createElement("li"));
	li.innerHTML = text;
	$("differences").appendChild(li);
}

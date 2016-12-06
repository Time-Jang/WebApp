window.onload = function() {
    $("b_xml").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("books.php", {
            method: "get",
            parameters: {category: getCheckedRadio($$("#category label input"))},
            onSuccess: showBooks_XML,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
    }
    $("b_json").onclick=function(){
    	    //construct a Prototype Ajax.request object
          new Ajax.Request("books_json.php", {
            method: "get",
            parameters: {category: getCheckedRadio($$("#category label input"))},
            onSuccess: showBooks_JSON,
            onFailure: ajaxFailed,
            onException: ajaxFailed
          });
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
  while($("books").firstChild)
  {
    $("books").removeChild($("books").firstChild);
  }
  var text = ajax.responseXML.getElementsByTagName("book");
  for(var i = 0; i < text.length; i++)
  {
    var title = ajax.responseXML.getElementsByTagName("title")[i].firstChild.nodeValue;
    var author = ajax.responseXML.getElementsByTagName("author")[i].firstChild.nodeValue;
    var year = ajax.responseXML.getElementsByTagName("year")[i].firstChild.nodeValue;

    var li = document.createElement("li");
    li.innerHTML = title+", by"+author+" ("+year+")";
    $("books").appendChild(li);
  }
//	alert(ajax.responseText);
}

function showBooks_JSON(ajax) {
  while($("books").firstChild)
  {
    $("books").removeChild($("books").firstChild);
  }
  var book = JSON.parse(ajax.responseText);

  for(var i = 0; i < book.books.length; i++)
  {
    var li = document.createElement("li");
    li.innerHTML = book.books[i].title+", by"+book.books[i].author+" ("+book.books[i].year+")";
    $("books").appendChild(li);
  }
//	alert(ajax.responseText);
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText +
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}

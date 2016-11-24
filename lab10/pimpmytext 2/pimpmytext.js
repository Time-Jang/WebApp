//alert("Hello, world");

function Bigger(){
  var texts = document.getElementById("textarea01");
//  texts.style.fontSize = "24pt";
  if(!texts.style.fontSize)
  {
    texts.style.fontSize = "12pt";
  }
  else
  {

    setInterval(
      function(){
        var text_size = texts.style.fontSize;
        text_size = parseInt(text_size) + 2;
        texts.style.fontSize = text_size+"pt"; }, 500);
  }
}
function Style(){
  var texts = document.getElementById("textarea01");
  var CheckMe = document.getElementById("Bling");
  if(CheckMe.checked)
  {
    texts.style.fontWeight = "bold";
    texts.style.textDecoration = "underline";
    texts.style.color = "green";
  }
  else
  {
    texts.style.fontWeight = "normal";
    texts.style.textDecoration = "none";
    texts.style.color = "inherit";
  }
  document.body.style.backgroundImage = "url('http://selab.hanyang.ac.kr/courses/cse326/2016/labs/images/9/hundred.jpg')";

}
function Upper(){
  var texts = document.getElementById("textarea01");
  texts.value = texts.value.toUpperCase();
  texts = document.getElementById("textarea01");
  var arrayOfTexts = texts.value.split(".");
  var str1 = "-izzle";
  for(var i = 0; i < arrayOfTexts.length; i++)
  {
    if(i+1 == arrayOfTexts.length)
    {
      break;
    }
    arrayOfTexts[i] = arrayOfTexts[i].concat(str1);
  }
  var string = arrayOfTexts.join(".");
  texts.value = string;
}
function Pig(){
  var vowels = ["a","e","i","o","u"];
  var texts = document.getElementById("textarea01");
  var values = texts.value;
  var len = values.length;
  var string,string2,index;
  for(index = 0; index < len; index++)
  {
    if(values[index] == "a" || values[index] == "e" || values[index] == "i" || values[index] == "o" || values[index] == "u" )
    {
      break;
    }
  }
  string2 = values.substring(0,index);
  string2 = string2.concat("ay");
  string = values.substring(index,len);
  string = string.concat(string2);
  document.getElementById("textarea01").value = string;
}
function Malk(){
  if(document.getElementById("textarea01").value.length >= 5)
  {
    document.getElementById("textarea01").value = "Malkovich";
  }
}

function pageLoad(){
  document.getElementById("Pimp").onclick=Bigger;
  document.getElementById("Bling").onchange=Style;
  document.getElementById("snoop").onclick=Upper;
  document.getElementById("atin").onclick=Pig;
  document.getElementById("malk").onclick=Pig;
}
window.onload = pageLoad;

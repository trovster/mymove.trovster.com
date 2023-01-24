var classNames = new Array("", "rate", "crap", "poor", "okay", "nice", "lovely", "perfect");

function getElement(psID)
{
  if(document.all)
  {
    return document.all[psID];
  }
  else
  {
    return document.getElementById(psID);
  }
} 

function changeClassOf(myself, item)
{
  //alert(eval(myself));
  var bgItem = getElement(item);
  bgItem.className = classNames[myself.value];
}
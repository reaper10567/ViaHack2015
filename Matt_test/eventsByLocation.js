var xmlHttp = new XMLHttpRequest();
var location = "Carlsbad, CA";
xmlHttp.open("GET","http://localhost:8000/index.php?id=2&location="+location,false);
xmlHttp.send(null);
var receive = xmlHttp.responseText;
var jsonStr = JSON.stringify(receive);
document.getElementById("secretKey").innerHTML=jsonStr;
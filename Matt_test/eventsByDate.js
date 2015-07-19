var xmlHttp = new XMLHttpRequest();
var Date = "2015-07-18%";
xmlHttp.open("GET","http://localhost:8000/index.php?id=3&date="+Date,false);
xmlHttp.send(null);
var receive = xmlHttp.responseText;
var jsonStr = JSON.stringify(receive);
document.getElementById("secretKey").innerHTML=jsonStr;
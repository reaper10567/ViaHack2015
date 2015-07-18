
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, true );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

var api_key = "ccb2ed9b";
var api_secret = "582dbb11";
var receive =[15712963379,12407509417];
var messageToSend = "toolate";

for(i=0;i<receive.length;i++){
var url = "https://rest.nexmo.com/sms/json?api_key=" + api_key + "&api_secret=" + api_secret + "&from=12069396234&to=" + receive[1] + "&text=" + messageToSend;
console.log(url);
httpGet(url);
}



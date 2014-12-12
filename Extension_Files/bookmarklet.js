
var textbody = "";
window.addEventListener("keypress", function(e){
	if(e.keyCode == 13){
			textbody = window.getSelection();
			alert("You just selected: " + textbody);
			sendStuff();
		}
}, false);

function reqListener () {
  console.log(this.responseText);
}

function sendStuff(){
	var oReq = new XMLHttpRequest();
	oReq.onreadystatechange = function(){
	    if(oReq.readyState == 4){
	      oReq.onload = console.log(this.responseText);
	    }
	};
	oReq.open("GET", "//localhost/Clipboard/copytext.php?textbody="+textbody, true);
	oReq.send();
}


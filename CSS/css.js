var Stundenausfälle = document.getElementById("Stundenausfälle")

Stundenausfälle.onclick = function() {

if(contentScript.className == "alle") {
//kleiner
    content.className = "";
 } else {
//grösser
    contentScript.className = "alle";

    }
}





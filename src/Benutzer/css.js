window.onload = function(){ 

var Stundenausfälle = document.getElementById("Stundenausfälle")

Stundenausfälle.onclick = function() {

if(AlleStundenausfälle.className == "alle") {
//kleiner
   AlleStundenausfälle.className = "keine";
 } else {
//grösser
    AlleStundenausfälle.className = "alle";
    }
}
};

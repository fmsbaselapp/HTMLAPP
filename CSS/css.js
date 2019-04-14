var Stundenausfälle = document.getElementById("AlleStundenausfälle")

Stundenausfälle.onclick = function() {

if(AlleStundenausfälle.className == "alle") {
//kleiner
   AlleStundenausfälle.className = "";
 } else {
//grösser
    AlleStundenausfälle.className = "alle";

    }
}


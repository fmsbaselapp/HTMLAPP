var Stundenausfälle = document.getElementById("Stundenausfälle")

Stundenausfälle.onclick = function () {

    if(Stundenausfälle.className == "alle") {
        //kleiner
        Stundenausfälle.className = "";
    } else {
        //grösser
        Stundenausfälle.className = "alle";

    }
}
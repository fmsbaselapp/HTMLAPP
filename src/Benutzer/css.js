window.onload = function (Stundenausfälle) {

  var Stundenausfälle = document.getElementById("Stundenausfälle")
  var MehrInfos = document.getElementById("AlleStundenausfälle")
  var Dunkler = document.getElementsByClassName("Dunkler")

  Stundenausfälle.onclick = function (Stundenausfälle) {


    if (AlleStundenausfälle.className == "alle") {
      //kleiner
      zenscroll.toY(0, 100) //wohin, dauer
      AlleStundenausfälle.className = "keine";
      Dunkler.className = "keine";
    } else {
      //grösser
      AlleStundenausfälle.className = "alle";
    }
  }

  MehrInfos.onclick = function (Stundenausfälle) {


    if (AlleStundenausfälle.className == "alle") {
      //kleiner
      zenscroll.toY(0, 100) //wohin, dauer
      AlleStundenausfälle.className = "keine";
      Dunkler.className = "keine";
    } else {
      //grösser
      AlleStundenausfälle.className = "alle";
      
    }
  }


};

/*
window.scrollTo({
  top: 0,
  left: 0,
  behavior: "smooth",
*/
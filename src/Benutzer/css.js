window.onload = function (Stundenausfälle) {

  var Stundenausfälle = document.getElementById("Stundenausfälle")
  var MehrInfos = document.getElementById("AlleStundenausfälle")

  Stundenausfälle.onclick = function (Stundenausfälle) {


    if (AlleStundenausfälle.className == "alle") {
      //kleiner
      AlleStundenausfälle.className = "keine";
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      })
    } else {
      //grösser
      AlleStundenausfälle.className = "alle";
    }
  }

  MehrInfos.onclick = function (Stundenausfälle) {


    if (AlleStundenausfälle.className == "alle") {
      //kleiner
      AlleStundenausfälle.className = "keine";
      window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth",
      })
    } else {
      //grösser
      AlleStundenausfälle.className = "alle";
    }
  }


};
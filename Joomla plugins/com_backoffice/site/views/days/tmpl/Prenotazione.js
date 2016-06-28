var select_inizio;
var select_fine;

function setFine(select) {
    var newElem;
    var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
    var successivo = select.form.elements["fine"];

    while (successivo.options.length) {
        successivo.remove(0);
    }
    var choice = select.options[select.selectedIndex].value;
    select_inizio = choice;
    
    document.getElementById("unita").value = 0;
    document.getElementById("totale").value = 0;

    newElem = document.createElement("option");
    newElem.text = "Seleziona fine";
    newElem.value = "";

    successivo.add(newElem, where);
    
    if (choice != "") {
        for (var i = 0; i < time_end[choice].length; i++) {
            newElem = document.createElement("option");
            newElem.text = time_end[choice][i].text;
            newElem.value = time_end[choice][i].value;

            if(time_end[choice].length == 1){
              newElem.selected = "selected";
              successivo.add(newElem, where);
              setTipo(successivo);
            }
            else
              successivo.add(newElem, where);
        }
    }
}

function setTipo(select) {
var newElem;
var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
var successivo = select.form.elements["tipo"];

while (successivo.options.length) {
    successivo.remove(0);
}
var choice = select.options[select.selectedIndex].value;
select_fine = parseInt(choice);

document.getElementById("unita").value = 0;
document.getElementById("totale").value = 0;

newElem = document.createElement("option");
newElem.text = "Seleziona tipo";
newElem.value = "";

successivo.add(newElem, where);
  if (choice != "") {
    for (var i = 0; i < tipo[choice].length; i++) {
            newElem = document.createElement("option");
            newElem.text = tipo[choice][i].text;
            newElem.value = tipo[choice][i].value;
      if(tipo[choice].length == 1){
        newElem.selected = "selected";
        successivo.add(newElem, where);
        
        setConsulente(successivo);
      }
      else
        successivo.add(newElem, where);
    }
  }
}

function setConsulente(select) {
var newElem;
var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
var successivo = select.form.elements["consulente"];

while (successivo.options.length) {
    successivo.remove(0);
}
var choice = select.options[select.selectedIndex].text;
var price = prices[choice][0].value;

newElem = document.createElement("option");
newElem.text = "Seleziona consulente";
newElem.value = "";

successivo.add(newElem, where);
  if (choice != "") {
  var consulent = 0;
    for (var i = 0; i < cons[choice].length; i++) {
          var dati = cons[choice][i].value.split(" ");
          var inizio = parseInt(dati[0]);
          var fine = parseInt(dati[1]);
          if((select_fine > inizio) && (select_fine <= fine)){
            newElem = document.createElement("option");
            newElem.text = cons[choice][i].text;
            newElem.value = dati[2];
            consulent++;
            successivo.add(newElem, where);
          }
    setCost(choice, price);
    }
    if(consulent == 1)
        newElem.selected = "selected";
  }
}

function setCost(tipo, price){
  document.getElementById("unita").value = price;
  document.getElementById("totale").value = price * ((select_fine - select_inizio)/60);
}

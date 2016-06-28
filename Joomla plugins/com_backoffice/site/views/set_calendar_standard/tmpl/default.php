<?php
require_once(JPATH_COMPONENT.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
$time_min = 15;
$time_start = 420; // 7:00
$time_finish = 1260;  //  21:00
?>

<h1>
  <center>Set Calendar Standard</center>
</h1>

<form action="?option=com_backoffice&view=Set_Calendar_Standard" method="post">
<table>
  <tr>
    <td>
      <select name="giorno" onchange="setInizio(this)">
      <option value="" selected="selected">Seleziona Giorno</option>
      <option value="2">Lunedì</option>
      <option value="3">Martedì</option>
      <option value="4">Mercoledì</option>
      <option value="5">Giovedì</option>
      <option value="6">Venerdì</option>
      <option value="7">Sabato</option>
      <option value="1">Domenica</option>
      </select>
    </td>
    <td>
      <select name="inizio" onchange="setFine(this)">
      <option value="" selected="selected">Seleziona inizio</option>
      </select>
    </td>
    <td>
      <select name="fine">
      <option value="" selected="selected">Seleziona fine</option>
      </select>
    </td>
    <td>
      <input type = "hidden" name = "option" value = "com_backoffice">
      <input type = "hidden" name = "task" value = "add_standard">
      <input type = "submit" value = "Aggiungi">
    </td>
  </tr>
</table>
</form>
<br/>
<form action="?option=com_backoffice&view=Set_Calendar_Standard" method="post">
<table border="1" frame="above" cellspacing="10">
  <tr class="<?php echo "row$k"; ?>">
    <td width="80">
      <p align="center"><strong>Seleziona</strong></p>
    </td>
    <td width="100">
      <p align="center"><strong>Giorno</strong></p>
    </td>
    <td width="80">
      <p align="center"><strong>Inizio</strong></p>
    </td>
    <td width="80">
      <p align="center"><strong>Fine</strong></p>
    </td>
  </tr>
  <?php
    $k = 0;
    $c = 0;
    if (!empty($this->orario_standard)) {
      foreach ($this->orario_standard as $os)
      {
  ?>
  <tr>
    <td width="100" align="center"><?php echo "<input type=\"".'checkbox'."\"name=\"check".$c."\" value=\"".$os['Giorno']." ".$os['Inizio']." ".$os['Fine']."\">"; ?></td>
    <td width="80" align="center"><?php
    switch($os['Giorno']){
      case 2:{
        echo "Lunedì";
        break;
      }
      case 3:{
        echo "Martedì";
        break;
      }
      case 4:{
        echo "Mercoledì";
        break;
      }
      case 5:{
        echo "Giovedì";
        break;
      }
      case 6:{
        echo "Venerdì";
        break;
      }
      case 7:{
        echo "Sabato";
        break;
      }
      case 1:{
        echo "Domenica";
        break;
      }
    }
    ?></td>
    <td width="100" align="center"><?php echo $os['Inizio']; ?></td>
    <td width="80" align="center"><?php echo $os['Fine']; ?></td>
  </tr>
  <?php
      $k = 1 - $k;
      $c++;
      }
    }
  ?>
</table>
<table>
  <tr>
    <td>
        <input type = "hidden" name = "number_rows" value = "<?php echo $c?>">
        <input type = "hidden" name = "option" value = "com_backoffice">
        <input type = "hidden" name = "task" value = "delete_standard">
        <input type = "submit" value = "Rimuovi">
    </td>
  </tr>
</table>
</form>
<script type="text/javascript">
var select_fine;
var hour;
var minute;
function setInizio(select) {
    var newElem;
    var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
    var successivo = select.form.elements["inizio"];

    while (successivo.options.length) {
        successivo.remove(0);
    }
    var choice = select.options[select.selectedIndex].value;

    newElem = document.createElement("option");
    newElem.text = "Seleziona inizio";
    newElem.value = "";

    successivo.add(newElem, where);
    if (choice != "") {
        for(var i = parseInt(<?php echo $time_start;?>); i < parseInt(<?php echo $time_finish;?>); i += parseInt(<?php echo $time_min;?>)) {
            newElem = document.createElement("option");
            hour = Math.floor(i/60);
            minute = ((i%60 == 0)? "0"+i%60 : i%60);
            newElem.text = hour+":"+minute;
            newElem.value = i;
            successivo.add(newElem, where);
        }
    }
}

function setFine(select) {
    var newElem;
    var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
    var successivo = select.form.elements["fine"];

    while (successivo.options.length) {
        successivo.remove(0);
    }
    var choice = select.options[select.selectedIndex].value;

    newElem = document.createElement("option");
    newElem.text = "Seleziona fine";
    newElem.value = "";

    successivo.add(newElem, where);
    if (choice != "") {
        for(var i = parseInt(choice)+parseInt(<?php echo $time_min;?>); i <= parseInt(<?php echo $time_finish;?>); i += parseInt(<?php echo $time_min;?>)) {
            newElem = document.createElement("option");
            hour = Math.floor(i/60);
            minute = ((i%60 == 0)? "0"+i%60 : i%60);
            newElem.text = hour+":"+minute;
            newElem.value = i;
            successivo.add(newElem, where);
        }
    }
}
</script>

<?php
require_once(JPATH_COMPONENT.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
$time_min = 15;
$time_start = 420; // 7:00
$time_finish = 1260;	//	21:00

$document = &JFactory::getDocument();
$folder = JURI::base().DS.'components'.DS.strtolower(JRequest::getVar('option'));
$folder .= DS.'views'.DS.strtolower(JRequest::getVar('view')).DS.'tmpl';
$document->addScript($folder.DS.'Calendar.js' );
$document->addStyleSheet($folder.DS.'Calendar.css');
?>
<h1>
	<center>Set Calendar Alternative</center>
</h1>

<form name="add_alternative" action="index.php?option=com_backoffice" method="post">
<table>
	<tr>
		<td>
			<input type="text" name="data" id="data" onchange="setInizio(this)"></input>
			<button id="cancel" name="cancel" classname="Calendar" class="Calendar">X</button>
			<div id="calendario"></div>
		</td>
		<td>
			<select id="inizio" name="inizio" onchange="setFine(this)">
			<option value="" selected="selected">Seleziona inizio</option>
			</select>
		</td>
		<td>
			<select id="fine" name="fine">
			<option value="" selected="selected">Seleziona fine</option>
			</select>
		</td>
		<td>
			<input type = "hidden" name = "option" value = "com_backoffice">
			<input type = "hidden" name = "task" value = "add_alternative">
			<input type="submit" value="Aggiungi">
		</td>
	</tr>
</table>
</form>
<br/>
<form action="index.php?option=com_backoffice" method="post">
<table border="1" frame="above" cellspacing="10">
	<tr class="<?php echo "row$k"; ?>">
		<td width="80">
			<p align="center"><strong>Seleziona</strong></p>
		</td>
		<td width="100">
			<p align="center"><strong>Data</strong></p>
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
		if (!empty($this->orario_alternative)) {
			foreach ($this->orario_alternative as $oa)
			{
	?>
	<tr>
		<td width="100" align="center">
			<?php echo "<input type=".'checkbox'." name =\"check".$c."\" value =\"".$oa['Data']." ".$oa['Inizio']." ".$oa['Fine']."\">"; ?></td>
		<td width="80" align="center"><?php echo $oa['Data']?></td>
		<td width="100" align="center"><?php echo $oa['Inizio']; ?></td>
		<td width="80" align="center"><?php echo $oa['Fine']; ?></td>
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
				<input type = "hidden" name = "number_rows" value = "<?php echo $c;?>">
				<input type = "hidden" name = "option" value = "com_backoffice">
				<input type = "hidden" name = "task" value = "delete_alternative">
				<input type = "submit" value = "Rimuovi">
		</td>
	</tr>
</table>
</form>
<script type="text/javascript">
var hour;
var minute;
function setInizio(input) {
    var newElem;
    var where = (navigator.appName == "Microsoft Internet Explorer") ? -1 : null;
    var successivo = document.getElementById("inizio");

    while (successivo.options.length) {
        successivo.remove(0);
    }
    var choice = input.value;
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
    var successivo = document.getElementById("fine");
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
<script type="text/javascript">
new Calendar( document.getElementById("calendario"), document.getElementById("data"), document.getElementById("cancel") );
</script>

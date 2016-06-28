<html>
<head>
<script language="JavaScript">
/*
 * getDati() funzione per il recupero dei dati selezionati con gli option button
 */
function checkform(form)
{		
	//n=indice dell'elemento selezionato
	n=form.direzione.selectedIndex;
	//id_dir=valore dell'elemento selezionato
	if((form.direzione.options[n].value != "") && (form.programma.value != "") {
		return true;
	} else {
		Alert("Errore: i dati non sono stati compilati correttamente.");
		return false;
	}
}

</script>
</head>
<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1><center>Form Per La Gestione Dei Bandi Diretti</center></h1><br><br>
<br><br>
<table bordercolor="red" border="2"><tr bgcolor="#FFA4A4"><td>Compilare correttamente tutti i campi sottostanti e poi cliccare sul tasto "AGGIUNGI"</td></tr></table>
<br><br>
<table>
<form name="gestione_programmi" method="post" action="<?php echo JRoute::_(JURI::base().'index.php?option=com_areastrumentale&task=save&code=2&view=gestioneprogrammi" onSubmit="return checkform(this)');?>">
<tr>
<td>Direzione Generale</td>
<td> <fieldset>
<select name="direzione">
<option name="dir00" value="" defaultSelected="false">--scegli una Direzione Generale--</option>
<?php
$i=0;
foreach ($this->direzioni as $di)
{ 
?>
<option name="<?php echo $di["direzione"];?>" value="<?php echo $di["id"];?>"><?php echo $di["direzione"]; ?></option>
<?php }?>
	</select> 
	</fieldset>
</td>
</tr>
<tr>
<td>Inserire il nome del <bold>Programma</bold> da associare alla Direzione Generale scelta e da inserrire nel DB.</td>
<td><input type="text" name="programma" id="programma" value=""></td>
</tr>
<tr>
<td><input type="submit" name="gestione_programmi" value="Aggiungi Programma"></td>
</tr>
</form>
</table>
<br>
<br>
<a href="<?php echo JRoute::_('index.php?option=com_area_strumentale&view=menu');?>"><strong>Torna all'Area di Gestione dei Bandi</strong></a>
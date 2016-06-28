<html>
<head>
<script language="JavaScript">
/*
 * checkform() funzione per il check dei dati selezionati con gli option button
 */
function checkform(form)
{	
	if (form.settore.value != "") {
		return true;
	} else {
		alert("Inserisci il nome del settore.");
		return false;
	}
}

</script>
</head>
<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>
<center>Form Per La Gestione Dei Bandi Indiretti - Inserimento di un
nuovo <bold>Settore</bold></center>
</h1>
<br>
<br>
<br>
<br>
<table bordercolor="red" border="2">
	<tr bgcolor="#FFA4A4">
		<td>Compilare correttamente tutti i campi sottostanti e poi cliccare
		sul tasto "AGGIUNGI"</td>
	</tr>
</table>
<br>
<br>
<table>
	<form name="gestione_settori" method="post" action="<?php echo JRoute::_(JURI::base().'index.php?option=com_areastrumentale&task=save&code=5&view=gestionesettori');?>"
		onSubmit="return checkform(this)">
	<tr>
		<td>Inserire il nome del <bold>Settore</bold> che si vuole aggiungere
		al DB.</td>
		<td><input type="text" name="settore" id="settore" value=""></td>
	</tr>
	<tr>
		<td><input type="submit" name="addsettore" value="Aggiungi Settore"></td>
	</tr>
	</form>
</table>
<br>
<br>
<a href="<?php echo JRoute::_('index.php?option=com_area_strumentale&view=menu');?>"><strong>Torna
all'Area di Gestione dei Bandi</strong></a>
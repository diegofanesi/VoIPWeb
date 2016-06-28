<html>
<head>
<script language="JavaScript">
/*
 * getDir() funzione per il recupero dei dati selezionati con gli option button
 */
function checkform(form)
{	
	if ((form.direzione.value != "") && (form.link.value != "")) {
		return true;
	} else {
		alert("Errore: i campi non sono stati completamente compilati.");
		return false;
	} 

}

</script>
</head>
<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>
<center>Form Per La Gestione Dei Bandi Diretti - Inserimento di una
nuova <bold>Direzione Generale</bold></center>
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
	<form name="gestione_direzioni" method="post"
		action="<?php echo JRoute::_(JURI::base().'index.php?option=com_areastrumentale&task=save&code=3&view=gestionedirezioni');?>"
		onSubmit="return checkform(this)">
	<tr>
		<td>Inserire il nome della <bold>Direzione Generale</bold> che si
		vuole aggiungere al DB.</td>
		<td><input type="text" name="direzione" id="direzione" value=""></td>
	</tr>
	<tr>
		<td>Inserire il link della <bold>Direzione Generale</bold> che si
		vuole aggiungere al DB.</td>
		<td><input type="text" name="link" id="link" value=""></td>
	</tr>
	<tr>
		<td><input type="submit" name="gestione_direzioni"
			value="Aggiungi Direzione Generale"></td>
	</tr>
	</form>
</table>
<br>
<br>
<a href="<?php echo JRoute::_('index.php?option=com_area_strumentale&view=menu');?>"><strong>Torna
all'Area di Gestione dei Bandi</strong></a>
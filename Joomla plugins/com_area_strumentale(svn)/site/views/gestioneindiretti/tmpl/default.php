<html>
<head>
<script language="JavaScript">
/*
 * getDati() funzione per il recupero dei dati selezionati con gli option button
 */
function checkform(form)
{	
	//id_reg=valore dell'elemento selezionato
	if ((form.regione.selectedIndex != null) && (form.nome.value != "") && (form.link.value != "")) {
		return true;
	} else {
		alert("Errore: non sono stati compilati tutti i campi.");
		return false;
	}
}

</script>
</head>
<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1>
<center>Form Per La Gestione Dei Bandi Diretti</center>
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
	<form name="gestione_indiretti" method="post"
		action="<?php echo JRoute::_(JURI::base().'index.php?option=com_areastrumentale&view=gestioneindiretti&task=save&code=4');?>"
		onSubmit="return checkform(this)">
	<tr>
		<td>Regione</td>
		<td>
		<fieldset><select name="regione" onChange="document.gestione_indiretti.addBando.disabled=false;">
			<option name="reg00" value="" defaultSelected="false">--scegli una
			regione--</option>
			<?php
			$i=0;
			foreach ($this->regioni as $re)
			{
				?>
			<option name="<?php echo $re["regione"];?>"
				value="<?php echo $re["id"];?>"><?php echo $re["regione"]; ?></option>

				<?php }?>
		</select></fieldset>
		</td>
	</tr>
	<tr>
		<td>Settori</td>
		<td>
		<fieldset><?php
		foreach ($this->settori as $se)
		{
			echo '<input type="checkbox" name="set'.$se['id'].'"value="ON">'.$se["settore"].'</option>';
		}
		?>
		</fieldset>
		</td>
	</tr>
	<tr>
		<td>Nome Del Bando Indiretto</td>
		<td><input type="text" name="nome" id="nome" value=""></td>
	</tr>
	<tr>
		<td>Scadenza (gg/mm/aaaa)</td>
		<td><input type="text" name="scadenza" id="scadenza" value=""></td>
	</tr>
	<tr>
		<td>Link al Bando</td>
		<td><input type="text" name="link" id="link" value=""></td>
	</tr>
	<tr></tr>
	<tr></tr>
	<tr>
		<td><input type="submit" name="addBando"
			value="Aggiungi Bando" disabled="true"></td>
	</tr>
	</form>
</table>
<br>
<br>
<a href="<?php echo JRoute::_('index.php?option=com_area_strumentale&view=menu');?>"><strong>Torna
all'Area di Gestione dei Bandi</strong></a>
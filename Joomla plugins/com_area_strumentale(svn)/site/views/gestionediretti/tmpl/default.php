<script language="JavaScript">
var arrprog = new Array();
<?php 
$control=null;
for($count=0; !empty($this->programmi[$count]);$count++) {
	if ($this->programmi[$count]['direzione'] != $control){
		echo "arrprog[".$this->programmi[$count]['direzione']."]= new Array();";
		$control = $this->programmi[$count]['direzione'];
	} 
	echo "arrprog[".$this->programmi[$count]['direzione']."][".$this->programmi[$count]['id']."] = '".$this->programmi[$count]['programma']."';";
}
?>
function changeDir()
{	
	n=document.gestione_diretti.direzioni.selectedIndex;
	id_dir=document.gestione_diretti.direzioni.options[n].value;
	direzione=document.gestione_diretti.direzioni.options[n].name;
	document.gestione_diretti.programma.disabled=false;
	document.gestione_diretti.buttonAdd.disabled=false;
	document.gestione_diretti.programma.options.length=0;
	var count=0;
	for (i in arrprog[id_dir]) {
		if (count==0) {
			document.gestione_diretti.programma.options[count]= new Option(arrprog[id_dir][i], i, true, true);
		} else {
			document.gestione_diretti.programma.options[count]= new Option(arrprog[id_dir][i], i, false, false);
		}
		count++;
	}
}
function checkform(form) {
	if ((form.direzioni.selectedIndex != null) && (document.gestione_diretti.programma.selectedIndex != null) && (document.gestione_diretti.nome.value != "")  && (document.gestione_diretti.link.value != "")) {
		return true;
	} else {
		alert ("Controllare i dati inseriti!!");
		return false;
	}
}
</script>

<?php
defined('_JEXEC') or die('Restricted access');
?>

<h1><center>Form Per La Gestione Dei Bandi Diretti</center></h1><br><br>
<br><br>
<table bordercolor="red" border="2"><tr bgcolor="#FFA4A4"><td>Compilare correttamente tutti i campi sottostanti e poi cliccare sul tasto "AGGIUNGI"</td></tr></table>
<br><br>
<table>
<form name="gestione_diretti" method="post" action="<?php echo JRoute::_(JURI::base().'index.php?option=com_areastrumentale&task=save&code=1&view=gestionediretti');?>" onSubmit="return checkform(this);">
<tr>
<td>Direzione Generale</td>
<td> <fieldset>
<select name="direzioni" onChange="if(document.gestione_diretti.direzioni.selectedIndex != null) changeDir();">
<option name="dir00" value="" defaultSelected="false">--scegli una direzione--</option>
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
<?php ?>
<tr>
<td>Programma</td>
<td><fieldset>
<select name="programma" disabled=true></select></fieldset>
</td>
</tr>
<tr>
<td>Nome Del Bando Diretto</td>
<td><input type="text" name="nome" id="nome" value=""></td>
</tr>
<tr>
<td>Data di scadenza (gg/mm/aaaa)</td>
<td><input type="text" name="scadenza" id="scadenza" value=""></td>
</tr>
<tr>
<td>Link al Bando</td>
<td><input type="text" name="link" id="link" value=""></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td><input type="submit" name="buttonAdd" value="Aggiungi Bando" disabled="true"></td>
</tr>
</form>
</table>
<br>
<br>
<a href="<?php echo JRoute::_('index.php?option=com_area_strumentale&view=menu');?>"><strong>Torna all'Area di Gestione dei Bandi</strong></a>
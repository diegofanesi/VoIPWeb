<?php

// No direct access

defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$folder = JURI::base().DS.'components'.DS.JRequest::getVar('option');
$folder .= DS.'views'.DS.'ricercaie6diretti'.DS.'tmpl';
$document->addStyleSheet( $folder.DS.'style.css' );
?>
<script language="JavaScript">
var arrprog = new Array();
<?php 
$control=null;
for($count=0; !empty($this->programmi[$count]);$count++) {
	if ($this->programmi[$count]['direzione'] != $control){
		echo "arrprog[".$this->programmi[$count]['direzione']."]= new Array();\n";
		$control = $this->programmi[$count]['direzione'];
	} 
	echo "arrprog[".$this->programmi[$count]['direzione']."][".$this->programmi[$count]['id']."] = '".$this->programmi[$count]['programma']."';\n";
}
?>

function refreshProgrammi() {
	n=document.ricerca.direzione.selectedIndex;
	id_dir=document.ricerca.direzione.options[n].value;
	direzione=document.ricerca.direzione.options[n].name;
	document.ricerca.programma.options.length=0;
	var count=0;
	for (i in arrprog[id_dir]) {
		if (count==0) {
			document.ricerca.programma.options[count]= new Option(arrprog[id_dir][i], i, true, true);
		} else {
			document.ricerca.programma.options[count]= new Option(arrprog[id_dir][i], i, false, false);
		}
		count++;
	}
}
</script>

<form name="ricerca" method="post" action="<?php echo JRoute::_(JURI::base().'index.php?option=com_area_strumentale&view=ricercaie6diretti');?>">
<select name="direzione" onClick="refreshProgrammi();">
	<option name="dir00" value="" defaultSelected="false">--scegli una
	direzione--</option>
	<?php
	for ($i=0;!empty($this->direzioni[$i]);$i++) {
		$tex='<option name="'.$this->direzioni[$i]['direzione'].'" value="'.$this->direzioni[$i]['id'].'"';
		if (!empty($this->direzione)) $tex=($this->direzione==$this->direzioni[$i]['direzione'])?$tex.' selected="true" ':$tex;
		$tex=$tex.'>'.$this->direzioni[$i]['direzione'].'</option>';
		echo $tex;
	}
	?>
</select> <br />
<select name="programma">
	<option name="pr00" value="" defaultSelected="false">--scegli un programma--</option>
	<?php
	if (!empty($this->programma) && !empty($this->direzione) && !empty($this->prog_dir)) {
		for ($i=0;!empty($this->prog_dir[$i]);$i++) {
			$tex='<option name="'.$this->prog_dir[$i]['direzione'].'" value="'.$this->prog_dir[$i]['id'].'"';
			$tex=($this->programma==$this->prog_dir[$i]['programma'])?$tex.' selected="true" ':$tex;
			$tex=$tex.'>'.$this->prog_dir[$i]['programma'].'</option>';
			echo $tex;
		}
	}
	?>
</select> <br />
<br />
<input type="radio" name="scaduti" value="0"
<?php if ($this->scaduti==0) echo 'checked="true"';?>>Nascondi scaduti <br />
<input type="radio" name="scaduti" value="1"
<?php if ($this->scaduti==1) echo 'checked="true"';?>>Visualizza scaduti
<br />
<br />
<input type="submit" value="Applica" name="applica">
</form>
<?php
if (empty($this->bandi)) {
	echo "<strong>Nessun bando trovato.</strong>";
} else { ?>
<table id="TabellaBandi">
	<tr>
		<th><strong>Bando</strong></th>
		<th><strong>Direzione generale</strong></th>
		<th><strong>Programma</strong></th>
		<th><strong>Scadenza</strong></th>
	</tr>
	<tbody>
		<?php
		for ($i=0;!empty($this->bandi[$i]);$i++) {
			echo '<tr class="'.(($i % 2 == 0) ? "pari" : "dispari").'">
			<td><a href="'.$this->bandi[$i]['link'].'" target="_blank">'.$this->bandi[$i]['nome'].'</td><td>'.$this->bandi[$i]['direzione'].'</a></td><td>'.$this->bandi[$i]['programma'].'</td><td>'.strftime("%d/%m/%Y",$this->bandi[$i]['scadenza']).'</td></tr>';
		}
		?>
	</tbody>
</table>
		<?php }?>
<br />
<p>pagine:</p><?php
		$link=JRoute::_("index.php?option=com_area_strumentale&view=ricercaie6diretti");
		$link=(!empty($this->id_direzione))?$link."&direzione=".$this->id_direzione : $link;
		$link=(!empty($this->id_programma))?$link."&programma=".$this->id_programma : $link;
		$link=($this->scaduti==1)?$link."&scaduti=1":$link;
		if ($this->pages<1) echo '0';
		for ($i=1;$i<=$this->pages;$i++){
			echo '<a href="'.$link.'&page='.$i.'">'.$i.'</a>';
		}
		?>

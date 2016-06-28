<?php 
$document = &JFactory::getDocument();
$folder = JURI::base().DS.'components'.DS.JRequest::getVar('option');
$folder .= DS.'views'.DS.'ricercaie6indiretti'.DS.'tmpl';
$document->addStyleSheet( $folder.DS.'style.css' );
?>
<form name="ricerca" method="post"
	action="<?php echo JRoute::_(JURI::base().'index.php?option=com_area_strumentale&view=ricercaie6indiretti');?>">
<select name="regione">
	<option name="dir00" value="" defaultSelected="false">--scegli una
	regione--</option>
	<?php
	for ($i=0;!empty($this->regioni[$i]);$i++) {
		$tex='<option name="'.$this->regioni[$i]['regione'].'" value="'.$this->regioni[$i]['id'].'"';
		if (!empty($this->regione)) $tex=($this->regione==$this->regioni[$i]['regione'])?$tex.' selected="true" ':$tex;
		$tex=$tex.'>'.$this->regioni[$i]['regione'].'</option>';
		echo $tex;
	}
	?>
</select> <br />
<select name="settore">
	<option name="pr00" value="" defaultSelected="false">--scegli un
	settore--</option>
	<?php
	for ($i=0;!empty($this->settori[$i]);$i++) {
		$tex='<option name="'.$this->settori[$i]['settore'].'" value="'.$this->settori[$i]['id'].'"';
		$tex=($this->settore==$this->settori[$i]['settore'])?$tex.' selected="true" ':$tex;
		$tex=$tex.'>'.$this->settori[$i]['settore'].'</option>';
		echo $tex;
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
<input type="submit" value="Applica" name="applica"></form>
<?php
if (empty($this->bandi)) {
	echo "<strong>Nessun bando trovato.</strong>";
} else { ?>
<table id="TabellaBandi">
	<tr>
		<th><strong>Bando</strong></th>
		<th><strong>Regione</strong></th>
		<th><strong>Settore</strong></th>
		<th><strong>Scadenza</strong></th>
	</tr>
	<tbody>
	<?php
	for ($i=0;!empty($this->bandi[$i]);$i++) {
		$str='<tr class="'.(($i % 2 == 0) ? "pari" : "dispari").'">
			<td><a href="'.$this->bandi[$i]['link'].'" target="_blank">'.$this->bandi[$i]['nome'].'</td><td>'.$this->bandi[$i]['regione'].'</a></td>';
		for($e=0;!empty($this->bandi[$i]['settori'][$e]);$e++)
		$str=($e==0)?$str.'<td>'.$this->bandi[$i]['settori'][$e]['settore']:$str.','.$this->bandi[$i]['settori'][$e]['settore'];
		$str=$str.'</td><td>'.strftime("%d/%m/%Y",$this->bandi[$i]['scadenza']).'</td></tr>';
		echo $str;
	}
	?>
	</tbody>
</table>
	<?php }?>
<br />
<p>pagine:</p>
	<?php
	$link=JRoute::_("index.php?option=com_area_strumentale&view=ricercaie6indiretti");
	$link=(!empty($this->id_regione))?$link."&regione=".$this->id_regione : $link;
	$link=(!empty($this->id_settore))?$link."&settore=".$this->id_settore : $link;
	$link=($this->scaduti==1)?$link."&scaduti=1":$link;
	if ($this->pages<1) echo '0';
	for ($i=1;$i<=$this->pages;$i++){
		echo '<a href="'.$link.'&page='.$i.'">'.$i.'</a>';
	}
	?>

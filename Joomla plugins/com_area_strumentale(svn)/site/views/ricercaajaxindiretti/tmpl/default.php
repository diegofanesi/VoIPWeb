<?php
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$folder = JURI::root().DS.'components'.DS.JRequest::getVar('option');
$folder .= DS.'views'.DS.JRequest::getVar('view').DS.'tmpl';
$document->addScript( $folder.DS.'main.js' );
$document->addScript( $folder.DS.'Calendar.js' );
$document->addScript( $folder.DS.'search.js' );
$document->addStyleSheet( $folder.DS.'style.css' );
?>
<h1>Ricerca bandi indiretti</h1>
<div id="FiltriBandi"></div>
<div id="PagineBandiUpper"></div>
<table id="TabellaBandi"></table>
<div id="PagineBandiLower"></div>
<script type="text/javascript">
var regioni = [["",""]<?php foreach ($this->regioni as $regione) echo ",[\"".$regione['regione']."\",\"".$regione['id']."\"]"; ?>];
var settori = [["","",""]<?php foreach ($this->settori as $settore) echo ",[\"".$settore['settore']."\",\"".$settore['id']."\"]"; ?>];
var url = <?php echo '"'.JURI::root().'index.php?option='.JRequest::getVar('option').'&view='.JRequest::getVar('view').'&format=xml"' ?>;
var search = new Search(url, regioni, settori);
</script>
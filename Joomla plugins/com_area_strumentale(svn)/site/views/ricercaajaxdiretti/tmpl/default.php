<?php
defined('_JEXEC') or die('Restricted access');

$document = &JFactory::getDocument();
$folder = JURI::base().DS.'components'.DS.JRequest::getVar('option');
$folder .= DS.'views'.DS.JRequest::getVar('view').DS.'tmpl';
$document->addScript( $folder.DS.'main.js' );
$document->addScript( $folder.DS.'Calendar.js' );
$document->addScript( $folder.DS.'search.js' );
$document->addStyleSheet($folder.DS.'style.css');
?>
<h1>Ricerca bandi diretti</h1>
<div id="FiltriBandi"></div>
<div id="PagineBandiUpper"></div>
<table id="TabellaBandi"></table>
<div id="PagineBandiLower"></div>
<script type="text/javascript">
var direzioni = [["",""]<?php foreach ($this->direzioni as $direzione) echo ",[\"".$direzione['direzione']."\",\"".$direzione['id']."\"]"; ?>];
var programmi = [["","",""]<?php foreach ($this->programmi as $programma) echo ",[\"".$programma['programma']."\",\"".$programma['id']."\",\"".$programma['direzione']."\"]"; ?>];
var url = <?php echo '"'.JURI::root().'index.php?option='.JRequest::getVar('option').'&view='.JRequest::getVar('view').'&format=xml"' ?>;
var search = new Search(url, direzioni, programmi);
</script>
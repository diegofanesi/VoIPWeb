<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die( 'Restricted access' );

// Include la classe base JView
jimport('joomla.application.component.view');

require_once(JPATH_COMPONENT.DS.'Helper.php');

/**
 * Utilizza:
 * PopolaMese($anno, $mese);
 * getAvailable($anno, $mese);
 */
class BackofficeViewCalendar extends JView {
	function display($tpl = null) {
		// Ottiene da Model i dati da visualizzare
		$model =& $this->getModel();
		$timestamp = JRequest::getVar('timestamp', 0);
		$timestamp = ($timestamp == 0) ? time() : $timestamp;
		$array = convertDatastamp($timestamp);
		$anno = $array['year'];
		$mese = $array['month'];

		$model->PopolaMese($anno, $mese);
		$liberi = $model->getAvailable($anno, $mese);

		// Riferimento per il template
		$this->assignRef('anno', $anno);
		$this->assignRef('mese', $mese);
		$this->assignRef('liberi', $liberi);
		$this->assignRef('timestamp', $timestamp);
		// Visualizza template
		parent::display($tpl);
	}
}
?>

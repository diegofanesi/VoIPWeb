<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die( 'Restricted access' );

require_once(JPATH_COMPONENT.DS.'Helper.php');

// Include la classe base JView
jimport('joomla.application.component.view');

/**
 * Utilizza:
 * PopolaMese($anno, $mese);
 * getDay($anno, $mese, $giorno);
 * getAllTipo();
 */
class BackofficeViewDays extends JView {
	function display($tpl = null) {
		// Ottiene da Model i dati da visualizzare
		$model =& $this->getModel();
		$timestamp = JRequest::getVar('timestamp', 0);
		if(($timestamp == 0)||($timestamp < time()-86400)) echo "Errore! Giorno non trovato.";

		$array = convertDatastamp($timestamp);
		$anno = $array['year'];
		$mese = $array['month'];
		$giorno = $array['day'];

		$model->PopolaMese($anno, $mese);
		$result = $model->getDay($anno, $mese, $giorno);
		$tipi = $model->getAllTipo();
		$disp = $model->getAvailable();
    $user= JFactory::getUser();
    $credito = $model->getCredito($user->username);
    $credito = $credito['credito'];
		// Riferimento per il template
		$this->assignRef('disp', $disp);
		$this->assignRef('result', $result);
		$this->assignRef('tipi', $tipi);
    $this->assignRef('credito', $credito);
		$this->assignRef('timestamp', $timestamp);
		// Visualizza template
		parent::display($tpl);
	}
}
?>

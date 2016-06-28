<?php
/**
 * Vista per la gestione della tabella dei bandi indiretti.
 *
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');

/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 * In questa view vengono passate al template tutte le regioni e i settori.
 */
class AreaStrumentaleViewGestioneIndiretti extends JView {

	/*
	 *display � la funzione che serve per visualizzare la view.
	 */
	function display($tpl = null) {

		//si ottiene il model da cui prendere i dati che servono
		$model =& $this->getModel();

		//si prendono dal model i dati da visualizzare
		$regioni = $model->indirettiGetRegioni();
		$settori = $model->indirettiGetSettori();
		//passo i dati al template
		$this->assignRef('regioni', $regioni);
		$this->assignRef('settori', $settori);

		//visualizzo il template
		parent::display($tpl);
	}
}
?>
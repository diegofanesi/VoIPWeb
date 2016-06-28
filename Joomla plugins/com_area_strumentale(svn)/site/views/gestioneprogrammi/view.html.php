<?php
/**
 * Vista per la gestione della tabella dei programmi.
 *
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');

/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 * In questa view vengono passate al template le direzioni associate al programma.
 */
class AreaStrumentaleViewGestioneProgrammi extends JView {

	/*
	 *display � la funzione che serve per visualizzare la view.
	 */
	function display($tpl = null) {
		// DA INSERIRE CONTROLLO RISPOSTA E REGISTRAZIONE!
		//si ottiene il model da cui prendere i dati che servono
		$model =& $this->getModel();
		//si prendono dal model i dati da visualizzare
		$direzioni = $model->direttiGetDirezioni();
		//passo i dati al template
		$this->assignRef('direzioni', $direzioni);
		//visualizzo il template
		parent::display($tpl);
	}
}
?>
<?php
/*
 * Vista per la pagina con il form di ricerca dei bandi indiretti.
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');
/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 */
class AreaStrumentaleViewRicercaajaxindiretti extends JView {
    
/*
 *display � la funzione che serve per visualizzare la view.
 */
	function display($tpl = null) {
		
		//si ottiene il model da cui prendere i dati che servono
		$model =& $this->getModel('gestione');
        $this->assignRef('regioni', $model->indirettiGetRegioni());
        $this->assignRef('settori', $model->indirettiGetSettori());
		//visualizzo il template
		parent::display($tpl);
	}
}
?>

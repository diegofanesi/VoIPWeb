<?php
/**
 * Vista per la gestione della tabella dei settori per i bandi indiretti.
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');
/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 */
class AreaStrumentaleViewGestioneSettori extends JView {

/*
 *display � la funzione che serve per visualizzare la view.
 *In questo caso la funzione contiene solo un comando
 *(parent::dispaly($tpl) che serve a visualizzare il template.
 */
	function display($tpl = null) 
	{
		$model=& $this->getModel();
		//visualizzo il template
		parent::display($tpl);
	}
}
?>
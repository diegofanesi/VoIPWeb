<?php
/**
 * Vista per il menu per la gestione delle varie tabelle.
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//include la classe base JView
jimport('joomla.application.component.view');
/*
 * Questa � la classe che contiene le funzioni per la corretta visualizzazione della view.
 */
class AreaStrumentaleViewRicercaie6Indiretti extends JView {

	/*
	 *display � la funzione che serve per visualizzare la view.
	 *In questo caso la funzione contiene solo un comando
	 *(parent::dispaly($tpl) che serve a visualizzare il template.
	 */
	function display($tpl = null) {
		$model=$this->getModel();
		$id_regione=JRequest::getVar('regione',null);
		$regione=null;
		$settore=null;
		if(!empty($id_regione)) {
			$regione=$model->indirettiGetRegioni($id_regione);
			$regione=$regione[0]['regione'];
		}
		$id_settore=JRequest::getVar('settore',null);
		if(!empty($id_settore)) {
			$settore=$model->indirettiGetSettori(null,$id_settore);
			$settore=$settore[0]['settore'];
		}
		$page=JRequest::getVar('page',0);
		$scaduti=JRequest::getVar('scaduti',0);
		$scadenza=($scaduti==0)?time():null;
		$bandi=$model->indirettiRicerca($id_regione,$id_settore,$scadenza,($page*20+1),20);
		$count_bandi=$model->direttiCount($id_regione,$id_settore,$scadenza);
		$pages=$count_bandi/20;
		$regioni=$model->indirettiGetRegioni();
		$settori=$model->indirettiGetSettori();
		$this->assignRef('settori',$settori);
		$this->assignRef('bandi',$bandi);
		$this->assignRef('regioni',$regioni);
		$this->assignRef('pages',$pages);
		$this->assignRef('regione',$regione);
		$this->assignRef('settore',$settore);
		$this->assignRef('scaduti',$scaduti);
		$this->assignRef('id_regione',$id_regione);
		$this->assignRef('id_settore',$id_settore);
		//visualizzo il template
		parent::display($tpl);
	}
}
?>
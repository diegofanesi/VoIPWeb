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
class AreaStrumentalevViewRicercaie6Diretti extends JView {

	/*
	 *display � la funzione che serve per visualizzare la view.
	 *In questo caso la funzione contiene solo un comando
	 *(parent::dispaly($tpl) che serve a visualizzare il template.
	 */
	function display($tpl = null) {
		$model=$this->getModel();
		$id_direzione=JRequest::getVar('direzione',null);
		$direzione=null;
		$programma=null;
		if(!empty($id_direzione)) {
			$direzione=$model->direttiGetDirezioni($id_direzione);
			$direzione=$direzione[0]['direzione'];
		}
		$id_programma=JRequest::getVar('programma',null);
		if(!empty($id_programma) && !empty($id_direzione)) {
			$programma=$model->direttiGetProgrammi(null,$id_programma);
			$programma=$programma[0]['programma'];
			$prog_dir=$model->direttiGetProgrammi($id_direzione);
			$this->assignRef('prog_dir',$prog_dir);
		} else { 
			$id_programma=null;
		}
		$page=JRequest::getVar('page',0);
		$scaduti=JRequest::getVar('scaduti',0);
		$scadenza=($scaduti==0)?time():null;
		$bandi=$model->direttiRicerca($id_direzione,$id_programma,$scadenza,($page*20+1),20);
		$count_bandi=$model->direttiCount($id_direzione,$id_programma,$scadenza);
		$pages=$count_bandi/20;
		$direzioni=$model->direttiGetDirezioni();
		$programmi=$model->direttiGetProgrammi();
		$this->assignRef('programmi',$programmi);
		$this->assignRef('bandi',$bandi);
		$this->assignRef('direzioni',$direzioni);
		$this->assignRef('pages',$pages);
		$this->assignRef('direzione',$direzione);
		$this->assignRef('programma',$programma);
		$this->assignRef('scaduti',$scaduti);
		$this->assignRef('id_direzione',$id_direzione);
		$this->assignRef('id_programma',$id_programma);
		//visualizzo il template
		parent::display($tpl);
	}
}
?>
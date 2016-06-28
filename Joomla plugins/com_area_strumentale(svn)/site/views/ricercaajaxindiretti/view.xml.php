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
		
		$tpl = "xml";
		//si ottiene il model da cui prendere i dati che servono
		$model =& $this->getModel( 'gestione' );
		$action = JRequest::getVar('action');
		$regione = JRequest::getVar('regione');
		$settore = JRequest::getVar('settore');
		$scadenza = JRequest::getVar('scadenza');
		$scaduti = JRequest::getVar('scaduti');
		$currdate = time();
		$currdate = mktime(0,0,0,date("m", $currdate),date("d", $currdate),date("Y", $currdate));
		if( $scaduti == null && $scadenza < $currdate ) {
			$scadenza = $currdate;
		}
		if( $action == "getCount" ) 
			$this->assignRef( 'count', $model->indirettiCount( $regione,
												$scadenza,
												$settore ) );
		else {
			$bandi = $model->indirettiRicerca( 	$regione,
												$scadenza,
												$settore,
												JRequest::getVar('lower'),
												JRequest::getVar('upper') );
	        $this->assignRef( 'bandi', $bandi );
		}
        //visualizzo il template
		parent::display( $tpl );
	}
}
?>

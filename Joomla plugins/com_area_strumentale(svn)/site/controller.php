<?php
/**
 * Controller dell'Area Strumentale.
 *
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');

//includo i model riguardanti le view che serviranno

//include la classe base JController
jimport('joomla.application.component.controller');
jimport('joomla.environment.browser');

/*
 * Questa � la classe che contiene tutte le funzioni inerenti ai modelli e alle view che verranno visualizzate.
 */
class AreaStrumentaleController extends JController {

	function __construct() {
		parent::__construct();
		$this->registerTask('save','save');
		$this->registerTask('newsletter','newsletter');
		$this->addModelPath(JPATH_COMPONENT.DS.'models'.DS);
		$t=JRequest::getVar('task',null);
		$user =& JFactory::getUser();
		if (($t=='save') && (!$user->authorise('as.maintainer','com_areastrumentale'))){
			JError::raiseError( 403, 'L\'utente non ha sufficienti privilegi per visitare la pagina' );
		}
	}

	/*
	 * display � la funzione che serve per visualizzare le view che la richiamano.
	 */
	function display()
	{
		$document =& JFactory::getDocument();
		$browser=JBrowser::getInstance();
		$viewName = JRequest::getVar('view', 'ricercaajaxindiretti');
		if (preg_match('*ajax*',$viewName) && (!$browser->hasFeature('javascript') || $browser->getBrowser() == "msie" && (int)$browser->getMajor() < 7 )) {
			$viewName=str_replace('ajax','ie6',$viewName);
		}
		$user =& JFactory::getUser();
		if( ($viewName == "gestionediretti" ||
		$viewName == "gestioneindiretti" ||
		$viewName == "gestionedirezioni" ||
		$viewName == "gestioneprogrammi" ||
		$viewName == "gestionesettori") &&
		!$user->authorise('as.maintainer','com_areastrumentale') ) {
			JError::raiseError( 403, 'L\'utente non ha sufficienti privilegi per visitare la pagina' );
		}
		$viewType = $document->getType();
		$view =& $this->getView($viewName, $viewType, 'AreaStrumentaleView');
		$model =& $this->getModel('Gestione', 'AreaStrumentaleModel');
		$view->setModel(&$model,true);
		$view->display();
	}

	function save () {
		$msg="";
		$link=JRoute::_("index.php?option=com_areastrumentale");
		$msg_type="message";
		$model =& $this->getModel('Gestione', 'AreaStrumentaleModel');
		$case=JRequest::getVar('code', 6);
		switch ($case) {
			case 1:
				//Registra bando diretto
				$programma=JRequest::getVar('programma',null);
				$nome=JRequest::getVar('nome',null);
				$scadenza=JRequest::getVar('scadenza',null);
				$link_bando=JRequest::getVar('link',null);
				if (!empty($programma) && !empty($nome) && !empty($link_bando)) {
					if (!empty($scadenza)) {
						list( $giorno, $mese, $anno ) = preg_split( '/[-\.\/ ]/', $scadenza );
						$scadenza=mktime(0,0,0,$mese,$giorno,$anno);
					}
					$state=$model->direttiRegistraBando($nome, $programma, $scadenza, $link_bando);
					$msg=($state==0)?"Bando aggiunto correttamente!":"Errore! la query ha restituito un errore.";
					$msg_type=($state==0)?"message":"error";
				}else {
					$msg="Errore di inserimento! Parametri non validi.";
					$msg_type='Notice';
				}
				
				$link = (strstr($link, '?')==false) ? $link."?view=gestionediretti" : $link."&view=gestionediretti";
				break;
			case 2:
				//registra programma
				$id_dir = JRequest::getVar('direzione',null);
				$programma = JRequest::getVar('programma',null);
				if (!empty($id_dir) && !empty($programma)) {
					$state=$model->direttiRegistraProgramma($id_dir, $programma);
					$msg=($state==0)?"Programma aggiunto correttamente!":"Errore! la query ha restituito un errore.";
					$msg_type=($state==0)?"message":"error";
				}else {
					$msg="Errore di inserimento! Parametri non validi.";
					$msg_type='Notice';
				}
				$link = (strstr($link, '?')==false) ? $link."?view=gestioneprogrammi" : $link."&view=gestioneprogrammi";
				break;
			case 3:
				//registra direzione
				$direzione=JRequest::getVar('direzione',null);
				$link_dir=JRequest::getVar('link',null);
				if (!empty($direzione) && !empty($link_dir)) {
					$state=$model->direttiRegistraDirezione($direzione,$link_dir);
					$msg=($state==0)?"Direzione aggiunta correttamente!":"Errore! la query ha restituito un errore.";
					$msg_type=($state==0)?"message":"error";
				}else {
					$msg="Errore di inserimento! Parametri non validi.";
					$msg_type='Notice';
				}
				$link = (strstr($link, '?')==false) ? $link."?view=gestionedirezioni" : $link."&view=gestionedirezioni";
				break;
			case 4:
				//registra bando indiretto
				$nome=JRequest::getVar('nome',null);
				$link_bando=JRequest::getVar('link',null);
				$scadenza=JRequest::getVar('scadenza',null);
				$regione=JRequest::getVar('regione',null);
				if(!empty($nome) && !empty($link_bando) && !empty($regione)) {
					if (!empty($scadenza)) {
						list( $giorno, $mese, $anno ) = preg_split( '/[-\.\/ ]/', $scadenza );
						$scadenza=mktime(0,0,0,$mese,$giorno,$anno);
					}
					$settori=$model->indirettigetSettori();
					$arr_id_set=Array();
					$count2=0;
					for ($count=0;!empty($settori[$count]);$count++) {
						if(JRequest::getVar('set'.$settori[$count]['id'],null) == 'ON') {
							$arr_id_set[$count2]=$settori[$count]['id'];
							$count2++;
						}
					}
					$state=$model->indirettiRegistraBando($nome,$regione,$arr_id_set,$scadenza,$link_bando);
					$msg=($state==0)?"Bando aggiunto correttamente!":"Errore! la query ha restituito un errore.";
					$msg_type=($state==0)?"Message":"Error";
				} else {
					$msg="Errore di inserimento! Parametri non validi.";
					$msg_type='Notice';
				}
				$link = (strstr($link, '?')==false) ? $link."?view=gestioneindiretti" : $link."&view=gestioneindiretti";
				break;
			case 5:
				//registra settore
				$settore=JRequest::getVar('settore',null);
				if (!empty($settore)) {
					$state=$model->indirettiRegistraSettore($settore);
					$msg=($state==0)?"Settore aggiunto correttamente!":"Errore! la query ha restituito un errore.";
					$msg_type=($state==0)?"message":"error";
				} else {
					$msg="Errore di inserimento! Parametri non validi.";
					$msg_type='Notice';
				}
				$link = (strstr($link, '?')==false) ? $link."?view=gestionesettori" : $link."&view=gestionesettori";
				break;
			default:
				JError::raiseError(500, "Invalid request. Parameters are not valid!");
				break;
		}
		$this->setRedirect($link,$msg,$msg_type);
		$this->redirect();
	}

	function newsletter() {
		$msg="";
		$link=JRoute::_("index.php?option=com_areastrumentale&view=newsletter");
		$msg_type="message";
		$state=null;
		$model =& $this->getModel('Gestione', 'AreaStrumentaleModel');
		$case=JRequest::getVar('code', 4);
		$email=JRequest::getVar('email', null);
		$code=(empty($email))? 4:$code;
		switch ($case) {
			case 1:
				//iscrizione diretti
				$param1=JRequest::getVar('param1', null);
				$param2=JRequest::getVar('param2', null);
				$state=$model->direttiNewsletter($email,$param1,$param2);
				break;
			case 2:
				//iscrizione indiretti
				$param1=JRequest::getVar('param1', null);
				$param2=JRequest::getVar('param2', null);
				$state=$model->indirettiNewsletter($email,$param1,$param2);
				break;
			case 3:
				//tutti
				$state=$model->generalNewsletter($email);
				break;
			default:
				$state=3;
		}
		switch($state) {
			case 1:
				$msg="Errore durante l'elaborazione della richiesta.";
				$msg_type="error";
				break;
			case 0:
				$msg="La sua registrazione è stata effettuata.";
				$msg_type="message";
				break;
			case 3:
				$msg_type="error";
				$msg="La richiesta contiene parametri non validi!";
				break;
		}
		$this->setRedirect($link,$msg,$msg_type);
		$this->redirect();
	}
	
		function _prefix( $word, $prefix) {
			if ( strlen($word) < strlen($prefix)) {
				$tmp = $prefix;
				$prefix = $word;
				$word = $tmp;
			}

			$word = substr($word, 0, strlen($prefix));

			if ($prefix == $word) {
				return 1;
			}

			return 0;
		}
}
?>
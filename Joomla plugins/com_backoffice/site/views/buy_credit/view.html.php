<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getUtente_id($utente);
	* getUtente_codice($utente);
	*/
class BackofficeViewBuy_credit extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$utente=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();
		$utente_id = $model->getIDByUtente($utente);
		$utente_codice = $model->getUtente_codice($utente);
		$this->assignRef('utente_id', $utente_id);
    	$this->assignRef('utente_usename', $utente_username);
		parent::display($tpl);
	}
}
?>


?>

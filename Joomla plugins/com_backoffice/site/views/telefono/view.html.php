<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getUtente_id($utente);
	* getUtente_codice($utente);
	*/
class BackofficeViewTelefono extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$utente=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();
		$utente_id = $model->getIDByUtente($utente);
		$utente_codice = $model->getUtente_codice($utente);
		$this->assignRef('utente_id', $utente_id);
    $this->assignRef('password_telefono', $utente_codice);
		parent::display($tpl);
	}
}
?>

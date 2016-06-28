<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getMovimenti($utente);
	*/
class BackofficeViewMovimenti extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$utente=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();
		$movimenti =$model->getMovimenti($utente);

		$this->assignRef('movimenti', $movimenti);

		parent::display($tpl);
	}
}
?>

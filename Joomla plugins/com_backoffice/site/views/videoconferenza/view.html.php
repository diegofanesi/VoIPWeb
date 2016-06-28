<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getUtente_id($username);
	* getPassword($username);
	*/
class BackofficeViewVideoconferenza extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$username=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();
		$utente_id = $model->getIDByUtente($username);
		$password = $model->getPassword($username);
		$this->assignRef('username', $username);
		$this->assignRef('password', $password);

		parent::display($tpl);
	}
}
?>

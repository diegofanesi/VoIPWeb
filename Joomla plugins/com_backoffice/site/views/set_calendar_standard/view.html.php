<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getOrarioStandard($utente);
	*/
class BackofficeViewSet_Calendar_Standard extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$utente=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();
		$orario_standard = $model->getOrarioStandard($utente);
		$this->assignRef('orario_standard', $orario_standard);

		parent::display($tpl);
	}
}
?>

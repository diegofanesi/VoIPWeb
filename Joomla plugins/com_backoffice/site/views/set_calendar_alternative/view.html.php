<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
	* Utilizza:
	* getOrarioAlternative($utente);
	*/
class BackofficeViewSet_Calendar_Alternative extends JView {

	function display($tpl = null) {
		$utente=JFactory::getUser();
		$utente=$utente->username;
		$data_odierna=time();

		$model =& $this->getModel();

		$orario_alternative = $model->getOrarioAlternative($utente);
		$this->assignRef('orario_alternative', $orario_alternative);

		parent::display($tpl);
	}
}
?>

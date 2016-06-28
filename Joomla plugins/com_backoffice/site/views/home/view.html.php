<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * Utilizza:
 * getAppuntamenti($utente);
 */
class BackofficeViewHome extends JView {

	function display($tpl = null) {
		$session = JFactory::getSession();
		if($session->get('consulente', false)) {
			$utente=JFactory::getUser();
			$utente=$utente->username;
			$data_odierna=time();

			$model =& $this->getModel();
			$listGroup = $model->listGroup($utente);

			$this->assignRef('listGroup', $listGroup);
			$this->setLayout('consulente');
			parent::display($tpl);
				
		} else {
			$utente=JFactory::getUser();
			$utente=$utente->username;
			$data_odierna=time();

			$model =& $this->getModel();
			$appuntamenti = $model->getAppuntamenti($utente);
			$credito = $model->getCredito($utente);
			$this->assignRef('appuntamenti', $appuntamenti);
			$this->assignRef('credito', $credito);

			parent::display($tpl);
		}
	}
}
?>

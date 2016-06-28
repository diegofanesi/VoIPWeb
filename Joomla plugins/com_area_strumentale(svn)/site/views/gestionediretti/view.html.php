<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class AreaStrumentaleViewGestioneDiretti extends JView {

	function display($tpl = null) {
		$model =& $this->getModel();

		$direzioni = $model->direttiGetDirezioni();

		$this->assignRef('direzioni', $direzioni);

		$programmi = $model->direttiGetProgrammi();
		$this->assignRef('programmi', $programmi);

		parent::display($tpl);
	}
}
?>
<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die( 'Restricted access' );

// Include la classe base JView
jimport('joomla.application.component.view');

class BackofficeViewMenu extends JView {
    function display($tpl = null) {
		parent::display($tpl);
    }
}
?>

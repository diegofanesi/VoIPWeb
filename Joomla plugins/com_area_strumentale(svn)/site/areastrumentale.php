<?php
/**
 * File principale dell'Area Stumentale.
 * Qui viene costruito un controller in cui si richiamano e si eseguono i task e
 * le view necessari al funzionamento del componente.
 */

//impedisce l'accesso diretto al file
defined('_JEXEC') or die('Restricted access');
//includo il file controller.php che contiene i task necessari
require_once(JPATH_COMPONENT.DS.'controller.php');
//creo un nuovo controller di tipo Area_strumentaleController
$controller = new AreaStrumentaleController();
//se la variabile task non � vuota allora lo eseguo
	$controller->execute(JRequest::getVar('task'));
	$controller->redirect();
?>
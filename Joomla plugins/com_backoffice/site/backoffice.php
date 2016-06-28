<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * components/com_hello/hello.php
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license    GNU/GPL
*/
 
// check autorizzativo
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// carica il sorgente del controller
// punto 1
require_once( JPATH_COMPONENT.DS.'controller.php' );
 
// Carica il controller specifico se passato nell'url
// punto 2
if($controller = JRequest::getWord('controller')) {
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
    if (file_exists($path)) {
        require_once $path;
    } else {
        $controller = '';
    }
}
 
// Creazione dell'oggetto controller
// punto 3
$classname    = 'BackofficeController'.$controller;
$controller   = new $classname( );
 
// Esecuzione del task
// punto 4
$controller->execute( JRequest::getVar( 'task' ) );
 
// View 
$controller->redirect();
 
?>
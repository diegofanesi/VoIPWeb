<?php
/**
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license    GNU/GPL
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

//punto 1
jimport('joomla.application.component.controller');

require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class BackofficeController extends JController
{
	function __construct()
	{
    parent::__construct();

    // Register Extra tasks
	}

	/**
	 * Method to display the view
	 *
	 * @access    public
	 */
	function display()
	{
		$user=JFactory::getUser();
		if (empty($user->username)) {
		    $this->setRedirect('index.php?option=com_users&view=login', '');
		    return;
		}
		$document =& JFactory::getDocument();
		$viewName = JRequest::getVar('view', 'Menu');
		//Fare accorpamento views home con controllo gruppo appartenenza all'inizio di view.html.php
		//Cambiare view di default in home (la view di menu la elimineremo del tutto prima o poi
		//per adesso ce la lasciamo come remember per i link da inserire nel menu)
		$viewType = $document->getType();

		$view =& $this->getView($viewName, $viewType);
		$modelName = 'Backoffice';
		$model =& $this->getModel($modelName, 'BackofficeModel');
		if (!JError::isError($model))	$view->setModel($model, true);
		//echo $viewName;
		$view->display();
	}
}

?>


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

require_once(JPATH_COMPONENT.DS.'Helper.php');
/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class BackofficeController extends JController
{
	var $model;
	
	function __construct()
	{
    parent::__construct();

    // Register Extra tasks
    $this->registerTask( 'prenota', 'prenota' );
    $this->registerTask( 'add_standard', 'add_standard' );
    $this->registerTask( 'delete_standard', 'delete_standard' );
    $this->registerTask( 'add_alternative', 'add_alternative' );
    $this->registerTask( 'delete_alternative', 'delete_alternative' );
    $this->registerTask( 'buyCredit', 'buyCredit');
    $modelName = 'Backoffice';
	$this->model =& $this->getModel($modelName, 'BackofficeModel');
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
		$viewName = JRequest::getVar('view', 'Home');
		$session = JFactory::getSession();
		if(($viewName == "Set_Calendar_Standard" ||
			$viewName == "Set_Calendar_Alternative") &&
			!$session->get('consulente', false)){
				JError::raiseError( 403, 'L\'utente non ha sufficienti privilegi per visitare la pagina' );
		}
		$viewType = $document->getType();
		$view =& $this->getView($viewName, $viewType);
		if (!JError::isError($this->model)) $view->setModel($this->model, true);
		$view->display();
	}

	function prenota()
  {
    $postuser = $_REQUEST;
    $user=JFactory::getUser();
    $username = $user->username;

    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'Home');
    if (empty($user->username)) {
        $this->setRedirect('?option=com_users&view=login', '');
        return;
    }
    $viewType = $document->getType();
    $view =& $this->getView($viewName, $viewType);

    $hour_in = (int) floor($postuser['inizio']/60);
    $minutes_in = (int) $postuser['inizio']%60;
    $hour_end = (int) floor($postuser['fine']/60);
    $minutes_end = (int) $postuser['fine']%60;
    $timestamp = (int) $postuser['timestamp'];
    $data = convertDatastamp($timestamp);

    $esito = $this->model->prenotazione($data['year']."-".$data['month']."-".$data['day'],
    $hour_in.":".(($minutes_in == 0)? "0".$minutes_in : $minutes_in),
    $hour_end.":".(($minutes_end == 0)? "0".$minutes_end : $minutes_end),
    $postuser['consulente'], $username, $postuser['tipo']);

    $link = JRoute::_('?option=com_backoffice&view=Days&timestamp='.$timestamp, false);
    if($esito){
      $msg = "Prenotazione effettuata con successo";
      $type = 'message';
    }
    else{
      $msg = "Prenotazione non effettuata";
      $type = 'error';
    }
    $this->setRedirect($link, $msg, $type);
  }

  function add_standard()
  {
    $postuser = $_REQUEST;
    $user=JFactory::getUser();
    $username = $user->username;

    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'Home');
    if (empty($user->username)) {
        $this->setRedirect('?option=com_users&view=login', '');
        return;
    }
    $viewType = $document->getType();
    $view =& $this->getView($viewName, $viewType);

    $day_of_week = (int) $postuser['giorno'];
    $hour_in = (int) floor($postuser['inizio']/60);
    $minutes_in = (int) $postuser['inizio']%60;
    $hour_end = (int) floor($postuser['fine']/60);
    $minutes_end = (int) $postuser['fine']%60;
    $esito = FALSE;
    
    if(($day_of_week >= 1 && $day_of_week <= 7) &&
    ($hour_in > 0 && $hour_in <= 24 && $minutes_in >= 0 && $minutes_in < 60) &&
    ($hour_end > 0 && $hour_end <= 24 && $minutes_end >= 0 && $minutes_end < 60)){
              $esito = $this->model->add_standard($username,
              $hour_in.":".(($minutes_in == 0)? "0".$minutes_in : $minutes_in),
              $hour_end.":".(($minutes_end == 0)? "0".$minutes_end : $minutes_end),
              $day_of_week);
    }
    $link = JRoute::_('?option=com_backoffice&view=Set_Calendar_Standard', false);
    if($esito){
      $msg = "Orario standard aggiunto con successo";
      $type = 'message';
    }
    else{
      $msg = "Orario standard non aggiunto";
      $type = 'error';
    }
    $this->setRedirect($link, $msg, $type);
  }

  function delete_standard()
  {
    $postuser = $_REQUEST;
    $user=JFactory::getUser();
    $username = $user->username;

    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'Home');
    if (empty($user->username)) {
        $this->setRedirect('?option=com_users&view=login', '');
        return;
    }
    $viewType = $document->getType();
    $view =& $this->getView($viewName, $viewType);

    $check = array();
    $num = 0;
    for($i = 0; $i < ((int)$postuser['number_rows']); $i++)
      if(!empty($postuser["check".$i])){
        $check[$num] = $postuser["check".$i];
        $num++;
      }
    $esito = $this->model->delete_standard($check, $num, $username);
    $link = JRoute::_('?option=com_backoffice&view=Set_Calendar_Standard', false);
    if($esito != ""){
      $msg = "Orario standard rimosso con successo";
      $type = 'message';
    }
    else{
      $msg = "Orario standard non rimosso";
      $type = 'error';
    }
    $this->setRedirect($link, $msg, $type);
  }

  function add_alternative()
  {
	$postuser = $_REQUEST;
    $db =& JFactory::getDBO();
    $user=JFactory::getUser();
    $username = $user->username;
    
    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'Home');
    if (empty($user->username)) {
        $this->setRedirect('?option=com_users&view=login', '');
        return;
    }
    $viewType = $document->getType();
    $view =& $this->getView($viewName, $viewType);

    $hour_in = (int) floor($postuser['inizio']/60);
    $minutes_in = (int) $postuser['inizio']%60;
    $hour_end = (int) floor($postuser['fine']/60);
    $minutes_end = (int) $postuser['fine']%60;
    $data_dmy = explode("/", $postuser['data']);
    $data = $db->quote($data_dmy[2]."-".$data_dmy[1]."-".$data_dmy[0]);
    
    $esito = FALSE;
    if(($data_dmy[2] > 0) &&
      ($data_dmy[1] > 0 && $data_dmy[1] <= 12) &&
      ($data_dmy[0] > 0 && $data_dmy[0] <= 31) &&
      ($hour_in > 0 && $hour_in <= 24 && $minutes_in >= 0 && $minutes_in < 60) &&
      ($hour_end > 0 && $hour_end <= 24 && $minutes_end >= 0 && $minutes_end < 60)){
        $esito = $this->model->add_alternative($username,
        $hour_in.":".(($minutes_in == 0)? "0".$minutes_in : $minutes_in),
        $hour_end.":".(($minutes_end == 0)? "0".$minutes_end : $minutes_end),
        $data);
    }
    $link = JRoute::_('?option=com_backoffice&view=Set_Calendar_Alternative', false);
    if($esito){
      $msg = "Orario alternativo aggiunto con successo";
      $type = 'message';
    }
    else{
      $msg = "Orario alternativo non aggiunto";
      $type = 'error';
    }
    $this->setRedirect($link, $msg, $type);
  }

  function delete_alternative()
  {
    $postuser = $_REQUEST;
    $user=JFactory::getUser();
    $username=$user->username;

    $document =& JFactory::getDocument();
    $viewName = JRequest::getVar('view', 'Home');
    if (empty($user->username)) {
        $this->setRedirect('?option=com_users&view=login', '');
        return;
    }
    $viewType = $document->getType();
    $view =& $this->getView($viewName, $viewType);
    
    $check = array();
    $num = 0;
    for($i = 0; $i < ((int)$postuser['number_rows']); $i++)
      if(!empty($postuser["check".$i])){
        $check[$num] = $postuser["check".$i];
        $num++;
      }
    $esito = $this->model->delete_alternative($check, $num, $username);
    $link = JRoute::_('?option=com_backoffice&view=Set_Calendar_Alternative', false);
    if($esito != ""){
      $msg = "Orario alternativo rimosso con successo";
      $type = 'message';
    }
    else{
      $msg = "Orario alternativo non rimosso";
      $type = 'error';
    }
    $this->setRedirect($link, $msg, $type);
  }
	
	
	function buyCredit()
	{
		$user=JFactory::getUser();
		$username=$user->username;
		
	if (empty($user->username)) {
		    $this->setRedirect('index.php?option=com_users&view=login', '');
		    return;
		}
		echo "Controllo PayPal";
		
	}
}

?>

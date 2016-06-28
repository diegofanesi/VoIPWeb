<?php
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.plugin.plugin');

class plgUserIntegration extends JPlugin {

	function onUserLogin($user, $options = array())
	{
		$db =& JFactory::getDBO();
		$username = $user['username'];
		if (!empty($username)) {
			$sql = "SELECT consulenza_gruppo FROM #__bko_Consulenze ";
			$db -> setQuery($sql);
			$groups_cons = $db -> loadAssocList();
			$usergroups= $user->groups;
			$tmp=false;
			for ($i=0; !empty($groups_cons[$i]); $i++) {
				if (!empty($usergroups[$groups_cons[$i]])) {
					$session->set('consulente', $tmp);
					break;
				}
			}
				
		}
		return true;	}

	function onUserAfterSave( $user, $isnew, $success, $msg )
	{

		if ($success) {
			$db =& JFactory::getDBO();
			if ($isnew) {
				//if the user details are update, the plugin updates all informations on component table
				$array = new stdClass;
				$array->utente_username = $user['username'];
				$array->utente_password = $user['password_clear'];
				$array->utente_id = $user['id'];
				$array->utente_credito = 0;
				$array->utente_codice = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
				$state=$db->insertObject( '#__bko_Utenti', $array );
			}
			else {
				$db->setQuery('update #__bko_Utenti
                    set utente_password ='.$array->utente_password.'
                    where utente_username = '.$user['username'].';');
				$db->query();
			}
		}
		return $success;
	}

	function onUserAfterDelete( $user, $success, $msg )
	{
		if ($success) {
			$db =& JFactory::getDBO();
			$sql_delete= "DELETE FROM #__bko_Utenti WHERE utente_username = '".$user['username']."';";
			$db->setQuery($sql_delete );
			$db->query();
		}
		return $success;
	}

}
?>

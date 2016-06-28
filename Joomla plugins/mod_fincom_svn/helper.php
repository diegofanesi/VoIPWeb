<?php
/**
 * @version		$Id: helper.php 14401 2010-01-26 14:10:00Z louis $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class modFincomHelper
{
	function &getList( &$params )
	{
		global $mainframe;

		$db =& JFactory::getDBO();
		$rows = array();

		$shmember 		= $params->get( 'members' );
		$increase 			= $params->get( 'increase' );

		$i = 0;

		$db->setQuery("SELECT MAX( data_inserimento ) 
FROM (

SELECT data_inserimento
FROM jos_as_bandi_diretti
UNION SELECT data_inserimento
FROM jos_as_bandi_indiretti
) AS pippo");
		$rows[$i]->title = JText::_('as_lastUpdate');
		$rows[$i]->data = substr($db->loadResult(),0,10);
		$i++;

		$db->setQuery("SELECT MAX(modified) FROM jos_content;");
		$rows[$i]->title = JText::_('contentlastupdate');
		$rows[$i]->data = substr($db->loadResult(),0,10);
		$i++;
		if ( $shmember) {
			$query = 'SELECT COUNT( id ) AS count_users'
			. ' FROM #__users'
			;
			$db->setQuery( $query );
			$members = $db->loadResult();


			$rows[$i]->title 	= JText::_( 'Members' );
			$rows[$i]->data 	= $members;
			$i++;
		}


		$query = 'SELECT SUM( hits ) AS count_hits'
		. ' FROM #__content'
		. ' WHERE state = "1"'
		;
		$db->setQuery( $query );
		$hits = $db->loadResult();

		if ( $hits ) {
			$rows[$i]->title 	= JText::_( 'Content View Hits' );
			$rows[$i]->data 	= $hits + $increase;
			$i++;
		}

			return $rows;
	}
}

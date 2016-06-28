<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of HelloWorld component
 */
class com_AreaStrumentaleInstallerScript
{
	/**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent)
	{
		$db=JFactory::getDBO();
		$db->setQuery("INSERT INTO #__as_regioni (`id`, `regione`) VALUES
(1, 'Marche'),
(2, 'Lombardia'),
(3, 'Trentino'),
(4, 'Valle d''Aosta'),
(5, 'Piemonte'),
(6, 'Veneto'),
(7, 'Liguria'),
(8, 'Emilia Romagna'),
(9, 'Toscana'),
(10, 'Umbria'),
(11, 'Lazio'),
(12, 'Abruzzo'),
(13, 'Molise'),
(14, 'Puglia'),
(15, 'Campania'),
(16, 'Basilicata'),
(17, 'Calabria'),
(18, 'Sicilia'),
(19, 'Sardegna'),
(20, 'Friuli Venezia Giulia');");
		$db->query();
		echo "Script di inizializzazione eseguito correttamente.";
	}
}
<?php
/**
  * classe per la costruzione della JTable inerente
  * alla tabella del DataBase settori per bandi indiretti
  */
class AreaStrumentaleTableSettori extends JTable {
	var $id = null; //campo id per il settore
	var $settore = null; //nome del settore
	
	/**
	 * Costruttore per la JTable
	 */
	function __construct(&$db) {
	
		//comando di costruzione in cui vengono passati come parametri il nome della tabella interessata del DB
		//il campo id e la variabile che si riferisce alla DB a cui siamo connessi
		parent::__construct('#__as_settori','id',$db);
	}
}
?>
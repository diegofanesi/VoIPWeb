<?php
/**
  * classe per la costruzione della JTable inerente
  * alla tabella del DataBase direzioni_generali
  */
class AreaStrumentaleTableDirezioniGenerali extends JTable {
	var $id = null; //campo id della direzione generale
	var $direzione = null; //nome della direzione generale
	var $link = null;
	
	/**
	 * Costruttore per la JTable
	 */
	function __construct(&$db) {
	
		//comando di costruzione in cui vengono passati come parametri il nome della tabella interessata del DB
		//il campo id e la variabile che si riferisce alla DB a cui siamo connessi
		parent::__construct('#__as_direzioni_generali','id',$db);
	}
}
?>
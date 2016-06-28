<?php
/**
  * classe per la costruzione della JTable inerente
  * alla tabella del DataBase programmi
  */
class AreaStrumentaleTableProgrammi extends JTable {
	var $id = null; //campo id del programma 
	var $programma = null; //nome del programma
	var $direzione = null; //campo id della direzione generale assoziata al programma
	
   /**
	 costruttore per la JTable
	 */
	function __construct(&$db) {
	
		//comando di costruzione in cui vengono passati come parametri il nome della tabella interessata del DB
		//il campo id e la variabile che si riferisce alla DB a cui siamo connessi
		parent::__construct('#__as_programmi','id',$db);
	}
}
?>
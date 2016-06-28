<?php
class TableAppointments extends JTable {
	var $prenotazione_data = null;
	var $prenotazione_inizio = null;
	var $prenotazione_fine = null;
	var $consulenza_tipo = null;
	var $utente_username = null;
	var $consulente_username = null;
	
	function __construct(&$db) {
		parent::__construct('#__bko_Prenotazioni','id',$db);
	}
}
?>

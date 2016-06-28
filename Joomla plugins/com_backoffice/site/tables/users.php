<?php
class TableUsers extends JTable {
	var $utente_username = null;
	var $utente_password = null;
	var $utente_nome = null;
	var $utente_cognome_o_ragione_sociale = null; 	
	var $utente_codice_fiscale_o_partita_iva = null;
	var $utente_indirizzo = null;
	var $utente_citta = null;
	var $utente_id = null;
	var $utente_codice = null;
	var $utente_tipo = null;
	var $utente_consulente = null;
	var $utente_manutenzione = null;
	
	function __construct(&$db) {
		parent::__construct('#__bko_Utenti','utente_username',$db);
	}
}
?>

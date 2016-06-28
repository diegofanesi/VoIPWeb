<?php
jimport('joomla.application.component.model');
require_once(JPATH_COMPONENT.DS.'models'.DS.'month.php');

class BackofficeModelBackoffice extends JModel
{
	var $month;

	function PopolaMese($anno, $mese){
		$this->month = new month($mese,$anno);
	}

	function getAvailable($a=null,$b=null){
		return $this->month->getAvailable();
	}

	function getDay($anno, $mese, $giorno){
		$str=$anno."-".$mese."-".$giorno;
		return $this->month->getDay($str);
	}

	function getAppuntamenti ($utente) {
		$sql = "SELECT date_format(prenotazione_data,'%d/%m/%Y') as data,
		date_format(prenotazione_inizio, '%H:%i') as inizio, date_format(prenotazione_fine, '%H:%i') as fine,
		consulenza_tipo as tipo, consulente_username as consulente
		FROM #__bko_Prenotazioni WHERE utente_username='".$utente."' ORDER BY data ASC;";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}

	function getCredito($username)
	{
		$this->_db->setQuery("SELECT utente_credito as credito FROM #__bko_Utenti WHERE utente_username='".$username."';");
	 return $this->_db->loadAssoc();
	}

	function getMovimenti($utente)
	{
		$sql = "SELECT DISTINCT date_format(movimento_data,'%d/%m/%Y') as data,
		movimento_quantita as qta, movimento_tipo as m_tipo, consulenza_tipo as c_tipo
	 FROM #__bko_Movimenti WHERE utente_username='".$utente."';";
	 $this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}

	function listGroup ($utente) {
		$sql = "SELECT consulenza_tipo as tipo FROM #__user_usergroup_map, #__bko_Consulenze
		WHERE user_id = '".$this->getIDByUtente($utente)."' && group_id=consulenza_gruppo;";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}

	function getAllTipo () {
		$sql = "SELECT consulenza_tipo as tipo, username as consulente, consulenza_prezzo as prezzo FROM #__user_usergroup_map, #__bko_Consulenze, #__users
		WHERE group_id=consulenza_gruppo && user_id=#__users.id;";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}
	
	function prenotazione ($day, $inizioCons, $fineCons, $consulente, $utente, $constipo) {
		$sql = "INSERT INTO #__bko_Prenotazioni (prenotazione_data, prenotazione_inizio, prenotazione_fine, consulenza_tipo, utente_username, consulente_username) 
 (
	SELECT '".$day."', '".$inizioCons."', '".$fineCons."','".$constipo."','".$utente."', '".$consulente."' 
	   FROM (SELECT @a:=count(*)
			FROM (
			     	(
				SELECT * FROM #__bko_Prenotazioni
			      	WHERE utente_username = '".$utente."'
			      	AND prenotazione_data = '".$day."'
			      	AND (
			      	      (prenotazione_inizio <= '".$inizioCons."' AND prenotazione_fine > '".$inizioCons."' )
			      	      OR
			      	      (prenotazione_inizio >= '".$inizioCons."' AND prenotazione_inizio < '".$fineCons."' )
			     	    ) 
			        ) UNION (
				        SELECT * FROM #__bko_Prenotazioni WHERE consulente_username = '".$consulente."' 
					  AND prenotazione_data = '".$day."'
					  AND (
					        (prenotazione_inizio <= '".$inizioCons."' AND prenotazione_fine > '".$inizioCons."' )
					        OR
					        (prenotazione_inizio >= '".$inizioCons."' AND prenotazione_inizio < '".$fineCons."' )
					      )
					)
    		     )as derived )as finea,
			(SELECT @B:=IF(
					(SELECT DISTINCT utente_credito FROM #__bko_Utenti WHERE utente_username = '".$utente."') >= 
					    ((SELECT DISTINCT consulenza_prezzo FROM #__bko_Consulenze WHERE consulenza_tipo = '".$constipo."')*((TIME_TO_SEC('".$fineCons."')-TIME_TO_SEC('".$inizioCons."'))/3600))
					, '1', '0'
				      )
                	 ) as fineb, 
			 
			 (SELECT @C:=count(*) FROM (
										(SELECT orario_giorno as Giorno, orario_inizio as Inizio, orario_fine as Fine, utente_username as Consulente 
										FROM #__bko_Orario 
										WHERE utente_username = '".$consulente."' AND 
										  (orario_giorno = DAYOFWEEK('".$day."')) AND 
										  (orario_inizio <= '".$inizioCons."') AND 
										(orario_fine >= '".$fineCons."') 
										AND NOT EXISTS(
													SELECT * FROM #__bko_Orari_Alternativi WHERE orario_alternativo_data = '".$day."' AND utente_username ='".$consulente."')
										)			
								UNION(
										SELECT orario_alternativo_data as Giorno, orario_alternativo_inizio as Inizio, orario_alternativo_fine as Fine, utente_username as Consulente
										FROM #__bko_Orari_Alternativi
										WHERE (utente_username = '".$consulente."' AND 
										orario_alternativo_data = '".$day."' AND 
										orario_alternativo_inizio <= '".$inizioCons."' AND 
										orario_alternativo_fine >= '".$fineCons."')
									) 
								 )as derived3
			) as finec
	WHERE @a=0 AND @B=1 AND @C>0);

SELECT @state:=ROW_COUNT();
SELECT @credito:=utente_credito FROM #__bko_Utenti WHERE utente_username='".$utente."' LIMIT 1;
SELECT DISTINCT @costo:=(consulenza_prezzo)*((TIME_TO_SEC('".$fineCons."')-TIME_TO_SEC('".$inizioCons."'))/3600) FROM #__bko_Consulenze WHERE consulenza_tipo = '".$constipo."' LIMIT 1;

UPDATE #__bko_Utenti SET utente_credito=(@credito-@costo) WHERE utente_username='".$utente."' AND @state>0;";
		$this->_db->setQuery($sql);
		$risultati = $this->_db->queryBatch(true, true);
		$sql= "SELECT prenotazione_data, prenotazione_inizio, prenotazione_fine, consulenza_tipo, utente_username, consulente_username
			FROM #__bko_Prenotazioni
			WHERE prenotazione_data = '".$day."' AND prenotazione_inizio = '".$inizioCons."' AND prenotazione_fine = '".$fineCons."' AND consulenza_tipo = '".$constipo."' AND utente_username = '".$utente."' AND consulente_username = '".$consulente."'
			;";
		$this->_db->setQuery($sql);
		$this->_db->query();
		$rows = $this->_db->getNumRows();
		$risultati=$risultati && ($rows>0);
		return $risultati;
	}

	function getPassword ($utente) {
		$sql = "SELECT utente_password as pw FROM #__bko_Utenti
		WHERE ( utente_username='".$utente."');";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssoc();
		return $risultati['pw'];
	}

	function getIDByUtente($utente){
		$sql = "SELECT id FROM #__users WHERE username='".$utente."';";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssoc();
		return $risultati['id'];
	}

	function getUtente_codice ($utente) {
		$sql = "SELECT utente_codice FROM #__bko_Utenti
	WHERE ( utente_username='".$utente."');";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssoc();
		return $risultati['utente_codice'];
	}

	function getOrarioStandard($utente){
		$sql = "SELECT orario_giorno as Giorno, orario_inizio as Inizio, orario_fine as Fine FROM #__bko_Orario
		WHERE utente_username='".$utente."';";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}

	function getOrarioAlternative($utente){
		$sql = "SELECT DISTINCT date_format(orario_alternativo_data,'%d/%m/%Y') as Data,
		orario_alternativo_inizio as Inizio, orario_alternativo_fine as Fine FROM #__bko_Orari_Alternativi
		WHERE utente_username='".$utente."';";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}

	function add_standard($utente, $inizio, $fine, $day_of_week)
	{
		$sql = "INSERT INTO #__bko_Orario VALUES(
    '".$day_of_week."', '".$inizio."', '".$fine."', '".$utente."'
    );";
		$this->_db->setQuery($sql);
		return $this->_db->query();
	}

	function delete_standard($check, $num, $utente)
	{
		$sql = "";
		for($i = 0; $i < $num; $i++){
			$delete_hour = explode(" ", $check[$i]);
			$day_of_week = (int) $delete_hour[0];
			$start = $this->_db->quote($delete_hour[1]);
			$end = $this->_db->quote($delete_hour[2]);
			$sql .= "DELETE FROM #__bko_Orario WHERE
      orario_giorno = ".$day_of_week." AND
      orario_inizio = ".$start." AND
      orario_fine = ".$end." AND
      utente_username = '".$utente."';";
		}
		$this->_db->setQuery($sql);
		return $this->_db->queryBatch();
	}

	function add_alternative($utente, $inizio, $fine, $data)
	{
		$sql = "INSERT INTO #__bko_Orari_Alternativi VALUES(
    ".$data.", '".$inizio."', '".$fine."', '".$utente."'
    );";
		$this->_db->setQuery($sql);
		return $this->_db->query();
	}

	function delete_alternative($check, $num, $utente)
	{
		$sql = "";
		for($i = 0; $i < $num; $i++){
			$delete_hour = explode(" ", $check[$i]);
			$data = explode("/", $delete_hour[0]);
			$start = $this->_db->quote($delete_hour[1]);
			$end = $this->_db->quote($delete_hour[2]);
			$date = $this->_db->quote($data[2]."-".$data[1]."-".$data[0]);
			$sql .= "DELETE FROM #__bko_Orari_Alternativi WHERE
      orario_alternativo_data  = ".$date." AND
      orario_alternativo_inizio = ".$start." AND
      orario_alternativo_fine = ".$end." AND
      utente_username = '".$utente."';";
		}
		$this->_db->setQuery($sql);
		return $this->_db->queryBatch();
	}
}//END class
?>

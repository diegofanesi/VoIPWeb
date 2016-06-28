<?php
//importo il file model.php che contiene i task necessari
jimport('joomla.application.component.model');
/*
 * Questa è la classe che contiene le query necessarie per la funzione "sfoglia" dei bandi indiretti.
 */
class AreaStrumentaleModelGestione extends JModel

{
	function __construct () {
		parent::__construct();
		$this->addTablePath(JPATH_COMPONENT.DS.'tables'.DS);
	}
	/*
	 * indirettiGetSettori e'la funzione che restituisce una query di tutti i settori.
	 *
	 * @return $settori array contenente tutti i settori
	 */
	function indirettiGetSettori($id=null)
	{
		$id = (int) $id;
		$sql = "SELECT * FROM `#__as_settori` ";
		$sql=(!empty($id))?"WHERE id='".$id."'" : $sql."ORDER BY settore";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}

	/*
	 * indirettiGetRegioni e'la funzione che restituisce una query di tutte le regioni.
	 *
	 * @return $regioni array contenente tutte le regioni
	 */
	function indirettiGetRegioni($id=null)
	{
		$id = (int) $id;
		$sql = "SELECT * FROM `#__as_regioni` ";
		$sql = (!empty($id))?$sql."WHERE id='".$id."' ": $sql."ORDER BY regione";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}
	/*
	 * direttiGetDirezioni e'la funzione che restituisce una query di tutte le direzioni generali.
	 *
	 * @return $direzioni array contenente tutte le direzioni generali
	 */
	function direttiGetDirezioni($id=null)
	{
		$id = (int) $id;
		$sql = (empty($id))?"SELECT * FROM `#__as_direzioni_generali` ORDER BY direzione":"SELECT * FROM `#__as_direzioni_generali` WHERE id=".$id." ORDER BY direzione";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}


	/*
	 * direttiGetProgrammi e'la funzione che restituisce una query dei programmi collegati ad una direzione generale.
	 *
	 * @param $id_direzione id della direzione generale
	 *
	 * @return $programmi array contenente i programmi collegati alla direzione generale
	 */
	function direttiGetProgrammi($id_direzione=null,$id_programma=null)
	{
		$id_direzione = (int) $id_direzione;
		$id_programma = (int) $id_programma;
		$sql = "SELECT * FROM `#__as_programmi` ";
		if (!empty($id_direzione) || !empty($id_programma)) {
			$sql=$sql."WHERE ";
			$sql=(!empty($id_direzione)) ? $sql."`#__as_programmi`.`direzione` =".$id_direzione : $sql;
			$sql=(!empty($id_direzione) && !empty($id_programma)) ? $sql." AND " : $sql;
			$sql=(!empty($id_programma)) ? $sql."`#__as_programmi`.`id` = ".$id_programma : $sql;
		}
		$sql=$sql." ORDER BY programma";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}
	/*
	 * indirettiRicerca e' la funzione che restituisce la query di ricerca dei bandi indiretti controllando tutti i campi.
	 *
	 * @param $regione nome della regione
	 *
	 * @param $scadenza scadenza del/i bando/i
	 *
	 * @param $$settore1,$settore2,$settore3,$settore4,$settore5 nome dei settori
	 *
	 * @return $bandi array di bandi indiretti
	 */
	function indirettiRicerca($regione=null,$scadenza=null, $settore=null, $limit1=null, $limit2=null)
	{
		$regione = (int) $regione;
		$scadenza = (int) $scadenza;
		$settore = (int) $settore;
		$limit1 = (int) $limit1;
		$limit2 = (int) $limit2;
		$sql_head="SELECT DISTINCT #__as_bandi_indiretti.id as id,#__as_bandi_indiretti.nome,#__as_bandi_indiretti.scadenza,#__as_bandi_indiretti.link, #__as_bandi_indiretti.regione as regioneId, #__as_regioni.regione ";
		$sql = "FROM #__as_regioni INNER JOIN #__as_bandi_indiretti ON #__as_regioni.id=#__as_bandi_indiretti.regione ";
		$sql = (!empty($regione) || !empty($scadenza) || !empty($settore)) ? $sql."WHERE ": $sql;
		if (!empty($regione)) {
			$sql=$sql."(#__as_bandi_indiretti.regione =".$regione.") ";
			$sql = (!empty($scadenza) || !empty($settore)) ? $sql." AND ": $sql;
		}
		if (!empty($scadenza)) {
			$sql =  $sql." ((#__as_bandi_indiretti.scadenza >=".$scadenza.") OR (#__as_bandi_indiretti.scadenza=0) OR (#__as_bandi_indiretti.scadenza=null)) ";
			$sql =(!empty($settore)) ? $sql."AND ":$sql;
		}
		$sql = (!empty($settore)) ? $sql." #__as_bandi_indiretti.id IN (SELECT id_bando AS id FROM #__as_bandi_indiretti_settori INNER JOIN (#__as_settori) ON (#__as_bandi_indiretti_settori.id_settore=#__as_settori.id) WHERE #__as_bandi_indiretti_settori.id_settore=".$settore.") ":$sql;
		$sql = ((($limit1 == 0) || !empty($limit1)) && !empty($limit2)) ? $sql.' LIMIT '.$limit1.' , '.$limit2.' ': $sql;
		$this->_db->setQuery($sql_head.$sql.";");
		$risultati=$this->_db->loadAssocList();
		$this->_db->setQuery("SELECT #__as_bandi_indiretti_settori.id_bando AS id , #__as_settori.settore , #__as_settori.id as settoreId FROM #__as_bandi_indiretti_settori INNER JOIN #__as_settori ON #__as_bandi_indiretti_settori.id_settore = #__as_settori.id;");
		$ass = $this->_db->loadAssocList();
		for ($count=0;!empty($risultati[$count]);$count++) {
			$count3=0;
			for ($count2=0;!empty($ass[$count2]); $count2++) {
				if ($risultati[$count]['id'] == $ass[$count2]['id']) {
					$risultati[$count]['settori'][$count3]['settore']  = $ass[$count2]['settore'];
					$risultati[$count]['settori'][$count3]['id']  = $ass[$count2]['settoreId'];
					$count3++;
				}
			}
		}
		return $risultati;
	}

	/*
	 * direttiRicerca e'la funzione che restituisce i risultati di ricerca dei bandi diretti controllando tutti i campi.
	 *
	 * @param $direzione nome della direzione generale
	 *
	 * @param $programma nome del programma
	 *
	 * @param $scadenza scadenza del/i bando/i
	 *
	 * @return $bandi array di bandi diretti
	 */
	function direttiRicerca($direzione=null, $programma=null, $scadenza=null, $limit1=null, $limit2=null) {
		$direzione = (int) $direzione;
		$programma = (int) $programma;
		$scadenza = (int) $scadenza;
		$limit1 = (int) $limit1;
		$limit2 = (int) $limit2;
		$sql = "SELECT #__as_bandi_diretti.nome, #__as_programmi.programma, #__as_direzioni_generali.direzione, #__as_direzioni_generali.link as direzione_link, #__as_bandi_diretti.scadenza, #__as_bandi_diretti.link
			FROM #__as_bandi_diretti INNER JOIN (#__as_programmi INNER JOIN #__as_direzioni_generali ON #__as_programmi.direzione=#__as_direzioni_generali.id) ON #__as_bandi_diretti.programma=#__as_programmi.id ";
		$sql = (!empty($direzione) || !empty($programma) || !empty($scadenza)) ? $sql."WHERE " : $sql;
		if (!empty($programma)) {
			$sql=$sql."(#__as_bandi_diretti.programma =".$programma.") ";
			if (!empty($direzione) || !empty($scadenza)) $sql = $sql."AND ";
		}
		if (!empty($scadenza)) {
			$sql=$sql." ((#__as_bandi_diretti.scadenza>=".$scadenza.") OR (#__as_bandi_diretti.scadenza=null) OR (#__as_bandi_diretti.scadenza=0)) ";
			if (!empty($direzione)) {
				$sql=$sql."AND ";
			}
		}
		if (!empty($direzione)) {
			$sql=$sql."(#__as_programmi.direzione =".$direzione.") ";
		}
		$sql= (!empty($limit1) && !empty($limit2))? $sql."LIMIT ".$limit1.",".$limit2." " : $sql;
		$sql = $sql.";";
		$this->_db->setQuery($sql);
		$risultati=$this->_db->loadAssocList();
		return $risultati;
	}

	/*
	 * direttiRegistraBando e'la funzione che inserisce nella tabella bandi_diretti il nome del bando diretto,
	 * l'id del programma ad esso collegato e la data di scadenza
	 *
	 * @param $nome nome del bando diretto
	 *
	 * @param $id_prog id del programma da associare al bando diretto
	 *
	 * @param $giorno, $mese, $anno giorno mese anno della scadenza
	 *
	 */
	function direttiRegistraBando($nome,$id_prog, $scadenza=0, $link) {
		$nome = $this->_db->quote($nome);
		$id_prog = (int) $id_prog;
		$scadenza = (int) $scadenza;
		$link = $this->_db->quote($link);
		$this->_db->setQuery("INSERT INTO #__as_bandi_diretti (programma,nome,scadenza,link,data_inserimento) VALUE (".$id_prog.",".$nome.",".$scadenza.",".$link.", CURRENT_TIMESTAMP);");
		$state = $this->_db->query();
		if (empty($state)) {
			return true;
		} else {
			return false;
		}
	}

	/*
	 * indirettiRegistraBando e'la funzione che inserisce nella tabella bandi_indiretti il nome del bando indiretto,
	 * l'id dei settori ad esso collegati la data di scadenza e il link al bando.
	 *
	 * @param $nome nome del bando indiretto
	 *
	 * @param $arr_id_settori array degli id dei settori da associare al bando indiretto
	 *
	 * @param $giorno, $mese, $anno giorno mese anno della scadenza
	 *
	 * @param $link link al bando indiretto
	 *
	 * @returns: true per l'avvenuto inserimento.
	 */
	function indirettiRegistraBando($nome,$id_reg,$arr_id_settori=array(), $scadenza, $link)
	{
		$nome = $this->_db->quote( $nome );
		$id_reg = (int) $id_reg;
		$scadenza = (int) $scadenza;
		$link = $this->_db->quote( $link );

		$sql = " INSERT INTO #__as_bandi_indiretti (regione,nome,scadenza,link,data_inserimento) VALUE (".$id_reg.",".$nome.",".$scadenza.",".$link.",CURRENT_TIMESTAMP); ";
		if (!empty($arr_id_settori)) {
			$sql=$sql."SELECT @ID:=id FROM #__as_bandi_indiretti WHERE regione=".$id_reg." AND nome=".$nome." AND scadenza=".$scadenza." AND link=".$link." LIMIT 1; ";
			$sql=$sql."INSERT INTO #__as_bandi_indiretti_settori (id_bando,id_settore) VALUES ";
			for ($count=0;!empty($arr_id_settori[$count]);$count++) {
				$sql=($count!=0) ? $sql.",":$sql;
				$sql=$sql."(@ID, ".(int)$arr_id_settori[$count].") ";
			}
			$sql=$sql."; ";
		}
		$this->_db->setQuery($sql);
		$state=$this->_db->queryBatch(true,true);
		if (empty($state)) {
			return true;
		} else {
			return false;
		}
	}

	/*
	 * direttiRegistraDirezione e'la funzione che inserisce nella tabella direzioni_generali il nome della direzione generale.
	 *
	 * @param $direzione nome della direzione generale
	 *
	 */
	function direttiRegistraDirezione($direzione, $link) {
		//qui preparo tutta la struttura dati per la scrittura
		$result = array();
		$row =& JTable::getInstance('DirezioniGenerali', 'AreaStrumentaleTable');
		//creo una struttura dati per la scrittura sulla tabella
		$result['direzione'] = $direzione;
		$result['link'] = $link;
		//faccio il bind e lo store del nuovo record, controllando se ci sono errori
		$state = $row->bind($result);
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		$state =$row->store();
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		//rinizializzo la struttura, è un altro metodo tipo buildStructure.
		return 0;
	}

	/*
	 * direttiRegistraProgramma e'la funzione che inserisce nella tabella programmi l'id della direzione generale
	 * e il nome del programma ad essa associato.
	 *
	 * @param $ id_prog id della direzione generale da associare al programma
	 *
	 * @param $programma nome del programma
	 *
	 */
	function direttiRegistraProgramma($id_dir, $programma) {
		//qui preparo tutta la struttura dati per la scrittura
		$result = array();
		$row =& JTable::getInstance('Programmi', 'AreaStrumentaleTable');
		//creo una struttura dati per la scrittura sulla tabella
		$result['programma'] = $programma;
		$result['direzione'] = $id_dir;
		//faccio il bind e lo store del nuovo record, controllando se ci sono errori
		$state = $row->bind($result);
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		$state =$row->store();
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		//rinizializzo la struttura, è un altro metodo tipo buildStructure.
		return 0;
	}

	/*
	 * indirettiRegistraSettore e'la funzione che inserisce nella tabella settori il nome del settore.
	 *
	 * @param $settore nome del settore
	 *
	 */
	function indirettiRegistraSettore($settore) {
		//qui preparo tutta la struttura dati per la scrittura
		$result = array();
		$row =& JTable::getInstance('Settori', 'AreaStrumentaleTable');
		//creo una struttura dati per la scrittura sulla tabella
		$result['settore'] = $settore;
		//faccio il bind e lo store del nuovo record, controllando se ci sono errori
		$state = $row->bind($result);
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		$state =$row->store();
		if (!$state) {
			//echo $row->getError();
			return 1;
		}
		//rinizializzo la struttura, è un altro metodo tipo buildStructure.
		return 0;
	}

	function indirettiCount($regione=null,$scadenza=null, $settore=null )
	{
		$regione = (int) $regione;
		$scadenza = (int) $scadenza;
		$settore = (int) $settore;
		$sql_head="SELECT COUNT(*) FROM (SELECT DISTINCT #__as_bandi_indiretti.id as id,#__as_bandi_indiretti.nome,#__as_bandi_indiretti.scadenza,#__as_bandi_indiretti.link, #__as_bandi_indiretti.regione as regioneId, #__as_regioni.regione ";
		$sql = "FROM #__as_regioni INNER JOIN #__as_bandi_indiretti ON #__as_regioni.id=#__as_bandi_indiretti.regione ";
		$sql = (!empty($regione) || !empty($scadenza) || !empty($settore)) ? $sql."WHERE ": $sql;
		if (!empty($regione)) {
			$sql=$sql."(#__as_regioni.regione LIKE '%". $this->_db->getEscaped($regione)."%') ";
			$sql = (!empty($scadenza) || !empty($settore)) ? $sql." AND ": $sql;
		}
		if (!empty($scadenza)) {
			$sql =  $sql." (#__as_bandi_indiretti.scadenza >=".$scadenza.") ";
			$sql =(!empty($settore)) ? $sql."AND ":$sql;
		}
		$sql = (!empty($settore)) ? $sql." #__as_bandi_indiretti.id IN (SELECT id_bando AS id FROM #__as_bandi_indiretti_settori INNER JOIN (#__as_settori) ON (#__as_bandi_indiretti_settori.id_settore=#__as_settori.id) WHERE settore='".$settore."') ":$sql;
		$this->_db->setQuery($sql_head.$sql.") as Res;");
		$row = $this->_db->loadRow();
		return $row[0];
	}

	function direttiCount($direzione=null, $programma=null, $scadenza=null )
	{
		$direzione = (int) $direzione;
		$programma = (int) $programma;
		$scadenza = (int) $scadenza;
		$sql = "SELECT COUNT(*) FROM (SELECT #__as_bandi_diretti.nome, #__as_programmi.programma, #__as_direzioni_generali.direzione, #__as_bandi_diretti.scadenza, #__as_bandi_diretti.link
			FROM #__as_bandi_diretti INNER JOIN (#__as_programmi INNER JOIN #__as_direzioni_generali ON #__as_programmi.direzione=#__as_direzioni_generali.id) ON #__as_bandi_diretti.programma=#__as_programmi.id ";
		$sql = (!empty($direzione) || !empty($programma) || !empty($scadenza)) ? $sql."WHERE " : $sql;
		if (!empty($programma)) {
			$sql=$sql."(#__as_programmi.programma LIKE '%". $this->_db->getEscaped($programma)."%') ";
			if (!empty($direzione) || !empty($scadenza)) $sql = $sql."AND ";
		}
		if (!empty($scadenza)) {
			$sql=$sql."(#__as_bandi_diretti.scadenza=".$scadenza." OR #__as_bandi_diretti.scadenza>".$scadenza.") ";
			if (!empty($direzione)) {
				$sql=$sql."AND ";
			}
		}
		if (!empty($direzione)) {
			$sql=$sql."(#__as_direzioni_generali.direzione LIKE '%". $this->_db->getEscaped($direzione)."%') ";
		}
		$this->_db->setQuery($sql.") as Res;");
		$row = $this->_db->loadRow();
		return $row[0];
	}

	function direttiNewsletter($email,$direzione='null',$programma='null') {
		$email = $this->_db->quote( $email );
		$direzione = (int) $direzione;
		$programma = (int) $programma;

		$this->_db->setQuery("INSERT INTO #__as_newsletter_iscritti (email,lastmail) VALUE (".$email.",CURRENT_TIMESTAMP);
					   INSERT INTO #__as_newsletter_diretti (email,direzione,programma) VALUE (".$email.",".$direzione.",".$programma.");");
		$return= $this->_db->queryBatch(true,true);
		$return = (empty($return))? 1 : 0;
		return $return;
	}

	function indirettiNewsletter($email,$regione='null',$settore='null') {
		$email = $this->_db->quote( $email );
		$regione = (int) $regione;
		$settore = (int) $settore;

		$this->_db->setQuery("INSERT INTO #__as_newsletter_iscritti (email,lastmail) VALUE (".$email.",CURRENT_DATE());
					   INSERT INTO #__as_newsletter_indiretti (email,regione,settore) VALUE (".$email.",".$regione.",".$settore.");");
		$return= $this->_db->queryBatch(true,true);
		$return = (empty($return))? 1 : 0;
		return $return;
	}

	function generalNewsletter($email) {
		$email = $this->_db->quote( $email );

		$this->_db->setQuery("INSERT INTO #__as_newsletter_iscritti (email,lastmail) VALUE (".$email.",CURRENT_DATE());
					   INSERT INTO #__as_newsletter_diretti (email) VALUE (".$email.");
					   INSERT INTO #__as_newsletter_indiretti (email) VALUE (".$email.");");
		$return= $this->_db->queryBatch(true,true);
		$return = (empty($return))? 1 : 0;
		return $return;
	}
}
<?php

class Month {
	protected $year;
	protected $month;
	protected $day;
	protected $structure;
	protected $_db;
	protected $consgroup;



	function __construct($mese, $anno, $consgroup=-1) {
		//estrarre mese ed anno ed assegnarli a $month e ad $year
		$this->_db=JFactory::getDBO();
		$this->year = $anno;
		$this->month = $mese;

		if ($consgroup==-1) {
			$this->_db->setQuery("SELECT consulenza_gruppo AS gruppo FROM #__bko_Consulenze LIMIT 1;");
			$arr=$this->_db->loadAssocList();
			if (empty($arr)) die ("tabelle vuote!");
			$this->consgroup=$arr[0]['gruppo'];

		}else $this->consgroup=$consgroup;

		$sql = "SELECT Giorno, Inizio, Fine, Consulente FROM (

                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) >= DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month )
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 0 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION

                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 1 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 1 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 1 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 1 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 1 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION

                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 2 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 2 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 2 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 2 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 2 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION

                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) , INTERVAL 1 MONTH ), INTERVAL EXTRACT( DAY FROM DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY )
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 3 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION

                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) , INTERVAL 1 MONTH ), INTERVAL EXTRACT( DAY FROM DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY )
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION
                
                SELECT DATE_ADD(DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 5 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) as Giorno,
                       orario_inizio as Inizio,
                       orario_fine as Fine,
                       utente_username as Consulente
                            FROM jos_bko_Orario
                                WHERE DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                AND DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL orario_giorno DAY ) <= DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) , INTERVAL 1 MONTH ), INTERVAL EXTRACT( DAY FROM DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY )
                                AND NOT EXISTS (SELECT * FROM jos_bko_Orari_Alternativi
                                    WHERE DAYOFWEEK(orario_alternativo_data) = orario_giorno
                                    AND orario_alternativo_data > DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY)
                                    AND orario_alternativo_data < DATE_ADD( DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ), INTERVAL 4 WEEK), INTERVAL DAYOFWEEK( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY), INTERVAL 1 WEEK)
                                    AND jos_bko_Orario.utente_username = jos_bko_Orari_Alternativi.utente_username )
                UNION

                SELECT orario_alternativo_data as Giorno,
                       orario_alternativo_inizio as Inizio,
                       orario_alternativo_fine as Fine,
                       utente_username as Consulente
                       FROM jos_bko_Orari_Alternativi
                            WHERE orario_alternativo_data >= DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month )
                            AND orario_alternativo_data <= DATE_SUB( DATE_ADD( DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) , INTERVAL 1 MONTH ), INTERVAL EXTRACT( DAY FROM DATE_ADD( MAKEDATE( ".$this->year.", 1 ), INTERVAL ".$this->month." - 1 month ) ) DAY )
                            AND (orario_alternativo_inizio IS NOT NULL
                                 OR orario_alternativo_fine IS NOT NULL)
            ) as Calendario WHERE Consulente IN (SELECT username as Consulente FROM #__user_usergroup_map INNER JOIN #__users ON user_id=id WHERE group_id=".$this->consgroup.") ORDER BY Giorno,Consulente";
		$this->_db->setQuery($sql);
		$risultato=$this->_db->loadAssocList();
		$count = count($risultato);
		$newarr=Array();
		$data=$risultato[0]['Giorno'];
		$consulente=null;
		for ($i=0;$i < $count+1;$i++){
			if(!empty($risultato[$i])) {
				if  ($risultato[$i]['Giorno']!=$data) {
					$this->_db->setQuery("SELECT prenotazione_inizio AS Inizio, prenotazione_fine AS Fine, consulente_username AS consulente FROM #__bko_Prenotazioni WHERE prenotazione_data='".$data."' ORDER BY prenotazione_inizio;"); //AND prenotazione_inizio>='".$risultato[$i]['Inizio']."' AND prenotazione_fine<='".$risultato[$i]['Fine']."' AND consulente_username='".$risultato[$i]['Consulente']."'
					$app=$this->_db->LoadAssocList();
					$this->structure[$data] = $this->createStructure($app,$newarr);
					$data = $risultato[$i]['Giorno'];
					$newarr=Array();
				}
				list($a1,$a2,$a3)=explode(":",$risultato[$i]['Inizio']);
				$thinizio=($a1*60)+$a2;
				list($a1,$a2,$a3)=explode(":",$risultato[$i]['Fine']);
				$thfine=($a1*60)+$a2;
				if (empty($newarr[$risultato[$i]['Consulente']])) $newarr[$risultato[$i]['Consulente']] = Array();
				array_push($newarr[$risultato[$i]['Consulente']],Array('inizio'=>$thinizio, 'fine' => $thfine));
			}
		}
	}

	function getStructure() {
		return $this->structure;
	}

	function getDay($date) {
		$element=$this->structure[$date];
		$result=Array();
		$count=0;
		$consultants=array_keys($element);
		for ($k=0;!empty($consultants[$k]);$k++) {
			for ($j=0;!empty($element[$consultants[$k]][$j]);$j++) {
				$result[$count]['consulente'] = $consultants[$k];
				$result[$count]['inizio'] = $element[$consultants[$k]][$j]['inizio'];
				$result[$count]['fine'] = $element[$consultants[$k]][$j]['fine'];
				$count++;
			}
		}
		return $result;
	}

	function getAvailable() {
		$result;
		$count=0;
		$dates=array_keys($this->structure);
		for ($i=0;!empty($dates[$i]);$i++) {
			if (!empty($this->structure[$dates[$i]])) {
				$consultants=array_keys($this->structure[$dates[$i]]);
				for ($j=0;!empty($consultants[$j]);$j++) {
					for($k=0;array_key_exists($k,$this->structure[$dates[$i]][$consultants[$j]]);$k++) {
						if (!empty($this->structure[$dates[$i]][$consultants[$j]][$k])) {
							$result[$count]['data']=str_replace('-','/',$dates[$i]);
							list($a1,$a2,$a3) = explode('/',$result[$count]['data']);
							$result[$count]['giorno']=$a3;
							$result[$count]['consulente']=$consultants[$j];
							$result[$count]['inizio'] = $this->structure[$dates[$i]][$consultants[$j]][$k]['inizio'];
							$result[$count]['fine'] = $this->structure[$dates[$i]][$consultants[$j]][$k]['fine'];
							$count++;
						}
					}
				}
			}
		}
		return $result;
	}

	private function createStructure ($appoints, $cons) {
		$apps=Array();
		for ($i=0;!empty($appoints[$i]);$i++) {
			if (empty($apps[$appoints[$i]['consulente']])) $apps[$appoints[$i]['consulente']]=Array();
			array_push($apps[$appoints[$i]['consulente']],$appoints[$i]);
		}
		if(empty($cons)) {
			return;
		}
		$consulenti= array_keys($cons);
		if (!empty($apps)) {
			for ($i=0;!empty($consulenti[$i]);$i++) {
				foreach ($cons[$consulenti[$i]] as &$c) {
				  if(!empty($apps[$consulenti[$i]]))  {
					foreach ($apps[$consulenti[$i]] as &$a) {
						if (($c['inizio']<=$this->timeConvert($a['Inizio'])) && ($c['fine']>=$this->timeConvert($a['Fine']))) {
							$trackstart= (($c['inizio']>=($this->timeConvert($a['Inizio'])-15))  ) ? 1 : 2;
							$trackstop= ($c['fine']<=($this->timeConvert($a['Fine'])+15))? 1 : 2;
							if (($trackstart == 1) && ($trackstop == 1)) $c= null;
							if (($trackstart == 1) && ($trackstop == 2)) $c['inizio']=$this->timeConvert($a['Fine']);
							if (($trackstart == 2) && ($trackstop == 1)) $c['fine']=$this->timeConvert($a['Inizio']);
							if (($trackstart == 2) && ($trackstop == 2)) {
								$n=Array();
								$n['fine']=$c['fine'];
								$c['fine']=$this->timeConvert($a['Inizio']);
								$n['inizio']=$this->timeConvert($a['Fine']);
								array_push($cons[$consulenti[$i]],$n);
							}
						}
					}
        }

				}

			}
		}
		return $cons;
	}

	private function timeConvert ($str) {
		if (!is_numeric($str)) {
			list($h,$m,$s)=explode(':',$str);
			return $m+($h*60);} else {
				return floor($str/60).":".($str%60);
			}
	}
}
?>

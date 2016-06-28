<?php
 
// No direct access
 
defined('_JEXEC') or die('Restricted access'); ?>
<h1><center><p>Sistema di gestione prenotazioni.</p></center></h1>

<table bordercolor="green" border="2">
	<tr bgcolor="#a4ffa4">
		<td><p>In questa sezione è possibile prenotare un'appuntamento per
		una conferenza online con un nostro consulente. Qui in basso puoi
		trovare il calendario. Quando i giorni che vengono visualizzati in
		verde significa che ci sono attualmente ore disponibili per la prenotazione.
		Puoi entrare utilizzando il tasto apri e nella pagina successiva ti
		verranno mostrate le fasce orarie disponibili e ti verrà data la
		possibilità di fissare il tuo appuntamento. Tramite i tasti avanti
		e indietro è possibile spostare la visualizzazione del calendario.</p>
		</td>
	</tr>
</table><br>
<h1>
	<table>
		<tr>
		<?php $dim_testo = 2;?>
			<td><font size=<?php echo $dim_testo;?>>Lunedì</font></td>
			<td><font size=<?php echo $dim_testo;?>>Martedì</font></td>
			<td><font size=<?php echo $dim_testo;?>>Mercoledì</font></td>
			<td><font size=<?php echo $dim_testo;?>>Giovedì</font></td>
			<td><font size=<?php echo $dim_testo;?>>Venerdì</font></td>
			<td><font size=<?php echo $dim_testo;?>>Sabato</font></td>
			<td><font size=<?php echo $dim_testo;?>>Domenica</font></td>
		</tr>
		<?php
		$current = mktime(0,0,0,strftime("%m",time()),  strftime("%d",time()), strftime("%Y",time()));
		$current_day = strftime("%d", time());
		$current_month = strftime("%m", time());
		$current_year = strftime("%Y",  time());
		
		$i = 0;
		$Week_day = date("N", mktime(0,0,0,$this->mese, 1, $this->anno));
		echo "<tr>";
		switch($Week_day)
		{
			case 7:
			echo "<td>&nbsp;</td>";
			$i++;
			case 6:
			echo "<td>&nbsp;</td>";
			$i++;
			case 5:
			echo "<td>&nbsp;</td>";
			$i++;
			case 4:
			echo "<td>&nbsp;</td>";
			$i++;
			case 3:
			echo "<td>&nbsp;</td>";
			$i++;
			case 2:
			echo "<td>&nbsp;</td>";
			$i++;
			case 1:
			$i++;
		}
		$max_day = date("t", $this->timestamp)+1;
		for($nday = 1; $nday < $max_day; $nday++){
			$available = false;
			if (!empty($this->liberi)) {
				foreach ($this->liberi as $li){
					if($li['data'] == $this->anno."/".$this->mese."/".(($nday < 10)?"0".$nday:$nday))
					{
						$available = true;
						break;
					}
					else $available = false;
				}
				$past = (($nday < $current_day)
					&& ($this->mese == $current_month)
					&& ($this->anno == $current_year))? false : true;
				$color = ($available && $past) ? '#00f900' : '#FF0000'; 
				$visible = ($available && $past) ? '' : 'disabled';
                $onclick = "window.location = 'index.php?option=com_backoffice&view=Days&timestamp=".(mktime(0,0,0,$this->mese, $nday, $this->anno))."'";
				if($i == 0)echo "<tr>";
				echo "<td bgcolor=".$color."><center><p><font size=".$dim_testo.">";
					if($nday < 10) echo "0";
					echo $nday."/".$this->mese."/".$this->anno.
					"</font></p><button type=\"button\" $visible onclick=\"$onclick\">Apri</button></td>";
				if($i == 7) {
					echo "</tr>";
					$i = 1;
					continue;
				}
				else{
					$i++;
				}
			}
		}
		?>
	</table>
</h1>
<?php

$primo = mktime(0,0,0,strftime("%m",time()), 1, strftime("%Y",time()));

if(($this->mese-1) > 0)
	$indietro = mktime(0,0,0, ($this->mese-1), 1, $this->anno);
else
	$indietro = mktime(0,0,0, 12, 1, ($this->anno-1));

$back = ($indietro < $primo) ? 'disabled': '';

if(($this->mese+1) > 12)
	$avanti = mktime(0,0,0, 1, 1, ($this->anno+1));
else
	$avanti = mktime(0,0,0, ($this->mese+1), 1, $this->anno);

echo "<a href=\"index.php?option=com_backoffice&view=Calendar&timestamp=".$indietro."\">
	<button ".$back.">Indietro</button></a>";

echo"<a href=\"index.php?option=com_backoffice&view=Calendar&timestamp=".$avanti."\">
	<button>Avanti</button></a>";
?>

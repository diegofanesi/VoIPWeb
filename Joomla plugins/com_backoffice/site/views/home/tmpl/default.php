<?php
require_once(JPATH_COMPONENT.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
?>

<h1>
	<center>Riepilogo dati account</center>
</h1>

<br/>
<table bordercolor="green" border="2">
	<tr bgcolor="#A4FFA4">	
		<td>In questa pagina puoi visualizzare i dati inserenti: ai minuti
		di videoconferenza acquistati ed utilizzati o acquistati e ancora
		rimanenti; agli appuntamenti che sono stati	prenotati ed effettuati
		e quelli non ancora effettuati; agli ordini che hai registrato ma
		non ancora pagati.
		</td>
	</tr>
</table>
<br/>
<br/>
<tr>
		<td>RIEPILOGO CREDITO:</td>
</tr>
<br/>
<br/>
<table border="1" frame="above" cellspacing="10">
	<tr class="<?php echo "row$k"; ?>">
		<td width="80">
			<p align="center"><strong>Credito residuo:</strong></p>
		</td>
	</tr>
	<tr>
		<td width="80" align="center"><?php echo $this->credito['credito']; ?></td>
	<tr/>
</table>
<br/>
<tr>
		<td>RIEPILOGO CONSULENZE PRENOTATE:</td>
</tr>
<br/>
<br/>

<table border="1" frame="above" cellspacing="10">
	<tr class="<?php echo "row$k"; ?>">
		<td width="80">
			<p align="center"><strong>Data</strong></p>
		</td>
		<td width="80">
			<p align="center"><strong>Inizio</strong></p>
		</td>
		<td width="80">
			<p align="center"><strong>Fine</strong></p>
		</td>
		<td width="400">
			<p align="center"><strong>Consulente</strong></p>
		</td>
	</tr>
	<?php
		$k = 0;
		if (!empty($this->appuntamenti)) {
			foreach ($this->appuntamenti as $ap)
			{
				if($ap['data']<$data_odierna){
	?>
	<tr>
		<td width="80" align="center"><?php echo $ap['data']; ?></td>
		<td width="80" align="center"><?php echo $ap['inizio']; ?></td>
		<td width="80" align="center"><?php echo $ap['fine']; ?></td>
		<td width="400" align="center"><?php if($ap['consulente'] == "")echo "n.d."; else echo $ap['consulente']; ?></td>
	</tr>
	<?php
			}
			$k = 1 - $k;
			}
		}	
	?>
</table>

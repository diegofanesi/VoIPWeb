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
		<td>In questa pagina puoi visualizzare i dati inserenti: Riepilogo
				ore consulenze effettuate e gruppi di apparteneza
		</td>
	</tr>
</table>
	<br/>
	<br/>
	<tr>
		<td>RIEPILOGO GRUPPI DI APPARTENENZA:</td>
	</tr>
	<br/>
	<br/>
<table border="1" frame="above" cellspacing="10">
	<tr class="<?php echo "row$k"; ?>">
		<td width="80">
			<p align="center"><strong>Gruppo</strong></p>
		</td>
	</tr>
	<?php
		$k = 0;
		if (!empty($this->listGroup)) {
			foreach ($this->listGroup as $gr){
	?>
	<tr>
	<td width="80" align="center"><?php echo $gr['tipo']; ?></td>
	</tr>
	<?php
		$k = 1 - $k;
			}
			}
	?>
</table>

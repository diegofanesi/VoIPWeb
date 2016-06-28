<?php
require_once(JPATH_COMPONENT.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
?>

<h1>
	<center>Riepilogo movimenti account</center>
</h1>

<table border="1" frame="above" cellspacing="10">
	<tr class="<?php echo "row$k"; ?>">
		<td width="80">
			<p align="center"><strong>Data</strong></p>
		</td>
		<td width="80">
			<p align="center"><strong>Q.ta</strong></p>
		</td>
		<td width="200">
			<p align="center"><strong>Tipo</strong></p>
		</td>
		<td width="100">
			<p align="center"><strong>Consulenza Tipo</strong></p>
		</td>
	</tr>
	<?php
		$k = 0;
		if (!empty($this->movimenti)) {
			foreach ($this->movimenti as $mv)
			{
				if($mv['data']<$data_odierna){
	?>
	<tr>
		<td width="80" align="center"><?php echo $mv['data'] ?></td>
		<td width="80" align="center"><?php echo $mv['qta']; ?></td>
		<td width="200" align="center"><?php echo $mv['m_tipo']; ?></td>
		<td width="100" align="center"><?php echo $mv['c_tipo']; ?></td>
	</tr>
	<?php
				}
			$k = 1 - $k;
			}
		}
	?>
</table>

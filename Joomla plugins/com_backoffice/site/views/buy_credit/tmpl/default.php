<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
?>
 
<h1>
	<center>Acquista credito</center>
</h1>
<form>
<p>
Seleziona la quantità da acquistare:<br>
<SELECT size=1 cols=4 NAME="quantita">
<OPTION value=25> 25 €
<OPTION SELECTED value=50> 50 €
<OPTION value=75> 75 €
<OPTION Value=100> 100 €
</select>
<p>
	<input type = "hidden" name = "option" value = "com_backoffice">
	<input type = "hidden" name = "task" value = "buy_credit">
<INPUT type="RESET" value="Cancella"> <INPUT type="SUBMIT" value="Acquista">
</p>	<!Pulsante di PayPal??>
</form>
</p>
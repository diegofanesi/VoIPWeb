<?php
require_once(JPATH_COMPONENT.DS.'Helper.php');

// No direct access

defined('_JEXEC') or die('Restricted access');
$time_min = 15;

$document = &JFactory::getDocument();
$folder = JURI::base().DS.'components'.DS.strtolower(JRequest::getVar('option'));
$folder .= DS.'views'.DS.strtolower(JRequest::getVar('view')).DS.'tmpl';
$document->addScript($folder.DS.'Prenotazione.js' );
?>
<script type="text/javascript">
var time_end = new Object();
<?php
$tempo = array();
$tempo_indice = 0;
foreach($this->result as $rs)
{
  $time_start = $rs['inizio'];

  $star_hour = floor($time_start/60);
  $start_minutes = $time_start%60;

  $time_finish = $rs['fine'];

  for($i = $time_start; $i < $time_finish; $i+=$time_min)
  {
    $hour = floor($i/60);
    $minutes = $i%60;
    $ok = true;
    foreach($tempo as $tt){
      if($tt == ($i+$time_min))
        $ok = false;
    }
    if($ok == true){
      $tempo[$tempo_indice] = $i+$time_min;
      $tempo_indice++;
    }
    echo "time_end[".$i."] = [";
    for($j = $i+$time_min; $j < $time_finish+1; $j+=$time_min)
    {
      $hour = floor($j/60);
      $minutes = $j%60;
?>
      {value:"<?php echo $j;?>", text:"<?php echo $hour.":".(($minutes == 0)? "0".$minutes : $minutes);?>"},
<?php
    }
    echo "];";
  }
}
?>

var tipo = new Object();
<?php
foreach($tempo as $tt){
  $hour = floor($tt/60);
  $minutes = $tt%60;
  echo "tipo[".$tt."] = [";
  $tipo_def =  array();
  $def_indice = 0;
  foreach($this->result as $rs){
    $time_start = $rs['inizio'];
  
    $star_hour = floor($time_start/60);
    $start_minutes = $time_start%60;

    $time_finish = $rs['fine'];
    
    foreach($this->tipi as $tp){
      if($tt > $time_start && $tt <= $time_finish && $tp['consulente'] == $rs['consulente']){
        $ok = true;
        foreach($tipo_def as $td)
        {
          if($td == $tp['tipo'])
            $ok = false;
        }
        if($ok == true){
          $tipo_def[$def_indice] = $tp['tipo'];
          $def_indice++;
?>
        {value:"<?php echo $tp['tipo'];?>", text:"<?php echo $tp['tipo'];?>"},
<?php
        }
      }
    }
  }
    echo "];";
}
?>

var cons = new Object();
var prices = new Object();
<?php
$tipo_globale = array();
$tipo_globale_indice = 0;
foreach($this->result as $rs){
  foreach($this->tipi as $tp){
    if($rs['consulente'] == $tp['consulente']){
      $ok = true;
      foreach($tipo_globale as $tg)
      {
        if($tg == $tp['tipo'])
          $ok = false;
      }
      if($ok == true){
        $tipo_globale[$tipo_globale_indice] = $tp['tipo'];
        $tipo_globale_indice++;
      }
    }
  }
}

foreach($tipo_globale as $tg){
?>
    cons["<?php echo $tg;?>"] = [
<?php
    foreach($this->tipi as $tp){
      if($tg == $tp['tipo']){
        foreach($this->result as $rs){
          $time_start = $rs['inizio'];
        
          $star_hour = floor($time_start/60);
          $start_minutes = $time_start%60;
          
          $time_finish = $rs['fine'];

          if($rs['consulente'] == $tp['consulente']){
?>
          {value:"<?php echo $time_start." ".$time_finish." ".$tp['consulente'];?>", text:"<?php echo $tp['consulente'];?>"},
<?php
          }
        }
      }
    }
    echo "];";
?>
    prices["<?php echo $tg;?>"] = [
<?php
    foreach($this->tipi as $tp){
      if($tg == $tp['tipo']){
?>
          {value:"<?php echo $tp['prezzo'];?>", text:"<?php echo $tp['tipo'];?>"},
<?php
      }
    }
    echo "];";
}
?>
</script>

<div>
<table>
<tr><td>Credito:</td><td><input readonly="readonly" size="3" value="<?php echo $this->credito; ?>"></td></tr>
<tr><td>Costo unitario:</td><td><input readonly="readonly" id="unita" name="unita" size="3" value="0"></td></tr>
<tr><td>Costo totale:</td><td><input readonly="readonly" id="totale" name="totale" size="3" value="0"></td></td></tr>
</table>
<table>
<tr><td>Ora di inizio:</td><td>Ora di fine:</td><td>Consulente:</td></tr>
<?php
$data = convertDatastamp($this->timestamp);
for ($i=0;!empty($this->disp[$i]);$i++) {
	if(($data['year'].'/'.$data['month'].'/'.$data['day']) == $this->disp[$i]['data']){
		$in = $this->disp[$i]['inizio'];
		$fi =  $this->disp[$i]['fine'];
		$hour_in = floor($in/60);
		$minutes_in = $in%60;
		$hour_fi = floor($fi/60);
		$minutes_fi = $fi%60;
		echo "<tr><td>".$hour_in.":".(($minutes_in == 0)? "0".$minutes_in : $minutes_in)."</td><td>".$hour_fi.":".(($minutes_fi == 0)? "0".$minutes_fi : $minutes_fi)."</td><td>".$this->disp[$i]['consulente']."</td></tr>";
	}
}
?>
</table>
</div>
<form action="" method="post">
<table>
	<tr>
		<td><select name="inizio" onchange="setFine(this)">
			<option value="" selected="selected">Seleziona inizio</option>
			<?php
			$inizio = array();
			$inizio_indice = 0;
			foreach($this->result as $re)
			{
				$time_start = $re['inizio'];
				$time_finish =  $re['fine'];

				for($i = $time_start; $i < $time_finish; $i+=$time_min)
				{
					$inserire = true;
					for($j = 0; $j < count($inizio); $j++)
					{
						if($inizio[$j] == $i){
							$inserire = false;
							break;
						}
					}
					if($inserire == true)
					{
						$inizio[$inizio_indice] = $i;
						$inizio_indice++;
					}
				}
			}
			foreach($inizio as $in)
			{
				$hour = floor($in/60);
				$minutes = $in%60;
				echo "<option value = ".$in.">"
				.$hour.":".(($minutes == 0)? "0".$minutes : $minutes)."</option>";
			}
			?>
		</select> <br />
		<select name="fine" onchange='setTipo(this)'>
			<option value="" selected="selected">Seleziona fine</option>
		</select> <br />
		<select name="tipo" onchange='setConsulente(this)'>
			<option value="" selected="selected">Seleziona tipo</option>
		</select> <br />
		<select name="consulente">
			<option value="" selected="selected">Seleziona consulente</option>
		</select> <br />
		<input type="hidden" name="option" value="com_backoffice"> <input
			type="hidden" name="task" value="prenota"> <input type="hidden"
			name="timestamp" value=<?php echo $this->timestamp;?>> <input
			type="submit" value="Prenota"></td>
	</tr>
</table>
</form>
<br />
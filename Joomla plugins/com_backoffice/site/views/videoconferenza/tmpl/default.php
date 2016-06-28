<?php
// No direct access
defined('_JEXEC') or die('Restricted access');
$data_odierna=time();
?>

<h1>
	<center>Videoconferenza</center>
</h1>
<center>
<applet code="VoIP.class" ARCHIVE="<?php echo JPATH_COMPONENT_SITE.DS.'views'.DS.'videoconferenza'.DS.'tmpl'.DS.'svoip.jar';?>" width=207 height=333>
<param Name=host Value="193.205.92.75">
<param Name=username Value="<?php echo $this->username;?>">
<param Name=password Value="<?php echo $this->password;?>">
<param Name=numberToCall Value="0">
</applet>
</center>
<br/>

<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
  <div id="WADAPageTitleArea">
	<div id="WADAPageTitle">PayPal IPN Details</div>
	<div><a href="index.php?option=com_backoffice&view=raw_log&task=Search">New Search</a></div>
  </div>
  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
  <?php if (!empty($this->WADApaypal_raw_log)) { // Show if recordset not empty ?>
  <div id="WADADetails">
	<div class="WADAHeader">Details</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
	  <tr>
		<th width="20%" valign="top" class="WADADataTableHeader">ID</th>
		<td width="80%" valign="top" class="WADADataTableCell"><?php echo $this->WADApaypal_raw_log['id']; ?></td>
	  </tr>
	  <tr>
		<th valign="top" class="WADADataTableHeader">IPN Date</th>
		<td valign="top" class="WADADataTableCell"><?php echo $this->WADApaypal_raw_log['created_timestamp']; ?></td>
	  </tr>
	  <tr>
		<th valign="top" class="WADADataTableHeader">IPN Data</th>
		<td valign="top" class="WADADataTableCell"><?php 
	  $ipn_data_unserialized = unserialize($this->WADApaypal_raw_log['ipn_data_serialized']);
	  echo '<pre>';
	  print_r($ipn_data_unserialized);
	  echo '</pre>';
	  ?></td>
	  </tr>
	</table>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADAButtonRow">
	  <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"></td>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=raw_log&task=Delete&id=<?php echo (rawurlencode($this->WADApaypal_raw_log_id)); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_delete.gif" /></a></td>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=raw_log" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_results.gif" /></a></td>
		</tr>
	  </table>
	</div>
  </div>
  <?php } // Show if recordset not empty ?>
  <?php if (empty($this->WADApaypal_raw_log)) { // Show if recordset empty ?>
  <div class="WADANoResults">
	<div class="WADANoResultsMessage">No record found.</div>
  </div>
  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
  <div class="WADADetailsLinkArea">
	<div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=raw_log" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Pacifica/Refined_results.gif" /></a></div>
  </div>
  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
  <?php } // Show if recordset empty ?>
</div>

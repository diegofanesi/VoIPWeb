<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADASearchContainer">
  <form action="index.php" method="get" name="WADASearchForm" id="WADASearchForm">
	<div class="WADAHeader">Search</div>
	<td><input type="hidden" name="option" id="option" value="com_backoffice"/></td>
            <td><input type="hidden" name="view" id="view" value="raw_log"/></td>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<th class="WADADataTableHeader">Created Date</th>
		<td class="WADADataTableCell"><input type="text" name="S_created_timestamp" id="S_created_timestamp" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">IPN Data</th>
		<td class="WADADataTableCell"><input type="text" name="S_ipn_data_serialized" id="S_ipn_data_serialized" value="" size="55" /></td>
	  </tr>
	</table>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADAButtonRow">
	  <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Search" id="Search" value="Search" alt="Search" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_search.gif"  /></td>
		</tr>
	  </table>
	</div>
  </form>
</div>

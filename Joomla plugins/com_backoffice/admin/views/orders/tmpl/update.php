<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADAUpdateContainer">
  <?php if ($this->totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
  <form action="index.php?option=com_backoffice&view=orders&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
	<div class="WADAHeader">Update Record</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<th class="WADADataTableHeader">receiver_email:</th>
		<td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['receiver_email'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_status:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_status" id="payment_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payment_status'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">pending_reason:</th>
		<td class="WADADataTableCell"><input type="text" name="pending_reason" id="pending_reason" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['pending_reason'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_date:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_date" id="payment_date" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payment_date'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_gross:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['mc_gross'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_fee:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_fee" id="mc_fee" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['mc_fee'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">tax:</th>
		<td class="WADADataTableCell"><input type="text" name="tax" id="tax" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['tax'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_currency:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['mc_currency'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">txn_id:</th>
		<td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['txn_id'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">txn_type:</th>
		<td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['txn_type'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">first_name:</th>
		<td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['first_name'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">last_name:</th>
		<td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['last_name'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_street:</th>
		<td class="WADADataTableCell"><input type="text" name="address_street" id="address_street" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_street'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_city:</th>
		<td class="WADADataTableCell"><input type="text" name="address_city" id="address_city" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_city'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_state:</th>
		<td class="WADADataTableCell"><input type="text" name="address_state" id="address_state" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_state'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_zip:</th>
		<td class="WADADataTableCell"><input type="text" name="address_zip" id="address_zip" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_zip'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_country:</th>
		<td class="WADADataTableCell"><input type="text" name="address_country" id="address_country" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_country'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_status:</th>
		<td class="WADADataTableCell"><input type="text" name="address_status" id="address_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_status'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_email:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payer_email'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_status:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payer_status'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_type:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_type" id="payment_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payment_type'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_name:</th>
		<td class="WADADataTableCell"><input type="text" name="address_name" id="address_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_name'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">protection_eligibility:</th>
		<td class="WADADataTableCell"><input type="text" name="protection_eligibility" id="protection_eligibility" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['protection_eligibility'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">ipn_status:</th>
		<td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['ipn_status'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">subscr_id:</th>
		<td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['subscr_id'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">custom:</th>
		<td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['custom'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">reason_code:</th>
		<td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['reason_code'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">contact_phone:</th>
		<td class="WADADataTableCell"><input type="text" name="contact_phone" id="contact_phone" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['contact_phone'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">item_name:</th>
		<td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['item_name'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">item_number:</th>
		<td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['item_number'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">invoice:</th>
		<td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['invoice'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">for_auction:</th>
		<td class="WADADataTableCell"><input type="text" name="for_auction" id="for_auction" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['for_auction'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_buyer_id:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_buyer_id" id="auction_buyer_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['auction_buyer_id'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_closing_date:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_closing_date" id="auction_closing_date" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['auction_closing_date'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_multi_item:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_multi_item" id="auction_multi_item" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['auction_multi_item'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">creation_timestamp:</th>
		<td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['creation_timestamp'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_country_code:</th>
		<td class="WADADataTableCell"><input type="text" name="address_country_code" id="address_country_code" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['address_country_code'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_business_name:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['payer_business_name'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">receiver_id:</th>
		<td class="WADADataTableCell"><input type="text" name="receiver_id" id="receiver_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['receiver_id'])); ?>" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">test_ipn:</th>
		<td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_orders['test_ipn'])); ?>" size="32" /></td>
	  </tr>
	</table>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADAButtonRow">
	  <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_update.gif"  /></td>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_cancel.gif" /></a></td>
		</tr>
	  </table>
	  <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" />
	</div>
  </form>
  <?php } // Show if recordset not empty ?>
  <?php if ($this->totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
  <div class="WADANoResults">
	<div class="WADANoResultsMessage">No record found.</div>
  </div>
  <?php } // Show if recordset empty ?>
</div>

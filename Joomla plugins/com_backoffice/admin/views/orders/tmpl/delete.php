<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
  <div class="WADADeleteContainer">
  <?php if ($this->totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
  <form action="index.php?option=com_backoffice&view=orders&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
	<div class="WADAHeader">Delete Record</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<p class="WADAMessage">Are you sure you want to delete the following record?</p>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
	  <tr>
		<th width="33%" class="WADADataTableHeader">ID</th>
		<td width="67%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['id']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">IPN Date</th>
		<td class="WADADataTableCell"><span class="WADAResultsTableCell">
		  <?php 
		echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_orders['creation_timestamp']));
		?>
		</span></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Payment Date</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_date']); ?></td>
	  </tr>
	  <?php
	  if($this->row_WADApaypal_orders['protection_eligibility'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Seller Protection Eligibility</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['protection_eligibility']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<th class="WADADataTableHeader">&nbsp;</th>
		<td class="WADADataTableCell">&nbsp;</td>
	  </tr>
	  <?php
	  if($this->row_WADApaypal_orders['txn_type'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Transaction Type</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['txn_type']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['txn_id'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Transaction ID</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['txn_id']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['payment_type'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Payment Type</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_type']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['payment_status'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Payment Status</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_status']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['pending_reason'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Pending Reason</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['pending_reason']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['reason_code'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Reason Code</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['reason_code']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['tax'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Sales Tax</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['tax']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['mc_gross'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Total</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['mc_gross']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['mc_fee'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">PayPal Fee</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['mc_fee']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['mc_currency'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Currency</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['mc_currency']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['payer_business_name'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Billing Company</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_business_name']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Billing Name</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['first_name']); ?> <?php echo($this->row_WADApaypal_orders['last_name']); ?></td>
	  </tr>
	  <?php
	  if($this->row_WADApaypal_orders['address_street'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Address</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['address_name']); ?><br />
		  <?php echo($this->row_WADApaypal_orders['address_street']); ?><br />
		  <?php echo($this->row_WADApaypal_orders['address_city']); ?>, <?php echo($this->row_WADApaypal_orders['address_state']); ?> <?php echo($this->row_WADApaypal_orders['address_zip']); ?><br />
		  <?php echo($this->row_WADApaypal_orders['address_country']); ?><br /></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['address_status'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Address Status</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['address_status']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['contact_phone'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Phone Number</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['contact_phone']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Payer Email Addres</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_email']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Payer Status</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_status']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">&nbsp;</th>
		<td class="WADADataTableCell">&nbsp;</td>
	  </tr>
	  <?php
	  if($this->row_WADApaypal_orders['subscr_id'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Standard Subscription ID</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['subscr_id']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['custom'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Custom</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['custom']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['item_name'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Item Name</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['item_name']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['item_number'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Item Number</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['item_number']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <?php
	  if($this->row_WADApaypal_orders['invoice'] != '')
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Invoice</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['invoice']); ?></td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<th class="WADADataTableHeader">&nbsp;</th>
		<td class="WADADataTableCell">&nbsp;</td>
	  </tr>
	  <?php
	  if($this->row_WADApaypal_orders['for_auction'] != '' && $this->row_WADApaypal_orders['for_auction'] != 0)
	  {
	  ?>
	  <tr>
		<th class="WADADataTableHeader">eBay User ID</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_buyer_id']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">eBay Auction Closing Date</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_closing_date']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">eBay Cart Number of Items</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_multi_item']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">&nbsp;</th>
		<td class="WADADataTableCell">&nbsp;</td>
	  </tr>
	  <?php
	  }
	  ?>
	  <tr>
		<th class="WADADataTableHeader">Receiver ID</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['receiver_id']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Receiver Email Address</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['receiver_email']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">&nbsp;</th>
		<td class="WADADataTableCell">&nbsp;</td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Notify Version</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['notify_version']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Verify Signature</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['verify_sign']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">IPN Status</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['ipn_status']); ?></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">Test?</th>
		<td class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['test_ipn']); ?></td>
	  </tr>
	</table>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADAButtonRow">
	  <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_delete.gif"  /></td>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_cancel.gif" /></a></td>
		</tr>
	  </table>
	  <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" />
	</div>
  </form>
  <?php } // Show if recordset not empty ?>
  <?php if ($this->totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
  <div class="WADANoResults">
	<div class="WADANoResultsMessage">No record found.</div>
  </div>
  <?php } // Show if recordset empty ?>
</div>

<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
  <div id="WADAPageTitleArea">
	<div id="WADAPageTitle">Order #<?php echo $this->row_WADApaypal_orders['id']; ?></div>
	<div><a href="index.php?option=com_backoffice&view=orders&task=Search">New Search</a></div>
  </div>
  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
  <?php if ($this->totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
	<div id="WADADetails">
	  <div class="WADAHeader">Details</div>
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
		<tr>
		  <th valign="top" class="WADADataTableHeader">IPN Date</th>
		  <td valign="top" class="WADADataTableCell"><span class="WADAResultsTableCell">
			<?php
		$ipn_date = date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_orders['creation_timestamp']));
		echo $ipn_date;
		?>
			</span></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Test?</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['test_ipn']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">IPN Status</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['ipn_status']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Notify Version</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['notify_version']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Verify Sign</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['verify_sign']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Billing Name</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['first_name']); ?> <?php echo($this->row_WADApaypal_orders['last_name']); ?></td>
		</tr>
		<?php
	if($this->row_WADApaypal_orders['payer_business_name'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Company Name</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_business_name']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['address_street'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Shipping Address</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['address_name']); ?><br />
			<?php echo($this->row_WADApaypal_orders['address_street']); ?><br />
			<?php echo($this->row_WADApaypal_orders['address_city']); ?>, <?php echo($this->row_WADApaypal_orders['address_state']); ?> <?php echo($this->row_WADApaypal_orders['address_zip']); ?><br />
			<?php echo($this->row_WADApaypal_orders['address_country']); ?><br /></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Address Status</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['address_status']); ?></td>
		</tr>
		<?php
		}
	  ?>
		<?php
	if($this->row_WADApaypal_orders['contact_phone'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Phone Number</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['contact_phone']); ?></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Email Address</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_email']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Receiver ID</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['receiver_id']); ?></td>
		</tr>
		<tr>
		  <th width="23%" valign="top" class="WADADataTableHeader">Receiver Email</th>
		  <td width="77%" valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['receiver_email']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Payment Date</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_date']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Payment Status</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_status']); ?></td>
		</tr>
		<?php
	if($this->row_WADApaypal_orders['pending_reason'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Pending Reason</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['pending_reason']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['reason_code'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Reason Code</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['reason_code']); ?></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Transaction ID</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['txn_id']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Transaction Type</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['txn_type']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Total</th>
		  <td valign="top" class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_orders['mc_gross'],2)); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">PayPal Fee</th>
		  <td valign="top" class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_orders['mc_fee'],2)); ?></td>
		</tr>
		<?php
	if($this->row_WADApaypal_orders['tax'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Sales Tax</th>
		  <td valign="top" class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_orders['tax'],2)); ?></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Shipping</th>
		  <td valign="top" class="WADADataTableCell">
		  <?php
		  if($this->row_WADApaypal_orders['mc_shipping'] != 0)
		  	echo '$' . number_format($this->row_WADApaypal_orders['mc_shipping'],2);
		  else
		  	echo '$' . number_format($this->row_WADApaypal_orders['shipping'],2);
		  ?>
		  </td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Currency</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['mc_currency']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Payer Status</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payer_status']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Payment Type</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['payment_type']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Seller Protection</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['protection_eligibility']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<?php
	if($this->totalRows_rsOrderItems > 0)
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Order Items</th>
		  <td valign="top" class="WADADataTableCell"><table width="100%" border="0" cellspacing="0" cellpadding="2">
			  <tr>
				<td width="11%" valign="top"><strong>Item #</strong></td>
				<td width="29%" valign="top"><strong>Item Name</strong></td>
				<?php
		  if($this->row_rsOrderItems['on0'] != '' && $this->row_rsOrderItems['os0'] != '')
		  {
		  ?>
				<td width="20%" valign="top"><strong>Options</strong></td>
				<?php
		  }
		  ?>
				<td width="10%" align="center" valign="top"><strong>QTY</strong></td>
				<?php
		  if($this->row_rsOrderItems['custom'] != '')
		  {
		  ?>
				<td width="18%" valign="top"><strong>Custom</strong></td>
				<?php
		  }
		  ?>
				<td width="12%" align="right" valign="top"><strong>Price</strong></td>
			  </tr>
			  <?php do { ?>
				<tr>
				  <td valign="top"><?php echo $this->row_rsOrderItems['item_number']; ?></td>
				  <td valign="top"><?php echo $this->row_rsOrderItems['item_name']; ?></td>
				  <?php
			if($this->row_rsOrderItems['on0'] != '' && $this->row_rsOrderItems['os0'] != '')
			{
			?>
				  <td valign="top"><?php 
			if($this->row_rsOrderItems['on0'] != '')
				echo $this->row_rsOrderItems['on0'] . ': ' . $this->row_rsOrderItems['os0'] . '<br />';
			?>
					<?php 
			if($this->row_rsOrderItems['on1'] != '')
				echo $this->row_rsOrderItems['on1'] . ': ' . $this->row_rsOrderItems['os1'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on2'] != '')
				echo $this->row_rsOrderItems['on2'] . ': ' . $this->row_rsOrderItems['os2'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on3'] != '')
				echo $this->row_rsOrderItems['on3'] . ': ' . $this->row_rsOrderItems['os3'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on4'] != '')
				echo $this->row_rsOrderItems['on4'] . ': ' . $this->row_rsOrderItems['os4'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on5'] != '')
				echo $this->row_rsOrderItems['on5'] . ': ' . $this->row_rsOrderItems['os5'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on6'] != '')
				echo $this->row_rsOrderItems['on6'] . ': ' . $this->row_rsOrderItems['os6'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on7'] != '')
				echo $this->row_rsOrderItems['on7'] . ': ' . $this->row_rsOrderItems['os7'] . '<br />';
			?>
			<?php 
			if($this->row_rsOrderItems['on8'] != '')
				echo $this->row_rsOrderItems['on8'] . ': ' . $this->row_rsOrderItems['os8'] . '<br />';
			?></td>
				  <?php
			}
			?>
				  <td align="center" valign="top"><?php echo $this->row_rsOrderItems['quantity']; ?></td>
				  <?php
			if($this->row_rsOrderItems['custom'] != '')
			{
			?>
				  <td valign="top"><?php echo $this->row_rsOrderItems['custom']; ?></td>
				  <?php
			}
			?>
				  <td align="right" valign="top">$<?php echo number_format($this->row_rsOrderItems['mc_gross'],2); ?></td>
				</tr>
				<?php } while ($this->row_rsOrderItems = mysql_fetch_assoc($rsOrderItems)); ?>
		  </table></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<?php
	if($this->row_WADApaypal_orders['subscr_id'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Subscription ID</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['subscr_id']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['custom'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Custom Data</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['custom']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['transaction_subject'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Transaction Subject</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['transaction_subject']); ?></td>
		</tr>
		<?php
	}
	  ?>
		<?php
	if($this->row_WADApaypal_orders['item_name'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Item Name</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['item_name']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['item_number'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Item Number</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['item_number']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['option_name1'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Option 1</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['option_name1']); ?>: <?php echo($this->row_WADApaypal_orders['option_selection1']); ?></td>
		</tr>
		<?php
	}
	?>
	<?php
	if($this->row_WADApaypal_orders['option_name2'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Option 2</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['option_name2']); ?>: <?php echo($this->row_WADApaypal_orders['option_selection2']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['invoice'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Invoice #</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['invoice']); ?></td>
		</tr>
		<?php
	}
	?>
		<?php
	if($this->row_WADApaypal_orders['shipping_method'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Shipping Method</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['shipping_method']); ?></td>
		</tr>
		<?php
	}
	?>
	<?php
	if($this->row_WADApaypal_orders['memo'] != '')
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">Customer Notes</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['memo']); ?></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
		<?php
	if($this->row_WADApaypal_orders['for_auction'] != '' && $this->row_WADApaypal_orders['for_auction'] != 0)
	{
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Auction?</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['for_auction']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay User ID</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_buyer_id']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Auction Closing Date</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_closing_date']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Handling Amount</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['handling_amount']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Shipping Discount</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['shipping_discount']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Insurance Amount</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['insurance_amount']); ?></td>
		</tr>
		<tr>
		  <th valign="top" class="WADADataTableHeader">eBay Multi-Item?</th>
		  <td valign="top" class="WADADataTableCell"><?php echo($this->row_WADApaypal_orders['auction_multi_item']); ?></td>
		</tr>
		<?php
	}
	?>
		<tr>
		  <th valign="top" class="WADADataTableHeader">&nbsp;</th>
		  <td valign="top" class="WADADataTableCell">&nbsp;</td>
		</tr>
	  </table>
	  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	  <div class="WADAButtonRow">
		<table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		  <tr>
			<td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_update.gif" /></a></td>
			<td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_orders['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_delete.gif" /></a></td>
			<td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_results.gif" /></a></td>
		  </tr>
		</table>
	  </div>
	</div>
	<?php } // Show if recordset not empty ?>
  <?php if ($this->totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
	<div class="WADANoResults">
	  <div class="WADANoResultsMessage">No record found.</div>
	</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADADetailsLinkArea">
	  <div class="WADADataNavButtonCell"><a href="orders-results.php" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_results.gif" /></a></div>
	</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<?php } // Show if recordset empty ?>
</div>

<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Refund Details</div>
        <div><a href="index.php?option=com_backoffice&view=refunds&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_refunds > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="31%" class="WADADataTableHeader">ID</th>
            <td width="69%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_refunds['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['time_created'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['time_created']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['payment_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['protection_eligibility'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Seller Protection Eligibility</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['protection_eligibility']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_id']); ?></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['payer_business_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader"> Company</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_business_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['first_name']); ?> <?php echo($this->row_WADApaypal_refunds['last_name']); ?></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['address_street'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_name']); ?><br />
              <?php echo($this->row_WADApaypal_refunds['address_street']); ?> <?php echo($this->row_WADApaypal_refunds['address_city']); ?>, <?php echo($this->row_WADApaypal_refunds['address_state']); ?> <?php echo($this->row_WADApaypal_refunds['address_zip']); ?><br />              <?php echo($this->row_WADApaypal_refunds['address_country']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Email Adress</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_email']); ?></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['contact_phone'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Phone Number</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['contact_phone']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Original Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['parent_txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Refund Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['txn_id']); ?></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['transaction_subject'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction Subject</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['transaction_subject']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['product_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Product Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['product_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['mc_shipping'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_shipping']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['mc_handling'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Handling</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_handling']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Total Refund</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee (refunded)</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_fee']); ?></td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['mc_currency'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_currency']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['memo'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Memo</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['memo']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['payment_type'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_type']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['payment_status'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_status']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['reason_code'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['reason_code']); ?></td>
          </tr>
          <?php
		  }
		  ?>
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
            <td valign="top" class="WADADataTableCell"><table width="80%" border="0" cellspacing="0" cellpadding="2">
            <?php foreach ($this->row_rsOrderItems as &$value) { ?>
            
            
              <tr>
                <td width="11%" valign="top"><strong>Item #</strong></td>
                <td width="29%" valign="top"><strong>Item Name</strong></td>
                <?php
			  if($value['on0'] != '' && $value['on1'] != '')
			  {
			  ?>
                <td width="20%" valign="top"><strong>Options</strong></td>
                <?php
			  }
			  ?>
                <td width="10%" align="center" valign="top"><strong>QTY</strong></td>
                <?php
			  if($value['custom'] != '')
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
                <td valign="top"><?php echo $value['item_number']; ?></td>
                <td valign="top"><?php echo $value['item_name']; ?></td>
                <?php
				if($value['on0'] != '' && $value['on1'] != '')
				{
				?>
                <td valign="top"><?php 
				if($value['on0'] != '')
					echo $value['on0']; ?>
                  - <?php echo $value['os0'] . '<br />';
				?>
                  <?php 
				if($value['on1'] != '')
					echo $value['on1']; ?>
                  - <?php echo $value['os1']; 
				?></td>
                <?php
				}
				?>
                <td align="center" valign="top"><?php echo $value['quantity']; ?></td>
                <?php
				if($value['custom'] != '')
				{
				?>
                <td valign="top"><?php echo $value['custom']; ?></td>
                <?php
				}
				?>
                <td align="right" valign="top">$<?php echo number_format($value['mc_gross'],2); ?></td>
              </tr>
            
              <?php } while ($value = ($this->rsOrderItems)); ?>
              <?php unset($value);} // break the reference with the last element?>
            </table></td>
          </tr>
            
          <?php
		  	}
			?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php 
		  if($this->row_WADApaypal_refunds['recurring_payment_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['recurring_payment_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['rp_invoice_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['rp_invoice_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php 
		  if($this->row_WADApaypal_refunds['invoice'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['invoice']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Charset</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['charset']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['verify_sign']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=refunds&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=refunds&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=refunds" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_refunds == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=refunds" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
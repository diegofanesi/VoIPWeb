<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Standard Subscription Payment Details</div>
        <div><a href="index.php?option=com_backoffice&view=subscription_payments&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_subscription_payments > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="33%" class="WADADataTableHeader">ID</th>
            <td width="67%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['first_name']); ?> <?php echo($this->row_WADApaypal_subscription_payments['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Address Country</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['address_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name (0)</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['on0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (0)</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['os0']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Name(1)</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['on1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option Selection (1)</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['os1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">QTY</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['quantity']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Sales Tax</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['tax']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Gross Amount</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Pending Reason</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['pending_reason']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['reason_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Memo</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['memo']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscription_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription_payments&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_subscription_payments['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription_payments" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_subscription_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=subscription_payments" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
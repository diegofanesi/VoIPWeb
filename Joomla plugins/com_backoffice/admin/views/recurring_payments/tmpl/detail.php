<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">Recurring Payment Details </div>
        <div><a href="index.php?option=com_backoffice&view=recurring_payments&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_recurring_payments > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="37%" class="WADADataTableHeader">ID</th>
            <td width="63%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payments Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Seller Protection Eligibility</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['protection_eligibility']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Subject</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['transaction_subject']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Gross Amount</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency Code</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['receipt_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payments&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payments['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payments&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payments['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payments" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_recurring_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=recurring_payments" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
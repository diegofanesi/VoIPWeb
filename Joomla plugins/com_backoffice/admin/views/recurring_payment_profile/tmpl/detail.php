 <?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>  
 <div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Recurring Payment Profile Details</div>
        <div><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="36%" class="WADADataTableHeader">ID</th>
            <td width="64%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Time Created</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Initial Payment Amount</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['initial_payment_amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Outstanding Balance</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['outstanding_balance']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Next Payment Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['next_payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Cycle</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payment_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount Per Cycle</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['amount_per_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period Time</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['period_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Profile Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['profile_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency Code</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Company</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_business_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['first_name']); ?> <?php echo($this->row_WADApaypal_recurring_payment_profiles['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Product Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['product_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">RP Invoice ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring Payment ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['ipn_status']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payment_profile" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=recurring_payment_profile" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
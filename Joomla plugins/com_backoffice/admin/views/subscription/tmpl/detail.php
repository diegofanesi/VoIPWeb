<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Subscription Profile Details</div>
        <div><a href="index.php?option=com_backoffice&view=subscription&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_subscriptions > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">ID</th>
            <td width="68%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Billing Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['first_name']); ?> <?php echo($this->row_WADApaypal_subscriptions['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Residence Country</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Customer Notes</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['memo']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Subscription Effective</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_effective']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 1</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 1</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 1</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 2</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 2</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 2</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Period 3</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Amount 3</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MC Amount 3</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recurring</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['recurring']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reattempt</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['reattempt']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Retry At</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['retry_at']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Recur Times</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['recur_times']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Username</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['username']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Password</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['password']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_subscriptions['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_subscriptions['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_subscriptions == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=subscription" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
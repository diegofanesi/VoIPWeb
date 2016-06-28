<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADeleteContainer">
      <?php if ($this->totalRows_WADApaypal_subscriptions > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=subscription&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_subscriptions['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_date:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_effective:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['subscr_effective']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period1:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period2:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period3:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['period3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount1:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount2:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount3:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount1:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount2:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_amount3:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_amount3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['recurring']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reattempt:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['reattempt']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">retry_at:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['retry_at']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recur_times:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['recur_times']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">username:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['username']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">password:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['password']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['first_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['item_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['item_number']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_subscriptions['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=subscription" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_subscriptions['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_subscriptions == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
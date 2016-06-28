<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>   
<div class="WADADeleteContainer">
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=recurring_payment_profile&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_cycle:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payment_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['first_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">next_payment_date:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['next_payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">initial_payment_amount:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['initial_payment_amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['currency_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period_type:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['period_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['product_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['payer_business_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount_per_cycle:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['amount_per_cycle']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">profile_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['profile_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['amount']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">outstanding_balance:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['outstanding_balance']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['product_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['creation_timestamp']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_recurring_payment_profiles['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payment_profile" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
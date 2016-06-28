<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>    
 <div class="WADAUpdateContainer">
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=recurring_payment_profile&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">payment_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_cycle" id="payment_cycle" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['payment_cycle'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_type:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['txn_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['last_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['first_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">next_payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="next_payment_date" id="next_payment_date" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['next_payment_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['residence_country'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">initial_payment_amount:</th>
            <td class="WADADataTableCell"><input type="text" name="initial_payment_amount" id="initial_payment_amount" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['initial_payment_amount'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="rp_invoice_id" id="rp_invoice_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['rp_invoice_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">currency_code:</th>
            <td class="WADADataTableCell"><input type="text" name="currency_code" id="currency_code" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['currency_code'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="time_created" id="time_created" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['time_created'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['verify_sign'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">period_type:</th>
            <td class="WADADataTableCell"><input type="text" name="period_type" id="period_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['period_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_status" id="payer_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['payer_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['payer_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['receiver_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['payer_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_type:</th>
            <td class="WADADataTableCell"><input type="text" name="product_type" id="product_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['product_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['payer_business_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="shipping" id="shipping" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['shipping'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount_per_cycle:</th>
            <td class="WADADataTableCell"><input type="text" name="amount_per_cycle" id="amount_per_cycle" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['amount_per_cycle'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">profile_status:</th>
            <td class="WADADataTableCell"><input type="text" name="profile_status" id="profile_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['profile_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['notify_version'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">amount:</th>
            <td class="WADADataTableCell"><input type="text" name="amount" id="amount" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['amount'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">outstanding_balance:</th>
            <td class="WADADataTableCell"><input type="text" name="outstanding_balance" id="outstanding_balance" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['outstanding_balance'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring_payment_id" id="recurring_payment_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['recurring_payment_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="product_name" id="product_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['product_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['ipn_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_recurring_payment_profiles['test_ipn'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=recurring_payment_profile" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_recurring_payment_profiles['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
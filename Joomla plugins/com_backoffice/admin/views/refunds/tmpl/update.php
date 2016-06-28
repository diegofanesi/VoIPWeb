<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADAUpdateContainer">
      <?php if ($this->totalRows_WADApaypal_refunds > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=refunds&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['ipn_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['mc_gross'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">invoice:</th>
            <td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['invoice'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">protection_eligibility:</th>
            <td class="WADADataTableCell"><input type="text" name="protection_eligibility" id="protection_eligibility" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['protection_eligibility'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_id" id="payer_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payer_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_street:</th>
            <td class="WADADataTableCell"><input type="text" name="address_street" id="address_street" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_street'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_date:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_date" id="payment_date" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payment_date'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_status:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_status" id="payment_status" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payment_status'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">charset:</th>
            <td class="WADADataTableCell"><input type="text" name="charset" id="charset" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['charset'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_zip:</th>
            <td class="WADADataTableCell"><input type="text" name="address_zip" id="address_zip" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_zip'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_shipping" id="mc_shipping" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['mc_shipping'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_handling" id="mc_handling" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['mc_handling'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['first_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">memo:</th>
            <td class="WADADataTableCell"><input type="text" name="memo" id="memo" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['memo'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['last_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><input type="text" name="product_name" id="product_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['product_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_fee:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_fee" id="mc_fee" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['mc_fee'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country_code:</th>
            <td class="WADADataTableCell"><input type="text" name="address_country_code" id="address_country_code" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_country_code'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_name:</th>
            <td class="WADADataTableCell"><input type="text" name="address_name" id="address_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><input type="text" name="notify_version" id="notify_version" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['notify_version'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reason_code:</th>
            <td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['reason_code'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['custom'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country:</th>
            <td class="WADADataTableCell"><input type="text" name="address_country" id="address_country" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_country'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_city:</th>
            <td class="WADADataTableCell"><input type="text" name="address_city" id="address_city" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_city'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><input type="text" name="verify_sign" id="verify_sign" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['verify_sign'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payer_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">parent_txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="parent_txn_id" id="parent_txn_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['parent_txn_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">contact_phone:</th>
            <td class="WADADataTableCell"><input type="text" name="contact_phone" id="contact_phone" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['contact_phone'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><input type="text" name="time_created" id="time_created" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['time_created'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['txn_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_type:</th>
            <td class="WADADataTableCell"><input type="text" name="payment_type" id="payment_type" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payment_type'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['payer_business_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_state:</th>
            <td class="WADADataTableCell"><input type="text" name="address_state" id="address_state" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['address_state'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['receiver_email'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_id:</th>
            <td class="WADADataTableCell"><input type="text" name="receiver_id" id="receiver_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['receiver_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['mc_currency'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><input type="text" name="residence_country" id="residence_country" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['residence_country'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['test_ipn'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">transaction_subject:</th>
            <td class="WADADataTableCell"><input type="text" name="transaction_subject" id="transaction_subject" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['transaction_subject'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><input type="text" name="rp_invoice_id" id="rp_invoice_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['rp_invoice_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><input type="text" name="recurring_payment_id" id="recurring_payment_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['recurring_payment_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_refunds['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=refunds" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_refunds == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
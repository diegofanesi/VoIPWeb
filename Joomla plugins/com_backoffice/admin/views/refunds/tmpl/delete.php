<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADADeleteContainer">
      <?php if ($this->totalRows_WADApaypal_refunds > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=refunds&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">ipn_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_gross']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">invoice:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['invoice']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">protection_eligibility:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['protection_eligibility']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_street:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_street']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_date:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_date']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_status:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">charset:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['charset']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_zip:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_zip']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_shipping']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_handling']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">first_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['first_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">memo:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['memo']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">last_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['last_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">product_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['product_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_fee:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_fee']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country_code:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_country_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">notify_version:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">reason_code:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['reason_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['custom']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_country:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_city:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_city']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">verify_sign:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">parent_txn_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['parent_txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">contact_phone:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['contact_phone']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">time_created:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['time_created']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">txn_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payment_type:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payment_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">payer_business_name:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['payer_business_name']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">address_state:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['address_state']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_email:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">receiver_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['receiver_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_currency:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['mc_currency']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">residence_country:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['residence_country']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">test_ipn:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['test_ipn']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">transaction_subject:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['transaction_subject']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">rp_invoice_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['rp_invoice_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">recurring_payment_id:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['recurring_payment_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_refunds['creation_timestamp']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=refunds" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_refunds['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_refunds == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
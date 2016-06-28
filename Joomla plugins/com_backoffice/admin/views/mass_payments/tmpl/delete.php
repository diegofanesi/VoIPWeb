<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

 <div class="WADADeleteContainer">
      <?php if ($this->totalRows_WADApaypal_mass_payments > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=mass_payments&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_mass_payments['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="34%" class="WADADataTableHeader">ID</th>
            <td width="66%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_mass_payments['created_timestamp']));
			?>
            </span></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['txn_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">MassPay Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['masspay_txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Total</th>
            <td class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_mass_payments['mc_gross'],2)); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">PayPal Fee</th>
            <td class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_mass_payments['mc_fee'],2)); ?></td>
          </tr>
          <?php
		  if($this->row_WADApaypal_mass_payments['mc_currency'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Currency</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['mc_currency']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Receiver Email Address</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['receiver_email']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payment Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['status']); ?></td>
          </tr>
          <?php
		  if($this->row_WADApaypal_mass_payments['unique_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Unique ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['unique_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_mass_payments['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=mass_payments&task=All" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_mass_payments['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_mass_payments == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
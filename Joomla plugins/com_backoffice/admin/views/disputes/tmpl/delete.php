<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

 <div class="WADADeleteContainer">
      <?php if ($this->totalRows_WADApaypal_disputes > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=disputes&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_disputes['id'])); ?>" method="post" name="WADADeleteForm" id="WADADeleteForm">
        <div class="WADAHeader">Delete Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <p class="WADAMessage">Are you sure you want to delete the following record?</p>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="34%" class="WADADataTableHeader">ID</th>
            <td width="66%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_disputes['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <?php
		  if($this->row_WADApaypal_disputes['case_creation_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Case Creation Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['case_creation_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_disputes['payment_date'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Payment Date</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['payment_date']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($this->row_WADApaypal_disputes['txn_type'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['txn_type']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Transaction ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['txn_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case Type</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['case_type']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Reason Code</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['reason_code']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Case ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['case_id']); ?></td>
          </tr>
          <?php
		  if($this->row_WADApaypal_disputes['receipt_id'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Receipt ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['receipt_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['payer_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Payer Email</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['payer_email']); ?></td>
          </tr>
          <?php
		  if($this->row_WADApaypal_disputes['invoice'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Invoice</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['invoice']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_disputes['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Notify Version</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['notify_version']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Verify Signature:</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['verify_sign']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Status</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['ipn_status']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Test?</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_disputes['test_ipn']); ?></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Delete" id="Delete" value="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=disputes" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADADeleteRecordID" type="hidden" id="WADADeleteRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_disputes['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_disputes == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>    
    <div class="WADAResultsContainer"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">PayPal Recurring Payment Profiles</div>
        <div><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Search">New Search</a> | <a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Insert&show_all=1">Show All</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles > 0) { // Show if recordset not empty ?>
      <div class="WADAResults">
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_recurring_payment_profiles + 1) ?> to <?php echo min($this->startRow_WADApaypal_recurring_payment_profiles + $this->maxRows_WADApaypal_recurring_payment_profiles, $this->totalRows_WADApaypal_recurring_payment_profiles) ?> of <?php echo $this->totalRows_WADApaypal_recurring_payment_profiles ?> </div>
          <div class="WADAResultsNavTop">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, 0, $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, max(0, $this->pageNum_WADApaypal_recurring_payment_profiles - 1), $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles < $this->totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, min($this->totalPages_WADApaypal_recurring_payment_profiles, $this->pageNum_WADApaypal_recurring_payment_profiles + 1), $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles < $this->totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, $this->totalPages_WADApaypal_recurring_payment_profiles, $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
          <div class="WADAResultsInsertButton"> <a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Insert" title="Insert"><img border="0" name="Insert" id="Insert" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
        </div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
          <tr>
            <th width="11%" class="WADAResultsTableHeader">IPN  Date</th>
            <th width="18%" class="WADAResultsTableHeader">Name</th>
            <th width="14%" class="WADAResultsTableHeader">Company</th>
            <th width="10%" class="WADAResultsTableHeader">Invoice </th>
            <th width="11%" class="WADAResultsTableHeader">Profile ID</th>
            <th width="11%" class="WADAResultsTableHeader">Profile Status</th>
            <th width="13%" class="WADAResultsTableHeader">Outstanding Balance</th>
            <th width="12%">&nbsp;</th>
          </tr>
          <?php do { ?>
          <tr 
		  <?php 
		  if($this->row_WADApaypal_recurring_payment_profiles['test_ipn'] == 1) 
		  	echo 'style="background-color:#FF9"';
		  elseif($this->row_WADApaypal_recurring_payment_profiles['ipn_status'] == 'Invalid')
		  	echo 'style="background-color:#F33; color:#FF9;"';
			?> 
            class="<?php echo $this->WARRT_AltClass1->getClass(true); ?>">
            <?php foreach ($this->row_WADApaypal_recurring_payment_profiles as &$value) { ?>
            <td class="WADAResultsTableCell">
            <?php 
			echo date('m.d.Y g:i:s A', strtotime($value['creation_timestamp']));
			?>
			
			</td>
            <td class="WADAResultsTableCell"><?php echo($value['first_name']); ?> <?php echo($value['last_name']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($value['payer_business_name']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($value['rp_invoice_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($value['recurring_payment_id']); ?></td>
            <td class="WADAResultsTableCell"><?php echo($value['profile_status']); ?></td>
            <td class="WADAResultsTableCell">$<?php echo(number_format($value['outstanding_balance'],2)); ?></td>
            <td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
              <tr>
                <td><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Detail&id=<?php echo(rawurlencode($value['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($value['id'])); ?>" id="View<?php echo(rawurlencode($value['id'])); ?>" alt="View" src="../WA_DataAssist/images/Pacifica/Refined_zoom.gif" /></a></td>
                <td><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Update&id=<?php echo(rawurlencode($value['id'])); ?>" title="Update"><img border="0" name="Update<?php echo(rawurlencode($value['id'])); ?>" id="Update<?php echo(rawurlencode($value['id'])); ?>" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_edit.gif" /></a></td>
                <td><a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Delete&id=<?php echo(rawurlencode($value['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($value['id'])); ?>" id="Delete<?php echo(rawurlencode($value['id'])); ?>" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_trash.gif" /></a></td>
                </tr>
            </table></td>
          </tr>
          <?php unset($value);} // break the reference with the last element?>
          <?php } while ($this->row_WADApaypal_recurring_payment_profiles = ($this->WADApaypal_recurring_payment_profiles)); ?>
        </table>
        <div class="WADAResultsNavigation">
          <div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_recurring_payment_profiles + 1) ?> to <?php echo min($this->startRow_WADApaypal_recurring_payment_profiles + $this->maxRows_WADApaypal_recurring_payment_profiles, $this->totalRows_WADApaypal_recurring_payment_profiles) ?> of <?php echo $this->totalRows_WADApaypal_recurring_payment_profiles ?> </div>
          <div class="WADAResultsNavBottom">
            <table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
              <tr valign="middle">
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, 0, $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="../WA_DataAssist/images/Pacifica/Refined_first.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, max(0, $this->pageNum_WADApaypal_recurring_payment_profiles - 1), $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="../WA_DataAssist/images/Pacifica/Refined_previous.gif" /></a>
                  <?php } // Show if not first page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles < $this->totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, min($this->totalPages_WADApaypal_recurring_payment_profiles, $this->pageNum_WADApaypal_recurring_payment_profiles + 1), $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="../WA_DataAssist/images/Pacifica/Refined_next.gif" /></a>
                  <?php } // Show if not last page ?></td>
                <td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_recurring_payment_profiles < $this->totalPages_WADApaypal_recurring_payment_profiles) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_WADApaypal_recurring_payment_profiles=%d%s", $this->currentPage, $this->totalPages_WADApaypal_recurring_payment_profiles, $this->queryString_WADApaypal_recurring_payment_profiles); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="../WA_DataAssist/images/Pacifica/Refined_last.gif" /></a>
                  <?php } // Show if not last page ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_recurring_payment_profiles == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No results for your search</div>
        <div> <a href="index.php?option=com_backoffice&view=recurring_payment_profile&task=Insert" title="Insert"><img border="0" name="Insert1" id="Insert1" alt="Insert" src="../WA_DataAssist/images/Pacifica/Refined_insert.gif" /></a></div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
 
<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADAResultsContainer"> <a name="top" id="top"></a>
  <div id="WADAPageTitleArea">
	<div id="WADAPageTitle">PayPal IPN Orders</div>
	<div><a href="index.php?option=com_backoffice&view=orders&task=Search">New Search</a> | <a href="index.php?option=com_backoffice&view=orders&show_all=1"> Show All</a></div>
  </div>
  <div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
  <?php if ($this->totalRows_WADApaypal_orders > 0) { // Show if recordset not empty ?>
  <div class="WADAResults">
	<div class="WADAResultsNavigation">
	  <div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_orders + 1) ?> to <?php echo min($this->startRow_WADApaypal_orders + $this->maxRows_WADApaypal_orders, $this->totalRows_WADApaypal_orders) ?> of <?php echo $this->totalRows_WADApaypal_orders ?> </div>
	  <div class="WADAResultsNavTop">
		<table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
		  <tr valign="middle">
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , 0, $this->queryString_WADApaypal_orders); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_first.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , max(0, $this->pageNum_WADApaypal_orders - 1), $this->queryString_WADApaypal_orders); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_previous.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders < $this->totalPages_WADApaypal_orders) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , min($this->totalPages_WADApaypal_orders, $this->pageNum_WADApaypal_orders + 1), $this->queryString_WADApaypal_orders); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_next.gif" /></a>
			  <?php } // Show if not last page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders < $this->totalPages_WADApaypal_orders) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , $this->totalPages_WADApaypal_orders, $this->queryString_WADApaypal_orders); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_last.gif" /></a>
			  <?php } // Show if not last page ?></td>
		  </tr>
		</table>
	  </div>
	  <div class="WADAResultsInsertButton"> <a href="index.php?option=com_backoffice&view=orders&task=Insert" title="Insert"><img border="0" name="Insert" id="Insert" alt="Insert" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_insert.gif" /></a></div>
	</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
	  <tr>
		<th width="8%" class="WADAResultsTableHeader">Order #</th>
		<th width="15%" class="WADAResultsTableHeader">Payment Date</th>
		<th width="16%" class="WADAResultsTableHeader">Name</th>
		<th width="14%" class="WADAResultsTableHeader">Company</th>
		<th width="10%" class="WADAResultsTableHeader">Total</th>
		<th width="16%" class="WADAResultsTableHeader">Payment Status</th>
		<th width="9%" class="WADAResultsTableHeader">Invoice</th>
		<th width="12%">&nbsp;</th>
	  </tr>
	  <?php $currentRows_WADApaypal_orders = 0;
			do {
		?>
	  <tr 
	  <?php
	  if($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['test_ipn'] == 1 && $this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['ipn_status'] != 'Invalid') 
	  	echo 'style="background-color:#FF9"';
	  elseif($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['ipn_status'] == 'Invalid')
	  	echo 'style="background-color:#F33; color:#FF9;"';
		?>
		class="<?php echo $WARRT_AltClass1; ?>">
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id']); ?></td>
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['payment_date']); ?></td>
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['first_name']); ?> <?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['last_name']); ?></td>
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['payer_business_name']); ?></td>
		<td class="WADAResultsTableCell">$<?php echo(number_format($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['mc_gross'],2)); ?></td>
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['payment_status']); ?></td>
		<td class="WADAResultsTableCell"><?php echo($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['invoice']); ?></td>
		<td class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
		  <tr>
			<td><a href="index.php?option=com_backoffice&view=orders&task=Detail&id=<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" id="View<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" alt="View" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_zoom.gif" /></a></td>
			<td><a href="index.php?option=com_backoffice&view=orders&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" title="Update"><img border="0" name="Update<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" id="Update<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" alt="Update" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_edit.gif" /></a></td>
			<td><a href="index.php?option=com_backoffice&view=orders&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" id="Delete<?php echo(rawurlencode($this->row_WADApaypal_orders[$currentRows_WADApaypal_orders]['id'])); ?>" alt="Delete" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_trash.gif" /></a></td>
			</tr>
		</table></td>
	  </tr>
	  <?php $currentRows_WADApaypal_orders++;
			} while (((($this->startRow_WADApaypal_orders + $currentRows_WADApaypal_orders) < $this->totalRows_WADApaypal_orders))
				&& $currentRows_WADApaypal_orders < $this->maxRows_WADApaypal_orders); ?>
	</table>
	<div class="WADAResultsNavigation">
	  <div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_orders + 1) ?> to <?php echo min($this->startRow_WADApaypal_orders + $this->maxRows_WADApaypal_orders, $this->totalRows_WADApaypal_orders) ?> of <?php echo $this->totalRows_WADApaypal_orders ?> </div>
	  <div class="WADAResultsNavBottom">
		<table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
		  <tr valign="middle">
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , 0, $this->queryString_WADApaypal_orders); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_first.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , max(0, $this->pageNum_WADApaypal_orders - 1), $this->queryString_WADApaypal_orders); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_previous.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders < $this->totalPages_WADApaypal_orders) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , min($this->totalPages_WADApaypal_orders, $this->pageNum_WADApaypal_orders + 1), $this->queryString_WADApaypal_orders); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_next.gif" /></a>
			  <?php } // Show if not last page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_orders < $this->totalPages_WADApaypal_orders) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_orders=%d%s", $this->pageNum_WADApaypal_orders , $this->totalPages_WADApaypal_orders, $this->queryString_WADApaypal_orders); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_last.gif" /></a>
			  <?php } // Show if not last page ?></td>
		  </tr>
		</table>
	  </div>
	</div>
  </div>
  <?php } // Show if recordset not empty ?>
  <?php if ($this->totalRows_WADApaypal_orders == 0) { // Show if recordset empty ?>
  <div class="WADANoResults">
	<div class="WADANoResultsMessage">No results for your search</div>
	<div> <a href="orders-insert.php" title="Insert"><img border="0" name="Insert1" id="Insert1" alt="Insert" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_insert.gif" /></a></div>
  </div>
  <?php } // Show if recordset empty ?>
</div>

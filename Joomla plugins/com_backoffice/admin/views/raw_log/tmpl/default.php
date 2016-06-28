<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADAResultsContainer"> <a name="top" id="top"></a>
	<div id="WADAPageTitleArea">
		<div id="WADAPageTitle">PayPal IPN Raw Data Log</div>
		<div><a href="index.php?option=com_backoffice&view=raw_log&task=Search">New Search</a> | <a href="index.php?option=com_backoffice&view=raw_log&show_all=1">Show All</a></div>
	</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
<?php if ($this->totalRows_WADApaypal_raw_log > 0) { // Show if recordset not empty ?>
	<div class="WADAResults">
		<div class="WADAResultsNavigation">
			<div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_raw_log + 1) ?> to <?php echo min($this->startRow_WADApaypal_raw_log + $this->maxRows_WADApaypal_raw_log, $this->totalRows_WADApaypal_raw_log) ?> of <?php echo $this->totalRows_WADApaypal_raw_log ?> </div>
			<div class="WADAResultsNavTop">
				<table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
				  <tr valign="middle">
					<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log > 0) { // Show if not first page ?>
					  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, 0, $this->queryString_WADApaypal_raw_log); ?>" title="First"><img border="0" name="First" id="First" alt="First" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_first.gif" /></a>
					  <?php } // Show if not first page ?></td>
					<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log > 0) { // Show if not first page ?>
					  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, max(0, $this->pageNum_WADApaypal_raw_log - 1), $this->queryString_WADApaypal_raw_log); ?>" title="Previous"><img border="0" name="Previous" id="Previous" alt="Previous" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_previous.gif" /></a>
					  <?php } // Show if not first page ?></td>
					<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log < $this->totalPages_WADApaypal_raw_log) { // Show if not last page ?>
					  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, min($this->totalPages_WADApaypal_raw_log, $this->pageNum_WADApaypal_raw_log + 1), $this->queryString_WADApaypal_raw_log); ?>" title="Next"><img border="0" name="Next" id="Next" alt="Next" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_next.gif" /></a>
					  <?php } // Show if not last page ?></td>
					<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log < $this->totalPages_WADApaypal_raw_log) { // Show if not last page ?>
					  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, $this->totalPages_WADApaypal_raw_log, $this->queryString_WADApaypal_raw_log); ?>" title="Last"><img border="0" name="Last" id="Last" alt="Last" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_last.gif" /></a>
					  <?php } // Show if not last page ?></td>
				  </tr>
				</table>
		  </div>
		  <div class="WADAResultsInsertButton"></div>
	</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADAResultsTable">
	  <tr>
		<th width="21%" class="WADAResultsTableHeader">IPN Date</th>
		<th width="71%" class="WADAResultsTableHeader">IPN Data</th>
		<th width="8%">&nbsp;</th>
	  </tr>
	  <?php $currentRows_WADApaypal_raw_log = 0;
			do { ?>
	  <tr class="<?php echo $WARRT_AltClass1; ?>">
		<td  width="21%" class="WADAResultsTableCell">
		<?php 
		echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['created_timestamp']));
		?>
		</td>
		<td  width="71%" class="WADAResultsTableCell"><?php echo substr($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['ipn_data_serialized'],0,90) . '...'; ?></td>
		<td  width="8%" class="WADAResultsEditButtons" nowrap="nowrap"><table class="WADAEditButton_Table">
		  <tr>
			<td><a href="index.php?option=com_backoffice&view=raw_log&task=Detail&id=<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" title="View"><img border="0" name="View<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" id="View<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" alt="View" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_zoom.gif" /></a></td>
			<td><a href="index.php?option=com_backoffice&view=raw_log&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" title="Delete"><img border="0" name="Delete<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" id="Delete<?php echo(rawurlencode($this->row_WADApaypal_raw_log[$currentRows_WADApaypal_raw_log]['id'])); ?>" alt="Delete" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_trash.gif" /></a></td>
		  </tr>
		</table></td>
	  </tr>
	  <?php $currentRows_WADApaypal_raw_log++;
			} while (((($this->startRow_WADApaypal_raw_log + $currentRows_WADApaypal_raw_log) < $this->totalRows_WADApaypal_raw_log)) && $currentRows_WADApaypal_raw_log < $this->maxRows_WADApaypal_raw_log);?>
	</table>
	<div class="WADAResultsNavigation">
	  <div class="WADAResultsCount">Records <?php echo ($this->startRow_WADApaypal_raw_log + 1) ?> to <?php echo min($this->startRow_WADApaypal_raw_log + $this->maxRows_WADApaypal_raw_log, $this->totalRows_WADApaypal_raw_log) ?> of <?php echo $this->totalRows_WADApaypal_raw_log ?> </div>
	  <div class="WADAResultsNavBottom">
		<table border="0" cellpadding="0" cellspacing="0" class="WADAResultsNavTable">
		  <tr valign="middle">
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, 0, $this->queryString_WADApaypal_raw_log); ?>" title="First"><img border="0" name="First1" id="First1" alt="First" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_first.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log > 0) { // Show if not first page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, max(0, $this->pageNum_WADApaypal_raw_log - 1), $this->queryString_WADApaypal_raw_log); ?>" title="Previous"><img border="0" name="Previous1" id="Previous1" alt="Previous" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_previous.gif" /></a>
			  <?php } // Show if not first page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log < $this->totalPages_WADApaypal_raw_log) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, min($this->totalPages_WADApaypal_raw_log, $this->pageNum_WADApaypal_raw_log + 1), $this->queryString_WADApaypal_raw_log); ?>" title="Next"><img border="0" name="Next1" id="Next1" alt="Next" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_next.gif" /></a>
			  <?php } // Show if not last page ?></td>
			<td class="WADAResultsNavButtonCell" nowrap="nowrap"><?php if ($this->pageNum_WADApaypal_raw_log < $this->totalPages_WADApaypal_raw_log) { // Show if not last page ?>
			  <a href="<?php printf("%s?pageNum_WADApaypal_raw_log=%d%s", $this->currentPage, $this->totalPages_WADApaypal_raw_log, $this->queryString_WADApaypal_raw_log); ?>" title="Last"><img border="0" name="Last1" id="Last1" alt="Last" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_last.gif" /></a>
			  <?php } // Show if not last page ?></td>
		  </tr>
		</table>
	  </div>
	</div>
</div>
<?php } // Show if recordset not empty ?>
<?php if ($this->totalRows_WADApaypal_raw_log == 0) { // Show if recordset empty ?>
<div class="WADANoResults">
<div class="WADANoResultsMessage">No results for your search</div>
<div></div>
</div>
<?php } // Show if recordset empty ?>
</div>

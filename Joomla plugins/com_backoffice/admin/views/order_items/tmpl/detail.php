<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

  <div class="WADADetailsContainer1"> <a name="top" id="top"></a>
      <div id="WADAPageTitleArea">
        <div id="WADAPageTitle">Order Item Details</div>
        <div><a href="index.php?option=com_backoffice&view=order_items&task=Search">New Search</a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php if ($this->totalRows_WADApaypal_order_items > 0) { // Show if recordset not empty ?>
      <div id="WADADetails">
        <div class="WADAHeader">Details</div>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="WADADataTable">
          <tr>
            <th width="32%" class="WADADataTableHeader">ID</th>
            <td width="68%" class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">IPN Date</th>
            <td class="WADADataTableCell"><span class="WADAResultsTableCell">
              <?php 
			echo date('m.d.Y g:i:s A', strtotime($this->row_WADApaypal_order_items['creation_timestamp']));
			?>
            </span></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($this->row_WADApaypal_order_items['order_id'] != '' && $this->row_WADApaypal_order_items['order_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Order ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['order_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['refund_id'] != '' && $this->row_WADApaypal_order_items['refund_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Refund ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['refund_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['subscr_id'] != '' && $this->row_WADApaypal_order_items['subscr_id'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Standard Subscription ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['subscr_id']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <th class="WADADataTableHeader">Raw Log ID</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['raw_log_id']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">&nbsp;</th>
            <td class="WADADataTableCell">&nbsp;</td>
          </tr>
          <?php
		  if($this->row_WADApaypal_order_items['item_name'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Name</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['item_name']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['item_number'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Item Number</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['item_number']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['on0'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Option 1</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on0']); ?>: <?php echo($this->row_WADApaypal_order_items['os0']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['on1'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Option 2</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on1']); ?>: <?php echo($this->row_WADApaypal_order_items['os1']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 3</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on2']); ?>: <?php echo($this->row_WADApaypal_order_items['os2']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 4</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on3']); ?>: <?php echo($this->row_WADApaypal_order_items['os3']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 5</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on4']); ?>: <?php echo($this->row_WADApaypal_order_items['os4']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 6</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on5']); ?>: <?php echo($this->row_WADApaypal_order_items['os5']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 7</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on6']); ?>: <?php echo($this->row_WADApaypal_order_items['os6']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 8</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on7']); ?>: <?php echo($this->row_WADApaypal_order_items['os7']); ?></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">Option 9</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['on8']); ?>: <?php echo($this->row_WADApaypal_order_items['os8']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['quantity'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">QTY</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['quantity']); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['mc_gross'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Price</th>
            <td class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_order_items['mc_gross'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['mc_handling'] != '' && $this->row_WADApaypal_order_items['mc_handling'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Handling</th>
            <td class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_order_items['mc_handling'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['mc_shipping'] != '' && $this->row_WADApaypal_order_items['mc_shipping'] != 0)
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Shipping</th>
            <td class="WADADataTableCell">$<?php echo(number_format($this->row_WADApaypal_order_items['mc_shipping'],2)); ?></td>
          </tr>
          <?php
		  }
		  ?>
          <?php
		  if($this->row_WADApaypal_order_items['custom'] != '')
		  {
		  ?>
          <tr>
            <th class="WADADataTableHeader">Custom</th>
            <td class="WADADataTableCell"><?php echo($this->row_WADApaypal_order_items['custom']); ?></td>
          </tr>
          <?php
		  }
		  ?>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=order_items&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_order_items['id'])); ?>" title="Update"><img border="0" name="Update" id="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=order_items&task=Delete&id=<?php echo(rawurlencode($this->row_WADApaypal_order_items['id'])); ?>" title="Delete"><img border="0" name="Delete" id="Delete" alt="Delete" src="../WA_DataAssist/images/Pacifica/Refined_delete.gif" /></a></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=order_items" title="Results"><img border="0" name="Results" id="Results" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></td>
            </tr>
          </table>
        </div>
      </div>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_order_items == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <div class="WADADetailsLinkArea">
        <div class="WADADataNavButtonCell"><a href="index.php?option=com_backoffice&view=order_items" title="Results"><img border="0" name="Results1" id="Results1" alt="Results" src="../WA_DataAssist/images/Pacifica/Refined_results.gif" /></a></div>
      </div>
      <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
      <?php } // Show if recordset empty ?>
    </div>
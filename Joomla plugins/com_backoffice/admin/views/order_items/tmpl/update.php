<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="WADAUpdateContainer">
      <?php if ($this->totalRows_WADApaypal_order_items > 0) { // Show if recordset not empty ?>
      <form action="index.php?option=com_backoffice&view=order_items&task=Update&id=<?php echo(rawurlencode($this->row_WADApaypal_order_items['id'])); ?>" method="post" name="WADAUpdateForm" id="WADAUpdateForm">
        <div class="WADAHeader">Update Record</div>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <th class="WADADataTableHeader">order_id:</th>
            <td class="WADADataTableCell"><input type="text" name="order_id" id="order_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['order_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">refund_id:</th>
            <td class="WADADataTableCell"><input type="text" name="refund_id" id="refund_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['refund_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">subscr_id:</th>
            <td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['subscr_id'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_name:</th>
            <td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['item_name'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">item_number:</th>
            <td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['item_number'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os0:</th>
            <td class="WADADataTableCell"><input type="text" name="os0" id="os0" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['os0'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on0:</th>
            <td class="WADADataTableCell"><input type="text" name="on0" id="on0" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['on0'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">os1:</th>
            <td class="WADADataTableCell"><input type="text" name="os1" id="os1" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['os1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">on1:</th>
            <td class="WADADataTableCell"><input type="text" name="on1" id="on1" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['on1'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">quantity:</th>
            <td class="WADADataTableCell"><input type="text" name="quantity" id="quantity" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['quantity'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">custom:</th>
            <td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['custom'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_gross:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['mc_gross'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_handling:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_handling" id="mc_handling" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['mc_handling'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">mc_shipping:</th>
            <td class="WADADataTableCell"><input type="text" name="mc_shipping" id="mc_shipping" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['mc_shipping'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">creation_timestamp:</th>
            <td class="WADADataTableCell"><input type="text" name="creation_timestamp" id="creation_timestamp" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['creation_timestamp'])); ?>" size="32" /></td>
          </tr>
          <tr>
            <th class="WADADataTableHeader">raw_log_id:</th>
            <td class="WADADataTableCell"><input type="text" name="raw_log_id" id="raw_log_id" value="<?php echo(str_replace('"', '&quot;', $this->row_WADApaypal_order_items['raw_log_id'])); ?>" size="32" /></td>
          </tr>
        </table>
        <div class="WADAHorizLine"><img src="../WA_DataAssist/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
        <div class="WADAButtonRow">
          <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Update" id="Update" value="Update" alt="Update" src="../WA_DataAssist/images/Pacifica/Refined_update.gif"  /></td>
              <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=order_items" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="../WA_DataAssist/images/Pacifica/Refined_cancel.gif" /></a></td>
            </tr>
          </table>
          <input name="WADAUpdateRecordID" type="hidden" id="WADAUpdateRecordID" value="<?php echo(rawurlencode($this->row_WADApaypal_order_items['id'])); ?>" />
        </div>
      </form>
      <?php } // Show if recordset not empty ?>
      <?php if ($this->totalRows_WADApaypal_order_items == 0) { // Show if recordset empty ?>
      <div class="WADANoResults">
        <div class="WADANoResultsMessage">No record found.</div>
      </div>
      <?php } // Show if recordset empty ?>
    </div>
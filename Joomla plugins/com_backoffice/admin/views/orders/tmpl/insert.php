<?php
require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'Helper.php');
// No direct access
defined('_JEXEC') or die('Restricted access');
?>
<div class="WADAInsertContainer">
  <form action="index.php?option=com_backoffice&view=orders&task=Insert" method="post" name="WADAInsertForm" id="WADAInsertForm">
	<div class="WADAHeader">Insert Record</div>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<table class="WADADataTable" cellpadding="0" cellspacing="0" border="0">
	  <tr>
		<th class="WADADataTableHeader">first_name:</th>
		<td class="WADADataTableCell"><input type="text" name="first_name" id="first_name" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">last_name:</th>
		<td class="WADADataTableCell"><input type="text" name="last_name" id="last_name" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_street:</th>
		<td class="WADADataTableCell"><input type="text" name="address_street2" id="address_street2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_city:</th>
		<td class="WADADataTableCell"><input type="text" name="address_city2" id="address_city2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_state:</th>
		<td class="WADADataTableCell"><input type="text" name="address_state2" id="address_state2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_zip:</th>
		<td class="WADADataTableCell"><input type="text" name="address_zip2" id="address_zip2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_country:</th>
		<td class="WADADataTableCell"><input type="text" name="address_country2" id="address_country2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_status:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_status2" id="payer_status2" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">receiver_email:</th>
		<td class="WADADataTableCell"><input type="text" name="receiver_email" id="receiver_email" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_status:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_status" id="payment_status" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">pending_reason:</th>
		<td class="WADADataTableCell"><input type="text" name="pending_reason" id="pending_reason" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_date:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_date" id="payment_date" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_gross:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_gross" id="mc_gross" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_fee:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_fee" id="mc_fee" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">tax:</th>
		<td class="WADADataTableCell"><input type="text" name="tax" id="tax" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">mc_currency:</th>
		<td class="WADADataTableCell"><input type="text" name="mc_currency" id="mc_currency" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">txn_id:</th>
		<td class="WADADataTableCell"><input type="text" name="txn_id" id="txn_id" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">txn_type:</th>
		<td class="WADADataTableCell"><input type="text" name="txn_type" id="txn_type" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_status:</th>
		<td class="WADADataTableCell"><input type="text" name="address_status" id="address_status" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_email:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_email" id="payer_email" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payment_type:</th>
		<td class="WADADataTableCell"><input type="text" name="payment_type" id="payment_type" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_name:</th>
		<td class="WADADataTableCell"><input type="text" name="address_name" id="address_name" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">protection_eligibility:</th>
		<td class="WADADataTableCell"><input type="text" name="protection_eligibility" id="protection_eligibility" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">ipn_status:</th>
		<td class="WADADataTableCell"><input type="text" name="ipn_status" id="ipn_status" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">subscr_id:</th>
		<td class="WADADataTableCell"><input type="text" name="subscr_id" id="subscr_id" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">custom:</th>
		<td class="WADADataTableCell"><input type="text" name="custom" id="custom" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">reason_code:</th>
		<td class="WADADataTableCell"><input type="text" name="reason_code" id="reason_code" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">contact_phone:</th>
		<td class="WADADataTableCell"><input type="text" name="contact_phone" id="contact_phone" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">item_name:</th>
		<td class="WADADataTableCell"><input type="text" name="item_name" id="item_name" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">item_number:</th>
		<td class="WADADataTableCell"><input type="text" name="item_number" id="item_number" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">invoice:</th>
		<td class="WADADataTableCell"><input type="text" name="invoice" id="invoice" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">for_auction:</th>
		<td class="WADADataTableCell"><input type="text" name="for_auction" id="for_auction" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_buyer_id:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_buyer_id" id="auction_buyer_id" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_closing_date:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_closing_date" id="auction_closing_date" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">auction_multi_item:</th>
		<td class="WADADataTableCell"><input type="text" name="auction_multi_item" id="auction_multi_item" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">address_country_code:</th>
		<td class="WADADataTableCell"><input type="text" name="address_country_code" id="address_country_code" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">payer_business_name:</th>
		<td class="WADADataTableCell"><input type="text" name="payer_business_name" id="payer_business_name" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">receiver_id:</th>
		<td class="WADADataTableCell"><input type="text" name="receiver_id" id="receiver_id" value="" size="32" /></td>
	  </tr>
	  <tr>
		<th class="WADADataTableHeader">test_ipn:</th>
		<td class="WADADataTableCell"><input type="text" name="test_ipn" id="test_ipn" value="" size="32" /></td>
	  </tr>
	</table>
	<div class="WADAHorizLine"><img src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/_tx_.gif" alt="" height="1" width="1" border="0" /></div>
	<div class="WADAButtonRow">
	  <table class="WADADataNavButtons" border="0" cellpadding="0" cellspacing="0">
		<tr>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><input type="image" name="Insert" id="Insert" value="Insert" alt="Insert" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_insert.gif"  /></td>
		  <td class="WADADataNavButtonCell" nowrap="nowrap"><a href="index.php?option=com_backoffice&view=orders" title="Cancel"><img border="0" name="Cancel" id="Cancel" alt="Cancel" src="http://localhost/joomlaRC1stage/administrator/components/com_backoffice/images/Refined_cancel.gif" /></a></td>
		</tr>
	  </table>
	  <input name="WADAInsertRecordID" type="hidden" id="WADAInsertRecordID" value="" />
	</div>
  </form>
</div>

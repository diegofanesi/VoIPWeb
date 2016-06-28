<?php
jimport('joomla.application.component.model');

class BackofficeModelBackoffice extends JModel
{
	function getRawLog($query_WADApaypal_raw_log, $startRow_WADApaypal_raw_log, $maxRows_WADApaypal_raw_log){
		//$sql = "SELECT id, created_timestamp, ipn_data_serialized FROM
		//paypal_ipn_raw_log ORDER BY id DESC";
		$query_limit_WADApaypal_raw_log = sprintf("%s LIMIT %d, %d", $query_WADApaypal_raw_log, $startRow_WADApaypal_raw_log, $maxRows_WADApaypal_raw_log);
		$this->_db->setQuery($query_limit_WADApaypal_raw_log);
		return $this->_db->loadAssocList();
	}

	function getAllRawLog(){
		$sql = "SELECT id, created_timestamp, ipn_data_serialized FROM
		paypal_ipn_raw_log ORDER BY id DESC";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}
	function getRawLogById($Paramid_WADApaypal_raw_log, $Paramid2_WADApaypal_raw_log, $ParamSessionid_WADApaypal_raw_log){
		$sql = "SELECT id, created_timestamp, ipn_data_serialized FROM
		paypal_ipn_raw_log WHERE id=".$Paramid_WADApaypal_raw_log;
		$sql .= " OR ( -1= ".GetSQLValueString($Paramid2_WADApaypal_raw_log, "int").
			" AND id=".GetSQLValueString($ParamSessionid_WADApaypal_raw_log, "int").");";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRawLogDelete($Paramid_WADApaypal_raw_log){
		$sql = "SELECT id, created_timestamp, ipn_data_serialized
		FROM paypal_ipn_raw_log WHERE id = ".GetSQLValueString($Paramid_WADApaypal_raw_log, "int").";";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrders($query_WADApaypal_orders, $startRow_WADApaypal_orders, $maxRows_WADApaypal_orders){
		//$sql = "SELECT id, receiver_email, payment_status, pending_reason,
		//payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type,
		//first_name, last_name, address_street, address_city, address_state,
		//address_zip, address_country, address_status, payer_email, payer_status,
		//payment_type, notify_version, verify_sign, address_name, protection_eligibility,
		//ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number,
		//invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item,
		//creation_timestamp, address_country_code, payer_business_name, receiver_id, test_ipn
		//FROM paypal_ipn_orders ORDER BY id DESC ";
		$query_limit_WADApaypal_orders = sprintf("%s LIMIT %d, %d", $query_WADApaypal_orders, $startRow_WADApaypal_orders, $maxRows_WADApaypal_orders);
		$this->_db->setQuery($query_limit_WADApaypal_orders);
		return $this->_db->loadAssocList();
	}
	function getOrdersAll(){
		$sql= "SELECT id, receiver_email, payment_status, pending_reason,
		payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type,
		first_name, last_name, address_street, address_city, address_state,
		address_zip, address_country, address_status, payer_email, payer_status,
		payment_type, notify_version, verify_sign, address_name, protection_eligibility,
		ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number,
		invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item,
		creation_timestamp, address_country_code, payer_business_name, receiver_id, test_ipn
		FROM paypal_ipn_orders ORDER BY id DESC;";
		//setQueryBuilderSource($query_WADApaypal_orders,$WADbSearch1,false);
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}
	function getOrdersById($Paramid_WADApaypal_orders, $Paramid2_WADApaypal_orders, $ParamSessionid_WADApaypal_orders){
		$sql = "SELECT id, receiver_email, payment_status, pending_reason,
		memo, payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type,
		first_name, last_name, address_street, address_city, address_state,
		address_zip, address_country, address_status, payer_email, payer_status,
		payment_type, notify_version, verify_sign, address_name,
		protection_eligibility, ipn_status, subscr_id, custom,
		reason_code, contact_phone, item_name, item_number, invoice,
		for_auction, auction_buyer_id, auction_closing_date, auction_multi_item,
		handling_amount, shipping_discount, insurance_amount, creation_timestamp,
		address_country_code, payer_business_name, btn_id, option_name1,
		option_selection1, option_name2, option_selection2, shipping_method,
		transaction_subject, receiver_id, test_ipn, mc_shipping, shipping
		FROM paypal_ipn_orders WHERE
		id = ".GetSQLValueString($Paramid_WADApaypal_orders, "int").
		" OR ( -1= ".GetSQLValueString($Paramid2_WADApaypal_orders, "int").
		" AND id= ".GetSQLValueString($ParamSessionid_WADApaypal_orders, "int").");";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrdersItemById($varOrderID_rsOrderItems){
		$sql = "SELECT * FROM paypal_ipn_order_items
		WHERE order_id = ".GetSQLValueString($varOrderID_rsOrderItems, "int").";";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrdersUpdate($Paramid_WADApaypal_orders){
		$sql = "SELECT id, receiver_email, payment_status, pending_reason,
		payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type,
		first_name, last_name, address_street, address_city, address_state,
		address_zip, address_country, address_status, payer_email, payer_status,
		payment_type, address_name, protection_eligibility, ipn_status,
		subscr_id, custom, reason_code, contact_phone, item_name, item_number,
		invoice, for_auction, auction_buyer_id, auction_closing_date,
		auction_multi_item, creation_timestamp, address_country_code,
		payer_business_name, receiver_id, test_ipn
		FROM paypal_ipn_orders WHERE id = ".GetSQLValueString($Paramid_WADApaypal_orders, "int").";";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrdersDelete($Paramid_WADApaypal_orders){
		$sql = "SELECT id, receiver_email, payment_status, pending_reason,
		payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type,
		first_name, last_name, address_street, address_city, address_state,
		address_zip, address_country, address_status, payer_email, payer_status,
		payment_type, notify_version, verify_sign, address_name,
		protection_eligibility, ipn_status, subscr_id, custom, reason_code,
		contact_phone, item_name, item_number, invoice, for_auction,
		auction_buyer_id, auction_closing_date, auction_multi_item,
		creation_timestamp, address_country_code, payer_business_name,
		receiver_id, test_ipn FROM paypal_ipn_orders WHERE id = ".GetSQLValueString($Paramid_WADApaypal_orders, "int").";";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrderItems($query_WADApaypal_order_items, $startRow_WADApaypal_order_items, $maxRows_WADApaypal_order_items){
		$sql = "SELECT id, order_id, refund_id, item_name, item_number, os0,
		on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM 
		paypal_ipn_order_items ORDER BY id DESC";
		setQueryBuilderSource($query_WADApaypal_order_items,$WADbSearch1,false);
		$sql .= $query_WADApaypal_order_items." LIMIT ".$startRow_WADApaypal_order_items.",". $maxRows_WADApaypal_order_items;
	}
	function getAllTable($table){
		$sql = "SELECT id FROM
		paypal_ipn_".$table;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}
	
	function getRecurringPaymentResult($query_WADApaypal_recurring_payments, $startRow_WADApaypal_recurring_payments, $maxRows_WADApaypal_recurring_payments){
		//$sql = "SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, 
		//payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, 
		//mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, 
		//rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn 
		//FROM paypal_ipn_recurring_payments ORDER BY id DESC";
		$query_limit_WADApaypal_recurring_payments = sprintf("%s LIMIT %d, %d", $query_WADApaypal_recurring_payments, $startRow_WADApaypal_recurring_payments, $maxRows_WADApaypal_recurring_payments);
		$this->_db->setQuery($query_limit_WADApaypal_recurring_payments);
		return $this->_db->loadAssocList();
	}
	function getRecurringPaymentProfilesDelete($Paramid_WADApaypal_recurring_payment_profiles){
		$sql ="SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount,
		rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, 
		payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, 
		product_name, ipn_status, creation_timestamp, test_ipn FROM paypal_ipn_recurring_payment_profiles 
		WHERE id = ".GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int").";";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentProfilesResult($query_WADApaypal_recurring_payment_profiles, $startRow_WADApaypal_recurring_payment_profiles, $maxRows_WADApaypal_recurring_payment_profiles){
		//$sql = "SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, 
		//initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, 
		//payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, 
		//profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, 
		//creation_timestamp, test_ipn FROM paypal_ipn_recurring_payment_profiles ORDER BY id DESC";
		$query_limit_WADApaypal_recurring_payment_profiles = sprintf("%s LIMIT %d, %d", $query_WADApaypal_recurring_payment_profiles, $startRow_WADApaypal_recurring_payment_profiles, $maxRows_WADApaypal_recurring_payment_profiles);
		//echo $query_limit_WADApaypal_recurring_payment_profiles;
		$this->_db->setQuery($query_limit_WADApaypal_recurring_payment_profiles);
		return $this->_db->loadAssocList();
	}

	function getRecurringPaymentProfilesDetail($Paramid_WADApaypal_recurring_payment_profiles, $Paramid2_WADApaypal_recurring_payment_profiles, $ParamSessionid_WADApaypal_recurring_payment_profiles){
		$sql = "SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, 
		initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, 
		payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, 
		profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, 
		creation_timestamp, test_ipn FROM paypal_ipn_recurring_payment_profiles WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_recurring_payment_profiles, "int")." AND id= ".
		GetSQLValueString($ParamSessionid_WADApaypal_recurring_payment_profiles, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	
	function deleteRow($WA_table, $deleteParamsObj){
		$sql = "DELETE FROM " . $WA_table . " WHERE " . $deleteParamsObj->sqlWhereClause;
		$this->_db->setQuery($sql);
		//echo $sql;
		return $this->_db->loadAssoc();
	}

	function insertRow($WA_table, $insertParamsObj){
		$sql = "INSERT INTO " . $WA_table . " (" .$insertParamsObj->WA_tableValues . ") VALUES (" . $insertParamsObj->WA_dbValues . ")";
		//echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function updateRow($WA_table, $updateParamsObj, $WhereObj){
		$sql = "UPDATE " . $WA_table . " SET " . $updateParamsObj->WA_setValues . " WHERE " . $WhereObj->sqlWhereClause . "";
		//echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentProfilesUpdate($Paramid_WADApaypal_recurring_payment_profiles){
		$sql = "SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country,
		initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, 
		payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, 
		amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, 
		product_name, ipn_status, creation_timestamp, test_ipn FROM paypal_ipn_recurring_payment_profiles WHERE id = "
		.GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentDelete($Paramid_WADApaypal_recurring_payments){
		$sql ="SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version,
		payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, 
		txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, 
		time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn 
		FROM paypal_ipn_recurring_payments WHERE id = " .GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentDetail($Paramid_WADApaypal_recurring_payments, $Paramid2_WADApaypal_recurring_payments, $ParamSessionid_WADApaypal_recurring_payments){
		$sql = "SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, 
		payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, 
		mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, 
		rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM paypal_ipn_recurring_payments 
		WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_recurring_payments, "int")." AND id= ".
		GetSQLValueString($ParamSessionid_WADApaypal_recurring_payments, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentUpdate($Paramid_WADApaypal_recurring_payments){
		$sql = "SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, 
		payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, 
		mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, 
		rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn 
		FROM paypal_ipn_recurring_payments WHERE id = ". GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscriptionPaymentsDelete($Paramid_WADApaypal_subscription_payments){
		$sql = "SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1,
		quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, 
		tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, 
		creation_timestamp, test_ipn FROM paypal_ipn_subscription_payments 
		WHERE id = ". GetSQLValueString($Paramid_WADApaypal_subscription_payments, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscriptionPaymentsDetail($Paramid_WADApaypal_subscription_payments, $Paramid2_WADApaypal_subscription_payments, $ParamSessionid_WADApaypal_subscription_payments ){
		$sql = "SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, 
		quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax,
		 mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, 
		 test_ipn FROM paypal_ipn_subscription_payments WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_subscription_payments, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_subscription_payments, "int")." AND id= ".
		GetSQLValueString($ParamSessionid_WADApaypal_subscription_payments, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscriptionPaymentsResult($query_WADApaypal_subscription_payments, $startRow_WADApaypal_subscription_payments, $maxRows_WADApaypal_subscription_payments){
		//$sql = "SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1,
		//quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, 
		//tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, 
		//creation_timestamp, test_ipn FROM paypal_ipn_subscription_payments ORDER BY id DESC";
		$query_limit_WADApaypal_subscription_payments = sprintf("%s LIMIT %d, %d", $query_WADApaypal_subscription_payments, $startRow_WADApaypal_subscription_payments, $maxRows_WADApaypal_subscription_payments);
		$this->_db->setQuery($query_limit_WADApaypal_subscription_payments);
		return $this->_db->loadAssocList();
	}
	function getSubscriptionDelete($Paramid_WADApaypal_subscriptions){
		$sql = "SELECT id, custom, subscr_id, subscr_date, subscr_effective, period1, period2, period3, amount1,
		amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, 
		username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, 
		first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, 
		creation_timestamp, txn_type, test_ipn FROM paypal_ipn_subscriptions WHERE id = ". GetSQLValueString($Paramid_WADApaypal_subscriptions, "int");
		echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscriptionDetail($Paramid_WADApaypal_subscriptions, $Paramid2_WADApaypal_subscriptions, $ParamSessionid_WADApaypal_subscriptions){
		$sql = "SELECT id, custom, subscr_id, subscr_date, memo, subscr_effective, period1, period2, period3,
		amount1, amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, 
		username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, 
		first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, 
		creation_timestamp, txn_type, test_ipn FROM paypal_ipn_subscriptions 
		WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_subscriptions, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_subscriptions, "int")." AND id= ".
		GetSQLValueString($ParamSessionid_WADApaypal_subscriptions, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscriptionResult($query_WADApaypal_subscriptions, $startRow_WADApaypal_subscriptions, $maxRows_WADApaypal_subscriptions){
		//$sql = "SELECT id, custom, subscr_id, subscr_date, subscr_effective, period1, period2, period3, amount1, amount2,
		//amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, username, password, 
		//txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, first_name, last_name, 
		//receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, creation_timestamp, txn_type, 
		//test_ipn FROM paypal_ipn_subscriptions ORDER BY id DESC";
		$query_limit_WADApaypal_subscriptions = sprintf("%s LIMIT %d, %d", $query_WADApaypal_subscriptions, $startRow_WADApaypal_subscriptions, $maxRows_WADApaypal_subscriptions);
		$this->_db->setQuery($query_limit_WADApaypal_subscriptions);
		return $this->_db->loadAssocList();
	}
	function getSubscriptionUpdate($Paramid_WADApaypal_subscriptions){
		$sql = "SELECT id, custom, subscr_id, subscr_date, subscr_effective, period1, period2, period3, amount1,
		amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, 
		username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, 
		first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, 
		creation_timestamp, txn_type, test_ipn FROM paypal_ipn_subscriptions WHERE id = ". GetSQLValueString($Paramid_WADApaypal_subscriptions, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getMassPaymentsResult($query_WADApaypal_mass_payments, $startRow_WADApaypal_mass_payments, $maxRows_WADApaypal_mass_payments){
		//$sql = "SELECT id, masspay_txn_id, mc_currency, mc_fee, mc_gross, receiver_email, status, unique_id, 
		//creation_timestamp, ipn_status, txn_type, test_ipn FROM paypal_ipn_mass_payments ORDER BY id DESC";
		$sql2 = sprintf("%s LIMIT %d, %d", $query_WADApaypal_mass_payments, $startRow_WADApaypal_mass_payments, $maxRows_WADApaypal_mass_payments);
		$this->_db->setQuery($sql2);
		return $this->_db->loadAssocList();
	}
	function getMassPaymentsDelete($Paramid_WADApaypal_mass_payments){
		$sql = "SELECT id, masspay_txn_id, mc_currency, mc_fee, mc_gross, receiver_email, status, unique_id,
		creation_timestamp, ipn_status, txn_type, test_ipn FROM paypal_ipn_mass_payments 
		WHERE id = ". GetSQLValueString($Paramid_WADApaypal_mass_payments, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getMasspaymentsDetail($Paramid_WADApaypal_mass_payments, $Paramid2_WADApaypal_mass_payments, $ParamSessionid_WADApaypal_mass_payments){
		$sql = "SELECT id, masspay_txn_id, mc_currency, mc_fee, mc_gross, receiver_email, status, unique_id,
		creation_timestamp, ipn_status, txn_type, test_ipn FROM paypal_ipn_mass_payments 
		WHERE id = ". GetSQLValueString($Paramid_WADApaypal_mass_payments, "int") ." OR ( -1= ". GetSQLValueString($Paramid2_WADApaypal_mass_payments, "int") ." AND id= ". GetSQLValueString($ParamSessionid_WADApaypal_mass_payments, "int") . ")" ;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRefundsResult($query_WADApaypal_refunds, $startRow_WADApaypal_refunds, $maxRows_WADApaypal_refunds){
		//$sql = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, 
		//payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, last_name, 
		//product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, custom, address_country, 
		//address_city, verify_sign, payer_email, parent_txn_id, contact_phone, time_created, txn_id, payment_type, 
		//payer_business_name, address_state, receiver_email, receiver_id, mc_currency, residence_country, test_ipn, 
		//transaction_subject, rp_invoice_id, recurring_payment_id, creation_timestamp FROM paypal_ipn_refunds";
		$query_limit_WADApaypal_refunds = sprintf("%s LIMIT %d, %d", $query_WADApaypal_refunds, $startRow_WADApaypal_refunds, $maxRows_WADApaypal_refunds);
		$this->_db->setQuery($query_limit_WADApaypal_refunds);
		return $this->_db->loadAssocList();
	}
	function getRefundsDelete($Paramid_WADApaypal_refunds){
		$sql = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street,
		payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, 
		last_name, product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, 
		custom, address_country, address_city, verify_sign, payer_email, parent_txn_id, contact_phone, 
		time_created, txn_id, payment_type, payer_business_name, address_state, receiver_email, receiver_id,
		 mc_currency, residence_country, test_ipn, transaction_subject, rp_invoice_id, recurring_payment_id,
		  creation_timestamp FROM paypal_ipn_refunds WHERE id = ". GetSQLValueString($Paramid_WADApaypal_refunds, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}

	function getRefundsDetail1($Paramid_WADApaypal_refunds, $Paramid2_WADApaypal_refunds, $ParamSessionid_WADApaypal_refunds){
		$sql = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, payment_date,
		payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, last_name, product_name, 
		mc_fee, address_country_code, address_name, notify_version, reason_code, custom, address_country, address_city, 
		verify_sign, payer_email, parent_txn_id, contact_phone, time_created, txn_id, payment_type, payer_business_name,
		 address_state, receiver_email, receiver_id, mc_currency, residence_country, test_ipn, transaction_subject, 
		 rp_invoice_id, recurring_payment_id, creation_timestamp FROM paypal_ipn_refunds 
		 WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_refunds, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_refunds, "int")." AND id= ".
		GetSQLValueString($ParamSessionid_WADApaypal_refunds, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRefundsDetail2($varOrderID_rsOrderItems){
		$sql = "SELECT * FROM paypal_ipn_order_items WHERE paypal_ipn_order_items.order_id = ".
		GetSQLValueString($varOrderID_rsOrderItems, "int");
		echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssocList();
	}
	function getRefundsUpdate($Paramid_WADApaypal_refunds){
		$sql = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, 
		payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, 
		last_name, product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, 
		custom, address_country, address_city, verify_sign, payer_email, parent_txn_id, contact_phone, 
		time_created, txn_id, payment_type, payer_business_name, address_state, receiver_email, receiver_id, 
		mc_currency, residence_country, test_ipn, transaction_subject, rp_invoice_id, recurring_payment_id, 
		creation_timestamp FROM paypal_ipn_refunds WHERE id = ". GetSQLValueString($Paramid_WADApaypal_refunds, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getDisputesResult($query_WADApaypal_disputes, $startRow_WADApaypal_disputes, $maxRows_WADApaypal_disputes){
		//$sql = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, 
		//payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, 
		//txn_type, test_ipn FROM paypal_ipn_disputes ORDER BY id DESC ";
		//setQueryBuilderSource($query_WADApaypal_disputes,$WADbSearch1,false);
		$query_limit_WADApaypal_disputes = sprintf("%s LIMIT %d, %d", $query_WADApaypal_disputes, $startRow_WADApaypal_disputes, $maxRows_WADApaypal_disputes);
		//echo $query_limit_WADApaypal_disputes;
		$this->_db->setQuery($query_limit_WADApaypal_disputes);
		//print_r($this->_db->loadAssocList());
		return $this->_db->loadAssocList();
	}
	function getDisputesDelete($Paramid_WADApaypal_disputes){
		$sql = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, 
		payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, 
		txn_type, test_ipn FROM paypal_ipn_disputes WHERE id = ". 
		GetSQLValueString($Paramid_WADApaypal_disputes, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getDisputesDetail($Paramid_WADApaypal_disputes, $Paramid2_WADApaypal_disputes, $ParamSessionid_WADApaypal_disputes){
		$sql = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, 
		payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, txn_type, 
		test_ipn FROM paypal_ipn_disputes WHERE id = ". GetSQLValueString($Paramid_WADApaypal_disputes, "int")." OR ( -1= ".$Paramid2_WADApaypal_disputes." AND id= ".$ParamSessionid_WADApaypal_disputes.")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getDisputesUpdate($Paramid_WADApaypal_disputes){
		$sql = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, 
		payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, 
		txn_type, test_ipn FROM paypal_ipn_disputes WHERE id = ". 
		GetSQLValueString($Paramid_WADApaypal_disputes, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getDeleteOrders($WA_table_items, $Paramid_WADApaypal_orders){
		$sql = "DELETE FROM `" . $WA_table_items . "` WHERE order_id = ". GetSQLValueString($Paramid_WADApaypal_orders, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	
	function getOrdersDetail($Paramid_WADApaypal_orders, $Paramid2_WADApaypal_orders, $ParamSessionid_WADApaypal_orders){
		$sql = "SELECT id, receiver_email, payment_status, pending_reason, memo, payment_date, mc_gross, mc_fee, tax, 
		mc_currency, txn_id, txn_type, first_name, last_name, address_street, address_city, address_state, 
		address_zip, address_country, address_status, payer_email, payer_status, payment_type, notify_version, 
		verify_sign, address_name, protection_eligibility, ipn_status, subscr_id, custom, reason_code, contact_phone, 
		item_name, item_number, invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item, 
		handling_amount, shipping_discount, insurance_amount, creation_timestamp, address_country_code, payer_business_name,
		btn_id, option_name1, option_selection1, option_name2, option_selection2, shipping_method, transaction_subject, 
		receiver_id, test_ipn, mc_shipping, shipping FROM paypal_ipn_orders WHERE id = %s OR ( -1= %s AND id= %s)". 
		GetSQLValueString($Paramid_WADApaypal_orders, "int").
		GetSQLValueString($Paramid2_WADApaypal_orders, "int").
		GetSQLValueString($ParamSessionid_WADApaypal_orders, "int");
		//echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrdersDetail2($varOrderID_rsOrderItems){
		$sql = "SELECT * FROM paypal_ipn_order_items WHERE paypal_ipn_order_items.order_id = %s". 
		GetSQLValueString($varOrderID_rsOrderItems, "int");
		//echo $sql;
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}

	
	function getOrdersItemsResult($query_WADApaypal_order_items, $startRow_WADApaypal_order_items, $maxRows_WADApaypal_order_items){
	//$sql = "SELECT id, order_id, refund_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, 
	//mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items ORDER BY id DESC";
	$query_limit_WADApaypal_order_items = sprintf("%s LIMIT %d, %d", $query_WADApaypal_order_items, $startRow_WADApaypal_order_items, $maxRows_WADApaypal_order_items);
	//echo $query_limit_WADApaypal_order_items;
	$this->_db->setQuery($query_limit_WADApaypal_order_items);
	return $this->_db->loadAssocList();
	}
	
	function getOrdersItemsDelete($Paramid_WADApaypal_order_items){
		$sql = "SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, 
		custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items 
		WHERE id = ". GetSQLValueString($Paramid_WADApaypal_order_items, "int");
	$this->_db->setQuery($sql);
	return $this->_db->loadAssoc();
	}
	
	function getOrdersItemsUpdate($Paramid_WADApaypal_order_items){
		$sql = "SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, 
		mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items WHERE id = ". 
		GetSQLValueString($Paramid_WADApaypal_order_items, "int");
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrdersItemsDetail($Paramid_WADApaypal_order_items, $Paramid2_WADApaypal_order_items, $ParamSessionid_WADApaypal_order_items){
		$sql = "SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, 
		mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items WHERE id = ".
		GetSQLValueString($Paramid_WADApaypal_order_items, "int")." OR ( -1= ".
		GetSQLValueString($Paramid2_WADApaypal_order_items, "int")." AND id= ".GetSQLValueString($ParamSessionid_WADApaypal_order_items, "int").")";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	//FINE QUERY PAYPAL ADMIN VIEW - INIZIO QUERY PAYPAL LISTENER
	
	function insertTable($q){
		$sql = "".$q;
		$this->_db->setQuery($q);
		return $this->_db->loadAssoc();
	}
	function updateTable($q){
		$sql = "".$q;
		$this->_db->setQuery($q);
		return $this->_db->loadAssoc();
	}
	function getDispute($input){
		$sql = "SELECT id, case_id FROM paypal_ipn_disputes WHERE case_id = '.$input.'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getMassPayment($input){
		$sql = "SELECT id, masspay_txn_id FROM paypal_ipn_mass_payments WHERE masspay_txn_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getOrder($input){
		$sql = "SELECT id, txn_id FROM paypal_ipn_orders WHERE txn_id = '.$input.'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentProfile1($input){
		$sql = "SELECT id, rp_invoice_id FROM paypal_ipn_recurring_payment_profiles WHERE rp_invoice_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPaymentProfile2($input){
		$sql = "SELECT id, recurring_payment_id FROM paypal_ipn_recurring_payment_profiles WHERE recurring_payment_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRecurringPayment($input){
		$sql = "SELECT id, txn_id FROM paypal_ipn_recurring_payments WHERE txn_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getRefund($input){
		$sql = "SELECT id, txn_id FROM paypal_ipn_refunds WHERE txn_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscrPayment($input){
		$sql = "SELECT id, txn_id FROM paypal_ipn_subscription_payments WHERE txn_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
	function getSubscr($input){
		$sql = "SELECT id, subscr_id FROM paypal_ipn_subscriptions WHERE subscr_id = '" . $input . "'";
		$this->_db->setQuery($sql);
		return $this->_db->loadAssoc();
	}
}//END class
?>

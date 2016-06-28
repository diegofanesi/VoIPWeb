<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die( 'Restricted access' );

// Include la classe base JView
jimport('joomla.application.component.view');

//WA AltClass Iterator
class WA_AltClassIterator{
	var $DisplayIndex;
	var $DisplayArray;

	function WA_AltClassIterator($theDisplayArray = array(1)) {
		$this->ClassCounter = 0;
		$this->ClassArray   = $theDisplayArray;
	}

	function getClass($incrementClass)  {
		if (sizeof($this->ClassArray) == 0) return "";
		if ($incrementClass) {
			if ($this->ClassCounter >= sizeof($this->ClassArray)) $this->ClassCounter = 0;
			$this->ClassCounter++;
		}
		if ($this->ClassCounter > 0)
		return $this->ClassArray[$this->ClassCounter-1];
		else
		return $this->ClassArray[0];
	}
}

class BackofficeViewRecurring_payments extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_recurringpaymentsresults"] = '';

			//WA Database Search Include


			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_recurring_payments;
			//Searchpage: recurring-payments-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("protection_eligibility","S_protection_eligibility","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("currency_code","S_currency_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("amount","S_amount","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_id","S_receiver_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receipt_id","S_receipt_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("transaction_subject","S_transaction_subject","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("shipping","S_shipping","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("product_type","S_product_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("time_created","S_time_created","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("rp_invoice_id","S_rp_invoice_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("recurring_payment_id","S_recurring_payment_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_recurringpaymentsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_recurringpaymentsresults"]) && $_SESSION["WADbSearch1_recurringpaymentsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_recurringpaymentsresults"];
					}
					else     {
						$WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
					}
				}
				else     {
					$WADbSearch1->whereClause = $WADbSearch1_DefaultWhere;
				}
			}
			$WADbSearch1->whereClause = str_replace("\\''", "''", $WADbSearch1->whereClause);
			$WADbSearch1whereClause = '';

			if (!function_exists("GetSQLValueString")) {
				function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
				{
					if (PHP_VERSION < 6) {
						$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
					}

					$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

					switch ($theType) {
						case "text":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "long":
						case "int":
							$theValue = ($theValue != "") ? intval($theValue) : "NULL";
							break;
						case "double":
							$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
							break;
						case "date":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "defined":
							$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
							break;
					}
					return $theValue;
				}
			}

			$currentPage = $_SERVER["PHP_SELF"];

			$maxRows_WADApaypal_recurring_payments = 10;
			$pageNum_WADApaypal_recurring_payments = 0;
			if (isset($_GET['pageNum_WADApaypal_recurring_payments'])) {
				$pageNum_WADApaypal_recurring_payments = $_GET['pageNum_WADApaypal_recurring_payments'];
			}
			$startRow_WADApaypal_recurring_payments = $pageNum_WADApaypal_recurring_payments * $maxRows_WADApaypal_recurring_payments;
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			$query_WADApaypal_recurring_payments = "SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM paypal_ipn_recurring_payments ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_recurring_payments,$WADbSearch1,false);
			//$WADApaypal_recurring_payments = mysql_query($query_limit_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payments = $model->getRecurringPaymentResult($query_WADApaypal_recurring_payments, $startRow_WADApaypal_recurring_payments, $maxRows_WADApaypal_recurring_payments);

			if (isset($_GET['totalRows_WADApaypal_recurring_payments'])) {
				$totalRows_WADApaypal_recurring_payments = $_GET['totalRows_WADApaypal_recurring_payments'];
			} else {
				$all_WADApaypal_recurring_payments = $model->getAllTable(recurring_payments);
				$totalRows_WADApaypal_recurring_payments = count($all_WADApaypal_recurring_payments);
			}
			$totalPages_WADApaypal_recurring_payments = ceil($totalRows_WADApaypal_recurring_payments/$maxRows_WADApaypal_recurring_payments)-1;

			$queryString_WADApaypal_recurring_payments = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_recurring_payments") == false &&
					stristr($param, "totalRows_WADApaypal_recurring_payments") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_recurring_payments = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_recurring_payments = sprintf("&totalRows_WADApaypal_recurring_payments=%d%s", $totalRows_WADApaypal_recurring_payments, $queryString_WADApaypal_recurring_payments);


			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));

			$this->assignRef('totalRows_WADApaypal_recurring_payments', $totalRows_WADApaypal_recurring_payments);
			$this->assignRef('startRow_WADApaypal_recurring_payments', $startRow_WADApaypal_recurring_payments);
			$this->assignRef('maxRows_WADApaypal_recurring_payments', $maxRows_WADApaypal_recurring_payments);
			$this->assignRef('row_WADApaypal_recurring_payments', $row_WADApaypal_recurring_payments);
			$this->assignRef('pageNum_WADApaypal_recurring_payments', $pageNum_WADApaypal_recurring_payments);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_recurring_payments', $totalPages_WADApaypal_recurring_payments);
			$this->assignRef('queryString_WADApaypal_recurring_payments', $queryString_WADApaypal_recurring_payments);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			$this->assignRef('WADApaypal_recurring_payments', $WADApaypal_recurring_payments);

		}
		else if($task == 'Delete')
		{
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');

			if (!function_exists("GetSQLValueString")) {
				function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
				{
					if (PHP_VERSION < 6) {
						$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
					}

					$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

					switch ($theType) {
						case "text":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "long":
						case "int":
							$theValue = ($theValue != "") ? intval($theValue) : "NULL";
							break;
						case "double":
							$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
							break;
						case "date":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "defined":
							$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
							break;
					}
					return $theValue;
				}
			}

			$Paramid_WADApaypal_recurring_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$query_WADApaypal_recurring_payments = sprintf("SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM " . $db_table_prefix . "recurring_payments WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int"));
			//$WADApaypal_recurring_payments = mysql_query($query_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payments = $model->getRecurringPaymentDelete($Paramid_WADApaypal_recurring_payments);
			$totalRows_WADApaypal_recurring_payments =count($row_WADApaypal_recurring_payments);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_recurring_payments";
				$WA_redirectURL = "index.php?option=com_backoffice&view=recurring_payments";
				$WA_keepQueryString = false;
				$WA_fieldNamesStr = "id";
				$WA_columnTypesStr = "none,none,NULL";
				$WA_fieldValuesStr = "".((isset($_POST["WADADeleteRecordID"]))?$_POST["WADADeleteRecordID"]:"")  ."";
				$WA_comparisonStr = "=";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);
				$WA_comparisions = explode("|", $WA_comparisonStr);
				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
				if (!session_id()) session_start();
				$model =& $this->getModel();
				$deleteParamsObj = WA_AB_generateWhereClause($WA_fieldNames, $WA_columns, $WA_fieldValues, $WA_comparisions);
				$WA_Sql = $model->deleteRow($WA_table, $deleteParamsObj);
				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				if ($WA_redirectURL != "")  {
					if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
						$WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
					}
					header("Location: ".$WA_redirectURL);
				}
			}
			$this->assignRef('row_WADApaypal_recurring_payments', $row_WADApaypal_recurring_payments);
			$this->assignRef('totalRows_WADApaypal_recurring_payments', $totalRows_WADApaypal_recurring_payments);

			$this->setLayout('delete');
		}
		else if($task == 'Detail') {
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
				
			if (!function_exists("GetSQLValueString")) {
				function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
				{
					if (PHP_VERSION < 6) {
						$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
					}

					$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

					switch ($theType) {
						case "text":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "long":
						case "int":
							$theValue = ($theValue != "") ? intval($theValue) : "NULL";
							break;
						case "double":
							$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
							break;
						case "date":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "defined":
							$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
							break;
					}
					return $theValue;
				}
			}
				
			if (!session_id()) session_start();
				
			$Paramid_WADApaypal_recurring_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_recurring_payments = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_recurring_payments'])) {
				$ParamSessionid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_recurring_payments'] : addslashes($_SESSION['WADA_Insert_paypal_recurring_payments']);
			}
			$Paramid2_WADApaypal_recurring_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_recurring_payments = sprintf("SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM " . $db_table_prefix . "recurring_payments WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int"),GetSQLValueString($Paramid2_WADApaypal_recurring_payments, "int"),GetSQLValueString($ParamSessionid_WADApaypal_recurring_payments, "int"));
			//$WADApaypal_recurring_payments = mysql_query($query_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payments = $model->getRecurringPaymentDetail($Paramid_WADApaypal_recurring_payments, $Paramid2_WADApaypal_recurring_payments, $ParamSessionid_WADApaypal_recurring_payments);
			$totalRows_WADApaypal_recurring_payments = count($row_WADApaypal_recurring_payments);


			$this->assignRef('totalRows_WADApaypal_recurring_payments', $totalRows_WADApaypal_recurring_payments);
			$this->assignRef('row_WADApaypal_recurring_payments', $row_WADApaypal_recurring_payments);

			$this->setLayout('detail');
		}
		else if($task == 'Search')
		{
			$this->setLayout('search');
		}
		else if($task == 'Update'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			if (!function_exists("GetSQLValueString")) {
				function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
				{
					if (PHP_VERSION < 6) {
						$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
					}

					$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

					switch ($theType) {
						case "text":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "long":
						case "int":
							$theValue = ($theValue != "") ? intval($theValue) : "NULL";
							break;
						case "double":
							$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
							break;
						case "date":
							$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
							break;
						case "defined":
							$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
							break;
					}
					return $theValue;
				}
			}
			
			$Paramid_WADApaypal_recurring_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_recurring_payments = sprintf("SELECT id, mc_gross, protection_eligibility, payment_date, payment_status, mc_fee, notify_version, payer_status, currency_code, verify_sign, amount, txn_id, payment_type, receiver_email, receiver_id, txn_type, mc_currency, residence_country, receipt_id, transaction_subject, shipping, product_type, time_created, rp_invoice_id, ipn_status, creation_timestamp, recurring_payment_id, test_ipn FROM " . $db_table_prefix . "recurring_payments WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payments, "int"));
			//$WADApaypal_recurring_payments = mysql_query($query_WADApaypal_recurring_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payments = $model->getRecurringPaymentUpdate($Paramid_WADApaypal_recurring_payments);
			$totalRows_WADApaypal_recurring_payments = count($row_WADApaypal_recurring_payments);
			
			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_recurring_payments";
				$WA_redirectURL = "index.php?option=com_backoffice&view=recurring_payments&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "mc_gross|protection_eligibility|payment_date|payment_status|mc_fee|notify_version|payer_status|currency_code|verify_sign|amount|txn_id|payment_type|receiver_email|receiver_id|txn_type|mc_currency|residence_country|receipt_id|transaction_subject|shipping|product_type|time_created|rp_invoice_id|ipn_status|creation_timestamp|recurring_payment_id|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["currency_code"]))?$_POST["currency_code"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["amount"]))?$_POST["amount"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["receipt_id"]))?$_POST["receipt_id"]:"")  ."" . "|" . "".((isset($_POST["transaction_subject"]))?$_POST["transaction_subject"]:"")  ."" . "|" . "".((isset($_POST["shipping"]))?$_POST["shipping"]:"")  ."" . "|" . "".((isset($_POST["product_type"]))?$_POST["product_type"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "none,none,NULL|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|none,none,NULL";
				$WA_comparisonStr = " = | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | = | LIKE | = ";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);

				$WA_where_fieldValuesStr = "".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_where_columnTypesStr = "none,none,NULL";
				$WA_where_comparisonStr = "=";
				$WA_where_fieldNames = explode("|", $WA_indexField);
				$WA_where_fieldValues = explode("|", $WA_where_fieldValuesStr);
				$WA_where_columns = explode("|", $WA_where_columnTypesStr);
				$WA_where_comparisons = explode("|", $WA_where_comparisonStr);

				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
				
				if (!session_id()) session_start();
				$model =& $this->getModel();
				$updateParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
				$WhereObj = WA_AB_generateWhereClause($WA_where_fieldNames, $WA_where_columns, $WA_where_fieldValues,  $WA_where_comparisons );
				$WA_Sql = $model->updateRow($WA_table, $updateParamsObj, $WhereObj);
				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				if ($WA_redirectURL != "")  {
					if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
						$WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
					}
					header("Location: ".$WA_redirectURL);
				}
			}
				$this->assignRef('totalRows_WADApaypal_recurring_payments', $totalRows_WADApaypal_recurring_payments);
				$this->assignRef('row_WADApaypal_recurring_payments', $row_WADApaypal_recurring_payments);
				
			$this->setLayout('update');
		 }
		  
		   parent::display($tpl);
	 } 
}
?>
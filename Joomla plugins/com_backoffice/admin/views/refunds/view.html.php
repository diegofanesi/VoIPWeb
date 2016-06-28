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

class BackofficeViewRefunds extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_refundsresults"] = '';

			//WA Database Search Include
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');

			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_refunds;
			//Searchpage: refunds-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("invoice","S_invoice","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("protection_eligibility","S_protection_eligibility","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_street","S_address_street","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("charset","S_charset","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_zip","S_address_zip","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_shipping","S_mc_shipping","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_handling","S_mc_handling","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("memo","S_memo","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("product_name","S_product_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("address_country_code","S_address_country_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_name","S_address_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_country","S_address_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_city","S_address_city","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("parent_txn_id","S_parent_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("contact_phone","S_contact_phone","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("time_created","S_time_created","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_business_name","S_payer_business_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_state","S_address_state","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_id","S_receiver_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("transaction_subject","S_transaction_subject","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("rp_invoice_id","S_rp_invoice_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("recurring_payment_id","S_recurring_payment_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_refundsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_refundsresults"]) && $_SESSION["WADbSearch1_refundsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_refundsresults"];
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

			$maxRows_WADApaypal_refunds = 10;
			$pageNum_WADApaypal_refunds = 0;
			if (isset($_GET['pageNum_WADApaypal_refunds'])) {
				$pageNum_WADApaypal_refunds = $_GET['pageNum_WADApaypal_refunds'];
			}
			$startRow_WADApaypal_refunds = $pageNum_WADApaypal_refunds * $maxRows_WADApaypal_refunds;
			$model =& $this->getModel();
			$query_WADApaypal_refunds = "SELECT id, ipn_status, mc_gross, invoice, protection_eligibility, payer_id, address_street, payment_date, payment_status, charset, address_zip, mc_shipping, mc_handling, first_name, memo, last_name, product_name, mc_fee, address_country_code, address_name, notify_version, reason_code, custom, address_country, address_city, verify_sign, payer_email, parent_txn_id, contact_phone, time_created, txn_id, payment_type, payer_business_name, address_state, receiver_email, receiver_id, mc_currency, residence_country, test_ipn, transaction_subject, rp_invoice_id, recurring_payment_id, creation_timestamp FROM paypal_ipn_refunds";
			//mysql_select_db($database_connDB, $connDB);
			//$WADApaypal_refunds = mysql_query($query_limit_WADApaypal_refunds, $connDB) or die(mysql_error());
			setQueryBuilderSource($query_WADApaypal_refunds,$WADbSearch1,false);
			$row_WADApaypal_refunds = $model->getRefundsResult($query_WADApaypal_refunds, $startRow_WADApaypal_refunds, $maxRows_WADApaypal_refunds);
			if (isset($_GET['totalRows_WADApaypal_refunds'])) {
				$totalRows_WADApaypal_refunds = $_GET['totalRows_WADApaypal_refunds'];
			} else {
				$all_WADApaypal_refunds = $model->getAllTable(refunds);
				$totalRows_WADApaypal_refunds = count($all_WADApaypal_refunds);
			}
			$totalPages_WADApaypal_refunds = ceil($totalRows_WADApaypal_refunds/$maxRows_WADApaypal_refunds)-1;

			$queryString_WADApaypal_refunds = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_refunds") == false &&
					stristr($param, "totalRows_WADApaypal_refunds") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_refunds = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_refunds = sprintf("&totalRows_WADApaypal_refunds=%d%s", $totalRows_WADApaypal_refunds, $queryString_WADApaypal_refunds);


			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('totalRows_WADApaypal_refunds', $totalRows_WADApaypal_refunds);
			$this->assignRef('pageNum_WADApaypal_refunds', $pageNum_WADApaypal_refunds);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_refunds', $totalPages_WADApaypal_refunds);
			$this->assignRef('startRow_WADApaypal_refunds', $startRow_WADApaypal_refunds);
			$this->assignRef('queryString_WADApaypal_refunds', $queryString_WADApaypal_refunds);
			$this->assignRef('maxRows_WADApaypal_refunds', $maxRows_WADApaypal_refunds);
			$this->assignRef('row_WADApaypal_refunds', $row_WADApaypal_refunds);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			$this->assignRef('WADApaypal_refunds', $WADApaypal_refunds);
		
		}

		else if($task == 'Delete'){
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
			$Paramid_WADApaypal_refunds = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$WADApaypal_refunds = mysql_query($query_WADApaypal_refunds, $connDB) or die(mysql_error());
			$row_WADApaypal_refunds = $model->getRefundsDelete($Paramid_WADApaypal_refunds);
			$totalRows_WADApaypal_refunds = count($row_WADApaypal_refunds);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_refunds";
				$WA_redirectURL = "index.php?option=com_backoffice&view=refunds";
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
				$model =& $this->getModel();
				if (!session_id()) session_start();
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
			$this->assignRef('row_WADApaypal_refunds', $row_WADApaypal_refunds);
			$this->assignRef('totalRows_WADApaypal_refunds', $totalRows_WADApaypal_refunds);
			$this->setLayout('delete');
		}
		else if($task == 'Detail'){
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

			$Paramid_WADApaypal_refunds = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_refunds = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_refunds'])) {
				$ParamSessionid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_refunds'] : addslashes($_SESSION['WADA_Insert_paypal_refunds']);
			}
			$Paramid2_WADApaypal_refunds = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();

			//$WADApaypal_refunds = mysql_query($query_WADApaypal_refunds, $connDB) or die(mysql_error());
			$row_WADApaypal_refunds = $model->getRefundsDetail1($Paramid_WADApaypal_refunds, $Paramid2_WADApaypal_refunds, $ParamSessionid_WADApaypal_refunds);
			$totalRows_WADApaypal_refunds = count($row_WADApaypal_refunds);

			$varOrderID_rsOrderItems = "1";
			if (isset($row_WADApaypal_refunds['id'])) {
				$varOrderID_rsOrderItems = (get_magic_quotes_gpc()) ? $row_WADApaypal_refunds['id'] : addslashes($row_WADApaypal_refunds['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$rsOrderItems = mysql_query($query_rsOrderItems, $connDB) or die(mysql_error());
			$row_rsOrderItems = $model->getRefundsDetail2($varOrderID_rsOrderItems);
			$totalRows_rsOrderItems = count($row_rsOrderItems);
			$this->assignRef('totalRows_WADApaypal_refunds', $totalRows_WADApaypal_refunds);
			$this->assignRef('row_WADApaypal_refunds', $row_WADApaypal_refunds);
			$this->assignRef('row_rsOrderItems', $row_rsOrderItems);
			$this->assignRef('rsOrderItems', $rsOrderItems);
			$this->assignRef('totalRows_rsOrderItems', $totalRows_rsOrderItems);
			
			$this->setLayout('detail');
			
		}
		else if($task == 'Insert'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			// WA Application Builder Insert
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_refunds";
				$WA_sessionName = "WADA_Insert_paypal_refunds";
				$WA_redirectURL = "index.php?option=com_backoffice&view=refunds&task=Detail";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "ipn_status|mc_gross|invoice|protection_eligibility|payer_id|address_street|payment_date|payment_status|charset|address_zip|mc_shipping|mc_handling|first_name|memo|last_name|product_name|mc_fee|address_country_code|address_name|notify_version|reason_code|custom|address_country|address_city|verify_sign|payer_email|parent_txn_id|contact_phone|time_created|txn_id|payment_type|payer_business_name|address_state|receiver_email|receiver_id|mc_currency|residence_country|test_ipn|transaction_subject|rp_invoice_id|recurring_payment_id|creation_timestamp";
				$WA_fieldValuesStr = "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["address_street"]))?$_POST["address_street"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["charset"]))?$_POST["charset"]:"")  ."" . "|" . "".((isset($_POST["address_zip"]))?$_POST["address_zip"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["memo"]))?$_POST["memo"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["address_country_code"]))?$_POST["address_country_code"]:"")  ."" . "|" . "".((isset($_POST["address_name"]))?$_POST["address_name"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["address_country"]))?$_POST["address_country"]:"")  ."" . "|" . "".((isset($_POST["address_city"]))?$_POST["address_city"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["parent_txn_id"]))?$_POST["parent_txn_id"]:"")  ."" . "|" . "".((isset($_POST["contact_phone"]))?$_POST["contact_phone"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["address_state"]))?$_POST["address_state"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."" . "|" . "".((isset($_POST["transaction_subject"]))?$_POST["transaction_subject"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."";
				$WA_columnTypesStr = "',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);
				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
				$model =& $this->getModel();
				if (!session_id()) session_start();
				$insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
				$WA_Sql = $model->insertRow($WA_table, $insertParamsObj);
				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				$_SESSION[$WA_sessionName] = mysql_insert_id();
				if ($WA_redirectURL != "")  {
					if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
						$WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
					}
					header("Location: ".$WA_redirectURL);
				}
			}
			$this->setLayout('insert');
		}
		else if($task == 'Search'){

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
			
			$Paramid_WADApaypal_refunds = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_refunds = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$WADApaypal_refunds = mysql_query($query_WADApaypal_refunds, $connDB) or die(mysql_error());
			$row_WADApaypal_refunds = $model->getRefundsUpdate($Paramid_WADApaypal_refunds);
			$totalRows_WADApaypal_refunds = count($row_WADApaypal_refunds);
			
			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_refunds";
				$WA_redirectURL = "index.php?option=com_backoffice&view=refunds&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "ipn_status|mc_gross|invoice|protection_eligibility|payer_id|address_street|payment_date|payment_status|charset|address_zip|mc_shipping|mc_handling|first_name|memo|last_name|product_name|mc_fee|address_country_code|address_name|notify_version|reason_code|custom|address_country|address_city|verify_sign|payer_email|parent_txn_id|contact_phone|time_created|txn_id|payment_type|payer_business_name|address_state|receiver_email|receiver_id|mc_currency|residence_country|test_ipn|transaction_subject|rp_invoice_id|recurring_payment_id|creation_timestamp";
				$WA_fieldValuesStr = "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["address_street"]))?$_POST["address_street"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["charset"]))?$_POST["charset"]:"")  ."" . "|" . "".((isset($_POST["address_zip"]))?$_POST["address_zip"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["memo"]))?$_POST["memo"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["address_country_code"]))?$_POST["address_country_code"]:"")  ."" . "|" . "".((isset($_POST["address_name"]))?$_POST["address_name"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["address_country"]))?$_POST["address_country"]:"")  ."" . "|" . "".((isset($_POST["address_city"]))?$_POST["address_city"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["parent_txn_id"]))?$_POST["parent_txn_id"]:"")  ."" . "|" . "".((isset($_POST["contact_phone"]))?$_POST["contact_phone"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["address_state"]))?$_POST["address_state"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."" . "|" . "".((isset($_POST["transaction_subject"]))?$_POST["transaction_subject"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."";
				$WA_columnTypesStr = "',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL";
				$WA_comparisonStr = " LIKE | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | = | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | = ";
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
				$model =& $this->getModel();
				if (!session_id()) session_start();
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
			$this->assignRef('row_WADApaypal_refunds', $row_WADApaypal_refunds);
			$this->assignRef('totalRows_WADApaypal_refunds', $totalRows_WADApaypal_refunds);
			$this->setLayout('update');
		}
		parent::display($tpl);
	}
}

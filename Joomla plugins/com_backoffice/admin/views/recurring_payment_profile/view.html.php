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

class BackofficeViewRecurring_payment_profile extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');

			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_recurringpaymentprofilesresults"] = '';

			//WA Database Search Include

			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_recurring_payment_profiles;
			//Searchpage: recurring-payment-profiles-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("payment_cycle","S_payment_cycle","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("next_payment_date","S_next_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("initial_payment_amount","S_initial_payment_amount","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("rp_invoice_id","S_rp_invoice_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("currency_code","S_currency_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("time_created","S_time_created","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("period_type","S_period_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("product_type","S_product_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_business_name","S_payer_business_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("shipping","S_shipping","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("amount_per_cycle","S_amount_per_cycle","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("profile_status","S_profile_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("amount","S_amount","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("outstanding_balance","S_outstanding_balance","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("recurring_payment_id","S_recurring_payment_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("product_name","S_product_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_recurringpaymentprofilesresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_recurringpaymentprofilesresults"]) && $_SESSION["WADbSearch1_recurringpaymentprofilesresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_recurringpaymentprofilesresults"];
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

			$maxRows_WADApaypal_recurring_payment_profiles = 10;
			$pageNum_WADApaypal_recurring_payment_profiles = 0;
			if (isset($_GET['pageNum_WADApaypal_recurring_payment_profiles'])) {
				$pageNum_WADApaypal_recurring_payment_profiles = $_GET['pageNum_WADApaypal_recurring_payment_profiles'];
			}
			$startRow_WADApaypal_recurring_payment_profiles = $pageNum_WADApaypal_recurring_payment_profiles * $maxRows_WADApaypal_recurring_payment_profiles;

			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$query_WADApaypal_recurring_payment_profiles = "SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM paypal_ipn_recurring_payment_profiles ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_recurring_payment_profiles,$WADbSearch1,false);
			//$WADApaypal_recurring_payment_profiles = mysql_query($query_limit_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payment_profiles = $model->getRecurringPaymentProfilesResult($query_WADApaypal_recurring_payment_profiles, $startRow_WADApaypal_recurring_payment_profiles, $maxRows_WADApaypal_recurring_payment_profiles);

			if (isset($_GET['totalRows_WADApaypal_recurring_payment_profiles'])) {
				$totalRows_WADApaypal_recurring_payment_profiles = $_GET['totalRows_WADApaypal_recurring_payment_profiles'];
			} else {
				$all_WADApaypal_recurring_payment_profiles = $model->getAllTable(recurring_payment_profiles);
				$totalRows_WADApaypal_recurring_payment_profiles = count($all_WADApaypal_recurring_payment_profiles);
			}
			$totalPages_WADApaypal_recurring_payment_profiles = ceil($totalRows_WADApaypal_recurring_payment_profiles/$maxRows_WADApaypal_recurring_payment_profiles)-1;

			$queryString_WADApaypal_recurring_payment_profiles = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_recurring_payment_profiles") == false &&
					stristr($param, "totalRows_WADApaypal_recurring_payment_profiles") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_recurring_payment_profiles = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_recurring_payment_profiles = sprintf("&totalRows_WADApaypal_recurring_payment_profiles=%d%s", $totalRows_WADApaypal_recurring_payment_profiles, $queryString_WADApaypal_recurring_payment_profiles);

			//WA AltClass Iterator

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('totalRows_WADApaypal_recurring_payment_profiles', $totalRows_WADApaypal_recurring_payment_profiles);
			$this->assignRef('pageNum_WADApaypal_recurring_payment_profiles', $pageNum_WADApaypal_recurring_payment_profiles);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('startRow_WADApaypal_recurring_payment_profiles', $startRow_WADApaypal_recurring_payment_profiles);
			$this->assignRef('queryString_WADApaypal_recurring_payment_profiles', $queryString_WADApaypal_recurring_payment_profiles);
			$this->assignRef('totalPages_WADApaypal_recurring_payment_profiles', $totalPages_WADApaypal_recurring_payment_profiles);
			$this->assignRef('maxRows_WADApaypal_recurring_payment_profiles', $maxRows_WADApaypal_recurring_payment_profiles);
			$this->assignRef('row_WADApaypal_recurring_payment_profiles', $row_WADApaypal_recurring_payment_profiles);
			$this->assignRef('WADApaypal_recurring_payment_profiles', $WADApaypal_recurring_payment_profiles);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			//$this->assignRef('', );
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

			$Paramid_WADApaypal_recurring_payment_profiles = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$query_WADApaypal_recurring_payment_profiles = sprintf("SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int"));
			//$WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payment_profiles = $model->getRecurringPaymentProfilesDelete($Paramid_WADApaypal_recurring_payment_profiles);
			$totalRows_WADApaypal_recurring_payment_profiles = count($row_WADApaypal_recurring_payment_profiles);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table =  "paypal_ipn_recurring_payment_profiles";
				$WA_redirectURL = "index.php?option=com_backoffice&view=recurring_payment_profile";
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
			$this->assignRef('totalRows_WADApaypal_recurring_payment_profiles', $totalRows_WADApaypal_recurring_payment_profiles);
			$this->assignRef('row_WADApaypal_recurring_payment_profiles', $row_WADApaypal_recurring_payment_profiles);
			//$this->assignRef('', );
			$this->setLayout('delete');
		}
		else if($task == 'Detail')
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

			if (!session_id()) session_start();

			$Paramid_WADApaypal_recurring_payment_profiles = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_recurring_payment_profiles = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_recurring_payment_profiles'])) {
				$ParamSessionid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_recurring_payment_profiles'] : addslashes($_SESSION['WADA_Insert_paypal_recurring_payment_profiles']);
			}
			$Paramid2_WADApaypal_recurring_payment_profiles = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_recurring_payment_profiles = sprintf("SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int"),GetSQLValueString($Paramid2_WADApaypal_recurring_payment_profiles, "int"),GetSQLValueString($ParamSessionid_WADApaypal_recurring_payment_profiles, "int"));
			//$WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
			$row_WADApaypal_recurring_payment_profiles = $model->getRecurringPaymentProfilesDetail($Paramid_WADApaypal_recurring_payment_profiles, $Paramid2_WADApaypal_recurring_payment_profiles, $ParamSessionid_WADApaypal_recurring_payment_profiles);
			$totalRows_WADApaypal_recurring_payment_profiles = count($row_WADApaypal_recurring_payment_profiles);
			$this->assignRef('row_WADApaypal_recurring_payment_profiles', $row_WADApaypal_recurring_payment_profiles);
			$this->assignRef('totalRows_WADApaypal_recurring_payment_profiles', $totalRows_WADApaypal_recurring_payment_profiles);
			$this->setLayout('detail');
		}
		else if($task == 'Insert')
		{
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			// WA Application Builder Insert
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_recurring_payment_profiles";
				$WA_sessionName = "WADA_Insert_paypal_recurring_payment_profiles";
				$WA_redirectURL = "index.php?option=com_backoffice&view=recurring_payment_profile";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "payment_cycle|txn_type|last_name|first_name|next_payment_date|residence_country|initial_payment_amount|rp_invoice_id|currency_code|time_created|verify_sign|period_type|payer_status|payer_email|receiver_email|payer_id|product_type|payer_business_name|shipping|amount_per_cycle|profile_status|notify_version|amount|outstanding_balance|recurring_payment_id|product_name|ipn_status|creation_timestamp|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["payment_cycle"]))?$_POST["payment_cycle"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["next_payment_date"]))?$_POST["next_payment_date"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["initial_payment_amount"]))?$_POST["initial_payment_amount"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["currency_code"]))?$_POST["currency_code"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["period_type"]))?$_POST["period_type"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["product_type"]))?$_POST["product_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["shipping"]))?$_POST["shipping"]:"")  ."" . "|" . "".((isset($_POST["amount_per_cycle"]))?$_POST["amount_per_cycle"]:"")  ."" . "|" . "".((isset($_POST["profile_status"]))?$_POST["profile_status"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["amount"]))?$_POST["amount"]:"")  ."" . "|" . "".((isset($_POST["outstanding_balance"]))?$_POST["outstanding_balance"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL|none,none,NULL";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);
				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
				if (!session_id()) session_start();
				$model =& $this->getModel();
				$insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
				$WA_Sql = $model->insertRow($WA_table, $insertParamsObj);
				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				//$_SESSION[$WA_sessionName] = mysql_insert_id();
				if ($WA_redirectURL != "")  {
					if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
						$WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
					}
					header("Location: ".$WA_redirectURL);
				}
			}

			$this->setLayout('insert');
		}
		else if($task == 'Search')
		{
			$this->setLayout('search');
		}
		else if($task == 'Update')
		{
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
				
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
			
			$Paramid_WADApaypal_recurring_payment_profiles = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_recurring_payment_profiles = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_recurring_payment_profiles = sprintf("SELECT id, payment_cycle, txn_type, last_name, first_name, next_payment_date, residence_country, initial_payment_amount, rp_invoice_id, currency_code, time_created, verify_sign, period_type, payer_status, payer_email, receiver_email, payer_id, product_type, payer_business_name, shipping, amount_per_cycle, profile_status, notify_version, amount, outstanding_balance, recurring_payment_id, product_name, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "recurring_payment_profiles WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_recurring_payment_profiles, "int"));
			//$WADApaypal_recurring_payment_profiles = mysql_query($query_WADApaypal_recurring_payment_profiles, $connDB) or die(mysql_error());
			$model =& $this->getModel();
			$row_WADApaypal_recurring_payment_profiles = $model->getRecurringPaymentProfilesUpdate($Paramid_WADApaypal_recurring_payment_profiles);
			$totalRows_WADApaypal_recurring_payment_profiles = count($row_WADApaypal_recurring_payment_profiles);
			
			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_recurring_payment_profiles";
				$WA_redirectURL = "index.php?option=com_backoffice&view=recurring_payment_profile&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "payment_cycle|txn_type|last_name|first_name|next_payment_date|residence_country|initial_payment_amount|rp_invoice_id|currency_code|time_created|verify_sign|period_type|payer_status|payer_email|receiver_email|payer_id|product_type|payer_business_name|shipping|amount_per_cycle|profile_status|notify_version|amount|outstanding_balance|recurring_payment_id|product_name|ipn_status|creation_timestamp|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["payment_cycle"]))?$_POST["payment_cycle"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["next_payment_date"]))?$_POST["next_payment_date"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["initial_payment_amount"]))?$_POST["initial_payment_amount"]:"")  ."" . "|" . "".((isset($_POST["rp_invoice_id"]))?$_POST["rp_invoice_id"]:"")  ."" . "|" . "".((isset($_POST["currency_code"]))?$_POST["currency_code"]:"")  ."" . "|" . "".((isset($_POST["time_created"]))?$_POST["time_created"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["period_type"]))?$_POST["period_type"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["product_type"]))?$_POST["product_type"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["shipping"]))?$_POST["shipping"]:"")  ."" . "|" . "".((isset($_POST["amount_per_cycle"]))?$_POST["amount_per_cycle"]:"")  ."" . "|" . "".((isset($_POST["profile_status"]))?$_POST["profile_status"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["amount"]))?$_POST["amount"]:"")  ."" . "|" . "".((isset($_POST["outstanding_balance"]))?$_POST["outstanding_balance"]:"")  ."" . "|" . "".((isset($_POST["recurring_payment_id"]))?$_POST["recurring_payment_id"]:"")  ."" . "|" . "".((isset($_POST["product_name"]))?$_POST["product_name"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,NULL|none,none,NULL";
				$WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | = | LIKE | LIKE | = | = | LIKE | LIKE | LIKE | = | = ";
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

				$model =& $this->getModel();
				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
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
				
			$this->assignRef('totalRows_WADApaypal_recurring_payment_profiles', $totalRows_WADApaypal_recurring_payment_profiles);
			$this->assignRef('row_WADApaypal_recurring_payment_profiles', $row_WADApaypal_recurring_payment_profiles);
			$this->setLayout('update');
		}

		parent::display($tpl);
	}
}
?>
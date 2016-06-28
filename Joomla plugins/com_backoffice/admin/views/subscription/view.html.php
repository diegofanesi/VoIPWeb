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

class BackofficeViewSubscription extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_subscriptionsresults"] = '';
			
			//WA Database Search Include
			
			
			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_subscriptions;
			//Searchpage: subscriptions-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("subscr_id","S_subscr_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("subscr_date","S_subscr_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("subscr_effective","S_subscr_effective","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("period1","S_period1","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("period2","S_period2","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("period3","S_period3","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("amount1","S_amount1","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("amount2","S_amount2","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("amount3","S_amount3","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_amount1","S_mc_amount1","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_amount2","S_mc_amount2","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_amount3","S_mc_amount3","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("recurring","S_recurring","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("reattempt","S_reattempt","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("retry_at","S_retry_at","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("recur_times","S_recur_times","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("username","S_username","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("password","S_password","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("residence_country","S_residence_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_name","S_item_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_number","S_item_number","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_subscriptionsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_subscriptionsresults"]) && $_SESSION["WADbSearch1_subscriptionsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_subscriptionsresults"];
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
			
			$maxRows_WADApaypal_subscriptions = 10;
			$pageNum_WADApaypal_subscriptions = 0;
			if (isset($_GET['pageNum_WADApaypal_subscriptions'])) {
				$pageNum_WADApaypal_subscriptions = $_GET['pageNum_WADApaypal_subscriptions'];
			}
			$startRow_WADApaypal_subscriptions = $pageNum_WADApaypal_subscriptions * $maxRows_WADApaypal_subscriptions;
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			$query_WADApaypal_subscriptions = "SELECT id, custom, subscr_id, subscr_date, subscr_effective, period1, period2, period3, amount1, amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, creation_timestamp, txn_type, test_ipn FROM paypal_ipn_subscriptions ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_subscriptions,$WADbSearch1,false);
			//$WADApaypal_subscriptions = mysql_query($query_limit_WADApaypal_subscriptions, $connDB) or die(mysql_error());
			$row_WADApaypal_subscriptions = $model->getSubscriptionResult($query_WADApaypal_subscriptions, $startRow_WADApaypal_subscriptions, $maxRows_WADApaypal_subscriptions);

			if (isset($_GET['totalRows_WADApaypal_subscriptions'])) {
				$totalRows_WADApaypal_subscriptions = $_GET['totalRows_WADApaypal_subscriptions'];
			} else {
				$all_WADApaypal_subscriptions = $model->getAllTable(subscriptions);
				$totalRows_WADApaypal_subscriptions = count($all_WADApaypal_subscriptions);
			}
			$totalPages_WADApaypal_subscriptions = ceil($totalRows_WADApaypal_subscriptions/$maxRows_WADApaypal_subscriptions)-1;
			
			$queryString_WADApaypal_subscriptions = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_subscriptions") == false &&
					stristr($param, "totalRows_WADApaypal_subscriptions") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_subscriptions = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_subscriptions = sprintf("&totalRows_WADApaypal_subscriptions=%d%s", $totalRows_WADApaypal_subscriptions, $queryString_WADApaypal_subscriptions);
			
		
			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
				$this->assignRef('totalRows_WADApaypal_subscriptions', $totalRows_WADApaypal_subscriptions);
				$this->assignRef('pageNum_WADApaypal_subscriptions', $pageNum_WADApaypal_subscriptions);
				$this->assignRef('currentPage', $currentPage);
				$this->assignRef('totalPages_WADApaypal_subscriptions', $totalPages_WADApaypal_subscriptions);
				$this->assignRef('queryString_WADApaypal_subscriptions', $queryString_WADApaypal_subscriptions);
				$this->assignRef('startRow_WADApaypal_subscriptions', $startRow_WADApaypal_subscriptions);
				$this->assignRef('row_WADApaypal_subscriptions', $row_WADApaypal_subscriptions);
				$this->assignRef('WADApaypal_subscriptions', $WADApaypal_subscriptions);
				$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
				$this->assignRef('maxRows_WADApaypal_subscriptions', $maxRows_WADApaypal_subscriptions);
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

			$Paramid_WADApaypal_subscriptions = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$WADApaypal_subscriptions = mysql_query($query_WADApaypal_subscriptions, $connDB) or die(mysql_error());
			$row_WADApaypal_subscriptions = $model->getSubscriptionDelete($Paramid_WADApaypal_subscriptions);
			$totalRows_WADApaypal_subscriptions = count($row_WADApaypal_subscriptions);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_subscriptions";
				$WA_redirectURL = "index.php?option=com_backoffice&view=subscription";
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
			$this->assignRef('row_WADApaypal_subscriptions', $row_WADApaypal_subscriptions);
			$this->assignRef('totalRows_WADApaypal_subscriptions', $totalRows_WADApaypal_subscriptions);
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

			$Paramid_WADApaypal_subscriptions = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_subscriptions = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_subscriptions'])) {
				$ParamSessionid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_subscriptions'] : addslashes($_SESSION['WADA_Insert_paypal_subscriptions']);
			}
			$Paramid2_WADApaypal_subscriptions = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_subscriptions = sprintf("SELECT id, custom, subscr_id, subscr_date, memo, subscr_effective, period1, period2, period3, amount1, amount2, amount3, mc_amount1, mc_amount2, mc_amount3, recurring, reattempt, retry_at, recur_times, username, password, txn_id, payer_email, residence_country, mc_currency, verify_sign, payer_status, first_name, last_name, receiver_email, payer_id, notify_version, item_name, item_number, ipn_status, creation_timestamp, txn_type, test_ipn FROM " . $db_table_prefix . "subscriptions WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_subscriptions, "int"),GetSQLValueString($Paramid2_WADApaypal_subscriptions, "int"),GetSQLValueString($ParamSessionid_WADApaypal_subscriptions, "int"));
			//$WADApaypal_subscriptions = mysql_query($query_WADApaypal_subscriptions, $connDB) or die(mysql_error());
			$row_WADApaypal_subscriptions = $model->getSubscriptionDetail($Paramid_WADApaypal_subscriptions, $Paramid2_WADApaypal_subscriptions, $ParamSessionid_WADApaypal_subscriptions);
			$totalRows_WADApaypal_subscriptions = count($row_WADApaypal_subscriptions);
			$this->assignRef('totalRows_WADApaypal_subscriptions', $totalRows_WADApaypal_subscriptions);
			$this->assignRef('row_WADApaypal_subscriptions', $row_WADApaypal_subscriptions);
			
			$this->setLayout('detail');
		}
		else if($task == 'Insert'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_subscriptions";
				$WA_sessionName = "WADA_Insert_paypal_subscriptions";
				$WA_redirectURL = "index.php?option=com_backoffice&view=subscription&task=Detail";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "custom|subscr_id|subscr_date|subscr_effective|period1|period2|period3|amount1|amount2|amount3|mc_amount1|mc_amount2|mc_amount3|recurring|reattempt|retry_at|recur_times|username|password|txn_id|payer_email|residence_country|mc_currency|verify_sign|payer_status|first_name|last_name|receiver_email|payer_id|notify_version|item_name|item_number|ipn_status|creation_timestamp|txn_type|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_date"]))?$_POST["subscr_date"]:"")  ."" . "|" . "".((isset($_POST["subscr_effective"]))?$_POST["subscr_effective"]:"")  ."" . "|" . "".((isset($_POST["period1"]))?$_POST["period1"]:"")  ."" . "|" . "".((isset($_POST["period2"]))?$_POST["period2"]:"")  ."" . "|" . "".((isset($_POST["period3"]))?$_POST["period3"]:"")  ."" . "|" . "".((isset($_POST["amount1"]))?$_POST["amount1"]:"")  ."" . "|" . "".((isset($_POST["amount2"]))?$_POST["amount2"]:"")  ."" . "|" . "".((isset($_POST["amount3"]))?$_POST["amount3"]:"")  ."" . "|" . "".((isset($_POST["mc_amount1"]))?$_POST["mc_amount1"]:"")  ."" . "|" . "".((isset($_POST["mc_amount2"]))?$_POST["mc_amount2"]:"")  ."" . "|" . "".((isset($_POST["mc_amount3"]))?$_POST["mc_amount3"]:"")  ."" . "|" . "".((isset($_POST["recurring"]))?$_POST["recurring"]:"")  ."" . "|" . "".((isset($_POST["reattempt"]))?$_POST["reattempt"]:"")  ."" . "|" . "".((isset($_POST["retry_at"]))?$_POST["retry_at"]:"")  ."" . "|" . "".((isset($_POST["recur_times"]))?$_POST["recur_times"]:"")  ."" . "|" . "".((isset($_POST["username"]))?$_POST["username"]:"")  ."" . "|" . "".((isset($_POST["password"]))?$_POST["password"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|none,none,NULL";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);
				$WA_connectionDB = $database_connDB;
				$model =& $this->getModel();
				//	mysql_select_db($WA_connectionDB, $WA_connection);
				if (!session_id()) session_start();
				$insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
				$WA_Sql = $model->insertRow($WA_table, $insertParamsObj);
				//	$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
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
				
			$Paramid_WADApaypal_subscriptions = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_subscriptions = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$row_WADApaypal_subscriptions = $model->getSubscriptionUpdate($Paramid_WADApaypal_subscriptions);
			$totalRows_WADApaypal_subscriptions = count($row_WADApaypal_subscriptions);
				
			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_subscriptions";
				$WA_redirectURL = "index.php?option=com_backoffice&view=subscription&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "custom|subscr_id|subscr_date|subscr_effective|period1|period2|period3|amount1|amount2|amount3|mc_amount1|mc_amount2|mc_amount3|recurring|reattempt|retry_at|recur_times|username|password|txn_id|payer_email|residence_country|mc_currency|verify_sign|payer_status|first_name|last_name|receiver_email|payer_id|notify_version|item_name|item_number|ipn_status|creation_timestamp|txn_type|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_date"]))?$_POST["subscr_date"]:"")  ."" . "|" . "".((isset($_POST["subscr_effective"]))?$_POST["subscr_effective"]:"")  ."" . "|" . "".((isset($_POST["period1"]))?$_POST["period1"]:"")  ."" . "|" . "".((isset($_POST["period2"]))?$_POST["period2"]:"")  ."" . "|" . "".((isset($_POST["period3"]))?$_POST["period3"]:"")  ."" . "|" . "".((isset($_POST["amount1"]))?$_POST["amount1"]:"")  ."" . "|" . "".((isset($_POST["amount2"]))?$_POST["amount2"]:"")  ."" . "|" . "".((isset($_POST["amount3"]))?$_POST["amount3"]:"")  ."" . "|" . "".((isset($_POST["mc_amount1"]))?$_POST["mc_amount1"]:"")  ."" . "|" . "".((isset($_POST["mc_amount2"]))?$_POST["mc_amount2"]:"")  ."" . "|" . "".((isset($_POST["mc_amount3"]))?$_POST["mc_amount3"]:"")  ."" . "|" . "".((isset($_POST["recurring"]))?$_POST["recurring"]:"")  ."" . "|" . "".((isset($_POST["reattempt"]))?$_POST["reattempt"]:"")  ."" . "|" . "".((isset($_POST["retry_at"]))?$_POST["retry_at"]:"")  ."" . "|" . "".((isset($_POST["recur_times"]))?$_POST["recur_times"]:"")  ."" . "|" . "".((isset($_POST["username"]))?$_POST["username"]:"")  ."" . "|" . "".((isset($_POST["password"]))?$_POST["password"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["residence_country"]))?$_POST["residence_country"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|none,none,NULL";
				$WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | = | = | = | = | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | = ";
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
				$model =& $this->getModel();
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
$this->assignRef('row_WADApaypal_subscriptions', $row_WADApaypal_subscriptions);
$this->assignRef('totalRows_WADApaypal_subscriptions', $totalRows_WADApaypal_subscriptions);
			$this->setLayout('update');
		}
		parent::display($tpl);
	}
}
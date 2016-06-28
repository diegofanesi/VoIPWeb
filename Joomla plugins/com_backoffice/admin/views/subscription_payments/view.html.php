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

class BackofficeViewSubscription_payments extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_subscriptionpaymentsresults"] = '';

			// check if subscr_id was passed
			if(isset($_GET['subscr_id']))
			$_SESSION["WADbSearch1_subscriptionpaymentsresults"] = '';

			//WA Database Search Include

			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_subscription_payments;
			//Searchpage: subscription-payments-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("memo","S_memo","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_name","S_item_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_number","S_item_number","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("os0","S_os0","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("on0","S_on0","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("os1","S_os1","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("on1","S_on1","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("quantity","S_quantity","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("pending_reason","S_pending_reason","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("tax","S_tax","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_country","S_address_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("subscr_id","S_subscr_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_subscriptionpaymentsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_subscriptionpaymentsresults"]) && $_SESSION["WADbSearch1_subscriptionpaymentsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_subscriptionpaymentsresults"];
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

			$maxRows_WADApaypal_subscription_payments = 10;
			$pageNum_WADApaypal_subscription_payments = 0;
			if (isset($_GET['pageNum_WADApaypal_subscription_payments'])) {
				$pageNum_WADApaypal_subscription_payments = $_GET['pageNum_WADApaypal_subscription_payments'];
			}
			$startRow_WADApaypal_subscription_payments = $pageNum_WADApaypal_subscription_payments * $maxRows_WADApaypal_subscription_payments;
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			$query_WADApaypal_subscription_payments = "SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, test_ipn FROM paypal_ipn_subscription_payments ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_subscription_payments,$WADbSearch1,false);
			//$query_limit_WADApaypal_subscription_payments = sprintf("%s LIMIT %d, %d", $query_WADApaypal_subscription_payments, $startRow_WADApaypal_subscription_payments, $maxRows_WADApaypal_subscription_payments);
			//$WADApaypal_subscription_payments = mysql_query($query_limit_WADApaypal_subscription_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_subscription_payments = $model->getSubscriptionPaymentsResult($query_WADApaypal_subscription_payments, $startRow_WADApaypal_subscription_payments, $maxRows_WADApaypal_subscription_payments);

			if (isset($_GET['totalRows_WADApaypal_subscription_payments'])) {
				$totalRows_WADApaypal_subscription_payments = $_GET['totalRows_WADApaypal_subscription_payments'];
			} else {
				$all_WADApaypal_subscription_payments = $model->getAllTable(subscription_payments);
				$totalRows_WADApaypal_subscription_payments = count($all_WADApaypal_subscription_payments);
			}
			$totalPages_WADApaypal_subscription_payments = ceil($totalRows_WADApaypal_subscription_payments/$maxRows_WADApaypal_subscription_payments)-1;

			$queryString_WADApaypal_subscription_payments = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_subscription_payments") == false &&
					stristr($param, "totalRows_WADApaypal_subscription_payments") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_subscription_payments = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_subscription_payments = sprintf("&totalRows_WADApaypal_subscription_payments=%d%s", $totalRows_WADApaypal_subscription_payments, $queryString_WADApaypal_subscription_payments);


			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('totalRows_WADApaypal_subscription_payments', $totalRows_WADApaypal_subscription_payments);
			$this->assignRef('pageNum_WADApaypal_subscription_payments', $pageNum_WADApaypal_subscription_payments);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_subscription_payments', $totalPages_WADApaypal_subscription_payments);
			$this->assignRef('queryString_WADApaypal_subscription_payments', $queryString_WADApaypal_subscription_payments);
			$this->assignRef('startRow_WADApaypal_subscription_payments', $startRow_WADApaypal_subscription_payments);
			$this->assignRef('maxRows_WADApaypal_subscription_payments', $maxRows_WADApaypal_subscription_payments);
			$this->assignRef('row_WADApaypal_subscription_payments', $row_WADApaypal_subscription_payments);
			$this->assignRef('WADApaypal_subscription_payments', $WADApaypal_subscription_payments);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);

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

			$Paramid_WADApaypal_subscription_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_subscription_payments = sprintf("SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "subscription_payments WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_subscription_payments, "int"));
			//$WADApaypal_subscription_payments = mysql_query($query_WADApaypal_subscription_payments, $connDB) or die(mysql_error());
			$model =& $this->getModel();
			$row_WADApaypal_subscription_payments = $model->getSubscriptionPaymentsDelete($Paramid_WADApaypal_subscription_payments);
			$totalRows_WADApaypal_subscription_payments = count($row_WADApaypal_subscription_payments);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_subscription_payments";
				$WA_redirectURL = "index.php?option=com_backoffice&view=subscription_payments";
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

			$this->assignRef('row_WADApaypal_subscription_payments', $row_WADApaypal_subscription_payments);
			$this->assignRef('totalRows_WADApaypal_subscription_payments', $totalRows_WADApaypal_subscription_payments);

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
			
			$Paramid_WADApaypal_subscription_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_subscription_payments = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_subscription_payments'])) {
				$ParamSessionid_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_subscription_payments'] : addslashes($_SESSION['WADA_Insert_paypal_subscription_payments']);
			}
			$Paramid2_WADApaypal_subscription_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_subscription_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_subscription_payments = sprintf("SELECT id, first_name, last_name, payer_email, memo, item_name, item_number, os0, on0, os1, on1, quantity, payment_date, payment_type, txn_id, mc_gross, mc_fee, payment_status, pending_reason, txn_type, tax, mc_currency, reason_code, custom, address_country, subscr_id, payer_status, ipn_status, creation_timestamp, test_ipn FROM " . $db_table_prefix . "subscription_payments WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_subscription_payments, "int"),GetSQLValueString($Paramid2_WADApaypal_subscription_payments, "int"),GetSQLValueString($ParamSessionid_WADApaypal_subscription_payments, "int"));
			//$WADApaypal_subscription_payments = mysql_query($query_WADApaypal_subscription_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_subscription_payments = $model->getSubscriptionPaymentsDetail($Paramid_WADApaypal_subscription_payments, $Paramid2_WADApaypal_subscription_payments, $ParamSessionid_WADApaypal_subscription_payments );
			$totalRows_WADApaypal_subscription_payments = count($row_WADApaypal_subscription_payments);
			$this->assignRef('totalRows_WADApaypal_subscription_payments', $totalRows_WADApaypal_subscription_payments);
			$this->assignRef('row_WADApaypal_subscription_payments', $row_WADApaypal_subscription_payments);
			$this->setLayout('detail');


		}else if($task == 'Search'){
			$this->setLayout('search');
		} 
		parent::display($tpl); 
	} 
} 
?>


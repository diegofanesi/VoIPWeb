<?php
// Impedisce l'accesso diretto al file
defined('_JEXEC') or die( 'Restricted access' );

// Include la classe base JView
jimport('joomla.application.component.view');

//WA AltClass Iterator
class WA_AltClassIterator     {
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

class BackofficeViewOrders extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_ordersresults"] = '';
			//WA Database Search Include
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_orders;
			//Searchpage: orders-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations
					
				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_status","S_payment_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("pending_reason","S_pending_reason","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("tax","S_tax","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("first_name","S_first_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("last_name","S_last_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_street","S_address_street","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_city","S_address_city","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_state","S_address_state","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_zip","S_address_zip","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_country","S_address_country","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_status","S_address_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_status","S_payer_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_type","S_payment_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("address_name","S_address_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("protection_eligibility","S_protection_eligibility","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("subscr_id","S_subscr_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("contact_phone","S_contact_phone","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_name","S_item_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_number","S_item_number","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("invoice","S_invoice","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("for_auction","S_for_auction","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("auction_buyer_id","S_auction_buyer_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("auction_closing_date","S_auction_closing_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("auction_multi_item","S_auction_multi_item","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("address_country_code","S_address_country_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_business_name","S_payer_business_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receiver_id","S_receiver_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);
					
				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_ordersresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_ordersresults"]) && $_SESSION["WADbSearch1_ordersresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_ordersresults"];
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
			$maxRows_WADApaypal_orders = 10;
			$pageNum_WADApaypal_orders = 0;
			if (isset($_GET['pageNum_WADApaypal_orders'])) {
				$pageNum_WADApaypal_orders = $_GET['pageNum_WADApaypal_orders'];
			}
			$startRow_WADApaypal_orders = $pageNum_WADApaypal_orders * $maxRows_WADApaypal_orders;
			$model =& $this->getModel();
			$query_WADApaypal_orders = "SELECT id, receiver_email, payment_status, pending_reason, payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type, first_name, last_name, address_street, address_city, address_state, address_zip, address_country, address_status, payer_email, payer_status, payment_type, notify_version, verify_sign, address_name, protection_eligibility, ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number, invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item, creation_timestamp, address_country_code, payer_business_name, receiver_id, test_ipn FROM paypal_ipn_orders ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_orders,$WADbSearch1,false);
			$row_WADApaypal_orders = $model->getOrders($query_WADApaypal_orders, $startRow_WADApaypal_orders, $maxRows_WADApaypal_orders);

			if (isset($_GET['totalRows_WADApaypal_orders'])) {
				$totalRows_WADApaypal_orders = $_GET['totalRows_WADApaypal_orders'];
			} else {
				$totalRows_WADApaypal_orders = count($model->getOrdersAll());
			}
			$totalPages_WADApaypal_orders = ceil($totalRows_WADApaypal_orders/$maxRows_WADApaypal_orders)-1;
			$queryString_WADApaypal_orders = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_orders") == false &&
					stristr($param, "totalRows_WADApaypal_orders") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_orders = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_orders = sprintf("%s&totalRows_WADApaypal_orders=%d", $queryString_WADApaypal_orders, $totalRows_WADApaypal_orders);

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('row_WADApaypal_orders', $row_WADApaypal_orders);
			$this->assignRef('pageNum_WADApaypal_orders', $pageNum_WADApaypal_orders);
			$this->assignRef('startRow_WADApaypal_orders', $startRow_WADApaypal_orders);
			$this->assignRef('maxRows_WADApaypal_orders', $maxRows_WADApaypal_orders);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			$this->assignRef('totalRows_WADApaypal_orders', $totalRows_WADApaypal_orders);
			$this->assignRef('totalPages_WADApaypal_orders', $totalPages_WADApaypal_orders);
			$this->assignRef('queryString_WADApaypal_orders', $queryString_WADApaypal_orders);
				
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
			$Paramid_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_orders = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_orders'])) {
				$ParamSessionid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_orders'] : addslashes($_SESSION['WADA_Insert_paypal_orders']);
			}
			$Paramid2_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			$row_WADApaypal_orders = $model->getOrdersById($Paramid_WADApaypal_orders, $Paramid2_WADApaypal_orders, $ParamSessionid_WADApaypal_orders);
			$totalRows_WADApaypal_orders = count($row_WADApaypal_orders);

			$varOrderID_rsOrderItems = "1";
			if (isset($row_WADApaypal_orders['id'])) {
				$varOrderID_rsOrderItems = (get_magic_quotes_gpc()) ? $row_WADApaypal_orders['id'] : addslashes($row_WADApaypal_orders['id']);
			}
			$row_rsOrderItems = $model->getOrdersItemById($varOrderID_rsOrderItems);
			$totalRows_rsOrderItems = count($row_rsOrderItems);
			$this->assignRef('row_WADApaypal_orders', $row_WADApaypal_orders);
			$this->assignRef('row_rsOrderItems', $row_rsOrderItems);
			$this->assignRef('totalRows_rsOrderItems', $totalRows_rsOrderItems);
			$this->assignRef('totalRows_WADApaypal_orders', $totalRows_WADApaypal_orders);
			$this->setLayout('detail');
		}
		else if($task == 'Update'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
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
			$Paramid_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			$row_WADApaypal_orders = $model->getOrdersUpdate($Paramid_WADApaypal_orders);
			$totalRows_WADApaypal_orders = count($row_WADApaypal_orders);
			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_orders";
				$WA_redirectURL = "index.php?option=com_backoffice&view=orders&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "receiver_email|payment_status|pending_reason|payment_date|mc_gross|mc_fee|tax|mc_currency|txn_id|txn_type|first_name|last_name|address_street|address_city|address_state|address_zip|address_country|address_status|payer_email|payer_status|payment_type|address_name|protection_eligibility|ipn_status|subscr_id|custom|reason_code|contact_phone|item_name|item_number|invoice|for_auction|auction_buyer_id|auction_closing_date|auction_multi_item|creation_timestamp|address_country_code|payer_business_name|receiver_id|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["pending_reason"]))?$_POST["pending_reason"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["tax"]))?$_POST["tax"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["address_street"]))?$_POST["address_street"]:"")  ."" . "|" . "".((isset($_POST["address_city"]))?$_POST["address_city"]:"")  ."" . "|" . "".((isset($_POST["address_state"]))?$_POST["address_state"]:"")  ."" . "|" . "".((isset($_POST["address_zip"]))?$_POST["address_zip"]:"")  ."" . "|" . "".((isset($_POST["address_country"]))?$_POST["address_country"]:"")  ."" . "|" . "".((isset($_POST["address_status"]))?$_POST["address_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["address_name"]))?$_POST["address_name"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["contact_phone"]))?$_POST["contact_phone"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["for_auction"]))?$_POST["for_auction"]:"")  ."" . "|" . "".((isset($_POST["auction_buyer_id"]))?$_POST["auction_buyer_id"]:"")  ."" . "|" . "".((isset($_POST["auction_closing_date"]))?$_POST["auction_closing_date"]:"")  ."" . "|" . "".((isset($_POST["auction_multi_item"]))?$_POST["auction_multi_item"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["address_country_code"]))?$_POST["address_country_code"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|none,none,NULL|',none,NULL|',none,''|',none,''|',none,''|none,none,NULL";
				$WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | = | = | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | = | = | LIKE | LIKE | LIKE | = ";
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
			$this->assignRef('row_WADApaypal_orders', $row_WADApaypal_orders);
			$this->assignRef('totalRows_WADApaypal_orders', $totalRows_WADApaypal_orders);
			$this->setLayout('update');
		}
		else if($task == 'Insert'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
			// WA Application Builder Insert
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_orders";
				$WA_sessionName = "WADA_Insert_paypal_orders";
				$WA_redirectURL = "index.php?option=com_backoffice&view=orders&task=Detail";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "receiver_email|payment_status|pending_reason|payment_date|mc_gross|mc_fee|tax|mc_currency|txn_id|txn_type|first_name|last_name|address_street|address_city|address_state|address_zip|address_country|address_status|payer_email|payer_status|payment_type|address_name|protection_eligibility|ipn_status|subscr_id|custom|reason_code|contact_phone|item_name|item_number|invoice|for_auction|auction_buyer_id|auction_closing_date|auction_multi_item|creation_timestamp|address_country_code|payer_business_name|receiver_id|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["receiver_email"]))?$_POST["receiver_email"]:"")  ."" . "|" . "".((isset($_POST["payment_status"]))?$_POST["payment_status"]:"")  ."" . "|" . "".((isset($_POST["pending_reason"]))?$_POST["pending_reason"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_fee"]))?$_POST["mc_fee"]:"")  ."" . "|" . "".((isset($_POST["tax"]))?$_POST["tax"]:"")  ."" . "|" . "".((isset($_POST["mc_currency"]))?$_POST["mc_currency"]:"")  ."" . "|" . "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["first_name"]))?$_POST["first_name"]:"")  ."" . "|" . "".((isset($_POST["last_name"]))?$_POST["last_name"]:"")  ."" . "|" . "".((isset($_POST["address_street"]))?$_POST["address_street"]:"")  ."" . "|" . "".((isset($_POST["address_city"]))?$_POST["address_city"]:"")  ."" . "|" . "".((isset($_POST["address_state"]))?$_POST["address_state"]:"")  ."" . "|" . "".((isset($_POST["address_zip"]))?$_POST["address_zip"]:"")  ."" . "|" . "".((isset($_POST["address_country"]))?$_POST["address_country"]:"")  ."" . "|" . "".((isset($_POST["address_status"]))?$_POST["address_status"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_status"]))?$_POST["payer_status"]:"")  ."" . "|" . "".((isset($_POST["payment_type"]))?$_POST["payment_type"]:"")  ."" . "|" . "".((isset($_POST["address_name"]))?$_POST["address_name"]:"")  ."" . "|" . "".((isset($_POST["protection_eligibility"]))?$_POST["protection_eligibility"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["contact_phone"]))?$_POST["contact_phone"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["for_auction"]))?$_POST["for_auction"]:"")  ."" . "|" . "".((isset($_POST["auction_buyer_id"]))?$_POST["auction_buyer_id"]:"")  ."" . "|" . "".((isset($_POST["auction_closing_date"]))?$_POST["auction_closing_date"]:"")  ."" . "|" . "".((isset($_POST["auction_multi_item"]))?$_POST["auction_multi_item"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["address_country_code"]))?$_POST["address_country_code"]:"")  ."" . "|" . "".((isset($_POST["payer_business_name"]))?$_POST["payer_business_name"]:"")  ."" . "|" . "".((isset($_POST["receiver_id"]))?$_POST["receiver_id"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|',none,''|none,none,NULL|',none,NULL|',none,''|',none,''|',none,''|none,none,NULL";
				$WA_fieldNames = explode("|", $WA_fieldNamesStr);
				$WA_fieldValues = explode("|", $WA_fieldValuesStr);
				$WA_columns = explode("|", $WA_columnTypesStr);
				$WA_connectionDB = $database_connDB;
				//mysql_select_db($WA_connectionDB, $WA_connection);
				$model =& $this->getModel();
				if (!session_id()) session_start();
				$insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
				$WA_Sql = $model->insertRow($WA_table, $insertParamsObj);
			 // $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
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
		else if($task == 'Delete'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
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
			$Paramid_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			$row_WADApaypal_orders = $model->getOrdersDelete($Paramid_WADApaypal_orders);
			$totalRows_WADApaypal_orders = count($row_WADApaypal_orders);
			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{

				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_orders";
				$WA_table_items =  "paypal_ipn_order_items";
				$WA_redirectURL = "index.php?option=com_backoffice&view=orders";
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

				$model =& $this->getModel();

				//mysql_select_db($WA_connectionDB, $WA_connection);
				if (!session_id()) session_start();

				$deleteParamsObj = WA_AB_generateWhereClause($WA_fieldNames, $WA_columns, $WA_fieldValues, $WA_comparisions);
				$WA_Sql = $model->deleteRow($WA_table, $deleteParamsObj);

				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				//$WA_Sql = $model->getDeleteOrders($WA_table_items, $Paramid_WADApaypal_orders);
				//$MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
				if ($WA_redirectURL != "")  {
					if ($WA_keepQueryString && $WA_redirectURL != "" && isset($_SERVER["QUERY_STRING"]) && $_SERVER["QUERY_STRING"] !== "" && sizeof($_POST) > 0) {
						$WA_redirectURL .= ((strpos($WA_redirectURL, '?') === false)?"?":"&").$_SERVER["QUERY_STRING"];
					}
					header("Location: ".$WA_redirectURL);
				}
			}
			$this->assignRef('row_WADApaypal_orders', $row_WADApaypal_orders);
			$this->assignRef('totalRows_WADApaypal_orders', $totalRows_WADApaypal_orders);
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
			
			$Paramid_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_orders = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_orders'])) {
				$ParamSessionid_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_orders'] : addslashes($_SESSION['WADA_Insert_paypal_orders']);
			}
			$Paramid2_WADApaypal_orders = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_orders = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			
			$query_WADApaypal_orders = sprintf("SELECT id, receiver_email, payment_status, pending_reason, memo, payment_date, mc_gross, mc_fee, tax, mc_currency, txn_id, txn_type, first_name, last_name, address_street, address_city, address_state, address_zip, address_country, address_status, payer_email, payer_status, payment_type, notify_version, verify_sign, address_name, protection_eligibility, ipn_status, subscr_id, custom, reason_code, contact_phone, item_name, item_number, invoice, for_auction, auction_buyer_id, auction_closing_date, auction_multi_item, handling_amount, shipping_discount, insurance_amount, creation_timestamp, address_country_code, payer_business_name, btn_id, option_name1, option_selection1, option_name2, option_selection2, shipping_method, transaction_subject, receiver_id, test_ipn, mc_shipping, shipping FROM paypal_ipn_orders WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_orders, "int"),GetSQLValueString($Paramid2_WADApaypal_orders, "int"),GetSQLValueString($ParamSessionid_WADApaypal_orders, "int"));
			//$WADApaypal_orders = mysql_query($query_WADApaypal_orders, $connDB) or die(mysql_error());
			$row_WADApaypal_orders = $model->getOrdersDetail($Paramid_WADApaypal_orders, $Paramid2_WADApaypal_orders, $ParamSessionid_WADApaypal_orders);
			$totalRows_WADApaypal_orders = count($row_WADApaypal_orders);

			$varOrderID_rsOrderItems = "1";
			if (isset($row_WADApaypal_orders['id'])) {
				$varOrderID_rsOrderItems = (get_magic_quotes_gpc()) ? $row_WADApaypal_orders['id'] : addslashes($row_WADApaypal_orders['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$query_rsOrderItems = sprintf("SELECT * FROM " . $db_table_prefix . "order_items WHERE " . $db_table_prefix . "order_items.order_id = %s", GetSQLValueString($varOrderID_rsOrderItems, "int"));
			//$rsOrderItems = mysql_query($query_rsOrderItems, $connDB) or die(mysql_error());
			$model =& $this->getModel();
			$row_rsOrderItems = $model->getOrdersDetail2($varOrderID_rsOrderItems);
			$totalRows_rsOrderItems = count($row_rsOrderItems);

			$this->setLayout('detail');

		 } 
		 parent::display($tpl); 
	} 
} 
?>

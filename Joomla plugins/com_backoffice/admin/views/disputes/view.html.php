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

class BackofficeViewDisputes extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_disputesresults"] = '';

			//WA Database Search Include
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');

			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_disputes;
			//Searchpage: disputes-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("txn_id","S_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("case_id","S_case_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("case_type","S_case_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("case_creation_date","S_case_creation_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payment_date","S_payment_date","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("receipt_id","S_receipt_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("verify_sign","S_verify_sign","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_email","S_payer_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("payer_id","S_payer_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("invoice","S_invoice","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("reason_code","S_reason_code","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("notify_version","S_notify_version","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_disputesresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_disputesresults"]) && $_SESSION["WADbSearch1_disputesresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_disputesresults"];
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

			$maxRows_WADApaypal_disputes = 10;
			$pageNum_WADApaypal_disputes = 0;
			if (isset($_GET['pageNum_WADApaypal_disputes'])) {
				$pageNum_WADApaypal_disputes = $_GET['pageNum_WADApaypal_disputes'];
			}
			$startRow_WADApaypal_disputes = $pageNum_WADApaypal_disputes * $maxRows_WADApaypal_disputes;
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			$query_WADApaypal_disputes = "SELECT id, txn_id, case_id, case_type, case_creation_date, payment_date, receipt_id, verify_sign, payer_email, payer_id, invoice, reason_code, custom, notify_version, creation_timestamp, ipn_status, txn_type, test_ipn FROM paypal_ipn_disputes ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_disputes,$WADbSearch1,false);
			//$query_limit_WADApaypal_disputes = sprintf("%s LIMIT %d, %d", $query_WADApaypal_disputes, $startRow_WADApaypal_disputes, $maxRows_WADApaypal_disputes);
			//$WADApaypal_disputes = $query_limit_WADApaypal_disputes;
			$row_WADApaypal_disputes = $model->getDisputesResult($query_WADApaypal_disputes, $startRow_WADApaypal_disputes, $maxRows_WADApaypal_disputes);
			//print_r($row_WADApaypal_disputes);
			//print $startRow_WADApaypal_disputes;
			if (isset($_GET['totalRows_WADApaypal_disputes'])) {
				$totalRows_WADApaypal_disputes = $_GET['totalRows_WADApaypal_disputes'];
			} else {
				$all_WADApaypal_disputes = $model->getAllTable(disputes);
				$totalRows_WADApaypal_disputes = count($all_WADApaypal_disputes);
			}
			$totalPages_WADApaypal_disputes = ceil($totalRows_WADApaypal_disputes/$maxRows_WADApaypal_disputes)-1;

			$queryString_WADApaypal_disputes = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_disputes") == false &&
					stristr($param, "totalRows_WADApaypal_disputes") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_disputes = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_disputes = sprintf("&totalRows_WADApaypal_disputes=%d%s", $totalRows_WADApaypal_disputes, $queryString_WADApaypal_disputes);

			//WA AltClass Iterator

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('startRow_WADApaypal_disputes', $startRow_WADApaypal_disputes);
			$this->assignRef('maxRows_WADApaypal_disputes', $maxRows_WADApaypal_disputes);
			$this->assignRef('totalRows_WADApaypal_disputes', $totalRows_WADApaypal_disputes);
			$this->assignRef('row_WADApaypal_disputes', $row_WADApaypal_disputes);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			$this->assignRef('WADApaypal_disputes', $WADApaypal_disputes);
			$this->assignRef('pageNum_WADApaypal_disputes', $pageNum_WADApaypal_disputes);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_disputes', $totalPages_WADApaypal_disputes);
			$this->assignRef('queryString_WADApaypal_disputes', $queryString_WADApaypal_disputes);
			//$this->assignRef('', );
			
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

			$Paramid_WADApaypal_disputes = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$WADApaypal_disputes = mysql_query($query_WADApaypal_disputes, $connDB) or die(mysql_error());
			$row_WADApaypal_disputes = $model->getDisputesDelete($Paramid_WADApaypal_disputes);
			$totalRows_WADApaypal_disputes = count($row_WADApaypal_disputes);
			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_disputes";
				$WA_redirectURL = "index.php?option=com_backoffice&view=disputes";
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
				//if (!session_id()) session_start();
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

			$this->assignRef('totalRows_WADApaypal_disputes', $totalRows_WADApaypal_disputes);
			$this->assignRef('row_WADApaypal_disputes', $row_WADApaypal_disputes);

			$this->setLayout('delete');
		}

		else if($task == 'Detail'){
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

			$Paramid_WADApaypal_disputes = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_disputes = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_disputes'])) {
				$ParamSessionid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_disputes'] : addslashes($_SESSION['WADA_Insert_paypal_disputes']);
			}
			$Paramid2_WADApaypal_disputes = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$WADApaypal_disputes = mysql_query($query_WADApaypal_disputes, $connDB) or die(mysql_error());
			$row_WADApaypal_disputes = $model->getDisputesDetail($Paramid_WADApaypal_disputes, $Paramid2_WADApaypal_disputes, $ParamSessionid_WADApaypal_disputes);
			$totalRows_WADApaypal_disputes = count($row_WADApaypal_disputes);

			$this->assignRef('totalRows_WADApaypal_disputes', $totalRows_WADApaypal_disputes);
			$this->assignRef('row_WADApaypal_disputes', $row_WADApaypal_disputes);


			$this->setLayout('detail');
		}
		else if($task == 'Insert'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			// WA Application Builder Insert
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_disputes";
				$WA_sessionName = "WADA_Insert_paypal_disputes";
				$WA_redirectURL = "index.php?option=com_backoffice&view=disputes&task=Detail";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "txn_id|case_id|case_type|case_creation_date|payment_date|receipt_id|verify_sign|payer_email|payer_id|invoice|reason_code|custom|notify_version|creation_timestamp|ipn_status|txn_type|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["case_id"]))?$_POST["case_id"]:"")  ."" . "|" . "".((isset($_POST["case_type"]))?$_POST["case_type"]:"")  ."" . "|" . "".((isset($_POST["case_creation_date"]))?$_POST["case_creation_date"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["receipt_id"]))?$_POST["receipt_id"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|',none,''|none,none,NULL";
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

			$Paramid_WADApaypal_disputes = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_disputes = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			//$WADApaypal_disputes = mysql_query($query_WADApaypal_disputes, $connDB) or die(mysql_error());
			$row_WADApaypal_disputes = $model->getDisputesUpdate($Paramid_WADApaypal_disputes);
			$totalRows_WADApaypal_disputes = count($row_WADApaypal_disputes);

			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_disputes";
				$WA_redirectURL = "index.php?option=com_backoffice&view=disputes&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "txn_id|case_id|case_type|case_creation_date|payment_date|receipt_id|verify_sign|payer_email|payer_id|invoice|reason_code|custom|notify_version|creation_timestamp|ipn_status|txn_type|test_ipn";
				$WA_fieldValuesStr = "".((isset($_POST["txn_id"]))?$_POST["txn_id"]:"")  ."" . "|" . "".((isset($_POST["case_id"]))?$_POST["case_id"]:"")  ."" . "|" . "".((isset($_POST["case_type"]))?$_POST["case_type"]:"")  ."" . "|" . "".((isset($_POST["case_creation_date"]))?$_POST["case_creation_date"]:"")  ."" . "|" . "".((isset($_POST["payment_date"]))?$_POST["payment_date"]:"")  ."" . "|" . "".((isset($_POST["receipt_id"]))?$_POST["receipt_id"]:"")  ."" . "|" . "".((isset($_POST["verify_sign"]))?$_POST["verify_sign"]:"")  ."" . "|" . "".((isset($_POST["payer_email"]))?$_POST["payer_email"]:"")  ."" . "|" . "".((isset($_POST["payer_id"]))?$_POST["payer_id"]:"")  ."" . "|" . "".((isset($_POST["invoice"]))?$_POST["invoice"]:"")  ."" . "|" . "".((isset($_POST["reason_code"]))?$_POST["reason_code"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["notify_version"]))?$_POST["notify_version"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["ipn_status"]))?$_POST["ipn_status"]:"")  ."" . "|" . "".((isset($_POST["txn_type"]))?$_POST["txn_type"]:"")  ."" . "|" . "".((isset($_POST["test_ipn"]))?$_POST["test_ipn"]:"")  ."";
				$WA_columnTypesStr = "',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,NULL|',none,''|',none,''|none,none,NULL";
				$WA_comparisonStr = " LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | LIKE | = ";
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
			$this->assignRef('totalRows_WADApaypal_disputes', $totalRows_WADApaypal_disputes);
			$this->assignRef('row_WADApaypal_disputes', $row_WADApaypal_disputes);
			
			$this->setLayout('update');
		}
		parent::display($tpl);
	}
}
?>
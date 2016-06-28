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

class BackofficeViewOrder_items extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){

			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_orderitemsresults"] = '';

			//WA Database Search Include


			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_order_items;
			//Searchpage: orders-items-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("order_id","S_order_id","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("refund_id","S_refund_id","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("item_name","S_item_name","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("item_number","S_item_number","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("os0","S_os0","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("on0","S_on0","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("os1","S_os1","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("on1","S_on1","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("quantity","S_quantity","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("custom","S_custom","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_handling","S_mc_handling","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_shipping","S_mc_shipping","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("raw_log_id","S_raw_log_id","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_orderitemsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_orderitemsresults"]) && $_SESSION["WADbSearch1_orderitemsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_orderitemsresults"];
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

			$maxRows_WADApaypal_order_items = 10;
			$pageNum_WADApaypal_order_items = 0;
			if (isset($_GET['pageNum_WADApaypal_order_items'])) {
				$pageNum_WADApaypal_order_items = $_GET['pageNum_WADApaypal_order_items'];
			}
			$startRow_WADApaypal_order_items = $pageNum_WADApaypal_order_items * $maxRows_WADApaypal_order_items;

			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$query_WADApaypal_order_items = "SELECT id, order_id, refund_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_order_items,$WADbSearch1,false);

			//$WADApaypal_order_items = mysql_query($query_limit_WADApaypal_order_items, $connDB) or die(mysql_error());
			$row_WADApaypal_order_items = $model->getOrdersItemsResult($query_WADApaypal_order_items, $startRow_WADApaypal_order_items, $maxRows_WADApaypal_order_items);

			if (isset($_GET['totalRows_WADApaypal_order_items'])) {
				$totalRows_WADApaypal_order_items = $_GET['totalRows_WADApaypal_order_items'];
			} else {
				$all_WADApaypal_order_items = $model->getAllTable(order_items);
				$totalRows_WADApaypal_order_items = count($all_WADApaypal_order_items);
			}
			$totalPages_WADApaypal_order_items = ceil($totalRows_WADApaypal_order_items/$maxRows_WADApaypal_order_items)-1;

			$queryString_WADApaypal_order_items = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_order_items") == false &&
					stristr($param, "totalRows_WADApaypal_order_items") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_order_items = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_order_items = sprintf("&totalRows_WADApaypal_order_items=%d%s", $totalRows_WADApaypal_order_items, $queryString_WADApaypal_order_items);

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));

			$this->assignRef('totalRows_WADApaypal_order_items', $totalRows_WADApaypal_order_items);
			$this->assignRef('startRow_WADApaypal_order_items', $startRow_WADApaypal_order_items);
			$this->assignRef('pageNum_WADApaypal_order_items', $pageNum_WADApaypal_order_items);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_order_items', $totalPages_WADApaypal_order_items);
			$this->assignRef('queryString_WADApaypal_order_items', $queryString_WADApaypal_order_items);
			$this->assignRef('maxRows_WADApaypal_order_items', $maxRows_WADApaypal_order_items);
			$this->assignRef('row_WADApaypal_order_items', $row_WADApaypal_order_items);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);
			$this->assignRef('WADApaypal_order_items', $WADApaypal_order_items);


		}
		else if($task == 'Delete'){
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
			$Paramid_WADApaypal_order_items = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$query_WADApaypal_order_items = sprintf("SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM paypal_ipn_order_items WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_order_items, "int"));
			//$WADApaypal_order_items = mysql_query($query_WADApaypal_order_items, $connDB) or die(mysql_error());
			$row_WADApaypal_order_items = $model->getOrdersItemsDelete($Paramid_WADApaypal_order_items);
			$totalRows_WADApaypal_order_items = count($row_WADApaypal_order_items);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
				$WA_connection = $connDB;
				$WA_table =  "paypal_ipn_order_items";
				$WA_redirectURL = "index.php?option=com_backoffice&view=order_items";
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
			$this->assignRef('row_WADApaypal_order_items', $row_WADApaypal_order_items);
			$this->assignRef('totalRows_WADApaypal_order_items', $totalRows_WADApaypal_order_items);
			$this->setLayout('delete');
		}
		else if($task == 'Insert'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');
			if (isset($_POST["Insert_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_order_items";
				$WA_sessionName = "WADA_Insert_paypal_order_items";
				$WA_redirectURL = "index.php?option=com_backoffice&view=order_items";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "order_id|refund_id|subscr_id|item_name|item_number|os0|on0|os1|on1|quantity|custom|mc_gross|mc_handling|mc_shipping|creation_timestamp|raw_log_id";
				$WA_fieldValuesStr = "".((isset($_POST["order_id"]))?$_POST["order_id"]:"")  ."" . "|" . "".((isset($_POST["refund_id"]))?$_POST["refund_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["os0"]))?$_POST["os0"]:"")  ."" . "|" . "".((isset($_POST["on0"]))?$_POST["on0"]:"")  ."" . "|" . "".((isset($_POST["os1"]))?$_POST["os1"]:"")  ."" . "|" . "".((isset($_POST["on1"]))?$_POST["on1"]:"")  ."" . "|" . "".((isset($_POST["quantity"]))?$_POST["quantity"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["raw_log_id"]))?$_POST["raw_log_id"]:"")  ."";
				$WA_columnTypesStr = "none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,NULL|none,none,NULL";
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
		else if($task == 'Update'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
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

			$Paramid_WADApaypal_order_items = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();

			//$WADApaypal_order_items = mysql_query($query_WADApaypal_order_items, $connDB) or die(mysql_error());
			$row_WADApaypal_order_items = $model->getOrdersItemsUpdate($Paramid_WADApaypal_order_items);
			$totalRows_WADApaypal_order_items = count($row_WADApaypal_order_items); //Modificato

			// WA Application Builder Update
			if (isset($_POST["Update_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_order_items";
				$WA_redirectURL = "index.php?option=com_backoffice&view=order_items&task=Detail&id=".((isset($_POST["WADAUpdateRecordID"]))?$_POST["WADAUpdateRecordID"]:"")  ."";
				$WA_keepQueryString = false;
				$WA_indexField = "id";
				$WA_fieldNamesStr = "order_id|refund_id|subscr_id|item_name|item_number|os0|on0|os1|on1|quantity|custom|mc_gross|mc_handling|mc_shipping|creation_timestamp|raw_log_id";
				$WA_fieldValuesStr = "".((isset($_POST["order_id"]))?$_POST["order_id"]:"")  ."" . "|" . "".((isset($_POST["refund_id"]))?$_POST["refund_id"]:"")  ."" . "|" . "".((isset($_POST["subscr_id"]))?$_POST["subscr_id"]:"")  ."" . "|" . "".((isset($_POST["item_name"]))?$_POST["item_name"]:"")  ."" . "|" . "".((isset($_POST["item_number"]))?$_POST["item_number"]:"")  ."" . "|" . "".((isset($_POST["os0"]))?$_POST["os0"]:"")  ."" . "|" . "".((isset($_POST["on0"]))?$_POST["on0"]:"")  ."" . "|" . "".((isset($_POST["os1"]))?$_POST["os1"]:"")  ."" . "|" . "".((isset($_POST["on1"]))?$_POST["on1"]:"")  ."" . "|" . "".((isset($_POST["quantity"]))?$_POST["quantity"]:"")  ."" . "|" . "".((isset($_POST["custom"]))?$_POST["custom"]:"")  ."" . "|" . "".((isset($_POST["mc_gross"]))?$_POST["mc_gross"]:"")  ."" . "|" . "".((isset($_POST["mc_handling"]))?$_POST["mc_handling"]:"")  ."" . "|" . "".((isset($_POST["mc_shipping"]))?$_POST["mc_shipping"]:"")  ."" . "|" . "".((isset($_POST["creation_timestamp"]))?$_POST["creation_timestamp"]:"")  ."" . "|" . "".((isset($_POST["raw_log_id"]))?$_POST["raw_log_id"]:"")  ."";
				$WA_columnTypesStr = "none,none,NULL|none,none,NULL|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|',none,''|none,none,NULL|',none,''|none,none,NULL|none,none,NULL|none,none,NULL|',none,NULL|none,none,NULL";
				$WA_comparisonStr = " = | = | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | LIKE | = | LIKE | = | = | = | = | = ";
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

			$this->assignRef('totalRows_WADApaypal_order_items', $totalRows_WADApaypal_order_items);
			$this->assignRef('row_WADApaypal_order_items', $row_WADApaypal_order_items);

			$this->setLayout('update');
		}
		else if($task == 'Search'){

			$this->setLayout('search');

		}else if($task == 'Detail'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
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
				
			$Paramid_WADApaypal_order_items = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_order_items = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_order_items'])) {
				$ParamSessionid_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_order_items'] : addslashes($_SESSION['WADA_Insert_paypal_order_items']);
			}
			$Paramid2_WADApaypal_order_items = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_order_items = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$query_WADApaypal_order_items = sprintf("SELECT id, order_id, refund_id, subscr_id, item_name, item_number, os0, on0, os1, on1, quantity, custom, mc_gross, mc_handling, mc_shipping, creation_timestamp, raw_log_id FROM " . $db_table_prefix . "order_items WHERE id = %s OR ( -1= %s AND id= %s)", GetSQLValueString($Paramid_WADApaypal_order_items, "int"),GetSQLValueString($Paramid2_WADApaypal_order_items, "int"),GetSQLValueString($ParamSessionid_WADApaypal_order_items, "int"));
			//$WADApaypal_order_items = mysql_query($query_WADApaypal_order_items, $connDB) or die(mysql_error());
			$row_WADApaypal_order_items = $model->getOrdersItemsDetail($Paramid_WADApaypal_order_items, $Paramid2_WADApaypal_order_items, $ParamSessionid_WADApaypal_order_items);
			$totalRows_WADApaypal_order_items = count($row_WADApaypal_order_items);
				

			$this->assignRef('totalRows_WADApaypal_order_items', $totalRows_WADApaypal_order_items);
			$this->assignRef('row_WADApaypal_order_items', $row_WADApaypal_order_items);
			$this->setLayout('detail');
		 }

			parent::display($tpl); 
	} 
} 

?>

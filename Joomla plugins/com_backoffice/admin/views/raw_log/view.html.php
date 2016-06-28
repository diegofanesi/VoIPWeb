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

class BackofficeViewRaw_log extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_rawlogresults"] = '';
			//WA Database Search Include
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'HelperPHP.php');
			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_raw_log;
			//Searchpage: raw-log-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations
					
				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("created_timestamp","S_created_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("ipn_data_serialized","S_ipn_data_serialized","AND","Includes",0);
					
				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_rawlogresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_rawlogresults"]) && $_SESSION["WADbSearch1_rawlogresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_rawlogresults"];
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
			$maxRows_WADApaypal_raw_log = 10;
			$pageNum_WADApaypal_raw_log = 0;
			if (isset($_GET['pageNum_WADApaypal_raw_log'])) {
				$pageNum_WADApaypal_raw_log = $_GET['pageNum_WADApaypal_raw_log'];
			}
			$startRow_WADApaypal_raw_log = $pageNum_WADApaypal_raw_log * $maxRows_WADApaypal_raw_log;
			$query_WADApaypal_raw_log = "SELECT id, created_timestamp, ipn_data_serialized FROM paypal_ipn_raw_log ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_raw_log,$WADbSearch1,false);

			$model =& $this->getModel();
			$row_WADApaypal_raw_log = $model->getRawLog($query_WADApaypal_raw_log, $startRow_WADApaypal_raw_log, $maxRows_WADApaypal_raw_log);

			if (isset($_GET['totalRows_WADApaypal_raw_log'])) {
				$totalRows_WADApaypal_raw_log = $_GET['totalRows_WADApaypal_raw_log'];
			} else {
				$all_WADApaypal_raw_log = $model->getAllRawLog();
				$totalRows_WADApaypal_raw_log = count($all_WADApaypal_raw_log);
			}
			$totalPages_WADApaypal_raw_log = ceil($totalRows_WADApaypal_raw_log/$maxRows_WADApaypal_raw_log)-1;
			$queryString_WADApaypal_raw_log = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_raw_log") == false &&
					stristr($param, "totalRows_WADApaypal_raw_log") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_raw_log = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_raw_log = sprintf("%s&totalRows_WADApaypal_raw_log=%d", $queryString_WADApaypal_raw_log, $totalRows_WADApaypal_raw_log);

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('row_WADApaypal_raw_log', $row_WADApaypal_raw_log);
			$this->assignRef('totalRows_WADApaypal_raw_log', $totalRows_WADApaypal_raw_log);
			$this->assignRef('startRow_WADApaypal_raw_log', $startRow_WADApaypal_raw_log);
			$this->assignRef('maxRows_WADApaypal_raw_log', $maxRows_WADApaypal_raw_log);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1->getClass(true));
			$this->assignRef('pageNum_WADApaypal_raw_log', $pageNum_WADApaypal_raw_log);
			$this->assignRef('totalPages_WADApaypal_raw_log', $totalPages_WADApaypal_raw_log);
			$this->assignRef('queryString_WADApaypal_raw_log', $queryString_WADApaypal_raw_log);
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
			$Paramid_WADApaypal_raw_log = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_raw_log = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_raw_log'])) {
				$ParamSessionid_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_raw_log'] : addslashes($_SESSION['WADA_Insert_paypal_raw_log']);
			}
			$Paramid2_WADApaypal_raw_log = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}

			$model =& $this->getModel();
			$WADApaypal_raw_log = $model->getRawLogById($Paramid_WADApaypal_raw_log, $Paramid2_WADApaypal_raw_log, $ParamSessionid_WADApaypal_raw_log);

			$totalRows_WADApaypal_raw_log = count($WADApaypal_raw_log);
			$this->assignRef('WADApaypal_raw_log', $WADApaypal_raw_log);
			$this->setLayout('detail');
		}
		else if($task == 'Search'){
			$this->setLayout('search');
		}
		else if($task == 'Delete'){
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."WA_AppBuilder_PHP.php");
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
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
			
			$Paramid_WADApaypal_raw_log = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_raw_log = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$query_WADApaypal_raw_log = sprintf("SELECT id, created_timestamp, ipn_data_serialized FROM " . $db_table_prefix . "raw_log WHERE id = %s", GetSQLValueString($Paramid_WADApaypal_raw_log, "int"));
			//$WADApaypal_raw_log = mysql_query($query_WADApaypal_raw_log, $connDB) or die(mysql_error());
			$row_WADApaypal_raw_log = $model->getRawLogDelete($Paramid_WADApaypal_raw_log);
			$totalRows_WADApaypal_raw_log = count($row_WADApaypal_raw_log);
			
			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_raw_log";
				$WA_redirectURL = "index.php?option=com_backoffice&view=raw_log";
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
			$this->assignRef('row_WADApaypal_raw_log', $row_WADApaypal_raw_log);
			$this->assignRef('totalRows_WADApaypal_raw_log', $totalRows_WADApaypal_raw_log);
			$this->setLayout('delete');
		}
		parent::display($tpl);
	}
}
?>

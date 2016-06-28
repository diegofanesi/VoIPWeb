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

class BackofficeViewMass_payments extends JView {
	function display($tpl = null){
		$task = JRequest::getVar('task', 'All');
		//echo $task;
		if($task == 'All'){
			// check if show all was clicked
			if (!session_id()) session_start();
			if(isset($_GET['show_all']))
			$_SESSION["WADbSearch1_masspaymentsresults"] = '';

			//WA Database Search Include
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS."HelperPHP.php");
			require_once(JPATH_COMPONENT_ADMINISTRATOR.DS.'WA_AppBuilder_PHP.php');

			//WA Database Search (Copyright 2005, WebAssist.com)
			//Recordset: WADApaypal_mass_payments;
			//Searchpage: mass-payments-search.php;
			//Form: WADASearchForm;
			$WADbSearch1_DefaultWhere = "";
			if (!session_id()) session_start();
			if ((isset($_GET["Search_x"]) && $_GET["Search_x"] != "")) {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//keyword array declarations

				//comparison list additions
				$WADbSearch1->addComparisonFromEdit("masspay_txn_id","S_masspay_txn_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_currency","S_mc_currency","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("mc_fee","S_mc_fee","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("mc_gross","S_mc_gross","AND","=",1);
				$WADbSearch1->addComparisonFromEdit("receiver_email","S_receiver_email","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("status","S_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("unique_id","S_unique_id","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("creation_timestamp","S_creation_timestamp","AND","=",2);
				$WADbSearch1->addComparisonFromEdit("ipn_status","S_ipn_status","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("txn_type","S_txn_type","AND","Includes",0);
				$WADbSearch1->addComparisonFromEdit("test_ipn","S_test_ipn","AND","=",1);

				//save the query in a session variable
				if (1 == 1) {
					$_SESSION["WADbSearch1_masspaymentsresults"]=$WADbSearch1->whereClause;
				}
			}
			else     {
				$WADbSearch1 = new FilterDef;
				$WADbSearch1->initializeQueryBuilder("MYSQL","1");
				//get the filter definition from a session variable
				if (1 == 1)     {
					if (isset($_SESSION["WADbSearch1_masspaymentsresults"]) && $_SESSION["WADbSearch1_masspaymentsresults"] != "")     {
						$WADbSearch1->whereClause = $_SESSION["WADbSearch1_masspaymentsresults"];
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

			$maxRows_WADApaypal_mass_payments = 10;
			$pageNum_WADApaypal_mass_payments = 0;
			if (isset($_GET['pageNum_WADApaypal_mass_payments'])) {
				$pageNum_WADApaypal_mass_payments = $_GET['pageNum_WADApaypal_mass_payments'];
			}
			$startRow_WADApaypal_mass_payments = $pageNum_WADApaypal_mass_payments * $maxRows_WADApaypal_mass_payments;

			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();
			$query_WADApaypal_mass_payments = "SELECT id, masspay_txn_id, mc_currency, mc_fee, mc_gross, receiver_email, status, unique_id, creation_timestamp, ipn_status, txn_type, test_ipn FROM paypal_ipn_mass_payments ORDER BY id DESC";
			setQueryBuilderSource($query_WADApaypal_mass_payments,$WADbSearch1,false);
			//$query_limit_WADApaypal_mass_payments = sprintf("%s LIMIT %d, %d", $query_WADApaypal_mass_payments, $startRow_WADApaypal_mass_payments, $maxRows_WADApaypal_mass_payments);
			//$WADApaypal_mass_payments = mysql_query($query_limit_WADApaypal_mass_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_mass_payments = $model->getMassPaymentsResult($query_WADApaypal_mass_payments, $startRow_WADApaypal_mass_payments, $maxRows_WADApaypal_mass_payments);

			if (isset($_GET['totalRows_WADApaypal_mass_payments'])) {
				$totalRows_WADApaypal_mass_payments = $_GET['totalRows_WADApaypal_mass_payments'];
			} else {
				$all_WADApaypal_mass_payments = $model->getAllTable(mass_payments);
				$totalRows_WADApaypal_mass_payments = count($all_WADApaypal_mass_payments);
			}
			$totalPages_WADApaypal_mass_payments = ceil($totalRows_WADApaypal_mass_payments/$maxRows_WADApaypal_mass_payments)-1;

			$queryString_WADApaypal_mass_payments = "";
			if (!empty($_SERVER['QUERY_STRING'])) {
				$params = explode("&", $_SERVER['QUERY_STRING']);
				$newParams = array();
				foreach ($params as $param) {
					if (stristr($param, "pageNum_WADApaypal_mass_payments") == false &&
					stristr($param, "totalRows_WADApaypal_mass_payments") == false) {
						array_push($newParams, $param);
					}
				}
				if (count($newParams) != 0) {
					$queryString_WADApaypal_mass_payments = "&" . htmlentities(implode("&", $newParams));
				}
			}
			$queryString_WADApaypal_mass_payments = sprintf("&totalRows_WADApaypal_mass_payments=%d%s", $totalRows_WADApaypal_mass_payments, $queryString_WADApaypal_mass_payments);

			//WA Alternating Class
			$WARRT_AltClass1 = new WA_AltClassIterator(explode("|", "WADAResultsRowDark|"));
			$this->assignRef('pageNum_WADApaypal_mass_payments', $pageNum_WADApaypal_mass_payments);
			$this->assignRef('totalRows_WADApaypal_mass_payments', $totalRows_WADApaypal_mass_payments);
			$this->assignRef('currentPage', $currentPage);
			$this->assignRef('totalPages_WADApaypal_mass_payments', $totalPages_WADApaypal_mass_payments);
			$this->assignRef('queryString_WADApaypal_mass_payments', $queryString_WADApaypal_mass_payments);
			$this->assignRef('startRow_WADApaypal_mass_payments', $startRow_WADApaypal_mass_payments);
			$this->assignRef('maxRows_WADApaypal_mass_payments', $maxRows_WADApaypal_mass_payments);
			$this->assignRef('row_WADApaypal_mass_payments', $row_WADApaypal_mass_payments);
			$this->assignRef('WARRT_AltClass1', $WARRT_AltClass1);

		}
		else if($task == 'Delete'){
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

			$Paramid_WADApaypal_mass_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_mass_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			//mysql_select_db($database_connDB, $connDB);
			$model =& $this->getModel();

			//$WADApaypal_mass_payments = mysql_query($query_WADApaypal_mass_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_mass_payments = $model->getMassPaymentsDelete($Paramid_WADApaypal_mass_payments);
			$totalRows_WADApaypal_mass_payments = count($row_WADApaypal_mass_payments);

			// WA Application Builder Delete
			if (isset($_POST["Delete_x"])) // Trigger
			{
				$WA_connection = $connDB;
				$WA_table = "paypal_ipn_mass_payments";
				$WA_redirectURL = "index.php?option=com_backoffice&view=mass_payments&view=mass_payments";
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
			
			$this->assignRef('totalRows_WADApaypal_mass_payments', $totalRows_WADApaypal_mass_payments);
			$this->assignRef('row_WADApaypal_mass_payments', $row_WADApaypal_mass_payments);
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
				
			$Paramid_WADApaypal_mass_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid_WADApaypal_mass_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$ParamSessionid_WADApaypal_mass_payments = "-1";
			if (isset($_SESSION['WADA_Insert_paypal_mass_payments'])) {
				$ParamSessionid_WADApaypal_mass_payments = (get_magic_quotes_gpc()) ? $_SESSION['WADA_Insert_paypal_mass_payments'] : addslashes($_SESSION['WADA_Insert_paypal_mass_payments']);
			}
			$Paramid2_WADApaypal_mass_payments = "-1";
			if (isset($_GET['id'])) {
				$Paramid2_WADApaypal_mass_payments = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
			}
			$model =& $this->getModel();
			//mysql_select_db($database_connDB, $connDB);
			//$WADApaypal_mass_payments = mysql_query($query_WADApaypal_mass_payments, $connDB) or die(mysql_error());
			$row_WADApaypal_mass_payments = $model->getMasspaymentsDetail($Paramid_WADApaypal_mass_payments, $Paramid2_WADApaypal_mass_payments, $ParamSessionid_WADApaypal_mass_payments);
			$totalRows_WADApaypal_mass_payments = count($row_WADApaypal_mass_payments);
			
			$this->assignRef('totalRows_WADApaypal_mass_payments', $totalRows_WADApaypal_mass_payments);
			$this->assignRef('row_WADApaypal_mass_payments', $row_WADApaypal_mass_payments);
			
			$this->setLayout('detail');
		}
		else if($task == 'Search'){
			$this->setLayout('search');
		}
		parent::display($tpl);
	}
}

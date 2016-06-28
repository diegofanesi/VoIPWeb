<?php
class TableCdrs extends JTable {
	var $calldate = null;
	var $clid = null;
	var $src = null;
	var $dst = null;
	var $dcontext = null;
	var $channel = null;
	var $dstchannel = null;
	var $lastapp = null;
	var $lastdata = null;
	var $duration = null;
	var $billsec = null;
	var $disposition = null;
	var $amaflags = null;
	var $accountcode = null;
	var $userfield = null;
	var $uniqueid = null;
	
	function __construct(&$db) {
		parent::__construct('#__bkp_cdr','calldate',$db);
	}
}
?>

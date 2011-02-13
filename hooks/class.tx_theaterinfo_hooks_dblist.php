<?php

class tx_theaterinfo_hooks_dblist implements t3lib_localRecordListGetTableHook {

	var $fieldArray = null;
	
	var $table = null;
	
	var $nameQuery = 'CONCAT(lastname, ", ", firstname)';
	
	var $updateFieldList = false;
	
	function getDBlistQuery($_table, $_pageId, &$_addWhere, &$_selFieldList, &$_callerClass) {		
		switch ($_table) {			

			case 'tx_theaterinfo_domain_model_helper':				
				$this->init($_table, $_selFieldList);
				$this->replaceWithSubselect('helpertype', 'tx_theaterinfo_domain_model_helpertype', 'jobtitle');
				break;
		}
				
		if($this->updateFieldList)
		{
			$_selFieldList = implode(',', $this->fieldArray);
		}
	}
	
	function init($_table, $_selFieldList) {		
		$this->fieldArray = split(',', $_selFieldList);
		$this->table = $_table;
	}
			
	
	function replaceWithSubselect($_field, $_subTable, $_query) {
		$xSelectString = '(SELECT %s from %s WHERE %s.%s = %s.uid) as %s';
		$xSubQuery = sprintf($xSelectString, $_query, $_subTable, $this->table, $_field, $_subTable, $_field);
		$this->replaceField($_field, $xSubQuery);
	}
	
	function replaceField($_field, $_newQuery) {
		$xKey = array_search($_field, $this->fieldArray);		
		if($xKey===false)
		{			
			return;
		}
		$this->fieldArray[$xKey] = $_newQuery;
		$this->updateFieldList = true;
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/theaterinfo/hooks/class.tx_theaterinfo_hooks_dblist.php']) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/theaterinfo/hooks/class.tx_theaterinfo_hooks_dblist.php']);
}
?>
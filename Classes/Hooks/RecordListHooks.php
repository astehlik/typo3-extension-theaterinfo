<?php
namespace Sto\Theaterinfo\Hooks;
/*                                                                        *
 * This script belongs to the TYPO3 extension "theaterinfo".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Hooks for the record list in the Backend
 */
class RecordListHooks implements \TYPO3\CMS\Backend\RecordList\RecordListGetTableHookInterface {

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

?>
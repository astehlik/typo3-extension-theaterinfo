<?php
class tx_theaterinfo_hooks_titles {
	
	function getActorTitle($params, $pObj) {
		$data = t3lib_BEfunc::getRecord($params['table'], $params['row']['uid']);		
		//Person
		if($data['type'] == '0') {
			$params['title'] = $data['lastname'] . ', ' . $data['firstname'];
		}
		//Company
		else {
			$params['title'] = $data['company'];
		}
	}
	
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/theaterinfo/hooks/class.tx_theaterinfo_hooks_titles.php']) {
  include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/theaterinfo/hooks/class.tx_theaterinfo_hooks_titles.php']);
}

?>
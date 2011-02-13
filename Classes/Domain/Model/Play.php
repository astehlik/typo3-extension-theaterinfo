<?php
/***************************************************************
*  Copyright notice
*
*  (c)  TODO - INSERT COPYRIGHT
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * A play performed by the theater group
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */


class Tx_Theaterinfo_Domain_Model_Play extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * 
	 * @var string
	 */
	protected $title;
	
	/**
	 * 
	 * @var string
	 */
	protected $author;
	
	/**
	 * 
	 * @var DateTime
	 */
	protected $time_sort;
	
	/**
	 * 
	 * @var string
	 */
	protected $time_display;
	
	/**
	 * 
	 * @var string
	 */
	protected $logo;
	
	/**
	 * 
	 * @var string
	 */
	protected $pictures;
	
	/**
	 * 
	 * @var string
	 */
	protected $action;
	
	/**
	 * 
	 * @var string
	 */
	protected $state;
	
	/**
	 * 
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Theaterinfo_Domain_Model_Helper>
	 */
	protected $helpers;
	
	/**
	 * 
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Theaterinfo_Domain_Model_Role>
	 */
	protected $roles;
	

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->roles = new Tx_Extbase_Persistence_ObjectStorage();
		$this->helpers = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	public function getTitle() {
		return $this->title;
	}
	public function getAction() {
		return $this->action; 
	}
	public function getAuthor() {
		return $this->author;
	}
	
	/**
	 * Returns all roles in this play
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getRoles() {
		return $this->roles;
	}
	
	public function getHelpers() {
		return $this->helpers;
	}
}
?>
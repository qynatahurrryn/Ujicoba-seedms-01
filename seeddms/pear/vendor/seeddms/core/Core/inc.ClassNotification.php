<?php
declare(strict_types=1);

/**
 * Implementation of a notification object
 *
 * @category   DMS
 * @package    SeedDMS_Core
 * @license    GPL 2
 * @version    @version@
 * @author     Uwe Steinmann <uwe@steinmann.cx>
 * @copyright  Copyright (C) 2010-2024 Uwe Steinmann
 * @version    Release: @package_version@
 */

/**
 * Class to represent a notification
 *
 * @category   DMS
 * @package    SeedDMS_Core
 * @author     Uwe Steinmann <uwe@steinmann.cx>
 * @copyright  Copyright (C) 2010-2024 Uwe Steinmann
 * @version    Release: @package_version@
 */
class SeedDMS_Core_Notification { /* {{{ */
	/**
	 * @var integer id of target (document or folder)
	 *
	 * @access protected
	 */
	protected $_target;

	/**
	 * @var integer document or folder
	 *
	 * @access protected
	 */
	protected $_targettype;

	/**
	 * @var integer id of user to notify
	 *
	 * @access protected
	 */
	protected $_userid;

	/**
	 * @var integer id of group to notify
	 *
	 * @access protected
	 */
	protected $_groupid;

	/**
	 * @var object reference to the dms instance this user belongs to
	 *
	 * @access protected
	 */
	protected $_dms;

	/**
	 * Constructor
	 *
	 * @param integer $target id of document/folder this notification is
	 * attached to.
	 * @param integer $targettype 1 = target is document, 2 = target is a folder
	 * @param integer $userid id of user. The id is -1 if the notification is
	 * for a group.
	 * @param integer $groupid id of group. The id is -1 if the notification is
	 * for a user.
	 */
	public function __construct($target, $targettype, $userid, $groupid) { /* {{{ */
		$this->_target = $target;
		$this->_targettype = $targettype;
		$this->_userid = $userid;
		$this->_groupid = $groupid;
	} /* }}} */

	/**
	 * Set instance of dms this object belongs to
	 *
	 * @param object $dms instance of dms
	 */
	public function setDMS($dms) { /* {{{ */
		$this->_dms = $dms;
	} /* }}} */

	/**
	 * Get id of target (document/object) this notification is attachted to
	 *
	 * @return integer id of target
	 */
	public function getTarget() { return $this->_target; }

	/**
	 * Get type of target
	 *
	 * @return integer type of target (1=document/2=object)
	 */
	public function getTargetType() { return $this->_targettype; }

	/**
	 * Get user for this notification
	 *
	 * @return integer id of user or -1 if this notification does not belong
	 * to a user
	 */
	public function getUser() { return $this->_dms->getUser($this->_userid); }

	/**
	 * Get group for this notification
	 *
	 * @return integer id of group or -1 if this notification does not belong
	 * to a group
	 */
	public function getGroup() { return $this->_dms->getGroup($this->_groupid); }
} /* }}} */

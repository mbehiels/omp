<?php

/**
 * @file classes/log/MonographFileEventLogDAO.inc.php
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class MonographFileEventLogDAO
 * @ingroup log
 * @see EventLogDAO
 *
 * @brief Extension to EventLogDAO for monograph file specific log entries.
 */


import('lib.pkp.classes.log.EventLogDAO');
import('classes.log.MonographFileEventLogEntry');

class MonographFileEventLogDAO extends EventLogDAO {
	function MonographFileEventLogDAO() {
		parent::EventLogDAO();
	}

	function newDataObject() {
		$returner = new MonographFileEventLogEntry();
		$returner->setAssocType(ASSOC_TYPE_MONOGRAPH_FILE);
		return $returner;
	}

	function &getByFileId($fileId) {
		$returner =& $this->getByAssoc(ASSOC_TYPE_MONOGRAPH_FILE, $fileId);
		return $returner;
	}
}

?>

<?php

/**
 * @file pages/admin/AdminHandler.inc.php
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class AdminHandler
 * @ingroup pages_admin
 *
 * @brief Handle requests for site administration functions.
 */



import('classes.handler.Handler');

class AdminHandler extends Handler {
	/**
	 * Constructor
	 */
	function AdminHandler() {
		parent::Handler();

		$this->addCheck(new HandlerValidatorRoles($this, true, null, null, array(ROLE_ID_SITE_ADMIN)));
	}

	/**
	 * Display site admin index page.
	 * @param $args array
	 * @param $request PKPRequest
	 */
	function index($args, &$request) {
		$this->validate();
		$this->setupTemplate($request);

		$templateMgr =& TemplateManager::getManager();
		$templateMgr->assign('helpTopicId', 'site.index');

		$templateMgr->display('admin/index.tpl');
	}

	/**
	 * Display the administration settings page.
	 * @param $args array
	 * @param $request PKPRequest
	 */
	function settings($args, &$request) {
		$templateMgr =& TemplateManager::getManager();
		$this->setupTemplate($request, true);
		$templateMgr->display('admin/settings.tpl');
	}

	/**
	 * Setup common template variables.
	 * @param $subclass boolean set to true if caller is below this handler in the hierarchy
	 */
	function setupTemplate($request, $subclass = false) {
		parent::setupTemplate();
		Locale::requireComponents(array(LOCALE_COMPONENT_PKP_ADMIN));
		Locale::requireComponents(array(LOCALE_COMPONENT_OMP_MANAGER));
		Locale::requireComponents(array(LOCALE_COMPONENT_OMP_ADMIN));

		$templateMgr =& TemplateManager::getManager();
		$templateMgr->assign('pageHierarchy',
			$subclass ? array(array($request->url(null, 'user'), 'navigation.user'), array($request->url(null, 'admin'), 'admin.siteAdmin'))
				: array(array($request->url(null, 'user'), 'navigation.user'))
		);
	}
}

?>

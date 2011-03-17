{**
 * userEnrollmentGridFilter.tpl
 *
 * Copyright (c) 2000-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Filter template for user enrollment grid.
 *}
<script type="text/javascript">
	// Attach the form handler to the form.
	$('#userEnrollmentSearchForm').pkpHandler('$.pkp.controllers.form.ClientFormHandler');
</script>
<form id="userEnrollmentSearchForm" action="{url router=$smarty.const.ROUTE_COMPONENT component="grid.users.user.UserEnrollmentGridHandler" op="fetchGrid"}" method="post">
	<div id="userSearchFormArea">
		{include file="controllers/grid/users/user/gridFilterElements/searchInput.tpl"}
	</div>
</form>
<div class="pkp_helpers_clear">&nbsp;</div>
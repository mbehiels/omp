{**
 * controllers/tab/settings/divisionsAndSeries/form/divisionsAndSeriesForm.tpl
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Divisions and series management form.
 *
 *}
<script type="text/javascript">
	$(function() {ldelim}
		// Attach the form handler.
		$('#divisionsAndSeriesForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	{rdelim});
</script>

<form class="pkp_form" id="divisionsAndSeriesForm" method="post" action="{url router=$smarty.const.ROUTE_COMPONENT component="tab.settings.PressSettingsTabHandler" op="saveFormData" tab="divisionsAndSeries"}">
	{include file="controllers/notification/inPlaceNotification.tpl" notificationId="divisionsAndSeriesFormNotification"}

	{url|assign:divisionsUrl router=$smarty.const.ROUTE_COMPONENT component="listbuilder.settings.DivisionsListbuilderHandler" op="fetch"}
	{load_url_in_div id="divisionsContainer" url=$divisionsUrl}

	{url|assign:seriesGridUrl router=$smarty.const.ROUTE_COMPONENT component="grid.settings.series.SeriesGridHandler" op="fetchGrid"}
	{load_url_in_div id="seriesGridDiv" url=$seriesGridUrl}

	{fbvFormButtons id="divisionsAndSeriesFormSubmit" submitText="common.save" hideCancel=true}
</form>
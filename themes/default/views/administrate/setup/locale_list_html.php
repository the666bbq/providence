<?php
/* ----------------------------------------------------------------------
 * app/views/admin/access/role_list_html.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2008-2017 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * This source code is free and modifiable under the terms of
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
	$va_locale_list = $this->getVar('locale_list');

?>
<script language="JavaScript" type="text/javascript">
/* <![CDATA[ */
	$(document).ready(function(){
		$('#caItemList').caFormatListTable();
	});
/* ]]> */
</script>
<div class="sectionBox">
	<?php 
		print caFormControlBox(
			'<div class="list-filter">'._t('Filter').': <input type="text" name="filter" value="" onkeyup="$(\'#caItemList\').caFilterTable(this.value); return false;" size="20"/></div>', 
			'', 
			caNavHeaderButton($this->request, __CA_NAV_ICON_ADD__, _t("New"), 'administrate/setup', 'Locales', 'Edit', array('locale_id' => 0))
		); 
	?>
	
	<table id="caItemList" class="listtable">
		<thead>
			<tr>
				<th class="list-header-unsorted">
					<?= _t('Name'); ?>
				</th>
				<th class="list-header-unsorted">
					<?= _t('Code'); ?>
				</th>
				<th class="list-header-unsorted">
					<?= _t('Available for cataloguing?'); ?>
				</th>
				<th class="{sorter: false} list-header-nosort listtableEdit"> </th>
			</tr>
		</thead>
		<tbody>
<?php
	foreach($va_locale_list as $va_locale) {
?>
			<tr>
				<td>
					<?= $va_locale['name']; ?>
				</td>
				<td>
					<?= $va_locale['language']."_".$va_locale['country']; ?>
				</td>
				<td>
					<?= (bool)$va_locale['dont_use_for_cataloguing'] ? _t('no') : _t('yes') ; ?>
				</td>
				<td class="listtableEditDelete">
					<?= caNavButton($this->request, __CA_NAV_ICON_EDIT__, _t("Edit"), 'editIcon', 'administrate/setup', 'Locales', 'Edit', array('locale_id' => $va_locale['locale_id']), array(), array('icon_position' => __CA_NAV_ICON_ICON_POS_LEFT__, 'use_class' => 'list-button', 'no_background' => true, 'dont_show_content' => true)); ?>
					<?= caNavButton($this->request, __CA_NAV_ICON_DELETE__, _t("Delete"), 'deleteIcon', 'administrate/setup', 'Locales', 'Delete', array('locale_id' => $va_locale['locale_id']), array(), array('icon_position' => __CA_NAV_ICON_ICON_POS_LEFT__, 'use_class' => 'list-button', 'no_background' => true, 'dont_show_content' => true)); ?>

				</td>
			</tr>
<?php
		TooltipManager::add('.deleteIcon', _t("Delete"));
		TooltipManager::add('.editIcon', _t("Edit"));
	}
?>
		</tbody>
	</table>
</div>
<div class="editorBottomPadding"><!-- empty --></div>

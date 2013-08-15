{* $Id$ *}

{capture name="mainbox"}

<div id="tspa_appointments">

    {include file="addons/tsp_appointments/views/appointments/components/appointments_search.tpl"}

    <form action="{""|fn_url}" method="post" name="appointments_form">
    
    {include file="common/pagination.tpl"}
    
    {assign var="c_url" value=$config.current_url|fn_query_remove:"sort_by":"sort_order"}
    
    {if $settings.DHTML.admin_ajax_based_pagination == "Y"}
    	{assign var="ajax_class" value="cm-ajax"}
    
    {/if}
    
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table sortable">
    <tr>
    	<th width="1%" class="center">
    		<input type="checkbox" name="check_all" value="Y" title="{__("check_uncheck_all")}" class="checkbox cm-check-items" /></th>
    	<th width="20%"><a class="{$ajax_class}{if $search.sort_by == "user"} sort-link-{$search.sort_order}{/if}" href="{"`$c_url`&amp;sort_by=user&amp;sort_order=`$search.sort_order`"|fn_url}" rev="pagination_contents">{__("user")}</a></th>
    	<th width="35%"><a class="{$ajax_class}" href="#" rev="pagination_contents">{__("tspa_appointment")}</a></th>
    	<th width="15%" class="center"><a class="{$ajax_class}{if $search.sort_by == "date_created"} sort-link-{$search.sort_order}{/if}" href="{"`$c_url`&amp;sort_by=date_created&amp;sort_order=`$search.sort_order`"|fn_url}" rev="pagination_contents">{__("date_created")}</a></th>
    	<th width="15%" class="center"><a class="{$ajax_class}{if $search.sort_by == "date_completed"} sort-link-{$search.sort_order}{/if}" href="{"`$c_url`&amp;sort_by=date_completed&amp;sort_order=`$search.sort_order`"|fn_url}" rev="pagination_contents">{__("date")} {__("completed")}</a></th>
    	<th width="10%"><a class="{$ajax_class}{if $search.sort_by == "status"} sort-link-{$search.sort_order}{/if}" href="{"`$c_url`&amp;sort_by=status&amp;sort_order=`$search.sort_order`"|fn_url}" rev="pagination_contents">{__("status")}</a></th>
    	<th>&nbsp;</th>
    </tr>
    {if $appointments}
    {foreach from=$appointments key="id" item="appointment"}
    <tr {cycle values="class=\"table-row\", "}>
    	<td width="1%" class="center">
    		<input type="checkbox" name="appointment_ids[]" value="{$appointment.id}" class="checkbox cm-item" /></td>
    	<td><a href="{"profiles.update?user_id=`$appointment.user_id`"|fn_url}">{$appointment.lastname} {$appointment.firstname}</a></td>
    	<td>{$appointment.info|unescape}</td>
    	<td class="center">{if $appointment.date_created}{$appointment.date_created|date_format:"`$settings.Appearance.date_format` `$settings.Appearance.time_format`"}{/if}</td>
    	<td class="center">{if $appointment.date_completed}{$appointment.date_completed|date_format:"`$settings.Appearance.date_format` `$settings.Appearance.time_format`"}{/if}</td>
    	<td>
    		{assign var="notify" value=true}
    		{include file="addons/tsp_appointments/overrides/common/select_popup.tpl" id=$appointment.id status=$appointment.status object_id_name="appointment_id" hide_for_vendor=$runtime.company_id update_controller="appointments" notify=$notify}
    	</td>
    	<td class="nowrap">
    		{capture name="tools_items"}
    		<li><a class="text-button-edit" href="{"appointments.update?appointment_id=`$appointment.id`"|fn_url}">{__("edit")}</a></li>
    		<li><a class="cm-confirm text-button-edit" href="{"appointments.delete?appointment_id=`$appointment.id`"|fn_url}">{__("delete")}</a></li>
    		{/capture}
    		{include file="common/table_tools_list.tpl" prefix=$id tools_list=$smarty.capture.tools_items href="appointments.update?appointment_id=`$id`" link_text=$lang.view}
    	</td>
    </tr>
    {/foreach}
    {else}
    <tr class="no-items">
    	<td colspan="7"><p>{__("no_data")}</p></td>
    </tr>
    {/if}
    </table>
    
    {if $appointments}
    	{include file="common/table_tools.tpl" href="#appointments"}
    {/if}
    
    {include file="common/pagination.tpl"}
    
    {if $appointments}
    	<div class="buttons-container buttons-bg">
    		{include file="buttons/delete_selected.tpl" but_name="dispatch[appointments.do_delete]" but_role="button_main" but_meta="cm-process-items cm-confirm"}
    	</div>
    {/if}
    
    </form>
</div>
{/capture}
{include file="common/mainbox.tpl" title=$lang.tspa_appointments content=$smarty.capture.mainbox title_extra=$smarty.capture.title_extra}

<!-- Topbar-Moduel-Setting -->
<tr class="parent">
    <td class="parent_topbarModuel ps-1">
        <span id="topbar_parent_moduel1"> ➤</span> <span id="topbar_parent_moduel2"> &#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Topbar Moduel </label>
    </td>
    <td class="custom-select" colspan="1">
        <select id="update_topbar_moduel2" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="topbar_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('topbar_moduel_display')}}">Display-Topbar-Moduel : {{setting('topbar_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_topbar_moduel3" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="topbar_searchbtn_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('topbar_searchbtn_moduel_display')}}">Display-Topbar-Btn-Moduel : {{setting('topbar_searchbtn_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focustopbar" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
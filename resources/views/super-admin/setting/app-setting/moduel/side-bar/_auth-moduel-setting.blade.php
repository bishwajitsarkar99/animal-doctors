<!-- AUTH-Moduel-Setting -->
<tr class="parent">
    <td class="parent_authModuel ps-1">
        <span id="auth_parent_moduel">➤</span> <span id="auth_parent_moduel2">&#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">AUTH Moduel </label>
    </td>
    <td colspan="1">
        <input id="update_auth_moduel" class="purchases_moduel ps-2 skeleton" type="text" name="auth_moduel_title" value="{{setting('auth_moduel_title')}}" placeholder="Authentication" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_auth_moduel2" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="auth_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('auth_moduel_display')}}">Display : {{setting('auth_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focusauth" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [AUTH] -->
<tr class="authChild2">
    <td class="background authChild ps-3" style="text-align:left;">
        <span class="ms-3"><span id="authChildren1">➤</span> <span id="authChildren2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">AUTH </label>
    </td>
    <td>
        <input id="update_auth_moduel3" class="purchases_moduel ps-2 skeleton" type="text" name="auth_title" value="{{setting('auth_title')}}" placeholder="AUTH" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_auth_moduel4" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="auth_display" disabled>
            <option class="sub_name_text" value="{{setting('auth_visual')}}">Display : {{setting('auth_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focusauth2" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
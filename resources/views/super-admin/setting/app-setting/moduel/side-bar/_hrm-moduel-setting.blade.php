<!-- HRM-Moduel-Setting -->
<tr class="parent">
    <td class="parent_hrmModuel ps-1">
        <span id="hrm_parent_moduel">➤</span> <span id="hrm_parent_moduel2">&#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">HRM Moduel </label>
    </td>
    <td colspan="1">
        <input id="update_hrm_moduel" class="purchases_moduel ps-2 skeleton" type="text" name="hrm_moduel_title" value="{{setting('hrm_moduel_title')}}" placeholder="HRM Managment" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_hrm_moduel2" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="hrm_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('hrm_moduel_display')}}">Display-HRM-Moduel : {{setting('hrm_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focushrm" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [HRM] -->
<tr class="hrmChild2">
    <td class="background hrmChild ps-3" style="text-align:left;">
        <span class="ms-3"><span id="hrmChildren1">➤</span> <span id="hrmChildren2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">HRM </label>
    </td>
    <td>
        <input id="update_hrm_moduel3" class="purchases_moduel ps-2 skeleton" type="text" name="hrm_title" value="{{setting('hrm_title')}}" placeholder="HRM" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_hrm_moduel4" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="hrm_display" disabled>
            <option class="sub_name_text" value="{{setting('hrm_visual')}}">Display-HRM : {{setting('hrm_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focushrm2" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
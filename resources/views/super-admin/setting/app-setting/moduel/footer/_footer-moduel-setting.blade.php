<!-- Footer-Moduel-Setting -->
<tr class="parent">
    <td class="parent_footerModuel ps-1">
        <span id="footer_parent_moduel1"> ➤</span> <span id="footer_parent_moduel2"> &#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Footer Moduel </label>
    </td>
    <td colspan="1">
        <input id="update_footer_moduel" class="purchases_moduel ps-2 skeleton" type="text" name="footer_moduel_title" value="{{setting('footer_moduel_title')}}" placeholder="Footer Menu Bar" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_footer_moduel2" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="footer_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('footer_moduel_display')}}">Display-Footer-Moduel : {{setting('footer_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focusfooter" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
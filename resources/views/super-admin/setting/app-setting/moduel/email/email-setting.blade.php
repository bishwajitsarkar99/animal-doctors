<!-- Email-Moduel-Setting -->
<tr class="email_verification">
    <td class="cagtegory-link link" style="text-align:left;">
        <label class="input_label skeleton mt-1 ms-2" for="select-user"> Email Verification For Login Page Link </label>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_email_moduel" class="email_moduel ps-1 update_user firstcategory supplier_id" name="user_login_link" disabled>
            <option class="sub_name_text" value="{{setting('login_link')}}">URL : {{setting('login_link')}}</option>
            <option class="sub_name_text linkSuperAdminLoginPage" value="">Super Admin Login Page</option>
            <option class="sub_name_text linkAdminLoginPage" value="">Admin Login Page</option>
            <option class="sub_name_text linkAccountsLoginPage" value="">Accounts Login Page</option>
            <option class="sub_name_text linkCommonUserLoginPage" value="">Common User Login Page</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="email_light_focus" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
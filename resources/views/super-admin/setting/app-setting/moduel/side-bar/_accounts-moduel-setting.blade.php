<!-- Accounts-Moduel-Setting -->
<tr class="parent">
    <td class="parent_accModuel ps-1">
        <span id="acc_parent_moduel">➤</span> <span id="acc_parent_moduel2">&#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Accounts Moduel </label>
    </td>
    <td colspan="1">
        <input id="update_purchases_moduel_Acc" class="purchases_moduel ps-2 skeleton" type="text" name="accounts_moduel_title" value="{{setting('accounts_moduel_title')}}" placeholder="Accounts Dept." disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc2" class="ps-1 update_user firstcategory purchases_moduel supplier_id" name="accounts_moduel_display" disabled>
            <option class="sub_name_text " value="{{setting('accounts_moduel_display')}}">Display : {{setting('accounts_moduel_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus41" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Leger] -->
<tr class="legerChild">
    <td class="background acc_children_siblink" style="text-align:left;">
        <span class="ms-3"><span id="accChildren">➤</span> <span id="accChildren2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Lager </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc3" class="purchases_moduel ps-2 skeleton" type="text" name="lager_title" value="{{setting('lager_title')}}" placeholder="Lager" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc4" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="lager_display0" disabled>
            <option class="sub_name_text" value="{{setting('lager_display')}}">Display : {{setting('lager_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus42" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Day Book] -->
<tr class="acc_children_siblink2">
    <td class="background acc_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="dayBhildren">➤</span> <span id="dayBhildren2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1 me-2" for="select-user">Day Book </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc5" class="purchases_moduel ps-2 skeleton" type="text" name="day_book_title" value="{{setting('day_book_title')}}" placeholder="Day Book" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc6" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_title_display" disabled>
            <option class="sub_name_text" value="{{setting('day_book_title_display')}}">Display : {{setting('day_book_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus43" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Day Book-link] -->
<tr class="acc_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc7" class="purchases_moduel ps-2 skeleton" type="text" name="day_book_entry_title" value="{{setting('day_book_entry_title')}}" placeholder="Entry Day Book" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc8" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_entry_link" disabled>
            <option class="sub_name_text" value="{{setting('day_book_entry_link')}}">URL : {{setting('day_book_entry_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc9" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_entry_visual" disabled>
            <option class="sub_name_text" value="{{setting('day_book_entry_visual')}}">Display : {{setting('day_book_entry_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus44" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>

<tr class="acc_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc10" class="purchases_moduel ps-2 skeleton" type="text" name="day_book_view_title" value="{{setting('day_book_view_title')}}" placeholder="View Day Book" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc11" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_view_link" disabled>
            <option class="sub_name_text" value="{{setting('day_book_view_link')}}">URL : {{setting('day_book_view_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc12" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_view_visual" disabled>
            <option class="sub_name_text" value="{{setting('day_book_view_visual')}}">Display : {{setting('day_book_view_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus45" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc13" class="purchases_moduel ps-2 skeleton" type="text" name="day_book_set_title" value="{{setting('day_book_set_title')}}" placeholder="Setting Day Book" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc14" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('day_book_setting_link')}}">URL : {{setting('day_book_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc15" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="day_book_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('day_book_setting_visual')}}">Display : {{setting('day_book_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus46" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Expenses] -->
<tr class="exp_children_siblink">
    <td class="background exp_children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="exp_children">➤</span> <span id="exp_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Expenses </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc16" class="purchases_moduel ps-2 skeleton" type="text" name="expenses_title" value="{{setting('expenses_title')}}" placeholder="Expenses" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc17" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="expenses_title_display" disabled>
            <option class="sub_name_text" value="{{setting('expenses_title_display')}}">Display : {{setting('expenses_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus47" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Expenses Link] -->
<tr class="exp_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc18" class="purchases_moduel ps-2 skeleton" type="text" name="type_of_expenses_entry_title" value="{{setting('type_of_expenses_entry_title')}}" placeholder="Type Of Expenses" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc19" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="type_of_expenses_link" disabled>
            <option class="sub_name_text" value="{{setting('type_of_expenses_link')}}">URL : {{setting('type_of_expenses_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc20" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="type_of_expenses_visual" disabled>
            <option class="sub_name_text" value="{{setting('type_of_expenses_visual')}}">Display : {{setting('type_of_expenses_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus48" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="exp_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc21" class="purchases_moduel ps-2 skeleton" type="text" name="add_expenses_title" value="{{setting('add_expenses_title')}}" placeholder="ADD Expenses" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc22" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_expenses_link" disabled>
            <option class="sub_name_text" value="{{setting('add_expenses_link')}}">URL : {{setting('add_expenses_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc23" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_expenses_visual" disabled>
            <option class="sub_name_text" value="{{setting('add_expenses_visual')}}">Display : {{setting('add_expenses_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus49" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="exp_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc24" class="purchases_moduel ps-2 skeleton" type="text" name="list_expenses_title" value="{{setting('list_expenses_title')}}" placeholder="List Of Expenses" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc25" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="list_expenses_link" disabled>
            <option class="sub_name_text" value="{{setting('list_expenses_link')}}">URL : {{setting('list_expenses_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc26" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="list_expenses_visual" disabled>
            <option class="sub_name_text" value="{{setting('list_expenses_visual')}}">Display : {{setting('list_expenses_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus50" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="exp_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc27" class="purchases_moduel ps-2 skeleton" type="text" name="setting_expenses_title" value="{{setting('setting_expenses_title')}}" placeholder="Expenses Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc28" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="setting_expenses_link" disabled>
            <option class="sub_name_text" value="{{setting('setting_expenses_link')}}">URL : {{setting('setting_expenses_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc29" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="setting_expenses_visual" disabled>
            <option class="sub_name_text" value="{{setting('setting_expenses_visual')}}">Display : {{setting('setting_expenses_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus51" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Customer] -->
<tr class="customer_children_siblink">
    <td class="background customer_children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="customer_children">➤</span> <span id="customer_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Customer </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc30" class="purchases_moduel ps-2 skeleton" type="text" name="customer_title" value="{{setting('customer_title')}}" placeholder="Customer" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc31" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_title_display" disabled>
            <option class="sub_name_text" value="{{setting('customer_title_display')}}">Display : {{setting('customer_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus52" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Customer-Link] -->
<tr class="customer_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc32" class="purchases_moduel ps-2 skeleton" type="text" name="add_customer_title" value="{{setting('add_customer_title')}}" placeholder="ADD Customer" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc33" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_customer_link" disabled>
            <option class="sub_name_text" value="{{setting('add_customer_link')}}">URL : {{setting('add_customer_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc34" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_visual" disabled>
            <option class="sub_name_text" value="{{setting('customer_visual')}}">Display : {{setting('customer_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus53" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="customer_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc35" class="purchases_moduel ps-2 skeleton" type="text" name="customer_due_title" value="{{setting('customer_due_title')}}" placeholder="Customer Due List" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc36" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_due_link" disabled>
            <option class="sub_name_text" value="{{setting('customer_due_link')}}">URL : {{setting('customer_due_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc37" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_due_visual" disabled>
            <option class="sub_name_text" value="{{setting('customer_due_visual')}}">Display : {{setting('customer_due_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus54" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="customer_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc38" class="purchases_moduel ps-2 skeleton" type="text" name="customer_details_title" value="{{setting('customer_details_title')}}" placeholder="Customer Details Record" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc39" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_details_link" disabled>
            <option class="sub_name_text" value="{{setting('customer_details_link')}}">URL : {{setting('customer_details_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc40" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_details_visual" disabled>
            <option class="sub_name_text" value="{{setting('customer_details_visual')}}">Display : {{setting('customer_details_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus55" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="customer_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc41" class="purchases_moduel ps-2 skeleton" type="text" name="customer_setting_title" value="{{setting('customer_setting_title')}}" placeholder="Customer Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc42" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('customer_setting_link')}}">URL : {{setting('customer_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc43" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="customer_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('customer_setting_visual')}}">Display : {{setting('customer_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus56" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Petty-Cash] -->
<tr class="petty_cash_children_siblink">
    <td class="background petty_cash_children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="petty_cash_children">➤</span> <span id="petty_cash_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Petty-Cash </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc44" class="purchases_moduel ps-2 skeleton" type="text" name="petty_cash_title" value="{{setting('petty_cash_title')}}" placeholder="Petty Cash" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc45" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_title_display" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_title_display')}}">Display : {{setting('petty_cash_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus57" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Petty Cash-Link] -->
<tr class="petty_cash_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc46" class="purchases_moduel ps-2 skeleton" type="text" name="add_petty_cash_title" value="{{setting('add_petty_cash_title')}}" placeholder="Petty Cash Entry" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc47" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_petty_cash_link" disabled>
            <option class="sub_name_text" value="{{setting('add_petty_cash_link')}}">URL : {{setting('add_petty_cash_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc48" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_visual" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_visual')}}">Display : {{setting('petty_cash_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus58" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="petty_cash_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc49" class="purchases_moduel ps-2 skeleton" type="text" name="all_transaction_title" value="{{setting('all_transaction_title')}}" placeholder="All Transaction" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc50" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="all_transaction_link" disabled>
            <option class="sub_name_text" value="{{setting('all_transaction_link')}}">URL : {{setting('all_transaction_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc51" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="all_transaction_visual" disabled>
            <option class="sub_name_text" value="{{setting('all_transaction_visual')}}">Display : {{setting('all_transaction_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus59" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="petty_cash_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc52" class="purchases_moduel ps-2 skeleton" type="text" name="petty_cash_details_title" value="{{setting('petty_cash_details_title')}}" placeholder="Petty Cash Details" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc53" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_details_link" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_details_link')}}">URL : {{setting('petty_cash_details_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc54" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_details_visual" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_details_visual')}}">Display : {{setting('petty_cash_details_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus60" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="petty_cash_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc55" class="purchases_moduel ps-2 skeleton" type="text" name="petty_cash_setting_title" value="{{setting('petty_cash_setting_title')}}" placeholder="Petty Cash Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc56" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_setting_link')}}">URL : {{setting('petty_cash_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc57" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_setting_visual')}}">Display : {{setting('petty_cash_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus61" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Bank] -->
<tr class="bank_children_siblink">
    <td class="background bank_children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="bank_children">➤</span> <span id="bank_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Bank </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc58" class="purchases_moduel ps-2 skeleton" type="text" name="bank_title" value="{{setting('bank_title')}}" placeholder="Bank" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc59" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="bank_title_display" disabled>
            <option class="sub_name_text" value="{{setting('bank_title_display')}}">Display : {{setting('bank_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus62" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Bank-Link] -->
<tr class="bank_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc60" class="purchases_moduel ps-2 skeleton" type="text" name="add_list_title" value="{{setting('add_list_title')}}" placeholder="List" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc61" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_list_link" disabled>
            <option class="sub_name_text" value="{{setting('add_list_link')}}">URL : {{setting('add_list_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc62" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="list_visual" disabled>
            <option class="sub_name_text" value="{{setting('list_visual')}}">Display : {{setting('list_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus63" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="bank_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc63" class="purchases_moduel ps-2 skeleton" type="text" name="bank_transaction_title" value="{{setting('bank_transaction_title')}}" placeholder="Bank Transaction" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc64" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="bank_transaction_link" disabled>
            <option class="sub_name_text" value="{{setting('bank_transaction_link')}}">URL : {{setting('bank_transaction_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc65" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="bank_transaction_visual" disabled>
            <option class="sub_name_text" value="{{setting('bank_transaction_visual')}}">Display : {{setting('bank_transaction_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus64" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="bank_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc66" class="purchases_moduel ps-2 skeleton" type="text" name="details_record_title" value="{{setting('details_record_title')}}" placeholder="Details Record" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc67" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="details_record_link" disabled>
            <option class="sub_name_text" value="{{setting('details_record_link')}}">URL : {{setting('details_record_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc68" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="details_record_visual" disabled>
            <option class="sub_name_text" value="{{setting('details_record_visual')}}">Display : {{setting('details_record_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus65" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="bank_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc69" class="purchases_moduel ps-2 skeleton" type="text" name="bank_setting_title" value="{{setting('bank_setting_title')}}" placeholder="Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc70" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="bank_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('bank_setting_link')}}">URL : {{setting('bank_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc71" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="bank_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('bank_setting_visual')}}">Display : {{setting('bank_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus66" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Tax/Vat] -->
<tr class="tax_vat_children_siblink">
    <td class="background tax_vat_children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="tax_vat_children">➤</span> <span id="tax_vat_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Tax/Vat </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc72" class="purchases_moduel ps-2 skeleton" type="text" name="tax_vat_title" value="{{setting('tax_vat_title')}}" placeholder="Tax/Vat" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc73" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="tax_vat_title_display" disabled>
            <option class="sub_name_text" value="{{setting('tax_vat_title_display')}}">Display : {{setting('tax_vat_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus67" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Tax/Vat-Link] -->
<tr class="tax_vat_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc74" class="purchases_moduel ps-2 skeleton" type="text" name="add_tax_vat_title" value="{{setting('add_tax_vat_title')}}" placeholder="ADD Tax/Vat" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc75" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_tax_vat_link" disabled>
            <option class="sub_name_text" value="{{setting('add_tax_vat_link')}}">URL : {{setting('add_tax_vat_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc76" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="tax_vat_visual" disabled>
            <option class="sub_name_text" value="{{setting('tax_vat_visual')}}">Display : {{setting('tax_vat_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus68" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="tax_vat_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc77" class="purchases_moduel ps-2 skeleton" type="text" name="list_vat_tax_title" value="{{setting('list_vat_tax_title')}}" placeholder="List Of Tax/Vat" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc78" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="list_vat_tax_link" disabled>
            <option class="sub_name_text" value="{{setting('list_vat_tax_link')}}">URL : {{setting('list_vat_tax_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc79" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="list_vat_tax_visual" disabled>
            <option class="sub_name_text" value="{{setting('list_vat_tax_visual')}}">Display : {{setting('list_vat_tax_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus69" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="tax_vat_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc80" class="purchases_moduel ps-2 skeleton" type="text" name="details_records_title" value="{{setting('details_records_title')}}" placeholder="Details Record" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc81" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="details_records_link" disabled>
            <option class="sub_name_text" value="{{setting('details_records_link')}}">URL : {{setting('details_records_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc82" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="details_records_visual" disabled>
            <option class="sub_name_text" value="{{setting('details_records_visual')}}">Display : {{setting('details_records_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus70" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="tax_vat_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc83" class="purchases_moduel ps-2 skeleton" type="text" name="vat_tax_setting_title" value="{{setting('vat_tax_setting_title')}}" placeholder="Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc84" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vat_tax_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('vat_tax_setting_link')}}">URL : {{setting('vat_tax_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc85" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vat_tax_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('vat_tax_setting_visual')}}">Display : {{setting('vat_tax_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus71" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Sales] -->
<tr class="sales_child">
    <td class="background sales_children_siblink" style="text-align:left;">
        <span class="ms-3"><span id="sales_children">➤</span> <span id="sales_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Sales </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc86" class="purchases_moduel ps-2 skeleton" type="text" name="sales_title" value="{{setting('sales_title')}}" placeholder="Sales" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc87" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="sales_title_display" disabled>
            <option class="sub_name_text" value="{{setting('sales_title_display')}}">Display : {{setting('sales_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus72" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Orders] -->
<tr class="sales_children_siblink2">
    <td class="background sales_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="order_children">➤</span> <span id="order_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Orders </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc88" class="purchases_moduel ps-2 skeleton" type="text" name="order_title" value="{{setting('order_title')}}" placeholder="Orders" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc89" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_title_display" disabled>
            <option class="sub_name_text" value="{{setting('order_title_display')}}">Display : {{setting('order_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus73" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Orders-Link] -->
<tr class="sales_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc90" class="purchases_moduel ps-2 skeleton" type="text" name="add_order_title" value="{{setting('add_order_title')}}" placeholder="ADD Order" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc91" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_order_link" disabled>
            <option class="sub_name_text" value="{{setting('add_order_link')}}">URL : {{setting('add_order_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc92" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_visual" disabled>
            <option class="sub_name_text" value="{{setting('order_visual')}}">Display : {{setting('order_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus74" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="sales_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc93" class="purchases_moduel ps-2 skeleton" type="text" name="order_list_title" value="{{setting('order_list_title')}}" placeholder="Order List" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc94" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_list_link" disabled>
            <option class="sub_name_text" value="{{setting('order_list_link')}}">URL : {{setting('order_list_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc95" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_list_visual" disabled>
            <option class="sub_name_text" value="{{setting('order_list_visual')}}">Display : {{setting('order_list_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus75" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="sales_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc96" class="purchases_moduel ps-2 skeleton" type="text" name="order_setting_title" value="{{setting('order_setting_title')}}" placeholder="Order Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc97" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('order_setting_link')}}">URL : {{setting('order_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc98" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="order_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('order_setting_visual')}}">Display : {{setting('order_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus76" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Invoice] -->
<tr class="invoice_children_siblink2">
    <td class="background invoice_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="invoice_children">➤</span> <span id="invoice_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Invoice </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc99" class="purchases_moduel ps-2 skeleton" type="text" name="invoice_title" value="{{setting('invoice_title')}}" placeholder="Invoice" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc100" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="invoice_title_display" disabled>
            <option class="sub_name_text" value="{{setting('invoice_title_display')}}">Display : {{setting('invoice_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus77" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Invoice-Link] -->
<tr class="invoice_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc101" class="purchases_moduel ps-2 skeleton" type="text" name="add_invoice_title" value="{{setting('add_invoice_title')}}" placeholder="ADD Invoice" disabled>
    </td>
    <td class="ps-1 custom-select">
        <select id="update_purchases_moduel_Acc102" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_invoice_link" disabled>
            <option class="sub_name_text" value="{{setting('add_invoice_link')}}">URL : {{setting('add_invoice_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="ps-1 custom-select" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc103" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="invoice_visual" disabled>
            <option class="sub_name_text" value="{{setting('invoice_visual')}}">Display : {{setting('invoice_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus78" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="invoice_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc104" class="purchases_moduel ps-2 skeleton" type="text" name="invocie_setting_title" value="{{setting('invocie_setting_title')}}" placeholder="Invoice Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc105" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="invoice_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('invoice_setting_link')}}">URL : {{setting('invoice_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc106" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="invoice_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('invoice_setting_visual')}}">Display : {{setting('invoice_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus79" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Sales-Region] -->
<tr class="sales_region_children_siblink2">
    <td class="background sales_region_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="sales_region_children">➤</span> <span id="sales_region_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Sales Region </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc107" class="purchases_moduel ps-2 skeleton" type="text" name="sales_region_title" value="{{setting('sales_region_title')}}" placeholder="Sales Region" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc108" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="sales_region_title_display" disabled>
            <option class="sub_name_text" value="{{setting('sales_region_title_display')}}">Display : {{setting('sales_region_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus80" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Sales-Region-Link] -->
<tr class="sales_region_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc109" class="purchases_moduel ps-2 skeleton" type="text" name="sales_region_list_title" value="{{setting('sales_region_list_title')}}" placeholder="Sales Region List" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc110" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="sales_region_list_link" disabled>
            <option class="sub_name_text" value="{{setting('sales_region_list_link')}}">URL : {{setting('sales_region_list_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc111" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="sales_region_list_visual" disabled>
            <option class="sub_name_text" value="{{setting('sales_region_list_visual')}}">Display : {{setting('sales_region_list_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus81" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="sales_region_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc112" class="purchases_moduel ps-2 skeleton" type="text" name="region_base_sales_title" value="{{setting('region_base_sales_title')}}" placeholder="Region Base Sales" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc113" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="region_base_sales_link" disabled>
            <option class="sub_name_text" value="{{setting('region_base_sales_link')}}">URL : {{setting('region_base_sales_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc114" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="region_base_sales_visual" disabled>
            <option class="sub_name_text" value="{{setting('region_base_sales_visual')}}">Display : {{setting('region_base_sales_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus82" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="sales_region_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc115" class="purchases_moduel ps-2 skeleton" type="text" name="region_sales_setting_title" value="{{setting('region_sales_setting_title')}}" placeholder="Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc116" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="region_sales_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('region_sales_setting_link')}}">URL : {{setting('region_sales_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc117" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="region_sales_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('region_sales_setting_visual')}}">Display : {{setting('region_sales_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus83" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Vaoucher] -->
<tr class="vaoucher_child">
    <td class="background vaoucher_children_siblink" style="text-align:left;">
        <span class="ms-3"><span id="vaoucher_children">➤</span> <span id="vaoucher_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Vaoucher </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc118" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucher_title" value="{{setting('vaoucher_title')}}" placeholder="Vaoucher" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc119" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_title_display" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_title_display')}}">Display : {{setting('vaoucher_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus84" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Caegory] -->
<tr class="vaoucher_children_siblink2">
    <td class="background vaoucher_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="vaoucher_category_children">➤</span> <span id="vaoucher_category_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Cateogry </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc120" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucher_category_title" value="{{setting('vaoucher_category_title')}}" placeholder="Category" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc121" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_category_title_display" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_category_title_display')}}">Display : {{setting('vaoucher_category_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus85" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Category-Link] -->
<tr class="vaoucher_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc122" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucherCategy_title" value="{{setting('vaoucherCategy_title')}}" placeholder="Vaoucher Category" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc123" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucherCategy_link" disabled>
            <option class="sub_name_text" value="{{setting('vaoucherCategy_link')}}">URL : {{setting('vaoucherCategy_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc124" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucherCategy_visual" disabled>
            <option class="sub_name_text" value="{{setting('vaoucherCategy_visual')}}">Display : {{setting('vaoucherCategy_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus86" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="vaoucher_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc125" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucher_list_title" value="{{setting('vaoucher_list_title')}}" placeholder="Vaoucher List" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc126" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_list_link" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_list_link')}}">URL : {{setting('vaoucher_list_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc127" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_list_visual" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_list_visual')}}">Display : {{setting('vaoucher_list_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus87" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Main-Vaoucher] -->
<tr class="main_vaoucher_children_siblink2">
    <td class="background main_vaoucher_children_siblink3" style="text-align:left;">
        <span class="ms-4"><span id="main_vaoucher_children">➤</span> <span id="main_vaoucher_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Vaoucher </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc128" class="purchases_moduel ps-2 skeleton" type="text" name="main_vaoucher_title" value="{{setting('main_vaoucher_title')}}" placeholder="Main Vaoucher" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc129" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="main_vaoucher_title_display" disabled>
            <option class="sub_name_text" value="{{setting('main_vaoucher_title_display')}}">Display : {{setting('main_vaoucher_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus88" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Main-Vaoucher-Link] -->
<tr class="main_vaoucher_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc130" class="purchases_moduel ps-2 skeleton" type="text" name="add_vaoucher_title" value="{{setting('add_vaoucher_title')}}" placeholder="ADD Vaoucher" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc131" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_vaoucher_link" disabled>
            <option class="sub_name_text" value="{{setting('add_vaoucher_link')}}">URL : {{setting('add_vaoucher_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc132" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_vaoucher_visual" disabled>
            <option class="sub_name_text" value="{{setting('add_vaoucher_visual')}}">Display : {{setting('add_vaoucher_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus89" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="main_vaoucher_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc133" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucher_details_title" value="{{setting('vaoucher_details_title')}}" placeholder="Vaoucher Details" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc134" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_details_link" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_details_link')}}">URL : {{setting('vaoucher_details_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc135" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_details_visual" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_details_visual')}}">Display : {{setting('vaoucher_details_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus90" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="main_vaoucher_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc136" class="purchases_moduel ps-2 skeleton" type="text" name="vaoucher_setting_title" value="{{setting('vaoucher_setting_title')}}" placeholder="Vaoucher Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc137" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_setting_link')}}">URL : {{setting('vaoucher_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc138" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="vaoucher_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('vaoucher_setting_visual')}}">Display : {{setting('vaoucher_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus91" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Asset] -->
<tr class="asset_children_siblink2">
    <td class="background asset_children_siblink" style="text-align:left;">
        <span class="ms-3"><span id="asset_children">➤</span> <span id="asset_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Asset </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc139" class="purchases_moduel ps-2 skeleton" type="text" name="asset_title" value="{{setting('asset_title')}}" placeholder="Asset" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc140" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_title_display" disabled>
            <option class="sub_name_text" value="{{setting('asset_title_display')}}">Display : {{setting('asset_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus92" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [New-Asset] -->
<tr class="asset_children_siblink3">
    <td class="background asset_children_siblink4" style="text-align:left;">
        <span class="ms-4"><span id="new_asset_children">➤</span> <span id="new_asset_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">New Asset </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc141" class="purchases_moduel ps-2 skeleton" type="text" name="new_asset_title" value="{{setting('new_asset_title')}}" placeholder="New Asset" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc142" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="new_asset_title_display" disabled>
            <option class="sub_name_text" value="{{setting('new_asset_title_display')}}">Display : {{setting('new_asset_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus93" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Asset-Link] -->
<tr class="asset_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc143" class="purchases_moduel ps-2 skeleton" type="text" name="add_asset_title" value="{{setting('add_asset_title')}}" placeholder="Create Asset" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc144" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_asset_link" disabled>
            <option class="sub_name_text" value="{{setting('add_asset_link')}}">URL : {{setting('add_asset_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc145" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="add_asset_visual" disabled>
            <option class="sub_name_text" value="{{setting('add_asset_visual')}}">Display : {{setting('add_asset_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus94" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="asset_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc146" class="purchases_moduel ps-2 skeleton" type="text" name="asset_details_title" value="{{setting('asset_details_title')}}" placeholder="Asset Details" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc147" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_details_link" disabled>
            <option class="sub_name_text" value="{{setting('asset_details_link')}}">URL : {{setting('asset_details_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc148" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_details_visual" disabled>
            <option class="sub_name_text" value="{{setting('asset_details_visual')}}">Display : {{setting('asset_details_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus95" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Asset-Details] -->
<tr class="asset_details_children_siblink2">
    <td class="background asset_details_children_siblink" style="text-align:left;">
        <span class="ms-4"><span id="details_asset_children">➤</span> <span id="details_asset_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Details </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc149" class="purchases_moduel ps-2 skeleton" type="text" name="details_asset_title" value="{{setting('details_asset_title')}}" placeholder="Asset Details" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc150" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="details_asset_title_display" disabled>
            <option class="sub_name_text" value="{{setting('details_asset_title_display')}}">Display : {{setting('details_asset_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus96" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Asset-details-Link] -->
<tr class="asset_details_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc151" class="purchases_moduel ps-2 skeleton" type="text" name="previous_asset_title" value="{{setting('previous_asset_title')}}" placeholder="Previous Asset" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc152" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="previous_asset_link" disabled>
            <option class="sub_name_text" value="{{setting('previous_asset_link')}}">URL : {{setting('previous_asset_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc153" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="previous_asset_visual" disabled>
            <option class="sub_name_text" value="{{setting('previous_asset_visual')}}">Display : {{setting('previous_asset_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus97" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="asset_details_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc154" class="purchases_moduel ps-2 skeleton" type="text" name="current_asset_title" value="{{setting('current_asset_title')}}" placeholder="Current Asset" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc155" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="current_asset_link" disabled>
            <option class="sub_name_text" value="{{setting('current_asset_link')}}">URL : {{setting('current_asset_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc156" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="current_asset_visual" disabled>
            <option class="sub_name_text" value="{{setting('current_asset_visual')}}">Display : {{setting('current_asset_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus98" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="asset_details_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc157" class="purchases_moduel ps-2 skeleton" type="text" name="asset_detls_title" value="{{setting('asset_detls_title')}}" placeholder="Asset Details" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc158" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_detls_link" disabled>
            <option class="sub_name_text" value="{{setting('asset_detls_link')}}">URL : {{setting('asset_detls_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc159" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="aasset_detls_visual" disabled>
            <option class="sub_name_text" value="{{setting('aasset_detls_visual')}}">Display : {{setting('aasset_detls_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus99" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="asset_details_children_siblink7">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc160" class="purchases_moduel ps-2 skeleton" type="text" name="asset_setting_title" value="{{setting('asset_setting_title')}}" placeholder="Asset Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc161" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('asset_setting_link')}}">URL : {{setting('asset_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc162" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="asset_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('asset_setting_visual')}}">Display : {{setting('asset_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus100" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Report] -->
<tr class="report_children_siblink2">
    <td class="background report_children_siblink" style="text-align:left;">
        <span class="ms-3"><span id="report_children">➤</span> <span id="report_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Report </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc163" class="purchases_moduel ps-2 skeleton" type="text" name="report_title" value="{{setting('report_title')}}" placeholder="Report" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc164" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="report_title_display" disabled>
            <option class="sub_name_text" value="{{setting('report_title_display')}}">Display : {{setting('report_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus101" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Accounting Report] -->
<tr class="acc_report_children_siblink2">
    <td class="background acc_report_children_siblink" style="text-align:left;">
        <span class="ms-4"><span id="accounting_report_children">➤</span> <span id="accounting_report_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Account Report </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc165" class="purchases_moduel ps-2 skeleton" type="text" name="acc_report_title" value="{{setting('acc_report_title')}}" placeholder="Accounting Report" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc166" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="acc_report_title_display" disabled>
            <option class="sub_name_text" value="{{setting('acc_report_title_display')}}">Display : {{setting('acc_report_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus102" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Accounting Report-Link] -->
<tr class="acc_asset_details_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc167" class="purchases_moduel ps-2 skeleton" type="text" name="blance_sheet_title" value="{{setting('blance_sheet_title')}}" placeholder="Blance Sheet" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc168" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="blance_sheet_link" disabled>
            <option class="sub_name_text" value="{{setting('blance_sheet_link')}}">URL : {{setting('blance_sheet_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc169" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="blance_sheet_visual" disabled>
            <option class="sub_name_text" value="{{setting('blance_sheet_visual')}}">Display : {{setting('blance_sheet_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus103" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc170" class="purchases_moduel ps-2 skeleton" type="text" name="trial_blance_sheet_title" value="{{setting('trial_blance_sheet_title')}}" placeholder="Trial-Blance Sheet" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc171" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="trial_blance_sheet_link" disabled>
            <option class="sub_name_text" value="{{setting('trial_blance_sheet_link')}}">URL : {{setting('trial_blance_sheet_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc172" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="trial_blance_sheet_visual" disabled>
            <option class="sub_name_text" value="{{setting('trial_blance_sheet_visual')}}">Display : {{setting('trial_blance_sheet_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus104" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc173" class="purchases_moduel ps-2 skeleton" type="text" name="financial_statement_title" value="{{setting('financial_statement_title')}}" placeholder="Financial Statement" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc174" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="financial_statement_link" disabled>
            <option class="sub_name_text" value="{{setting('financial_statement_link')}}">URL : {{setting('financial_statement_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc175" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="financial_statementt_visual" disabled>
            <option class="sub_name_text" value="{{setting('financial_statement_visual')}}">Display : {{setting('financial_statement_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus105" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc176" class="purchases_moduel ps-2 skeleton" type="text" name="income_statement_title" value="{{setting('income_statement_title')}}" placeholder="Income Statement" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc177" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="income_statement_link" disabled>
            <option class="sub_name_text" value="{{setting('income_statement_link')}}">URL : {{setting('income_statement_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc178" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="income_statement_visual" disabled>
            <option class="sub_name_text" value="{{setting('income_statement_visual')}}">Display : {{setting('income_statement_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus106" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink7">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc179" class="purchases_moduel ps-2 skeleton" type="text" name="cash_flow_statement_title" value="{{setting('cash_flow_statement_title')}}" placeholder="Cash Flow Statement" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc180" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="cash_flow_statement_link" disabled>
            <option class="sub_name_text" value="{{setting('cash_flow_statement_link')}}">URL : {{setting('cash_flow_statement_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc181" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="cash_flow_statement_visual" disabled>
            <option class="sub_name_text" value="{{setting('cash_flow_statement_visual')}}">Display : {{setting('cash_flow_statement_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus107" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink8">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc182" class="purchases_moduel ps-2 skeleton" type="text" name="petty_cash_statement_title" value="{{setting('petty_cash_statement_title')}}" placeholder="Petty Cash Statement" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc183" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_statement_link" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_statement_link')}}">URL : {{setting('petty_cash_statement_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc184" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="petty_cash_statement_visual" disabled>
            <option class="sub_name_text" value="{{setting('petty_cash_statement_visual')}}">Display : {{setting('petty_cash_statement_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus108" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink9">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc185" class="purchases_moduel ps-2 skeleton" type="text" name="p_l_statement_title" value="{{setting('p_l_statement_title')}}" placeholder="P/L Statement" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc186" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="p_l_statement_link" disabled>
            <option class="sub_name_text" value="{{setting('p_l_statement_link')}}">URL : {{setting('p_l_statement_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc187" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="p_l_statement_visual" disabled>
            <option class="sub_name_text" value="{{setting('p_l_statement_visual')}}">Display : {{setting('p_l_statement_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus109" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink10">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc188" class="purchases_moduel ps-2 skeleton" type="text" name="tabular_analycis_title" value="{{setting('tabular_analycis_title')}}" placeholder="Tabular-Analycis" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc189" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="tabular_analycis_link" disabled>
            <option class="sub_name_text" value="{{setting('tabular_analycis_link')}}">URL : {{setting('tabular_analycis_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc190" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="tabular_analycis_visual" disabled>
            <option class="sub_name_text" value="{{setting('tabular_analycis_visual')}}">Display : {{setting('tabular_analycis_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus110" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink11">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc191" class="purchases_moduel ps-2 skeleton" type="text" name="table_blance_sheet_title" value="{{setting('table_blance_sheet_title')}}" placeholder="Table Of Blance Sheet" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc192" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="table_blance_sheet_link" disabled>
            <option class="sub_name_text" value="{{setting('table_blance_sheet_link')}}">URL : {{setting('table_blance_sheet_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc193" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="table_blance_sheet_visual" disabled>
            <option class="sub_name_text" value="{{setting('table_blance_sheet_visual')}}">Display : {{setting('table_blance_sheet_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus111" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="acc_asset_details_children_siblink12">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc194" class="purchases_moduel ps-2 skeleton" type="text" name="report_setting_title" value="{{setting('report_setting_title')}}" placeholder="Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc195" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="report_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('report_setting_link')}}">URL : {{setting('report_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc196" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="report_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('report_setting_visual')}}">Display : {{setting('report_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus112" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Monthly Report] -->
<tr class="monthly_report_children_siblink2">
    <td class="background monthly_report_children_siblink" style="text-align:left;">
        <span class="ms-4"><span id="monthly_report_children">➤</span> <span id="monthly_report_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Monthly Report </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc197" class="purchases_moduel ps-2 skeleton" type="text" name="acc_monthly_report_title" value="{{setting('acc_monthly_report_title')}}" placeholder="Accounting Report" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc198" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="acc_monthly_report_title_display" disabled>
            <option class="sub_name_text" value="{{setting('acc_monthly_report_title_display')}}">Display : {{setting('acc_monthly_report_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus113" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Monthly Report-Link] -->
<tr class="monthly_report_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc199" class="purchases_moduel ps-2 skeleton" type="text" name="monthly_report_view_title" value="{{setting('monthly_report_view_title')}}" placeholder="Monthly Report View" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc200" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="monthly_report_view_link" disabled>
            <option class="sub_name_text" value="{{setting('monthly_report_view_link')}}">URL : {{setting('monthly_report_view_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc201" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="monthly_report_view_visual" disabled>
            <option class="sub_name_text" value="{{setting('monthly_report_view_visual')}}">Display : {{setting('monthly_report_view_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus114" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="monthly_report_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc202" class="purchases_moduel ps-2 skeleton" type="text" name="monthly_report_setting_title" value="{{setting('monthly_report_setting_title')}}" placeholder="Monthly Report Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc203" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="monthly_report_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('monthly_report_setting_link')}}">URL : {{setting('monthly_report_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc204" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="monthly_report_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('monthly_report_setting_visual')}}">Display : {{setting('monthly_report_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus115" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Daily Report] -->
<tr class="daily_report_children_siblink2">
    <td class="background daily_report_children_siblink" style="text-align:left;">
        <span class="ms-4"><span id="daily_report_children">➤</span> <span id="daily_report_children2">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Daily Report </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc205" class="purchases_moduel ps-2 skeleton" type="text" name="daily_report_title" value="{{setting('daily_report_title')}}" placeholder="Daily Report" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc206" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="daily_report_title_display" disabled>
            <option class="sub_name_text" value="{{setting('daily_report_title_display')}}">Display : {{setting('daily_report_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus116" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Daily Report-Link] -->
<tr class="daily_report_children_siblink3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc207" class="purchases_moduel ps-2 skeleton" type="text" name="daily_report_view_title" value="{{setting('daily_report_view_title')}}" placeholder="Daily Report View" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc208" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="daily_report_view_link" disabled>
            <option class="sub_name_text" value="{{setting('daily_report_view_link')}}">URL : {{setting('daily_report_view_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc209" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="daily_report_view_visual" disabled>
            <option class="sub_name_text" value="{{setting('daily_report_view_visual')}}">Display : {{setting('daily_report_view_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus117" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<tr class="daily_report_children_siblink4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_Acc210" class="purchases_moduel ps-2 skeleton" type="text" name="daily_report_setting_title" value="{{setting('daily_report_setting_title')}}" placeholder="Daily Report Setting" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_Acc211" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="daily_report_setting_link" disabled>
            <option class="sub_name_text" value="{{setting('daily_report_setting_link')}}">URL : {{setting('daily_report_setting_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_Acc212" class="mt- ps-1 update_user firstcategory purchases_moduel supplier_id" name="daily_report_setting_visual" disabled>
            <option class="sub_name_text" value="{{setting('daily_report_setting_visual')}}">Display : {{setting('daily_report_setting_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus118" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
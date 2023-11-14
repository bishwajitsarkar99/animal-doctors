<!-- Purchases-Moduel -->
<tr class="parent">
    <td class="parent_moduel1 row_parent ps-1">
        <span id="parent1"> ➤</span> <span id="parent2"> &#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Purchases Moduel </label>
    </td>
    <td colspan="1">
        <input id="update_purchases_moduel" class="purchases_moduel ps-2 skeleton" type="text" name="purches_moduel" value="{{setting('purches_moduel_title')}}" placeholder="Purchases Dept." disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel7" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="purchases_display" disabled>
            <option class="sub_name_text" value="{{setting('purchases_visual')}}">Display-Purchases-Moduel : {{setting('purchases_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus6" type="text" class="light2-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Product] -->
<tr class="child1">
    <td class="background productChild ps-3" style="text-align:left;">
        <span id="children1">➤</span> <span id="children2">&#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Product </label>
    </td>
    <td>
        <input id="update_purchases_moduel2" class="purchases_moduel ps-2 skeleton" type="text" name="product" value="{{setting('product_title')}}" placeholder="Product" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel8" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_display" disabled>
            <option class="sub_name_text" value="{{setting('product_visual')}}">Display-Product : {{setting('product_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus7" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [category] -->
<tr class="children_siblink">
    <td class="background categoryChild" style="text-align:left;">
        <span class="ms-4"><span id="children3">➤</span> <span id="children4">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Category </label>
    </td>
    <td>
        <input id="update_purchases_moduel3" class="purchases_moduel ps-2 skeleton" type="text" name="category" value="{{setting('category_title')}}" placeholder="Category" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel9" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="categ_title_display" disabled>
            <option class="sub_name_text" value="{{setting('categ_title_visual')}}">Display-Category : {{setting('categ_title_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus8" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [category-link] -->
<tr class="children_link">
    <td class="cagtegory-link link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel4" class="purchases_moduel ps-2 skeleton" type="text" name="add_category" value="{{setting('add_category_title')}}" placeholder="ADD Category" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel5" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="category_url" disabled>
            <option class="sub_name_text" value="{{setting('category_link')}}">URL : {{setting('category_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/category">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel6" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="category_display" disabled>
            <option class="sub_name_text" value="{{setting('category_visual')}}">Display-Add-Category : {{setting('category_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus9" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [sub-category] -->
<tr class="children_siblink3">
    <td class="background children_siblink2" style="text-align:left;">
        <span class="ms-4"><span id="children5">➤</span> <span id="children6">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Sub-Category </label>
    </td>
    <td>
        <input id="update_purchases_moduel_subcatg" class="purchases_moduel ps-2 skeleton" type="text" name="sub_category_name" value="{{setting('sub_category_name')}}" placeholder="Sub Category" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_subcatg2" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="sub_categ_title_visual" disabled>
            <option class="sub_name_text" value="{{setting('sub_categ_title_visual')}}">Display-Sub-Cagtegory : {{setting('sub_categ_title_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus10" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [sub-category-link] -->
<tr class="children_link2">
    <td class="link sub-cate-link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel_subcatg3" class="purchases_moduel ps-2 skeleton" type="text" name="sub_category_title_text" value="{{setting('sub_category_title_text')}}" placeholder="ADD Category" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel_subcatg4" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="subcategory_link" disabled>
            <option class="sub_name_text" value="{{setting('subcategory_link')}}">URL : {{setting('subcategory_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/sub-category">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel_subcatg5" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="subcategory_visual" disabled>
            <option class="sub_name_text" value="{{setting('subcategory_visual')}}">Display-Add-Sub-Category : {{setting('subcategory_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus11" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [group] -->
<tr class="children_siblink4">
    <td class="background children_siblink5" style="text-align:left;">
        <span class="ms-4"><span id="children7">➤</span> <span id="children8">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Group </label>
    </td>
    <td>
        <input id="update_purchases_moduel_group" class="purchases_moduel ps-2 skeleton" type="text" name="group_name" value="{{setting('group_name')}}" placeholder="Group" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel10" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="group_title_visual" disabled>
            <option class="sub_name_text" value="{{setting('group_title_visual')}}">Display-Group : {{setting('group_title_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus12" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [group-link] -->
<tr class="children_link3">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_group_moduel" class="purchases_moduel ps-2 skeleton" type="text" name="add_group_title" value="{{setting('add_group_title')}}" placeholder="ADD Group" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_group_moduel2" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_group_link" disabled>
            <option class="sub_name_text" value="{{setting('product_group_link')}}">URL : {{setting('product_group_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/medicine-group">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_group_moduel3" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="group_visual" disabled>
            <option class="sub_name_text" value="{{setting('group_visual')}}">Display-Add-Group : {{setting('group_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus13" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [medicine] -->
<tr class="children_siblink5">
    <td class="background children_siblink6" style="text-align:left;">
        <span class="ms-4"><span id="children9">➤</span> <span id="children10">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Medicine </label>
    </td>
    <td>
        <input id="update_purchases_moduel14" class="purchases_moduel ps-2 skeleton" type="text" name="medicine_name" value="{{setting('medicine_name')}}" placeholder="Medicine" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel15" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_title_visual" disabled>
            <option class="sub_name_text" value="{{setting('medicine_title_visual')}}">Display-Medicine : {{setting('medicine_title_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus14" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [medicine-link] -->
<tr class="children_link4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel16" class="purchases_moduel ps-2 skeleton" type="text" name="add_medicine_title" value="{{setting('add_medicine_title')}}" placeholder="ADD Name" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel17" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_group_link" disabled>
            <option class="sub_name_text" value="{{setting('medicine_group_link')}}">URL : {{setting('medicine_group_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/medicine-name">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel18" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_visual" disabled>
            <option class="sub_name_text" value="{{setting('medicine_visual')}}">Display-Add-name : {{setting('medicine_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus15" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="children_dosage_link4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel19" class="purchases_moduel ps-2 skeleton" type="text" name="add_medicine_dosage_title" value="{{setting('add_medicine_dosage_title')}}" placeholder="ADD Dosage" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel20" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_dosage_link" disabled>
            <option class="sub_name_text" value="{{setting('medicine_dosage_link')}}">URL : {{setting('medicine_dosage_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/medicine-dosage">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel21" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_visual" disabled>
            <option class="sub_name_text" value="{{setting('medicine_visual')}}">Display-Add-Dosage : {{setting('medicine_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus39" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="children_origin_link4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel22" class="purchases_moduel ps-2 skeleton" type="text" name="add_medicine_origin_title" value="{{setting('add_medicine_origin_title')}}" placeholder="ADD Origin" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel23" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_oriign_link" disabled>
            <option class="sub_name_text" value="{{setting('medicine_oriign_link')}}">URL : {{setting('medicine_oriign_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/origin">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel24" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="medicine_visual" disabled>
            <option class="sub_name_text" value="{{setting('medicine_visual')}}">Display-Add-Origin : {{setting('medicine_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus40" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [model] -->
<tr class="children_siblink6">
    <td class="background children_siblink7" style="text-align:left;">
        <span class="ms-4"><span id="children11">➤</span> <span id="children12">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Model </label>
    </td>
    <td>
        <input id="update_purchases_moduel25" class="purchases_moduel ps-2 skeleton" type="text" name="product_model_title" value="{{setting('product_model_title')}}" placeholder="Product Model" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel26" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_model_title_display" disabled>
            <option class="sub_name_text" value="{{setting('product_model_title_display')}}">Display-Model : {{setting('product_model_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus16" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [model-link] -->
<tr class="children_link5">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel27" class="purchases_moduel ps-2 skeleton" type="text" name="add_model_title" value="{{setting('add_model_title')}}" placeholder="ADD Category" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel28" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="model_link" disabled>
            <option class="sub_name_text" value="{{setting('model_link')}}">URL : {{setting('model_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/model">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel29" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="model_visual" disabled>
            <option class="sub_name_text" value="{{setting('model_visual')}}">Display-Add : {{setting('model_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus17" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [unit] -->
<tr class="children_siblink7">
    <td class="background children_siblink8" style="text-align:left;">
        <span class="ms-4"><span id="children13">➤</span> <span id="children14">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Unit </label>
    </td>
    <td>
        <input id="update_purchases_moduel30" class="purchases_moduel ps-2 skeleton" type="text" name="unit_title" value="{{setting('unit_title')}}" placeholder="Unit" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel31" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="unit_title_display" disabled>
            <option class="sub_name_text" value="{{setting('unit_title_display')}}">Display-Unit : {{setting('unit_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus18" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [unit-link] -->
<tr class="children_link6">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel32" class="purchases_moduel ps-2 skeleton" type="text" name="add_unit_title" value="{{setting('add_unit_title')}}" placeholder="ADD Unit" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel33" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="unit_link" disabled>
            <option class="sub_name_text" value="{{setting('unit_link')}}">URL : {{setting('unit_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/units">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel34" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="unit_visual" disabled>
            <option class="sub_name_text" value="{{setting('unit_visual')}}">Display-Add-Unit : {{setting('unit_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus19" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [brand] -->
<tr class="children_siblink8">
    <td class="background children_siblink9" style="text-align:left;">
        <span class="ms-4"><span id="children15">➤</span> <span id="children16">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Brand </label>
    </td>
    <td>
        <input id="update_purchases_moduel35" class="purchases_moduel ps-2 skeleton" type="text" name="brand_title" value="{{setting('brand_title')}}" placeholder="Brand" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel36" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="brand_title_display" disabled>
            <option class="sub_name_text" value="{{setting('brand_title_display')}}">Display-Brand : {{setting('brand_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus20" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [brand-link] -->
<tr class="children_link7">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel37" class="purchases_moduel ps-2 skeleton" type="text" name="add_brand_title" value="{{setting('add_brand_title')}}" placeholder="ADD Brand" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel38" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="brand_link" disabled>
            <option class="sub_name_text" value="{{setting('brand_link')}}">URL : {{setting('brand_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/brand">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel39" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="brand_visual" disabled>
            <option class="sub_name_text" value="{{setting('brand_visual')}}">Display-Add-Brand : {{setting('brand_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td style="text-align: center;"><span class="fbox"><input id="light_focus21" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [product] -->
<tr class="children_siblink9">
    <td class="background children_siblink10" style="text-align:left;">
        <span class="ms-4"><span id="children17">➤</span> <span id="children18">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Product </label>
    </td>
    <td>
        <input id="update_purchases_moduel40" class="purchases_moduel ps-2 skeleton" type="text" name="product" value="{{setting('product')}}" placeholder="Product" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel41" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_title_display" disabled>
            <option class="sub_name_text" value="{{setting('product_title_display')}}">Display-Product : {{setting('product_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus22" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [product-link] -->
<tr class="children_link8">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel42" class="purchases_moduel ps-2 skeleton" type="text" name="add_Prodcut_title" value="{{setting('add_Prodcut_title')}}" placeholder="ADD Product" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel43" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_link" disabled>
            <option class="sub_name_text" value="{{setting('product_link')}}">URL : {{setting('product_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/product">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel44" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="product_visual_" disabled>
            <option class="sub_name_text" value="{{setting('product_visual_')}}">Display-Add-Product : {{setting('product_visual_')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus23" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [Stock] -->
<tr class="child2">
    <td class="background children_siblink11 ps-3" style="text-align:left;">
        <span id="children19">➤</span> <span id="children20">&#x25BC;</span>
        <label class="input_label skeleton mt-1" for="select-user">Stock </label>
    </td>
    <td>
        <input id="update_purchases_moduel45" class="purchases_moduel ps-2 skeleton" type="text" name="stock_head_title" value="{{setting('stock_head_title')}}" placeholder="Stock" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel46" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_head_title_display" disabled>
            <option class="sub_name_text" value="{{setting('stock_head_title_display')}}">Display-Stock : {{setting('stock_head_title_display')}}</option>
            <option class="sub_name_text text-primary" value="block">block</option>
            <option class="sub_name_text text-danger" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus24" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [stock children] -->
<tr class="stock_children_link">
    <td class="background children_siblink12" style="text-align:left;">
        <span class="ms-4"><span id="children21">➤</span> <span id="children22">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1" for="select-user">Stock Title</label>
    </td>
    <td>
        <input id="update_purchases_moduel47" class="purchases_moduel ps-2 skeleton" type="text" name="stock_title" value="{{setting('stock_title')}}" placeholder="Stock" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel48" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_title_display" disabled>
            <option class="sub_name_text" value="{{setting('stock_title_display')}}">Display-Add-Stock : {{setting('stock_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus25" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [stock-link] -->
<tr class="stock_children_link2">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel49" class="purchases_moduel ps-2 skeleton" type="text" name="stock_book_title" value="{{setting('stock_book_title')}}" placeholder="Stock Book" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_modue50" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_book_link" disabled>
            <option class="sub_name_text" value="{{setting('stock_book_link')}}">URL : {{setting('stock_book_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/stock-book">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel51" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_book_visual" disabled>
            <option class="sub_name_text" value="{{setting('stock_book_visual')}}">Display : {{setting('stock_book_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus26" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="stock_children_link2a">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel52" class="purchases_moduel ps-2 skeleton" type="text" name="add_adjustment_title" value="{{setting('add_adjustment_title')}}" placeholder="Adjustment" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel53" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="adjustment_link" disabled>
            <option class="sub_name_text" value="{{setting('adjustment_link')}}">URL : {{setting('adjustment_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/stock-adjustment">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel54" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="adjustment_visual" disabled>
            <option class="sub_name_text" value="{{setting('adjustment_visual')}}">Display : {{setting('adjustment_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus27" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="stock_children_link2b">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel55" class="purchases_moduel ps-2 skeleton" type="text" name="add_dmage_stock_title" value="{{setting('add_dmage_stock_title')}}" placeholder="Dmage Stock" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel56" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="damage_stock_link" disabled>
            <option class="sub_name_text" value="{{setting('damage_stock_link')}}">URL : {{setting('damage_stock_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/damge-stock">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel57" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="damage_stock_visual" disabled>
            <option class="sub_name_text" value="{{setting('damage_stock_visual')}}">Display : {{setting('damage_stock_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus28" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="stock_children_link2c">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel58" class="purchases_moduel ps-2 skeleton" type="text" name="add_stock_summary_title" value="{{setting('add_stock_summary_title')}}" placeholder="Stock Summary" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel59" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_summary_link" disabled>
            <option class="sub_name_text" value="{{setting('stock_summary_link')}}">URL : {{setting('stock_summary_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/stock-summary">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel60" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_summary_visual" disabled>
            <option class="sub_name_text" value="{{setting('stock_summary_visual')}}">Display : {{setting('stock_summary_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus29" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="stock_children_link2d">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel61" class="purchases_moduel ps-2 skeleton" type="text" name="add_stock_report_title" value="{{setting('add_stock_report_title')}}" placeholder="Stock Summary" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel62" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_report_link" disabled>
            <option class="sub_name_text" value="{{setting('stock_report_link')}}">URL : {{setting('stock_report_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/stock-report">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel63" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="stock_report_visual" disabled>
            <option class="sub_name_text" value="{{setting('stock_report_visual')}}">Display : {{setting('stock_report_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus30" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [inventory children] -->
<tr class="stock_children_link3">
    <td class="background children_siblink13" style="text-align:left;">
        <span class="ms-4"><span id="children23">➤</span> <span id="children24">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1 me-2" for="select-user">Inventory </label>
    </td>
    <td>
        <input id="update_purchases_moduel64" class="purchases_moduel ps-2 skeleton" type="text" name="inventory_title" value="{{setting('inventory_title')}}" placeholder="Inventory" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel65" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="invnetory_title_display" disabled>
            <option class="sub_name_text" value="{{setting('invnetory_title_display')}}">Display : {{setting('invnetory_title_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus31" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [inventory-link] -->
<tr class="stock_children_link4">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel66" class="purchases_moduel ps-2 skeleton" type="text" name="invnetory_details_title" value="{{setting('invnetory_details_title')}}" placeholder="Inventory Details" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel67" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="inventory_details_link" disabled>
            <option class="sub_name_text" value="{{setting('inventory_details_link')}}">URL : {{setting('inventory_details_link')}}</option>
            <option class="sub_name_text" value="http://#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel68" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="inventory_details_visual" disabled>
            <option class="sub_name_text" value="{{setting('inventory_details_visual')}}">Display : {{setting('inventory_details_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus32" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<tr class="stock_children_link4a">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel69" class="purchases_moduel ps-2 skeleton" type="text" name="authorization_title" value="{{setting('authorization_title')}}" placeholder="Authorization" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel70" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="authorization_link" disabled>
            <option class="sub_name_text" value="{{setting('authorization_link')}}">URL : {{setting('authorization_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/super-admin/inventory-authorize">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel71" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="inventory_visual" disabled>
            <option class="sub_name_text" value="{{setting('inventory_visual')}}">Display : {{setting('inventory_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus33" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [supplier children] -->
<tr class="stock_children_link5">
    <td class="background children_siblink14" style="text-align:left;">
        <span class="ms-4"><span id="children25">➤</span> <span id="children26">&#x25BC;</span></span>
        <label class="input_label skeleton mt-1 me-2" for="select-user">Supplier </label>
    </td>
    <td>
        <input id="update_purchases_moduel72" class="purchases_moduel ps-2 skeleton" type="text" name="supplier_title" value="{{setting('supplier_title')}}" placeholder="Supplier" disabled>
    </td>
    <td class="ps-1"></td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel73" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_title_visual" disabled>
            <option class="sub_name_text" value="{{setting('supplier_title_visual')}}">Display : {{setting('supplier_title_visual')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus34" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [supplier-link] -->
<tr class="stock_children_link5a">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel74" class="purchases_moduel ps-2 skeleton" type="text" name="add_supplier_setup_title" value="{{setting('add_supplier_setup_title')}}" placeholder="Supplier-Setup" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel75" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_setup_link" disabled>
            <option class="sub_name_text" value="{{setting('supplier_setup_link')}}">URL : {{setting('supplier_setup_link')}}</option>
            <option class="sub_name_text" value="http://127.0.0.1:8000/supplier">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel76" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_setup_display" disabled>
            <option class="sub_name_text" value="{{setting('supplier_setup_display')}}">Display-Supplier : {{setting('supplier_setup_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus36" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [supplier-link] -->
<tr class="stock_children_link5b">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel77" class="purchases_moduel ps-2 skeleton" type="text" name="suppiler_setup_title" value="{{setting('suppiler_setup_title')}}" placeholder="Details Record" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel78" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_details_setup_link" disabled>
            <option class="sub_name_text" value="{{setting('supplier_details_setup_link')}}">URL : {{setting('supplier_details_setup_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel79" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_details_display" disabled>
            <option class="sub_name_text" value="{{setting('supplier_details_display')}}">Display-Supplier-Details : {{setting('supplier_details_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus37" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>
<!-- [supplier-link] -->
<tr class="stock_children_link5c">
    <td class="link" style="text-align:right;">
        <label class="input_label skeleton mt-1 me-2" for="select-user">Link </label>
    </td>
    <td>
        <input id="update_purchases_moduel80" class="purchases_moduel ps-2 skeleton" type="text" name="supplier_requisition_title" value="{{setting('supplier_requisition_title')}}" placeholder="Supplier Requisition" disabled>
    </td>
    <td class="drop custom-select ps-1">
        <select id="update_purchases_moduel81" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_requisition_link">
            <option class="sub_name_text" value="{{setting('supplier_requisition_link')}}">URL : {{setting('supplier_requisition_link')}}</option>
            <option class="sub_name_text" value="#">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="drop custom-select ps-1" style="color: black;font-weight:500">
        <select id="update_purchases_moduel82" class="purchases_moduel ps-1 update_user firstcategory supplier_id" name="supplier_requisition_display">
            <option class="sub_name_text" value="{{setting('supplier_requisition_display')}}">Display-Supplier-Requisition : {{setting('supplier_requisition_display')}}</option>
            <option class="sub_name_text" value="block">block</option>
            <option class="sub_name_text" value="hidden">hidden</option>
        </select>
        <span class="custom-app-setting-arrow"></span>
    </td>
    <td class="bg-white" style="text-align: center;"><span class="fbox"><input id="light_focus38" type="text" class="sidebar-focus skeleton" readonly></input></span></td>
</tr>

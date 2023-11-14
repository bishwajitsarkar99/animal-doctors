<!-- company-profile-setting -->
<div class="row">
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-user">Company :</label>
    </div>
    <div class="col-md-4">
        <input id="update_company_name" class="profile_value form-control form-control-sm skeleton" type="text" name="name" value="{{setting('company_name')}}" disabled>
    </div>
    <div class="col-md-2 pt-1">
        <span class="fbox"><input id="light_focus2" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-user">Company-logo :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_comp_logo" class="form-control form-control-sm ps-1 update_user firstcategory profile_value" name="update_company_logo" style="color:black;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_company_logo')}}">Display : {{setting('update_company_logo')}}</option>
            <option class="sub_name_text" value="logo-bg-white.png">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-app-setting-arrow me-3"></span>
    </div>
    <div class="col-md-1 pt-1">
        <div class="img-area" id="registerAnimation">
            <span class="skeleton"><img class="register_img" id="image_view" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" alt=""></span>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus3" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Address :</label>
    </div>
    <div class="col-md-4">
        <textarea class="profile_value form-control form-control-sm skeleton" name="address" id="update_company_address" cols="10" rows="1" value="" disabled>{{setting('company_address')}}</textarea>

    </div>
    <div class="col-md-2 pt-1">
        <span class="fbox"><input id="light_focus4" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-user">Slider-Image(1) :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_silder1" class="form-control form-control-sm ps-1 update_user firstcategory profile_value" name="update_slider1" style="color:black;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_slider1')}}">Display : {{setting('update_slider1')}}</option>
            <option class="sub_name_text" value="e-shop.jpg">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-app-setting-arrow me-3"></span>
    </div>
    <div class="col-md-1 pt-1">
        <div class="img-area" id="registerAnimation">
            <span class="skeleton"><img class="register_img" id="image_view" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_slider1')}}" alt=""></span>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-xl-6">

    </div>
    <div class="col-md-2 pt-1">
        <span class="fbox"><input id="light_focus5" type="text" class="another_light light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-user">Slider-image(2) :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_silder2" class="form-control form-control-sm ps-1 update_user firstcategory profile_value" name="update_slider2" style="color:black;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_slider2')}}">Display : {{setting('update_slider2')}}</option>
            <option class="sub_name_text" value="office.jpg">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-app-setting-arrow me-3"></span>
    </div>
    <div class="col-md-1 pt-1">
        <div class="img-area" id="registerAnimation">
            <span class="skeleton"><img class="register_img" id="image_view" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_slider2')}}" alt=""></span>
        </div>
    </div>
</div>
<div class="row mt-2 mb-2">
    <div class="col-xl-6">

    </div>
    <div class="col-md-2 pt-1">
        <span class="fbox"><input id="light_focus6a" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-user">Slider-image(3) :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_silder3" class="form-control form-control-sm ps-1 update_user firstcategory profile_value" name="update_slider3" style="color:black;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_slider3')}}">Display : {{setting('update_slider3')}}</option>
            <option class="sub_name_text" value="report.jpg">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-app-setting-arrow me-3"></span>
    </div>
    <div class="col-md-1 pt-1">
        <div class="img-area" id="registerAnimation">
            <span class="skeleton"><img class="register_img" id="image_view" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_slider3')}}" alt=""></span>
        </div>
    </div>
</div>
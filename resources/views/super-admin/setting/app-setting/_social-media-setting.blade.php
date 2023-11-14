<div class="row">
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Facebook-Link :</label>
    </div>
    <div class="custom-select col-xl-4">
        <select id="update_social_media1" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_facebook_link" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_facebook_link')}}">URL : {{setting('update_social_media_facebook_link')}}</option>
            <option class="sub_name_text" value="https://www.facebook.com/">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social2" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Messanger-Link :</label>
    </div>
    <div class="custom-select col-xl-4">
        <select id="update_social_media2" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_messanger_link" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_messanger_link')}}">URL : {{setting('update_social_media_messanger_link')}}</option>
            <option class="sub_name_text" value="https://www.messenger.com/">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social3" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-2 pt-1" for="select-role">Whatsapp-Link :</label>
    </div>
    <div class="custom-select col-xl-4">
        <select id="update_social_media3" class="form-control form-control-sm mt-2 ps-1 update_user firstcategory social_media_value" name="update_social_media_whatsapp_link" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_whatsapp_link')}}">URL : {{setting('update_social_media_whatsapp_link')}}</option>
            <option class="sub_name_text" value="https://web.whatsapp.com/">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-media-setting-arrow mt-2"></span>
    </div>
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social4" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-2 pt-1" for="select-role">Linkedin-Link :</label>
    </div>
    <div class="custom-select col-xl-4">
        <select id="update_social_media4" class="form-control form-control-sm mt-2 ps-1 update_user firstcategory social_media_value" name="update_social_media_linkedin_link" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_linkedin_link')}}">URL : {{setting('update_social_media_linkedin_link')}}</option>
            <option class="sub_name_text" value="https://www.linkedin.com/learning-login">Public</option>
            <option class="sub_name_text" value="#">Private : #</option>
        </select>
        <span class="custom-media-setting-arrow mt-2"></span>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social5" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Facebook-Logo :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_social_media5" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_facebook" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_facebook')}}">Display : {{setting('update_social_media_facebook')}}</option>
            <option class="sub_name_text" value="facebook.png">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    <div class="col-md-1">
        <span class="social_icon"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_facebook')}}" alt=""></span>
    </div>
    <div class="col-md-2">
        <span class="fbox"><input id="light_focus_social6" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Messanger-Logo :</label>
    </div>
    <div class="custom-select col-md-3">
        <select id="update_social_media6" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_messanger" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_messanger')}}">Display : {{setting('update_social_media_messanger')}}</option>
            <option class="sub_name_text" value="facebook-messenger.png">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    <div class="col-md-1">
        <span class="social_icon"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_messanger')}}" alt=""></span>
    </div>
    <div class="col-md-2 mt-2">
        <span class="fbox"><input id="light_focus_social7" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Whatsapp-Logo :</label>
    </div>
    <div class="custom-select col-md-3 mt-2">
        <select id="update_social_media7" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_whatsapp" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_whatsapp')}}">Display : {{setting('update_social_media_whatsapp')}}</option>
            <option class="sub_name_text" value="whatsapp.png">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    <div class="col-md-1 mt-2">
        <span class="social_icon"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_social_media_whatsapp')}}" alt=""></span>
    </div>
    <div class="col-md-2 mt-2">
        <span class="fbox"><input id="light_focus_social8" type="text" class="light2-focus skeleton" readonly></input></span>
        <label class="input_label skeleton mt-1" for="select-role">Linkedin-Logo :</label>
    </div>
    <div class="custom-select col-md-3 mt-2">
        <select id="update_social_media8" class="form-control form-control-sm ps-1 update_user firstcategory social_media_value" name="update_social_media_linkedin" style="color:blue;font-weight:600;" disabled>
            <option class="sub_name_text" value="{{setting('update_social_media_linkedin')}}">Display : {{setting('update_social_media_linkedin')}}</option>
            <option class="sub_name_text" value="#">Show</option>
            <option class="sub_name_text" value="hidden">Hidden</option>
        </select>
        <span class="custom-media-setting-arrow mt-1"></span>
    </div>
    <div class="col-md-1 mt-2">
        <span class="social_icon"><img class="social_icon" src="{{asset('backend_asset/main_asset/img')}}/update_social_media_linkedin" alt=""></span>
    </div>
</div>
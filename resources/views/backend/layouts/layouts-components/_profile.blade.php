<!-- Modal -->
<div class="modal fade" id="profile_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header text-fade-animation"style="border-bottom: double white;background-image: linear-gradient(to bottom, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%);">
        @if(auth()->user()->role ==0)
          <h6 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
            {{Auth::user()->name}} Profile
          </h6>
        @elseif(auth()->user()->role ==1)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==2)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==3)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==5)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==6)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==7)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:#0a0909;font-size:15;">
          <i class="fa-solid fa-rss" style="color:#585858;">‌</i>
          {{Auth::user()->name}} Profile
        </h5>
        @endif
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="row profile-heading">
          <div class="flex justify-center sm:items-center sm:justify-between mb-3" id="pro_image">
            <span class="image-box">
              <img class="profile" src="/storage/image/user-image/{{auth()->user()->image}}" style="width: 120px; height:120px;border-radius: 3%;" alt="profile-image">
            </span>
          </div>
        </div>
        <div class="page-responsive">
          <div class="row">
            <div class="col-xl-12 first_box">
              <div class="company-section" id="company_info">
                <i class="fa-solid fa-layer-group" style="color:#585858;">‌</i>
                <span>Company Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <label id="pro_com_name" class="mt-1" for="company_name">Company : {{setting('company_name')}}</label><br>
                <label id="com_address" class="address mt-1" for="address">Address : {{setting('company_address')}}</label><br>
                <label id="com_address" class="address mt-1" for="address">Email : .............</label><br>
                <label id="com_address" class="address mt-1" for="address">Web : .............</label><br>
                <label id="com_address" class="address mt-1" for="address">Contract : .............</label><br>
              </div>
            </div>
            <div class="col-xl-12 second_box">
              <div class="company-section" id="personal_info">
                <i class="fa-solid fa-layer-group" style="color:#585858;">‌</i>
                <span>Personal Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info">
                  <label class="mt-1" for="Contract-number">Contract :</label>
                  <span class="mt-1">{{Auth::user()->contract_number}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mail-address">Credentials-Email :</label>
                  <span class="mt-1">{{Auth::user()->email}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="login-mail-address">Login-Email :</label>
                  <span class="mt-1">{{Auth::user()->login_email}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Mailing-Email :</label>
                  <span class="mt-1">{{Auth::user()->mailing_email}}</span> <br>
                </span>
              </div>
            </div>
            <div class="col-xl-12 third_box">
              <div class="company-section" id="branch_info">
                <i class="fa-solid fa-layer-group" style="color:#585858;">‌</i>
                <span>Branch Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info">
                  <label class="mt-1" for="Contract-number">Branch-ID :</label>
                  <span class="mt-1">{{Auth::user()->branch_id}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mail-address">Branch-Type :</label>
                  <span class="mt-1">{{Auth::user()->branch_type}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="login-mail-address">Branch-Name :</label>
                  <span class="mt-1">{{Auth::user()->branch_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Division-Name :</label>
                  <span class="mt-1">{{Auth::user()->division_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">District-Name :</label>
                  <span class="mt-1">{{Auth::user()->district_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Upazila/Thana :</label>
                  <span class="mt-1">{{Auth::user()->upazila_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">City-Name :</label>
                  <span class="mt-1">{{Auth::user()->town_name}}</span> <br>
                </span>
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Location :</label>
                  <span class="mt-1">{{Auth::user()->location}}</span> <br>
                </span>
              </div>
            </div>
            <div class="col-xl-12 fourth_box">
              <div class="company-section" id="role_info">
                <i class="fa-solid fa-layer-group" style="color:#585858;">‌</i>
                <span>Role Information :</span>
              </div>
              <div class="company-information" style="background: white;">
                <span id="info2">
                  <label class="mt-1" for="mailing-mail-address">Role-Name :</label>
                  <span class="mt-1">{{Auth::user()->roles->name}}</span> <br>
                </span>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer" style="background-image:linear-gradient(to bottom, rgb(221 216 216 / 47%) 0%, rgba(0, 0, 0, 0.05) 100%);"> </div>
    </div>
  </div>
</div>
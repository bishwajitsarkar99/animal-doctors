<!-- Modal -->
<div class="modal fade" id="profile_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header">
        @if(auth()->user()->role ==0)
          <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
            Dr. {{Auth::user()->name}} Profile
          </h5>
        @elseif(auth()->user()->role ==1)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==2)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==3)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
          {{Auth::user()->name}} Profile
        </h5>
        @endif
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="Close"></button>
      </div>

      <div class="modal-body profile-body pb-3">
        <div class="row profile-heading pb-3">
          <div class="col-xl-4">
            <div class="card-body thumbial-image" id="pro_image">
              <img style="width: 150px; height:150px;border-radius: 3%;" class="profile" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </div>
          </div>
          <div class="col-xl-8">
            <p class="company-information" id="pro_para">
              <label id="pro_com_name" for="company_name">{{setting('company_name')}}</label><br>
              <label id="com_address" class="address" for="address">{{setting('company_address')}}</label><br>
              <label id="info" for="Contract-number">Contract :</label>
              <span id="info2">{{Auth::user()->contract_number}}</span> <br>
              <label id="info3" for="mail-address">Mail :</label>
              <span id="info4">{{Auth::user()->email}}</span> <br>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer">
        
      </div>
    </div>
  </div>
</div>
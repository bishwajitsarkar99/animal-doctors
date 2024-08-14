<!-- Modal -->
<div class="modal fade" id="profile_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="admin_modal_box">
      <div class="modal-header profile_modal_header profilesetting_modal_header"style="background: transparent;background-image: repeating-linear-gradient(55deg, #bf7a1f, transparent 1px);border-bottom: double white;">
        @if(auth()->user()->role ==0)
          <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
            Dr. {{Auth::user()->name}} Profile
          </h5>
        @elseif(auth()->user()->role ==1)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==2)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==3)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==5)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==6)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @elseif(auth()->user()->role ==7)
        <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel" style="color:black;">
          {{Auth::user()->name}} Profile
        </h5>
        @endif
        <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>'></button>
      </div>

      <div class="modal-body profile-body pb-3" style="background: transparent;background-image: repeating-linear-gradient(55deg, #bf7a1f, transparent 1px);">
        <div class="modal fade" id="loader_profile_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content small_modal loader_modal" style="border:none;" id="admin_modal_box">
              <div class="modal-body" id="loader_modalBody">
                <div class="">
                  <img class="modal-loader" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="row profile-heading pb-3">
          <div class="col-xl-4">
            <div class="card-body thumbial-image" id="pro_image">
              <img style="width: 150px; height:150px;border-radius: 3%;" class="profile" src="/image/{{auth()->user()->image}}" alt="profile-image">
            </div>
          </div>
          <div class="col-xl-8">
            <p class="company-information" style="background: transparent;">
              <label id="pro_com_name" class="mt-2" for="company_name">{{setting('company_name')}}</label><br>
              <label id="com_address" class="address mt-1" for="address">{{setting('company_address')}}</label><br>
              <span id="info">
                <label class="mt-1" for="Contract-number">Contract :</label>
                <span class="mt-1">{{Auth::user()->contract_number}}</span> <br>
              </span>
              <span id="info2">
                <label class="mt-1" for="mail-address">Mail :</label>
                <span class="mt-1">{{Auth::user()->email}}</span> <br>
              </span>
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer profile_modal_footer" style="background-image: repeating-linear-gradient(55deg, #bf7a1f, transparent 1px);"> </div>
    </div>
  </div>
</div>
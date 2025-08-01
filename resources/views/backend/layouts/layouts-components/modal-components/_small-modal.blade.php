<div class="modal-header" id="logoutModal_header" style="background: transparent;background-image: repeating-linear-gradient(55deg, #5fd3cd7d, transparent 1px);border-bottom: double white;">
    <span class="pro_image"><img class="img-profile rounded-circle" id="output" src="/storage/image/user-image/{{auth()->user()->image}}"></span>
    <h6 class="modal-title admin_title logout-modal-title ms-3 pt-1" id="staticBackdropLabel" style="color:black;">
        @if(auth()->user()->role ==1)
            Super Admin
        @endif
        @if(auth()->user()->role ==2)
            Sub Admin
        @endif
        @if(auth()->user()->role ==3)
            Admin
        @endif
        @if(auth()->user()->role ==5)
            Accounts
        @endif
        @if(auth()->user()->role ==6)
            Marketing
        @endif
        @if(auth()->user()->role ==7)
            Delivery Team
        @endif
        @if(auth()->user()->role ==0)
            Default User
        @endif
    </h6>
    <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
        data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="logoutCancel">
    </button>
    </div>
    <div class="modal-body" id="logoutModal_body" style="background: transparent;background-image: repeating-linear-gradient(55deg, #5fd3cd7d, transparent 1px);border-bottom: double white;">
        <p class="admin_paragraph" id="logout_text_message" style="font-weight:700;">
            {{auth()->user()->name}}, {{__('translate.do you want to logout')}} ?
        </p>
        <div class="modal fade" id="loader_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content small_modal loader_modal" style="border:none;" id="admin_modal_box">
                    <div class="modal-body" id="loader_modalBody">
                        <div class="loader-login close_loader_modal">
                            <img class="modal-loader" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer" id="logoutModal_footer" style="background: transparent;background-image: repeating-linear-gradient(55deg, #5fd3cd7d, transparent 1px);justify-content: space-around;display:flex;">
        <p id="logout_btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal">
                {{__('translate.No')}}
            </a>
        </p>
        <p id="logout_btn_group2">
            @if(auth()->user()->role ==1)
                <a data-url="{{ route('logout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==2)
                <a data-url="{{ route('adminLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==3)
                <a data-url="{{ route('adminLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==5)
                <a data-url="{{ route('accountsLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==6)
                <a data-url="{{ route('commonUserLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==7)
                <a data-url="{{ route('commonUserLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==0)
                <a data-url="{{ route('commonUserLogout') }}" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
        </p>
    </div>   
</div>


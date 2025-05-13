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
            <svg version="1.1" width="25px" height="25px" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><style type="text/css"><![CDATA[.st2{fill-rule:evenodd;clip-rule:evenodd;fill:#EF4136;}.st1{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}]]></style><g><path class="st2" d="M61.44,0c33.93,0,61.44,27.51,61.44,61.44c0,33.93-27.51,61.44-61.44,61.44C27.51,122.88,0,95.37,0,61.44 C0,27.51,27.51,0,61.44,0L61.44,0z"/><path class="st1" d="M79.16,46.24c-2.32-2.68-2.03-6.73,0.65-9.05s6.73-2.03,9.05,0.65c2.79,3.23,5.01,6.96,6.53,11.04 c1.48,3.98,2.29,8.23,2.29,12.62c0,10.01-4.06,19.07-10.62,25.63S71.45,97.75,61.44,97.75c-10.01,0-19.07-4.06-25.63-10.62 S25.2,71.51,25.2,61.5c0-4.32,0.78-8.5,2.2-12.4c1.46-4,3.62-7.69,6.33-10.91c2.28-2.71,6.32-3.06,9.03-0.78 c2.71,2.28,3.06,6.32,0.78,9.03c-1.73,2.06-3.12,4.43-4.07,7.04c-0.9,2.47-1.39,5.17-1.39,8.02c0,6.45,2.62,12.3,6.84,16.53 c4.23,4.23,10.07,6.84,16.52,6.84c6.45,0,12.3-2.62,16.52-6.84s6.85-10.07,6.85-16.53c0-2.91-0.51-5.65-1.43-8.14 C82.4,50.74,80.97,48.33,79.16,46.24L79.16,46.24z"/><path class="st1" d="M67.88,49.12c0,3.55-2.88,6.44-6.44,6.44c-3.55,0-6.44-2.88-6.44-6.44V29.93c0-3.55,2.88-6.44,6.44-6.44 c3.55,0,6.44,2.88,6.44,6.44V49.12L67.88,49.12z"/></g></svg>
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
                {{__('translate.Cancel')}}
            </a>
        </p>
        <p id="logout_btn_group2">
            @if(auth()->user()->role ==1)
                <a href="/logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==2)
                <a href="/admin-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==3)
                <a href="/admin-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==5)
                <a href="/accounts-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==6)
                <a href="/common-user-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==7)
                <a href="/common-user-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
            @if(auth()->user()->role ==0)
                <a href="/common-user-logout" type="button" class="btn btn-success modal_button logout_button logout" id="submitbtn">
                    <span class="yes-icon spinner-border spinner-border-sm text-white yes-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">{{__('translate.Yes')}}</span>
                </a>
            @endif
        </p>
    </div>   
</div>


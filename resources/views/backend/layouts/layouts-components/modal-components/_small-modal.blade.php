<div class="modal-header" id="logoutModal_header">
    <span class="pro_image"><img class="img-profile rounded-circle" id="output" src="/image/{{auth()->user()->image}}"></span>
    <h6 class="modal-title admin_title scan ms-3 pt-1" id="staticBackdropLabel">
        @if(auth()->user()->role ==1)
            Super Admin
        @endif
        @if(auth()->user()->role ==2)
            Sub Admin
        @endif
        @if(auth()->user()->role ==3)
            Admin
        @endif
        @if(auth()->user()->role ==0)
            Doctors
        @endif
    </h6>
    <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
        data-bs-toggle="tooltip" data-bs-palacement="right" title="{{__('translate.Close')}}" id="canl">
    </button>
    </div>
    <div class="modal-body" id="logoutModal_body">
        <p class="admin_paragraph" id="text_message">{{auth()->user()->name}}, {{__('translate.do you want to logout')}} ?</p>
    </div>
    <div class="modal-footer" id="logoutModal_footer">
        <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button" data-bs-dismiss="modal">{{__('translate.Cancel')}}</a>
        </p>
        <p id="btn_group2">
            <a href="/logout" type="button" class="btn btn-success modal_button logout_button" id="submitbtn">
                <i class="loading-icon fa fa-spinner fa-spin hidden"></i>
                <span class="btn-text">{{__('translate.Yes')}}</span>
            </a>
        </p>
    </div>    
</div>


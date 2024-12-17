<div class="row" id="permissionPart">
    <div class="card-body focus-color cd user_access_branch_form">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-xl-4">
                    <div class="list_head">
                        Select Branch Name
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <div class="responsive">
                        <ul id="branch_menu" class="list_group"></ul>
                    </div>
                </div>
                <div class="col-xl-3" id="roleBox" hidden>
                    <div class="second_list_head">
                        Select User Role
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <ul id="role_menu" class="list_group"></ul>
                </div>
                <div class="col-xl-5" id="emailBox" hidden>
                    <div class="second_list_head">
                        Select User Email
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <ul id="email_menu" class="list_group"></ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 action_message">
                <p class="ps-1 mt-2"><span id="success_message"></span></p>
                </div>
                <div class="col-xl-3">
                    <p style="text-align: end;">
                        <button type="button" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" id="save">
                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="add-btn-text">ADD</span>
                        </button>
                        <button type="button" id="update_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="update-btn-text">Update</span>
                        </button>
                        <button type="button" id="access_btn" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="access-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="access-btn-text">Access</span>
                        </button>
                        <button type="button" id="deleteLoader" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" hidden>
                        <span class="delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="delete-btn-text">Delete</span>
                        </button>
                        <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus skeleton-button mt-2">
                        <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="cancel-btn-text">Cancel</span>
                        </button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
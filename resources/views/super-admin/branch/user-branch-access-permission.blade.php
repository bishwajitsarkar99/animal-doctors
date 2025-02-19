<div class="row" id="permissionPart">
    <div class="card-body focus-color cd user_access_branch_form">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-xl-4" id="branchBox">
                    <div class="list_head">
                        Select Branch Name
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn branch_close" id="branch_close" data-bs-toggle="tooltip" data-bs-placement="left" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <div class="responsive">
                        <ul id="branch_menu" class="list_group menu"></ul>
                    </div>
                </div>
                <div class="col-xl-3" id="roleBox" hidden>
                    <div class="second_list_head">
                        Select User Role
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn" id="role_close" data-bs-toggle="tooltip" data-bs-placement="left" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <div class="responsive">
                        <ul id="role_menu" class="list_group menu"></ul>
                    </div>
                </div>
                <div class="col-xl-5" id="emailBox" hidden>
                    <div class="second_list_head">
                        Select User Email
                        <span class="clos_btn">
                            <button type="button" class="btn btn-sm cls_btn" id="email_close" data-bs-toggle="tooltip" data-bs-placement="left" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'><i class="fa-solid fa-xmark icon_colr"></i></button>
                        </span>
                    </div>
                    <div class="responsive">
                        <ul id="email_menu" class="list_group menu"></ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 action_message">
                    <p class="mt-2 pb-1"><span id="success_messages"></span></p>
                </div>
            </div>
        </form>
    </div>
</div>
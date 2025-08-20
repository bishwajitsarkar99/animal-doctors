@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <ul class="nav nav-tabs tab_bg" role="tablist" style="background:white;">
    <li class="nav-item tab-skeletone">
      <a class="nav-link branch active home-text" data-bs-toggle="tab" data-url="#home" id="tabHome"> Create Access</a>
    </li>
    <li class="nav-item tab-skeletone">
      <a class="nav-link branch ms-1" data-bs-toggle="tab" data-url="#userBranchPermission" id="tabAccess" hidden>Access Permission</a>
    </li>
  </ul>
  <div class="tab-content" id="showCard" style="background:white;padding-bottom:15px;">
    <div id="home" class="container tab-pane active">
      @include('super-admin.branch.create-user-branch-access')
    </div>
    <div id="userBranchPermission" class="container tab-pane">
      @include('super-admin.branch.user-branch-access-permission')
  </div>
  @include('loader.action-loader')
  {{-- start user access action modal --}}
  <div class="modal fade" id="userAccessActionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header" style="background-image:repeating-linear-gradient(55deg, #5fd3cd7d, transparent 1px);">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
            Action Dialogue Box
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1" style="background-image:repeating-linear-gradient(55deg, #5fd3cd7d, transparent 1px);">
          <div class="row profile-heading pb-3">
            @csrf
            <input type="hidden" id="user_email_id">
            <div class="action_group">
              <button id="permission_btn" class="btn btn-sm modal_button update_confirm group-branch-skeleton">
                <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="confirm-btn-text">Access Permission</span>
              </button>
              <button type="button" class="btn btn-sm cgt_cancel_btn delete_bg_btn delet_btn_user mn-branch-skeleton access_branch_delete" id="access_branch_delete">
                <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="delete-confrm-btn-text">Access Delete</span>
              </button>
              <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton" id="cancle_access" data-bs-dismiss="modal">Access Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- end user access action modal --}}

  {{-- start add access modal --}}
  <div class="modal fade" id="roleemailbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss modal-head-skeleton" id="staticBackdropLabel">
            <input class="modal_heading" type="text" id="branch_head_name" readonly>
          </h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton access_cancel" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body">
          <div class="content_body">
            <div class="row profile-heading">
              @csrf
              <input type="hidden" id="add_branches_id">
              <input type="hidden" id="add_branch_id">
              <input type="hidden" id="add_branch_type">
              <input type="hidden" id="add_branch_name">
              <input type="hidden" id="add_division_id">
              <input type="hidden" id="add_district_id">
              <input type="hidden" id="add_upazila_id">
              <input type="hidden" id="add_town_name">
              <input type="hidden" id="add_location">
              <div class="content_message branch-nmT branch-skeleton">
                <label class="catg_name_label" for="branch-name">Branch-name : </label>
                <input type="text" class="branch_name_sub_title catg_name_label branch-rest" id="confirm_branch_name" readonly>
              </div>
              <div class="form-group content_message role_nme branch-skeleton">
                <label class="catg_name_label" for="mail-transport">Role Name</label><br>
                <select type="text" class="form-control form-control-sm role_id select2" name="role_id" id="role_id">
                  <option value="">Select Role Name</option>
                </select>
                <label class="catg_name_label" for="mail-transport">Email Address</label><br>
                <select type="text" class="form-control form-control-sm email_id select2" name="email_id" id="email_id">
                  <option value="">Select Email Address</option>
                </select>
                <p class="mt-2">Would you like to add branch for access, confirm or cancel ?</p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action_group">
          <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel branch-skeleton" id="cancle_access" data-bs-dismiss="modal">Access Cancel</button>
          <button id="save_btn_confirm" class="btn btn-sm modal_button button_margin mn-btn-branch-skeleton">
            <span class="confirm-access-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-access-btn-text">Confirm</span>
          </button>
        </div> 
        </div>
    </div>
  </div>
  {{-- end user access permission modal --}}
  {{-- start add access modal --}}
  <div class="modal fade" id="userAccessPermissionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton branch_name_head" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton cancel_action_box" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="branch_access">
            <div class="action_group group">
              <span id="usrImage"></span>
              <span id="usrRole"></span>
              <span id="usrEmail"></span>
            </div>
            <div class="row profile-heading pb-3">
              @csrf
              <input type="hidden" id="users_email_id">
              <div class="action_group">
                <ul id="user_branch_menu" class="list_group menu table-responsive"></ul>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action_group">
          <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton back_action_box" id="cancle_access" data-bs-dismiss="modal">Access Cancel</button>
          <button id="permission_accss_btn" class="btn btn-sm modal_button update_confirm button_margin">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Permission</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end user access permission modal --}}

  {{-- start branch change modal --}}
  <div class="modal fade" id="userBranchChangeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch_name_heading hd-branch-skeleton branch_name_hd" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close btn-btn-sm head_btn branch-skeleton cancel_change_box" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="branch_access">
            <div class="action_group group first_part branch-skeleton">
              <span id="usrImage3"></span>
              <span id="usrRole3"></span>
              <span id="usrEmail3"></span>
            </div>
            <div class="row profile-heading pb-3">
              @csrf
              <input type="hidden" id="users_branch_change_id">
              <input type="hidden" id="users_branch_email_id">
              <input type="hidden" id="branch_change_role_id">
              <div class="action_group second_part branch-content-skeleton">
                <ul id="user_branch_menu_change" class="list_group menu table-responsive"></ul>
              </div>
              <div class="action_group">
                <div class="third_part branch-content-footer-skeleton">
                  <div class="branch_chang">
                    <label class="catg_name_label" style="color:white;">Branch-Change</label>
                  </div>
                  <div class="chng_brnch">
                    <select type="text" class="form-control form-control-sm role_id select2" name="branch_name" id="branch_name_id">
                      <option value="">Select Branch Name</option>
                    </select>
                  </div>
                </div>
                <!-- Hidden Input Fields for Storing Selected Branch Data -->
                <input type="hidden" id="change_branch_id">
                <input type="hidden" id="change_branch_type">
                <input type="hidden" id="change_branch_name">
                <input type="hidden" id="change_division_id">
                <input type="hidden" id="change_district_id">
                <input type="hidden" id="change_upazila_id">
                <input type="hidden" id="change_town_name">
                <input type="hidden" id="change_location">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action_group">
          <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel mn-branch-skeleton back_change_box" id="cancle_change" data-bs-dismiss="modal">Access Cancel</button>
          <button id="change_btn_confirm" class="btn btn-sm cgt_btn btn_focus change_btn_confirm mn-branch-skeleton">
            <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="confirm-btn-text">Confirm</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end branch change modal --}}

  {{-- start user access permission confirm modal --}}
  <div class="modal fade" id="userAccessPermissionConfirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title access_confirm_head_title ps-1 pe-1 font-effect-emboss head-branch-skeleton" id="staticBackdropLabel">
            Confirm User Branch Access
          </h5>
          <button type="button" class="btn-close btn-btn-sm access_confirm_back branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>
        <form class="add_access_form" autocomplete="off">
          @csrf
          <input type="hidden" id="users_email_id">
          <div class="modal-body profile-body pb-1">
            <div class="action_group group">
              <span class="img-branch-skeleton" id="usrConfrmImage"></span>
              <span class="branch-skeleton" id="usrConfrmRole"></span>
              <span class="branch-skeleton" id="usrConfrmEmail"></span>
            </div>
            <span class="confirm-label branch-skeleton">Would you like to access, confirm or cancel ?</span>
          </div>
          <div class="modal-footer profile_modal_footer action_group">
            <button id="cancel_btn" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton mt-2" data-bs-dismiss="modal">
              <span class="cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="cancel-btn-text">Cancel</span>
            </button>
            <button id="access_confirm_button" type="button" class="btn btn-sm modal_button btn_focus branch-skeleton mt-2">
              <span class="save-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="save-btn-text">Confirm</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- end user access permission confirm modal --}}

  {{-- start delete modal --}}
  <div class="modal fade" id="deletebranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <span><div id="active_loader" class="loader_chart mt-1"></div></span>
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch_name_head hedng hd-branch-skeleton" id="staticBackdropLabel"></h5>
          <button type="button" class="btn-close btn-btn-sm hedng_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body pb-1">
          <div class="row profile-heading pb-3">
            <div class="col-xl-12">
              <div class="form-group branch-skeleton" id="load_id">
                <div class="action_group group">
                  <span id="usrImage4"></span>
                  <span id="usrRole4"></span>
                  <span id="usrEmail4"></span>
                </div>
                <label class="label_user_edit" id="cate_delete" for="id">
                  Branch-ID : <span id="delete_branch_id"></span>
                </label><br><br>
                <label class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete <span class="highlight_branch">branch-id: <span id="branch__id"></span></span> , permanently?</label>
                <input type="hidden" id="branch_delete_id">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer">
          <p id="btn_group2">
            <a type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
              <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="btn-text">{{__('translate.Yes')}}</span>
            </a>
          </p>
          <p id="btn_group">
            <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  {{-- end delete modal --}}

  {{-- start delete confirm modal --}}
  <div class="modal fade" id="deleteconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <span class="modal-title admin_title scan confirm_title branch-skeleton pt-1">
            <span id="usrConfrmImage"></span>
            <span id="usrConfrmRole"></span>
            <span id="usrConfrmEmail"></span>
          </span>
          <button type="button" class="btn-close btn-btn-sm head_btn2 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
              <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, delete or cancel ? </label>
            </p>
            <input type="hidden" id="branch_delete_id">
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button type="button" class="btn btn-sm modal_button delet_btn_user btn_focus branch-skeleton delete_branch" id="delete_branch">
              <span class="delete-confrm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="delete-confrm-btn-text">Confirm Delete</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end delete confirm modal --}}

  {{-- start Branch Change modal --}}
  <div class="modal fade" id="branchChange" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan change_title branch-skeleton pt-1" id="staticBackdropLabel">
            <span style="color:black;">Branch Change</span>
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn3 modal_close branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            <div class="content_body">
              <div class="row profile-heading">
                <div class="content_message branch-nmT branch-skeleton">
                  <label class="catg_name_label ps-2" for="branch-name">User branch change.... </label>
                </div>
                <div class="form-group content_message role_nme branch-skeleton">
                  <label class="catg_name_label ps-2" for="mail-transport">Role</label><br>
                  <select type="text" class="form-control form-control-sm role_id select2" name="role_id" id="branch_role_id">
                    <option value="">Select Role Name</option>
                  </select>
                  <label class="catg_name_label ps-2" for="mail-transport">Email Address</label><br>
                  <select type="text" class="form-control form-control-sm email_id select2" name="email_id" id="branch_email_id">
                    <option value="">Select Email Address</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="branch_id_btn" class="btn btn-sm modal_button update_confirm branch_id_btn mt-1 chn-btn-branch-skeleton">
              <span class="branch-change-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="branch-change-btn-text">Change</span>
            </button>
            <button type="button" class="btn btn-sm cgt_cancel_btn delete_cancel branch-skeleton" id="cancel_change" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end Branch Change modal --}}

  {{-- start confirm Branch Change modal --}}
  <div class="modal fade" id="updateconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan update_title branch-skeleton pt-1" id="staticBackdropLabel">
            Update Branch
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
            
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="update_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="confirm-btn-text">Confirm</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="cate_delete5" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm Branch Change modal --}}

  {{-- start confirm access modal --}}
  <div class="modal fade" id="accessconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan access_title branch-skeleton pt-1" id="staticBackdropLabel">
            Branch Access
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn_access_close head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="logoutModal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="access_text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="access_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="access-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="access-confirm-btn-text">Confirm</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="acces_delete" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm access modal --}}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-role-user-fetch.ajax')
@include('super-admin.branch.ajax.user-access-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>

<script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  function focuButton() {
    const allSkeleton = document.querySelectorAll('.skeleton-button')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-button')
    });
  }

  setTimeout(() => {
    requestAnimationFrame(() => {
      fetchData();
      focuButton();
    });
  }, 1000);
</script>
@endpush('scripts')
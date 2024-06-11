{{-- Start Delete  Inventory Permission Modal--}}
<!-- Modal -->
<div class="modal fade" id="deletepermission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabels">
                    Delete Inventory Permission
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <div class="modal-body profile-body pb-1">

                <div class="row profile-heading pb-3">
                    <div class="col-xl-12">
                        <div class="form-group delete_content" id="supp_delt">
                            <div class="mt-1" id="active_loader"></div>
                            <label class="label_user_edit" for="id" id="supp_delt2">ID : </label>
                            <input type="text" class="mt-3 update_id id" id="delete_permission_id" readonly><br>
                            <span class="label_user_edit" id="supp_delt3">Are you sure? Would you like to delete that, permanently?</span>
                            <input type="hidden" id="delete_permission_id" name="permission_id">
                        </div>
                        <span id="Form_error"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer profile_modal_footer">
                <button href="#" type="button" class="btn btn-sm cgt_btn delet_btn_permission btn_focus" id="deleteLoader">
                    <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
                    <span class="btn-text">Delete</span>
                </button>
                <button type="button" class="btn btn-sm cgt_btn delete_cancel btn_focus" id="supp_delt4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End Delete  Supplier or Vendor Modal--}}
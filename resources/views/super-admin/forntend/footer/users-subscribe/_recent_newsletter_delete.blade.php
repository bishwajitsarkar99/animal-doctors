<!-- Modal -->
<div class="modal fade" id="deletemainpost" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    Delete News-Letter
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="{{__('translate.Close')}}"></button>
            </div>

            <div class="modal-body profile-body pb-1">

                <div class="row profile-heading pb-3">
                    <div class="col-xl-12 delete_content" id="postDelt">
                        <div id="loader_postdelete" class="mt-1"></div>
                        <div class="form-group">
                            <label class="label_user_edit" for="id" id="postDelt2">{{__('Newsletter-ID')}} : </label>
                            <input type="text" class="mt-3 update_id id" id="delete_post_category_id" readonly><br>
                            <span class="label_user_edit" id="postDelt3">{{__('Are you sure, Would you like to delete this news letter, permanently?')}}</span>
                            <input type="hidden" id="delete_post_category_id" name="main_post_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer profile_modal_footer">
                <button type="button" class="btn btn-sm modal_button delet_btn_postCategory btn_focus" id="deleteLoader">
                    <i class="delete-icon fa fa-spinner fa-spin delete-hidden"></i>
                    <span class="btn-text">Delete</span>
                </button>
                <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="postDelt4" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
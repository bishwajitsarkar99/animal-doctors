{{-- Start View User Modal--}}
<!-- Modal -->
<div class="modal fade" id="view_user_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss head_modal" id="staticBackdropLabel">
                    User Details Information
                </h5>
                <button type="button" class="btn-close btn-btn-sm cols_btn view_close_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <form id="userUpdateForm">
                <div class="modal-body profile-body pb-1" style="background:white;">
                    <div class="row profile-heading pb-3">
                        <div class="col-xl-8">
                            <div class="form-group field_skeletone_five">
                                <span class="">
                                    <label class="label_user_edit" for="">Email-Verification : 
                                        <span id="view_user_email_verified"></span>
                                    </label>
                                </span>
                            </div>
                            <span id="user_email_verified_session" hidden></span>
                            <span class="email__verification"></span>
                            <div class="form-group">
                                <span class="field_skeletone_one">
                                    <label class="label_user_edit" for="id">User-ID :</label>
                                    <input type="text" class="mt-3 user_id_field id" id="view_user_id" readonly>
                                    <input type="hidden" id="user_id" name="user_id" class="user_id">
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="role">Role :</label>
                                    <input id="view_user_role" class="" type="text" name="role" readonly>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_two">
                                    <label class="label_user_edit" for="name">Name :</label>
                                    <input id="view_user_name" class="" type="text" name="name" readonly>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_three">
                                    <label class="label_user_edit" for="email">Email :</label>
                                    <input id="view_user_email" class="" type="text" name="email" readonly>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="contract_number">Contract-Number :</label>
                                    <input id="view_user_contract" class="" type="text" name="contract_number" readonly>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="email_verified_at">Verified-Date :</label>
                                    <span id="view_user_email_verified_at"></span>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="created_at">Created :</label>
                                    <span id="view_user_created_at"></span>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="updated_at">Last-Updated :</label>
                                    <span id="view_user_updated_at"></span>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="field_skeletone_four">
                                    <label class="label_user_edit" for="status">Status :</label>
                                    <span id="view_user_status"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <div class="img-area image_skeletone">
                                    <img class="register_img " id="image_show" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500">
                                </div>
                                <input id="user_image" type='file' class="image mt-2" name="image" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer profile_modal_footer">
                    
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End view User Modal---}}
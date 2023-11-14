{{-- Start View User Modal--}}
<!-- Modal -->
<div class="modal fade" id="view_user_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    User Details Information
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-palacement="right" title="Close"></button>
            </div>

            <form id="userUpdateForm">
                <div class="modal-body profile-body pb-1">
                    <div class="row profile-heading pb-3">
                        <div class="col-xl-8">
                            <div class="form-group">
                                <label class="label_user_edit" for="id">User-ID :</label>
                                <input type="text" class="mt-3 user_id_field id" id="view_user_id" readonly>
                                <input type="hidden" id="user_id" name="user_id" class="user_id">
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="name">Name :</label>
                                <input id="view_user_name" class="" type="text" name="name" readonly>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="email">Email :</label>
                                <input id="view_user_email" class="" type="text" name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="contract_number">Contract-Number :</label>
                                <input id="view_user_contract" class="" type="text" name="contract_number" readonly>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="form-group">
                                <div class="img-area">
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
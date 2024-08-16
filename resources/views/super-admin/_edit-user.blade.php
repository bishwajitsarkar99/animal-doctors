{{-- Start Edit User Modal--}}
<!-- Modal -->
<div class="modal fade" id="edit_user_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="admin_modal_box">
            <div class="modal-header profile_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    Update User
                </h5>
                <button type="button" class="btn-close btn-btn-sm cols_btn" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
            </div>

            <form id="userUpdateForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body profile-body pb-1" style="background:aliceblue;">
                    <div class="row profile-heading pb-3">
                        <div class="col-xl-8">
                            <div class="form-group" id="editusr">
                                <label class="label_user_edit" for="id" id="editusr2">User-ID : </label>
                                <input type="text" class="user_id_field id" id="edit_user_id" readonly>
                            </div>
                            <div class="form-group mt-2" id="editusr6">
                                <label class="label_user_edit" for="name" id="editusr3">Name :</label>
                                <input id="edit_user_name" class="update_user usersearch name" type="text" name="name" placeholder="Enter name" autofocus />
                                <i class="uname-icon fa fa-spinner fa-spin uname-hidden"></i>
                            </div>
                            <div class="form-group mt-2" id="editusr7">
                                <label class="label_user_edit" for="email" id="editusr4">Email :</label>
                                <input id="edit_user_email" class="update_email email useremailsearch" type="text" name="email" placeholder="Enter Email Address">
                                <i class="uemail-icon fa fa-spinner fa-spin uemail-hidden"></i>
                            </div>
                            <div class="form-group mt-2" id="editusr8">
                                <label class="label_user_edit" for="contract_number" id="editusr5">Contract-Number : </label>
                                <input id="edit_user_contract" class="update_contract contract_number usercontractsearch" type="text" name="contract_number" placeholder="Enter contract number">
                                <i class="ucontract-icon fa fa-spinner fa-spin ucontract-hidden"></i>
                            </div>
                        </div>
                        <div class="col-xl-4 dvsecond">
                            <div class="form-group">
                                <div class="img-area">
                                    <img class="register_img " id="image_view" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500">
                                </div>
                                <input type='file' id="imgInput" class="update_image edit_image focus mt-2" name="image" value=""  />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer profile_modal_footer">
                    <button href="#" type="button" class="btn btn-sm modal_button update_btn_confrm btn_focus" id="userUpdate">
                        <i class="updated-icon fa fa-spinner fa-spin updated-hidden"></i>
                        <span class="btn-text">Update</span>
                    </button>
                    <button type="button" class="btn btn-sm text-warning modal_button cancel_btn btn_focus" id="editusr9" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Edit User Modal--}}



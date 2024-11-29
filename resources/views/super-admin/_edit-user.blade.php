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

            <form id="userUpdateForm" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="modal-body profile-body pb-1" style="background-image: linear-gradient(to bottom, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%);">
                    <div class="row profile-heading pb-3">
                        <div class="col-xl-8">
                            <div class="form-group" id="editusr">
                                <label class="label_user_edit" for="id" id="editusr2">User-ID : </label>
                                <input type="text" class="user_id_field id" id="edit_user_id" readonly>
                            </div>
                            <div class="form-group mt-2" id="editusr6">
                                <label class="label_user_edit" for="name" id="editusr3">Name :</label>
                                <input id="edit_user_name" class="update_user usersearch name" type="text" name="name" placeholder="Enter name" autofocus />
                                <span class="text-danger font-weight-800" id="updateForm_errorList"></span>
                                <span style="font-size:12px;color:green;font-weight:900;" id="usrName"></span>
                            </div>
                            <div class="form-group mt-2" id="editusr7">
                                <label class="label_user_edit" for="email" id="editusr4">Email :</label>
                                <input id="edit_user_email" class="update_email email useremailsearch" type="text" name="email" placeholder="Enter Email Address">
                                <span class="text-danger font-weight-800" id="updateForm_errorList2"></span>
                                <span style="font-size:12px;color:green;font-weight:900;" id="usrEmail"></span>
                            </div>
                            <div class="form-group mt-2" id="editusr8">
                                <label class="label_user_edit" for="contract_number" id="editusr5">Contract-Number : </label>
                                <input id="edit_user_contract" class="update_contract contract_number usercontractsearch" type="text" name="contract_number" placeholder="Enter contract number">
                                <span class="text-danger font-weight-800" id="updateForm_errorList3"></span>
                                <span style="font-size:12px;color:green;font-weight:900;" id="usrContract"></span>
                            </div>
                            <div class="form-group">
                                <div class="upload-group align-items-center justify-content-center">
                                    <div class="progress" id="editusr10">
                                        <div class="bar"></div>
                                        <div class="percent">0%</div>
                                    </div>
                                    <a class="btn btn-group-sm upload_btn upload-button-skeleton" id="uploadButton">
                                        <span class="btn-text">Upload</span>
                                        <span class="image-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 dvsecond">
                            <div class="form-group">
                                <div class="img-area">
                                    <p style="text-align:center;margin-bottom: 0rem;"><span style="font-size:12px;color:green;font-weight:900;" id="usrImage"></span></p>
                                    <img class="register_img  img-hidden" id="image_view" src="{{asset('backend_asset')}}/main_asset/img/undraw_profile.svg" alt="Image 500X500">
                                </div>
                                <input type='file' id="imgInput" class="update_image edit_image focus mt-2" name="image" value=""  />
                                <span id="uploadMess"></span>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer profile_modal_footer">
                    <button href="#" type="button" class="btn btn-sm modal_button update_btn_confrm" id="userUpdate">
                        <span class="updated-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                        <span class="btn-text">Update</span>
                    </button>
                    <button type="button" class="btn btn-sm text-warning modal_button cancel_btn" id="editusr9" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Edit User Modal--}}



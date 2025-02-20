<!-- Modal -->
<div class="modal fade" id="fileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document" style="margin-top:5%;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header file_manager_modal_header  filemanager_modal_header">
                <div class="filemanager-skeletone" id="fileMang"></div>
                <span class="modal-title admin_title font-effect-emboss" id="fileModalLabel"></span>
                <p class="input_search_bar_skeletone" id="srchbarskle"></p>
                <input type="search" class="form-control form-control-sm srch_name" name="folder_name" placeholder="Search Folder Name" id="srch_name">
                <span class="show__table">
                    <input type="checkbox" class="ms-2 table-btn" id="tableCheck" data-bs-toggle="tooltip" data-bs-placement="right" title="Folder-Table" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                    <span class="ms-2 me-2 table-label" style="color:#1a1a1acf;font-weight:700;">Table </span>
                </span>
                <button type="button" class="btn-close btn-btn-sm btn__close" data-bs-dismiss="modal" aria-label="Close" 
                    data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body file-manager-body">
                <div class="card card-body form-control-sm file-manager-card">
                    <!-- Create Folder Form -->
                    <form id="createFolderForm">
                        @csrf
                        <div class="mb-2">
                            <div class="row">
                                <div class="col-3">
                                    <label for="folderName lb-display" class="form-label file-manager-label" id="lab_disp"></label>
                                    <p class="input_labels_skeletone" id="labelSkele"></p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-sm edit_folder_name" id="folderName" name="folder_name" placeholder="Folder Name" required>
                                    <input type="hidden" id="folder_id">
                                    <p class="input_field_one_skeletone" id="inputFieldOne"></p>
                                    <span id="savForm_validation"></span><span id="updateForm_validation"></span>
                                    <!-- ========== Folder-Data-Table =========== -->
                                    <table class="ord_table center border-1 table-display-hidden mt-2" id="myFolderTable">
                                        <tbody class="bg-transparent" id="folder_data_table"></tbody>
                                    </table>
                                </div>
                                <div class="col-3">
                                    <div class="new_btn_skeletone" id="newBtnMode"></div>
                                    <button type="button" class="btn btn-sm btn-success new_display" id="createFolderBtn" style="line-height: 1px;">
                                        <span class="create-icon spinner-border spinner-border-sm text-white create-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                        <span class="btn-text">Create</span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-success new_display" id="updateFolderBtn" style="line-height: 1px;">
                                        <span class="update-folder-icon spinner-border spinner-border-sm text-white update-folder-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                        <span class="btn-text">Update</span>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger new_display" id="cancelFolderBtn" style="line-height: 1px;">
                                        <span class="btn-text">Cancel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Upload File Form -->
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-3">
                                <label for="folderName" class="form-label select_lb_display file-manager-label" id="lbNme"></label>
                                <p class="input_labels_skeletone" id="fldSkele"></p>
                            </div>
                            <div class="col-6">
                                @csrf
                                <select class="form-select form-select-sm" id="folder" name="folder_name" required>
                                    <option value="" disabled selected> Select Folder </option>
                                </select>
                                <span id="upload_error" class="alert alert-danger" style="display: none;"></span>
                                <!-- <span id="upload_error"></span> -->
                                <p class="input_field_two_skeletone" id="inputFieldTwo"></p>
                                <input type="file" class="form-control form-control-sm mt-2" name="file" required id="file">
                                <p class="input_field_three_skeletone" id="inputFieldThree"></p>
                            </div>
                            <div class="col-3">
                                <div class="upload_btn_skeletone" id="uploadBtnMode"></div>
                                <button type="button" class="btn btn-sm btn-success" style="line-height: 1px;" id="uploadBtn">
                                    <span class="upload-icon spinner-border spinner-border-sm text-white upload-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                    <span class="btn-text">Upload</span>
                                </button>
                            </div>
                        </div>
                    </form>
    
                    <div class="file-details mt-1">
                        <div class="row src-bg" id="backgroundColor">
                            <div class="col-3">
                                <label class="search-label upload_lbel_display file-manager-label" id="uploadLab"></label>
                                <p class="folder-serch-skeletone" id="fldSkeletone"></p>
                            </div>
                            <div class="col-6">
                                @csrf
                                <select class="form-select form-select-sm" id="folderSelect" name="folder_name" required>
                                    <option value="" disabled selected> Select Folder </option>
                                </select>
                                <p class="select_field_skeletone" id="selectField"></p>
    
                            </div>
                            <div class="col-3">
                                <!-- Button to trigger fetching files -->
                                <div class="searh_btn_skeletone" id="srchBtnMode"></div>
                                <button type="button" class="btn btn-sm btn-success" style="line-height: 1px;" id="searchFile">
                                    <span class="search-icon spinner-border spinner-border-sm text-white search-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                                    <span class="btn-text">Search</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <span id="folderNm"></span>
                        <div class="folder_icon mt-2 mb-2">
                            <div class="card form-control form-control-sm mini-card">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="gallery-image-skeletone" id="galleryImage"></div>
                                        <span class="image_group" id="imageGally">
                                            <img class="image_size" src="{{ asset('/image/gallery/gallery.png') }}" alt="gallery">
                                        </span>
                                    </div>
                                    <div class="col-1">
                                        <div class="svg-skeletone" id="svgFolderIcon">
                                            <div class="svg-icon" style="width:6em;height:3em;color:gainsboro;" id="svgIn"></div>
                                        </div>
                                        <div class="icon_group ms-2 mt-1" id="showFolderIcon">
                                            <span class="folder_icon" style="width:6em;height:3em;">
                                                <i class="fa-solid fa-folder-open" style="font-size: 30px;color:#dbdbdb;"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-9" style="text-align: left;">
                                        <p class="folder_name_skeletone mt-2" id="srcFolder">
                                            <span id="filesSelect"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="uploadedFilesList">
    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer profile_modal_footer file-manager-footer">
                <p class="ps-1"><span id="successMessage"></span></p>
            </div>
        </div>
    </div>
</div>
{{-- Start Delete User Modal--}}
<!-- Modal -->
<div class="modal fade" id="deleteFolder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content small_modal delete-folder-modal" id="admin_modal_box">
            <div class="modal-header folder_modal_header profilesetting_modal_header">
                <h5 class="modal-title admin_title ps-1 pe-1 font-effect-emboss" id="staticBackdropLabel">
                    Delete Folder
                </h5>
                <button type="button" class="btn-close btn-btn-sm" data-bs-dismiss="modal" aria-label="Close" 
                    data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" 
                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'>
                </button>
            </div>

            <div class="modal-body profile-body pb-1">

                <div class="row profile-heading folder-modal-body pb-3">
                    <div class="col-xl-12">
                        <div class="form-group delete_content" id="load_id">
                            <span>
                                <div id="active_loader" class="loader_chart mt-1"></div>
                            </span>
                            <label class="label_user_edit" id="cate_delete" for="id">Folder-ID : </label>
                            <span id="cat_id"> <input type="text" class="mt-3 update_id id" id="delete_folder_id" readonly><br></span>
                            <span class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete this folder, permanently?</span>
                            <input type="hidden" id="delete_folder_id" name="folder_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer profile_modal_footer">
                <button type="button" class="btn btn-sm modal_button delet_btn_folder btn_focus" id="deleteLoader">
                    <span class="delete-icon spinner-border spinner-border-sm text-white delete-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                    <span class="btn-text">Delete</span>
                </button>
                <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus" id="cate_delete3" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
{{-- End EDelete User Modal---}}
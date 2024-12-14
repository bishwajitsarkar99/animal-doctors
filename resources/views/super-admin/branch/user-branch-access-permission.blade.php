<div class="row">
    <div class="card-body focus-color cd user_access_branch_form">
        <input id="branch_id_field" type="text" name="branch_id_field" value="" hidden />
        <input id="generate_id" type="text" name="generate_id" hidden />
        <input id="branch_id" type="text" name="branch_id" class="branch_id_field branch_id" hidden />
        <form autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="form-group mb-1 role_nme skeleton">
                    <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                    <select type="text" class="form-control form-control-sm select_branch select2" name="branch_name" id="select_branch">
                    <option value="">Select Company Branch Name</option>
                    </select>
                    <input type="hidden" id="branches_id">
                </div>
                <div class="form-group role_nme mb-1 skeleton">
                    <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Branch Name</label></span>
                    <input class="form-control form-control-sm branch_input edit_branch_name" type="text" name="branch_name" id="branchName" placeholder="Branch Name" value="" />
                    <span class="input-label edit_branch_id" hidden><label class="id_label label_position" for="mail-transport">Branch ID : <input class="update_branch_id" name="branch_id" id="edit_branch_id" disabled></label></span>
                    <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span>
                </div>
            
            </div>
            <div class="col-xl-6">
                <div class="form-group role_nme branch mb-1 skeleton">
                    <label class="catg_name_label label_position" for="mail-transport">District Name</label>

                    <span id="savForm_error4"></span><span id="updateForm_error4"></span>
                </div>
                <div class="form-group role_nme branch mb-1 skeleton">
                    <label class="catg_name_label label_position" for="mail-transport">Upazila/Thana Name</label>

                    <span id="savForm_error5"></span><span id="updateForm_error5"></span>
                </div>
                <div class="form-group role_nme branch mb-1 skeleton">
                    <label class="catg_name_label label_position" for="mail-transport">City Name</label>
                    <input class="form-control form-control-sm branch_input edit_town_name" type="text" name="town_name" id="townName" placeholder="Town Name" value=""/>
                    <span id="savForm_error6" hidden></span><span id="updateForm_error6" hidden></span>
                </div>
                <div class="form-group role_nme branch mb-1 skeleton">
                    <label class="catg_name_label label_position" for="mail-transport">Location</label>
                    <input class="form-control form-control-sm branch_input edit_location" type="text" name="location" id="location" placeholder="Location" value=""/>
                    <span id="savForm_error7" hidden></span><span id="updateForm_error7" hidden></span>
                </div>
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
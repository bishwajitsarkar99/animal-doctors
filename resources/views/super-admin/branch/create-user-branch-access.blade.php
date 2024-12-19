<div class="row">
    <div class="card-body focus-color cd user_access_branch_form">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-xl-4">
                    @if(auth()->user()->role ==1)
                    <div class="form-group mb-1 role_nme skeleton">
                        <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                        <select type="text" class="form-control form-control-sm search_all_branch select2" name="branch_name" id="search_branch_all">
                        <option value="">Select Company Branch Name</option>
                        </select>
                        <input type="hidden" id="branches_id">
                    </div>
                    @endif
                    @if(auth()->user()->role ==3)
                    <div class="form-group mb-1 role_nme skeleton">
                        <span class="input-label"><label class="catg_name_label label_position" for="mail-transport">Searching...</label></span>
                        <select type="text" class="form-control form-control-sm search_branch select2" name="branch_name" id="search_branch">
                        <option value="">Select Company Branch Name</option>
                        </select>
                        <input type="hidden" id="branches_id">
                    </div>
                    @endif
                </div>
                <div class="col-xl-8">
                    <div class="form-group branch-info mb-1 skeleton">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="top-row"><th class="table_head_position" colspan="2" id="table_head_position"><span class="input-label"><label class="catg_name_label" for="branch-id">Branch Information</label></span></th></tr>
                                    <tr>
                                        <th class="head_position_left"><span class="input-label"><label class="catg_name_label" for="branch-id">Branch</label></span></th>
                                        <th class="head_position_right"><span class="input-label"><label class="catg_name_label" for="branch-id">Information</label></span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">ID <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_branch_id" type="text" name="branch_id" id="brnch_id" placeholder="Branch ID" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">Type <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_branch_type" type="text" name="branch_type" id="branch_type" placeholder="Branch Type" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span> </td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">Name <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_branch_name" type="text" name="branch_name" id="branch_name" placeholder="Branch Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">Division <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_division_id" type="text" name="division_id" id="division_id" placeholder="Division Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">District <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_district_id" type="text" name="district_id" id="district_id" placeholder="District Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">Upazila/Thana <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_upazila_id" type="text" name="upazila_id" id="upazila_id" placeholder="Upazila Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">City <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_town_name" type="text" name="town_name" id="town_name" placeholder="City Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                    <tr class="info-table-row">
                                        <td class="info-element td_with ps-1">Loaction <span style="float:right;">:</span></td>
                                        <td class="info-element"><input class="branch_input edit_location" type="text" name="location" id="location" placeholder="Loaction Name" value="" disabled />
                                        <span id="savForm_error" hidden></span><span id="updateForm_error" hidden></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6"></div>
                            <div class="col-xl-3">
                                <p style="text-align: end;">
                                    <button type="button" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" id="pagePermision">
                                        <span class="permission-page-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                        <span class="permission-page-btn-text">Permission</span>
                                    </button>
                                </p>
                            </div>
                            <div class="col-xl-3">
                                <p style="text-align: left;">
                                    <button type="button" class="btn btn-sm cgt_btn btn_focus skeleton-button mt-2" id="add" disabled>
                                        <span class="add-btn-text">ADD Access</span>
                                        <span class="add-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 action_message">
                    <p class="ps-1"><span id="success_message"></span></p>
                </div>
            </div>
        </form>
    </div>
</div>
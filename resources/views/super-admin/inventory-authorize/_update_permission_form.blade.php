<form class="gx-2 mt-2" style="border:1px dotted darkgray;border-radius: 5px;">
    @csrf
    <div class="row mt-2 pt-1">
        <div class="col-xl-4 role_nme">
            <div class="form-group custom-select skeleton ms-1">
                <select class="ms-2 ps-2" name="role_id" id="select_roles"></select>
                <span class="custom-role-arrow2"></span>
            </div>

        </div>
        <div class="col-xl-4 role_nme">
            <div class="form-group custom-select email_box" hidden id="skeletoneID">
                <select class="ms-3 ps-2" name="user_id" id="select_users"></select>
                <span class="custom-role-arrow3"></span>
            </div>
            <div class="select-user-skeletone" id="select-user-skeletone"></div>

        </div>
        <div class="col-xl-4" style="text-align:center;">
            <span class="" style="font-size:15px;font-weight:700;color:black;text-transform: uppercase;font-family:math;">Inventory Permission</span>
        </div>
        
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-xl-4 role_nme ms-2 ps-3">
            <span id="srchSkeletone">
                <input class="form-control form-control-sm inv_permission_id search_display" type="number" name="inv_permission_id" id="inventoryID" placeholder="Type Table ID" hidden>
            </span>

            <span class="card display_none" id="viewCard">
                <div class="row mt-1">
                    <div class="col-xl-3">
                        <div class="pageData" id="pageData" hidden>
                            <label class="mt-2" for="user_image"><span id="usrImage"></span></label>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="pageData2" id="pageData2" hidden>
                            <label id="lable1" style="font-weight:700;font-size:12px;color:black;" for="created_by">User :</label>
                            <input type="text" id="created_by" readonly>
                        </div>
                        <div class="pageData3" id="pageData3" hidden>
                            <label id="lable2" style="font-weight:700;font-size:12px;color:black;" for="usr_email">Email :</label>
                            <input type="text" id="usr_email" readonly>
                        </div>
                        <div class="pageData4" id="pageData4" hidden>
                            <label id="lable3" style="font-weight:700;font-size:12px;color:black;" for="invent_id">INV-ID :</label>
                            <input type="text" id="invent_id" readonly>
                        </div>
                        <span id="serErorr"></span>
                        <div class="pageData5" id="pageData5" hidden>
                            <label id="lable4" style="font-weight:700;font-size:12px;color:black;" for="created_date">Create_At :</label>
                            <input type="text" id="created_date" readonly>
                        </div>
                        <div class="pageData6" id="pageData6" hidden>
                            <label id="lable5" style="font-weight:700;font-size:12px;color:black;" for="updated_date">Update_At :</label>
                            <input type="text" id="updated_date" readonly>
                        </div>
                        <div class="pageData7" id="pageData7" hidden>
                            <label id="lable6" style="font-weight:700;font-size:12px;color:black;" for="updated_by">Update_By :</label>
                            <input type="text" id="updated_by" readonly>
                        </div>
                    </div>
                    <span class="ms-4" id="savForm_errors"></span>
                    <span id="updateForm_errorLists"></span>
                </div>
            </span>    
            <div class="card loarder-card" id="loadCard" hidden>
                <span class="iconBx">
                    <img class="server-loader error-hidden icon_update" src="{{asset('/image/loader/loading.gif')}}" alt="Loading...." />
                </span>
            </div>
            <input type="hidden" id="perItemControl" value="10">
            
        </div>
        <div class="col-xl-4 role_nme ms-1 ps-3 issue_box" hidden>
            <span id="txtArea">
                <textarea class="form-control form-control-sm issue_display isseu_name" type="text" name="issue_name" id="inventoryIDIssue" rows="1" cols="10" placeholder="Type Permission Issue..........."></textarea>
            </span>
        </div>
        <div class="col-xl-2 button_box" style="align-items:center;text-align:center;" hidden>
            <button type="submit" class="btn btn-sm invper_btn" id="data_permission">
                <i class="perm-icon fa fa-solid fa-asterisk fa-spin perm-hidden"></i>
                <span class="btn-text">Permission</span>
            </button>
        </div>
    </div>
</form>


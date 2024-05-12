<form class="gx-2">
    @csrf
    <div class="row mt-">
        <div class="col-xl-3 role_nme">
            <label class="ms-5 ps-1" style="font-size:12px;font-weight:700" for="start_date">Role Name</label>
            <div class="form-group custom-select skeleton ms-1">
                <select class="ms-5 ps-2" name="role_id" id="select_role">
                    <option value="" id="option_value1">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" id="option_value2">{{$role->name}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow2"></span>
            </div>
        </div>
        <div class="col-xl-4 role_nme ms-1">
            <label class="ms-5" style="font-size:12px;font-weight:700" for="select_user">User Email</label>
            <div class="form-group custom-select skeleton">
                <select class="ms-5 ps-2" name="user_id" id="select_user">
                    <option value="" id="option_value1">Select Email</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" id="option_value2">{{$user->email}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow"></span>
            </div>

        </div>
        <div class="col-xl-5"></div>
    </div>
    <div class="row mt-2 mb-1">
        <div class="col-xl-3 role_nme ms-5 ps-3">
            <input class="form-control form-control-sm inventory_id" type="text" name="inventory_id" id="inventoryID" placeholder="Type Inventory ID">
            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
        </div>
        <div class="col-xl-5 role_nme ms- ps-3">
            <textarea class="form-control form-control-sm isseu_name" type="text" name="issue_name" id="inventoryIDIssue" rows="1" cols="10" placeholder="Type Permission Issue..........."></textarea>
        </div>
        <div class="col-xl-1" style="align-items:center;text-align:center;">
            <button type="submit" class="btn btn-sm invper_btn" id="data_permission">
                <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
                <span class="btn-text">Permission</span>
            </button>
        </div>
        
    </div>
</form>


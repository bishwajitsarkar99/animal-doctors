<form class="gx-2">
    @csrf
    <div class="row mt-2">
        <div class="col-xl-4">
            <label class="ms-5 ps-1" style="font-size:12px;font-weight:700" for="start_date">Role Name</label>
            <div class="form-group custom-select skeleton ms-1">
                <select class="ms-5 ps-2" name="role_id" id="select_role">
                    <option value="" id="option_value1">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}" id="option_value2">{{$role->name}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow"></span>
            </div>
            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
        </div>
        <div class="col-xl-4">
            <label class="ms-5 ps-1" style="font-size:12px;font-weight:700" for="start_date">User Email</label>
            <div class="form-group custom-select skeleton ms-1">
                <select class="ms-5 ps-2" name="user_id" id="select_user">
                    <option value="" id="option_value1">Select Email</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" id="option_value2">{{$user->email}}</option>
                    @endforeach
                </select>
                <span class="custom-role-arrow"></span>
            </div>
            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
        </div>
        <div class="col-xl-4">
        <table class="ord_table center border-1 mt-3 me-2" id="myTable">
          <tr class="table-row order_body acc_setting_table skeleton">
            <th id="th_sort" class="table_th_color skeleton txt col ps-2" style="text-align:left;">Permission</th>
            <th id="th_sort" class="table_th_color tot_pending_ skeleton col ps-1" style="text-align:center;">Check By</th>
          </tr>
          <tbody class="bg-transparent" id="permission_data_table">
            <tr class="btn-hover table_body">
              <td style="border-bottom: 1px solid lightblue;" class="skeleton ps-2">
                <span class="badge rounded-pill bg-primary" id="show_jst">Justify</span>
                <span class="badge rounded-pill bg-warning text-dark" id="show_deny">Deny</span>
              </td>
              <td style="text-align: center;border-bottom: 1px solid lightblue;">
                <input type="checkbox" name="permission" value="" class="skeleton mt-1" style="cursor: pointer;" id="permissionChecking">
                <span id="savForm_error"></span><span id="updateForm_errorList"></span>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
    </div>
    <div class="row mt-">
        <div class="col-xl-6 ms-5 ps-3">
            <span class="data_range" style="font-weight:600;font-size:14px;color:black;">Data Range :</span>
        </div>
        <div class="col-xl-6"></div>
    </div>
    <div class="row">
        <div class="col-xl-4 ms-5 ps-3">
            <label style="font-size:12px;font-weight:700" for="start_date">Start-Date :</label>
            <input class="date_field ps-1" name="start_date" type="text" placeholder="DD-MM-YYYY" id="start_get_date">
            <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
        </div>
        <div class="col-xl-4 ps-3">
            <label style="font-size:12px;font-weight:700" for="end_date">End-Date :</label>
            <input class="date_field ps-1" name="end_date" type="text" placeholder="DD-MM-YYYY" id="end_get_date">
            <span style="color:darkcyan"><i class="fa-solid fa-calendar-week"></i></span>
            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
        </div>
        <div class="col-xl-3" style="align-items:center;text-align:center;">
            <button type="submit" class="btn btn-sm cgt_btn btn_focus add_button" id="data_permission">
                <i class="search-icon fa fa-spinner fa-spin search-hidden"></i>
                <span class="btn-text">Permission Access</span>
            </button>
        </div>
        <div class="col-xl-1"></div>
    </div>
</form>


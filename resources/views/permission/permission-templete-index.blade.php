{{-- start permission templete modal --}}
  <div class="modal fade" id="permissionModalTemplete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" id="permissionDialogModal">
      <div class="modal-content" id="permission_modal_box">
        <div class="modal-header permission_modal_header">
          <h5 class="modal-title admin_title head_title ps-1 pe-1 font-effect-emboss branch-skeleton" id="permission_head_label">
            Permission [<span id="permission_temp_head"></span>]
          </h5>
          <button type="button" class="btn-close btn-btn-sm permission_head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body" id="permission_temp_Modal_body">
          <div class="row temp-top-bar">
            <div class="col-xl-3">
              <input class="search_input_field" type="" name="" value="" placeholder="search...">
            </div>
            <div class="col-xl-3">
              <input class="search_input_field" type="" name="" value="" placeholder="search...">
            </div>
            <div class="col-xl-6">
              <input class="search_input_field" type="" name="" value="" placeholder="search...">
            </div>
          </div>
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="permissionSidebar" role="tablist" aria-orientation="vertical">
              <ul id="sidebar_menu" class="list_group menu static-head">
                <li tabindex="0" value="" id="sidebar_select_list_item">
                  Branch <label class="enter_press enter-focus"><i class="fa-solid fa-link"></i></label>
                </li>
                <li tabindex="0" value="" id="sidebar_select_list_item">
                  <label class="email_enter_press enter-focus">Role </label><i class="fa-solid fa-link"></i>
                </li>
                <li tabindex="0" value="" id="sidebar_select_list_item">
                  <label class="email_enter_press enter-focus">Auth </label><i class="fa-solid fa-link"></i>
                </li>
                <li tabindex="0" value="" id="sidebar_select_list_item">
                  <label class="email_enter_press enter-focus">Page </label><i class="fa-solid fa-link"></i>
                </li>
              </ul>
            </div>
            <div class="tab-content static-head" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="row">
                  <div class="col-xl-5">
                    <div class="nav flex-column nav-pills" id="branchCategory" role="tablist" aria-orientation="vertical">
                      <ul id="sidebar_menu" class="list_group menu static-head">
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <span class="heading">Branch Category</span>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          Main <label class="enter_press enter-focus"><i class="fa-solid fa-link"></i></label>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <label class="email_enter_press enter-focus">Corporate </label><i class="fa-solid fa-link"></i>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <label class="email_enter_press enter-focus">Local</label><i class="fa-solid fa-link"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-xl-7">
                    <div class="nav flex-column nav-pills" id="branchName" role="tablist" aria-orientation="vertical">
                      <ul id="sidebar_menu" class="list_group menu static-head">
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          Branch Name <label class="enter_press enter-focus"><i class="fa-solid fa-link"></i></label>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <label class="email_enter_press enter-focus">Pabna </label><i class="fa-solid fa-link"></i>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <label class="email_enter_press enter-focus">Rajshahi</label><i class="fa-solid fa-link"></i>
                        </li>
                        <li tabindex="0" value="" id="sidebar_select_list_item">
                          <label class="email_enter_press enter-focus">Natore </label><i class="fa-solid fa-link"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                This is some placeholder content the Home tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                This is some placeholder content the Home tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                This is some placeholder content the Home tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other .nav-powered navigation.
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer permission_modal_footer">
          
        </div>
      </div>
    </div>
  </div>
{{-- end permission templete modal --}}
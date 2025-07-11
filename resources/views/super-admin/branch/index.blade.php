<?php 
  // Table-Head-th
  $headThRows = [
    ['label'=>'SN.', 'className'=>'th-head skeleton', 'styleShow'=>'width:5%;text-align:center;'],
    ['label'=>'Branch-Type', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Branch-ID', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Branch-Name', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Division', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'District', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Upazila', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'City', 'className'=>'th-head skeleton', 'styleShow'=>''],
    ['label'=>'Location', 'className'=>'th-head skeleton', 'styleShow'=>''],
  ];
  $hiddenAttr = 'hidden';
  // Custom Left Side Tab Panel Button
  $customLeftSideTabPanelGroupBtns = [
    ['labelName'=>'Home', 'btnClass'=>'btn btn-sm custom-tab-btn active','btnType'=>'button', 'btnId'=>'v-pills-home-tab', 'toggle'=>'pill', 'target'=>'#v-pills-home', 'btnRole'=>'tab', 'controls'=>'v-pills-home', 'selected'=>'true'],
    ['labelName'=>'Branch', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-branch-tab', 'toggle'=>'pill', 'target'=>'#v-pills-branch', 'btnRole'=>'tab', 'controls'=>'v-pills-branch', 'selected'=>'true'],
    ['labelName'=>'Category', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-category-tab', 'toggle'=>'pill', 'target'=>'#v-pills-category', 'btnRole'=>'tab', 'controls'=>'v-pills-category', 'selected'=>'false'],
    ['labelName'=>'Search', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-search-tab', 'toggle'=>'pill', 'target'=>'#v-pills-search', 'btnRole'=>'tab', 'controls'=>'v-pills-search', 'selected'=>'false'],
    ['labelName'=>'Replace', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-replace-tab', 'toggle'=>'pill', 'target'=>'#v-pills-replace', 'btnRole'=>'tab', 'controls'=>'v-pills-replace', 'selected'=>'false'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <!-- =========== Tap Panel Top Bar =========== -->
    <x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar topBarClass="tab-panel" topBarRowClass="row tab-panel-topbar" topBarId="branchListPage" :hiddenAttr="$hiddenAttr">
      <div class="col-xl-8 group-btn">
        <x-Buttons.FormMediumButton label="Branch List" buttonParentClass="btn btn-sm branch-tab-btn active-button" buttonChildClass="skeleton-button" buttonId="branchList" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.FormMediumButton label="Create Branch Category" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeModalView" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.FormMediumButton label="Branch Settings" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchSettingPageView" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.CommonRefreshPageBtn label="Refresh" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text" />
      </div>
      <div class="col-xl-4"></div>
    </x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar>
    <!-- =========== Tap Content Panel Home Page =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="tab-content-panel-bg" contentTabId="branchListTab" :hiddenAttr="$hiddenAttr">
      <!-- =========== Home Tab Content Panel Header =========== -->
      <x-CustomTabPanels.TabPanelContents.TabContentPanelHeader contentTabHeaderClass="table-heading component-focus">
        <span>
          <span class="skeleton">
            <x-Tables.Icon.TableIcon iconWidth="26" iconHeight="24" fillColor="#413571a6" />
          </span>
          <span class="skeleton"><strong>Branch List Table</strong></span>
        </span>
      </x-CustomTabPanels.TabPanelContents.TabContentPanelHeader>
      <!-- =========== Home Tab Content =========== -->
      <x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper wrapperClass="table-wrapper component-focus">
        <x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive tableResponsiveClass="table-responsive">
          <!-- ========== Branch-List Table =============== table-striped-->
          <x-Tables.ViewDataTables.ViewDataTable tableClass="table">
            <x-Tables.ViewDataTables.DataTableHeads.DataTableHead className="table-head" >
              <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow rowClass="table-head-row">
                @foreach($headThRows as $data)
                  <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadTh 
                    thClassName="{{ $data['className'] }}" 
                    thStyle="{{ $data['styleShow'] }}" 
                    lableName="{{ $data['label'] }}"
                  />
                @endforeach
              </x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow>
            </x-Tables.ViewDataTables.DataTableHeads.DataTableHead>
            <x-Tables.ViewDataTables.DataTableBody.TableBody bodyClassName="table-body table-light" tableId="BranchListTableBody">
              <!-- Loader Overlay -->
              <x-Tables.Icon.LoaderOverlay 
                tableOverlayClass="table-loader-overlay display_none" 
                loaderId="tableOverlayLoader" 
                loaderClass="data-table-loader" 
                loaderWidth="24" 
                loaderHeight="24" 
                loaderStroke="currentColor" 
                loaderStrokeWidth="2" 
                loaderText="Loading...." 
                loaderTextClass="loader-text ms-1" 
                loaderFill="none"
              />
            </x-Tables.ViewDataTables.DataTableBody.TableBody>
          </x-Tables.ViewDataTables.ViewDataTable>
        </x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive>
        <x-Tables.TableFooter footerClass="row table_last_row mb-1">
          <div class="col-1">
            <x-Tables.TableFooterSelectDropdown 
              labelClass="item_class skeleton"
              labelName="Peritem"
              dropdownBox="custom-select skeleton"
              selectClass="ps-1"
              selectId="perItemControl"
              selectStyle="background: linear-gradient(5deg, gray, transparent 3%, lightgray, silver);border:1px ridge rgba(135, 206, 250, 0.74);"
              selectedValue="10"
            />
          </div>
          <div class="col-3">
            <x-Tables.TableEntries
              labelClass="per_item_class table-footer-label"
              entryId="total_per_branch_items"
              showId="per_branch_items_num"
              totalIems="total_branch_items" 
            />
          </div>
          <div class="col-8">
            <x-Tables.TablePagination
              paginationClass="pagination mt-1 skeleton"
              paginationId="branch_data_table_paginate" 
              paginationStyle="float: right;padding-top:0px;"
            />
          </div>
        </x-Tables.TableFooter>
      </x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper>
    </x-CustomTabPanels.TabPanelContents.TabContentPanel>
    <!-- =========== Tap Panel Branch Setting =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="setting-page-container" contentTabId="BranchSettingPage" :hiddenAttr="$hiddenAttr">
      <!-- =========== Header =========== -->
      <x-CustomLeftSideTabPanels.LeftSideTabPanelTopBars.LeftSideTabPanelTopBar className="setting-top-area component-focus">
        <div class="logo_size">
          <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
        </div>
        <div class="head-word">
          <strong>Settings</strong>
        </div>
      </x-CustomLeftSideTabPanels.LeftSideTabPanelTopBars.LeftSideTabPanelTopBar>
      <!-- =========== Left Side Tab Panel =========== -->
      <x-CustomLeftSideTabPanels.LeftSideTabPanel className="d-flex align-items-start">
        <!------------- Navbar ------------->
        <x-CustomLeftSideTabPanels.LeftSideTabPanelNavBars.LeftSideTabPanelNavBar className="nav flex-column nav-pills component-focus me-3" navBarId="v-pills-tab" navBarRole="tablist" ariaOrientation="vertical">
          @foreach($customLeftSideTabPanelGroupBtns as $data)
          <x-CustomLeftSideTabPanels.LeftSideTabPanelBtn 
            labe="{{ $data['labelName'] }}" 
            buttonType="{{ $data['btnType'] }}" 
            className="{{ $data['btnClass'] }}" 
            buttonID="{{ $data['btnId'] }}" 
            dataBsToggle="{{ $data['toggle'] }}" 
            dataBsTarget="{{ $data['target'] }}" 
            buttonRole="{{ $data['btnRole'] }}" 
            ariaControl="{{ $data['controls'] }}" 
            ariaSelect="{{ $data['selected'] }}" 
          />
          @endforeach
        </x-CustomLeftSideTabPanels.LeftSideTabPanel>
        <!------------ Content ------------->
        <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.LeftSideTabContent className="tab-content" contentPanelId="v-pills-tabContent" >
          <!-- Home -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade show active" homePanelId="v-pills-home" homeRole="tabpanel" ariaLabel="v-pills-home-tab" >
            <div class="home-icon-box">
              <div class="watermark-text">
                <x-Tables.Icon.SettingIcon iconWidth="80" iconHeight="80" firstFill="#686868" secondFill="#DEDEDE" thirdFill="#C8C8C8" fourFill="#8F9094" />
                <span class="text_movilaization">
                 Branch Setting
                </span>
              </div>
            </div>
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Branch Setting -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-branch" homeRole="tabpanel" ariaLabel="v-pills-branch-tab" >
            <div class="row">
              <div class="col-sm-3">
                @include('super-admin.branch._branch-setting-operation')
              </div>
              <div class="col-sm-5">
                @include('super-admin.branch._branch-setting-implement')
              </div>
              <div class="col-sm-4">
                @include('super-admin.branch._branch-setting-display')
              </div>
            </div>
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Category Setting -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-category" homeRole="tabpanel" ariaLabel="v-pills-category-tab" >
            ...
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Search Setting -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-search" homeRole="tabpanel" ariaLabel="v-pills-search-tab" >
            ...
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Branch Replace -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-replace" homeRole="tabpanel" ariaLabel="v-pills-replace-tab" >
            ...
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
        </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.LeftSideTabContent>
      </x-CustomLeftSideTabPanels.LeftSideTabPanel>
    </x-CustomTabPanels.TabPanelContents.TabContentPanel>
  </div>
  @include('loader.action-loader')
  
  {{-- start delete modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="deletebranch">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h5 class="modal-title admin_title head_title font-white branch-skeleton ps-1 pe-1" id="staticBackdropLabel">
          Delete [<span id="delete_branch"></span>]
        </h5>
        <button type="button" class="btn-close-modal head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <div class="row profile-heading pb-3">
          <div class="col-xl-12">
            <div class="form-group delete_content branch-skeleton" id="load_id">
              <span><div id="active_loader" class="loader_chart mt-1"></div></span>
              <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
              <label class="label_user_edit" id="cat_id"> <span id="delete_branch_id"></span><br></label>
              <label class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete <span id="delete_branch_body"></span>, permanently?</label>
              <input type="hidden" id="delete_branch_id" name="branches_id">
            </div>
          </div>
        </div>
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <p id="btn_group">
          <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
        </p>
        <p id="btn_group2">
          <a type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
            <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="yes-btn-text">{{__('translate.Yes')}}</span>
          </a>
        </p>  
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
  {{-- end delete modal --}}

  {{-- start delete confirm modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="deleteconfirmbranch">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h6 class="modal-title admin_title scan confirm_title branch-skeleton font-white pt-1" id="staticBackdropLabel">
          Confirm Delete
        </h6>
        <button type="button" class="btn-close-modal head_btn2 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
          <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
          <label class="label_user_edit" id="cat_id"> <span id="delete_confrm_branch_id"></span><br></label>
          <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, confirm or cancel ? </label>
        </p>
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <x-Modals.SmallModals.Buttons.CancelBtn 
          className="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" 
          btnId="cancel_delete" 
          lableName="Cancel"
        />  
        <x-Modals.SmallModals.Buttons.ConfirmBtn 
          className="btn btn-sm purple-btn purple-btn-focus delete_branch branch-skeleton" 
          btnId="delete_branch" 
          lableName="Confirm" 
          lableClass="delete-confrm-btn-text" 
          spinerClass="delete-confrm-icon"
        />  
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
  {{-- end delete confirm modal --}}

  {{-- start confirm update modal --}}
  <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="updateconfirmbranch">
    <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
      {{-- header --}}
      <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
        <h6 class="modal-title admin_title scan update_title branch-skeleton font-white pt-1" id="staticBackdropLabel">
          Update [<span id="branch_update_modal_heading"></span>]
        </h6>
        <button type="button" class="btn-close-modal head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
          data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
        </button>
      </x-Modals.SmallModals.Headers.Header>
      {{-- body --}}
      <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
        <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
          <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update <span id="branch_update_modal"></span>, confirm or cancel ? </label>
        </p>
      </x-Modals.SmallModals.Bodies.Body>
      {{-- footer --}}
      <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
        <x-Modals.SmallModals.Buttons.CancelBtn 
          className="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" 
          btnId="cate_delete5" 
          lableName="Cancel"
        />  
        <x-Modals.SmallModals.Buttons.ConfirmBtn 
          className="btn btn-sm purple-btn purple-btn-focus update_confirm branch-skeleton" 
          btnId="update_confirm" 
          lableName="Confirm" 
          lableClass="confirm-btn-text" 
          spinerClass="confirm-icon"
        />  
      </x-Modals.SmallModals.Footers.Footer>
    </x-Modals.SmallModals.SmallModal>
  </x-Modals.Modal>
  {{-- end confirm update modal --}}

  {{-- start confirm access modal --}}
  <div class="modal fade" id="accessconfirmbranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content small_modal" style="border:none;" id="admin_modal_box">
        <div class="modal-header" id="logoutModal_header">
          <h6 class="modal-title admin_title scan access_title branch-skeleton pt-1" id="staticBackdropLabel">
            Branch Access
          </h6>
          <button type="button" class="btn-close btn-btn-sm head_btn_access_close head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
          </button>
          </div>
          <div class="modal-body" id="SM_Modal_body">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="access_text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Are you confirm or cancel ? </label>
            </p>
          </div>
          <div class="modal-footer" id="logoutModal_footer">
            <button id="access_btn_confirm" class="btn btn-sm modal_button update_confirm btn_focus branch-skeleton">
              <span class="access-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
              <span class="access-confirm-btn-text">Confirm</span>
            </button>
            <button type="button" class="btn btn-sm modal_button delete_cancel btn_focus branch-skeleton" id="acces_delete" data-bs-dismiss="modal">Cancel</button>
          </div>    
        </div>
      </div>
    </div>
  </div>
  {{-- end confirm access modal --}}

  <!-- ======= Branch-Type-Create-Modal ========= -->
  {{-- start branch type create modal --}}
  <div class="modal fade" id="branchTypeCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title branch_type_head_title ps-1 pe-1 branch-skeleton" id="staticBackdropLabel">
           Branch Category
          </h5>
          <button type="button" class="btn-close btn-btn-sm branch_type_head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body">
          @csrf
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group mb-1 role_nme branch_select_type branch-skeleton">
                <span class="input-label"><label class="branch_label label_position" for="branch-category-name">Searching...</label></span>
                <select type="text" class="form-control form-control-sm branch_category_name select2" name="branch_category_name" id="branch_category_name">
                  <option value="">Select Branch Category Name</option>
                </select>
                <input type="hidden" id="branch_category_id">
              </div>
            </div>
          </div>
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group branch role_nme mb-1 branch_type_name branch-skeleton">
                <label class="branch_label label_position" for="mail-transport">Category Name</label>
                <input class="form-control branch_input edit_branch_category_name" type="text" name="branch_category_name" id="branchTypeName" placeholder="Branch Category Name" value="" autocomplete="off"/>
                <span id="savForm_error_branch" hidden></span><span id="updateForm_error_branch" hidden></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action action_group">
          <button id="branch_type_cancel" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" data-bs-dismiss="modal" hidden>
            <span class="branch-type-cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-cancel-btn-text">Cancel</span>
          </button>
          <button type="button" id="branch_type_update" class="btn btn-sm cgt_btn btn_focus skeleton-button" hidden>
            <span class="branch-type-update-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-update-btn-text">Update</span>
          </button>
          <button type="button" id="branch_type_delete" class="btn btn-sm cgt_btn btn_focus skeleton-button" hidden>
            <span class="branch-type-delete-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-delete-btn-text">Delete</span>
          </button>
          <button type="button" class="btn btn-sm cgt_btn btn_focus branch-skeleton" id="branch_type_create" hidden>
            <span class="branch-type-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-btn-text">Create</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end branch type create modal --}}

  {{-- start branch type confirm delete modal --}}
  <div class="modal fade" id="branchTypeDeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content" id="admin_modal_box">
        <div class="modal-header profile_modal_header profilesetting_modal_header">
          <h5 class="modal-title admin_title branch_type_head_delete ps-1 pe-1 font-effect-emboss branch-skeleton" id="staticBackdropLabel">
           Branch Category [<span id="Heading"></span>]
          </h5>
          <button type="button" class="btn-close btn-btn-sm branch_type_head_delete_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div></div>'></button>
        </div>

        <div class="modal-body profile-body" id="SM_Modal_body">
          @csrf
          <input type="hidden" id="branch_delete_category_id">
          <div class="row profile-heading">
            <div class="col-xl-12">
              <div class="form-group branch role_nme mb-1 branch_category_name branch-skeleton">
                <label class="branch_label label_position" for="mail-transport">
                  Would you like to delete <span id="delete_label"></span>, confirm or cancel ? 
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer profile_modal_footer action action_group">
          <button id="branch_type_delete_cancel" type="reset" class="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" data-bs-dismiss="modal">
            <span class="branch-type-confirm-cancel-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-confirm-cancel-btn-text">Cancel</span>
          </button>
          <button type="button" class="btn btn-sm cgt_btn btn_focus branch-skeleton" id="branch_type_delete_confirm">
            <span class="branch-type-confirm-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
            <span class="branch-type-confirm-btn-text">Confirm</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  {{-- end branch type confirm delete modal --}}

  <!-- Tostar Message Show -->
  <x-TostarMessage.Tostar messageId="toast-body-message" tostarId="liveToast" />
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/table/zebra-table/zebra-table-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-division-district-upazila.ajax')
@include('super-admin.branch.ajax.branch-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script type="module" src="{{asset('/module/module-min-js/helper-function-min.js')}}"></script>
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>

<!-- <script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }
  function focuButton() {
    const allSkeleton = document.querySelectorAll('.skeleton-button')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton-button')
    });
  }

  setTimeout(() => {
    requestAnimationFrame(() => {
      fetchData();
      focuButton();
    });
  }, 2500);
</script> -->
<script>
  $(document).ready(function(){
    $("#branchListPage").removeAttr('hidden');
    $("#branchListTab").removeAttr('hidden');
    // Branch List click
    $(document).on('click', '#branchList', function (e) {
      e.preventDefault();
      // Hide setting page with animation, then set hidden
      $("#BranchSettingPage").slideUp("slow", function () {
        $(this).attr("hidden", true);
      });
      // Show branch list with animation and remove hidden before show
      $("#branchListTab").removeAttr("hidden").hide().slideDown("slow");
    });
    // Branch Setting click
    $(document).on('click', '#branchSettingPageView', function (e) {
      e.preventDefault();
      // Hide branch list with animation, then set hidden
      $("#branchListTab").slideUp("slow", function () {
        $(this).attr("hidden", true);
      });
      // Show setting page
      $("#BranchSettingPage").removeAttr("hidden").hide().slideDown("slow");
    });
  });
</script>
@endpush('scripts')
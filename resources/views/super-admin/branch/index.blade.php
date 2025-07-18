<?php 
  // Table-Head-th
  $headThRows = [
    ['label'=>'SN.', 'className'=>'th-head skeleton', 'styleShow'=>'width:5%;text-align:center;', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Branch-Type', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Branch-ID', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Branch-Name', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Division', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'District', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Upazila', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'City', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
    ['label'=>'Location', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer'],
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
  // Modals
  $modals = [
    ['modal_id'=>'deletebranch'],
    ['modal_id'=>'deleteconfirmbranch'],
    ['modal_id'=>'updateconfirmbranch'],
    ['modal_id'=>'deletecategorybranch'],
    ['modal_id'=>'deletecategoryconfirmbranch'],
    ['modal_id'=>'updatecategoryconfirmbranch'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <!-- =========== Tap Panel Top Bar =========== -->
    <x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar topBarClass="tab-panel" topBarRowClass="row tab-panel-topbar" topBarId="branchListPage" :hiddenAttr="$hiddenAttr">
      <div class="col-xl-8 group-btn">
        <x-Buttons.FormMediumButton label="Branch" buttonParentClass="btn btn-sm branch-tab-btn active-button" buttonChildClass="skeleton-button" buttonId="branchList" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.FormMediumButton label="Settings" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchSettingPageView" iconClass="icon" labelClass="btn-text" />
        <x-Buttons.CommonRefreshPageBtn label="Refresh" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text" />
      </div>
      <div class="col-xl-4"></div>
    </x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar>
    <!-- =========== Tap Content Panel Home Page =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="tab-content-panel-bg" contentTabId="branchListTab" :hiddenAttr="$hiddenAttr">
      <!-- =========== Home Tab Content Panel Header =========== -->
      <x-CustomTabPanels.TabPanelContents.TabContentPanelHeader contentTabHeaderClass="table-heading component-focus">
        <span>
          <span class="table-icon-skeleton">
            <x-Tables.Icon.TableIcon iconWidth="26" iconHeight="24" fillColor="#413571a6" svgId="tableIcon" />
            <!-- Table-Menu-Card -->
            <x-MenuCards.MenuCard menuParentClass="dropdown dashboard_menubar" menuChildClass="dropdown-content" menuId="dropbtn">
              <div class="row">
                <div class="col-12">
                  <ul class="menu-btn-group">
                    <li id="lineRow"><a type="button" class="menu-btn" id="columnWidth">Remove Column Width</a></li>
                    <li id="lineRow"><a type="button" class="menu-btn" id="rowHeight">Remove Row Height</a></li>
                  </ul>
                </div>
              </div>
            </x-MenuCard.MenuCard>
          </span>
          <span class="table-icon-skeleton"><strong>Branch Table</strong></span>
        </span>
      </x-CustomTabPanels.TabPanelContents.TabContentPanelHeader>
      <!-- =========== Home Tab Content =========== -->
      <x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper wrapperClass="table-wrapper component-focus">
        <x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive tableResponsiveClass="table-responsive">
          <!-- ========== Branch-List Table =============== table-striped-->
          <x-Tables.ViewDataTables.ViewDataTable tableClass="table" resizeTableId="resizableTable">
            <x-Tables.ViewDataTables.DataTableHeads.DataTableHead className="table-head" >
              <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow rowClass="table-head-row skeleton">
                @foreach($headThRows as $data)
                  <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadTh 
                    theadId="{{ $data['thId'] }}"
                    thRowResizeClass="{{ $data['resizeRowClass'] }}"
                    thColResizeClass="{{ $data['resizeColClass'] }}"
                    thClassName="{{ $data['className'] }}" 
                    thStyle="{{ $data['styleShow'] }}" 
                    lableName="{{ $data['label'] }}"
                  />
                @endforeach
              </x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow>
            </x-Tables.ViewDataTables.DataTableHeads.DataTableHead>
            <x-Tables.ViewDataTables.DataTableBody.TableBody bodyClassName="table-body table-light skeleton" tableId="BranchListTableBody">
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
              labelClass="per_item_class table-footer-label table-footer-lable-skeleton"
              entryId="total_per_branch_items"
              showId="per_branch_items_num"
              totalIems="total_branch_items" 
            />
          </div>
          <div class="col-8">
            <x-Tables.TablePagination
              paginationClass="pagination mt-1"
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
            <div class="row">
              <div class="col-sm-3">
                @include('super-admin.branch._branch-category-setting-operation')
              </div>
              <div class="col-sm-5">
                @include('super-admin.branch._branch-category-setting-implement')
              </div>
              <div class="col-sm-4">
                @include('super-admin.branch._branch-category-setting-display')
              </div>
            </div>
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
  
  {{-- start modal --}}
  @foreach($modals as $data)
    <x-Modals.Modal modalParentClass="modal fade" modalChildClass="modal-dialog modal-sm modal-dialog-centered" modalId="{{ $data['modal_id'] }}">
      <x-Modals.SmallModals.SmallModal className="modal-content small_modal" styling="border:none;" smModalId="admin_modal_box">
        {{-- header --}}
        <x-Modals.SmallModals.Headers.Header className="modal-header modal-heading" headerId="logoutModal_header">
          @if($data['modal_id'] === 'deletebranch')
            <h5 class="modal-title admin_title head_title font-white branch-skeleton ps-1 pe-1" id="staticBackdropLabel">
              Delete [<span id="delete_branch"></span>]
            </h5>
            <button type="button" class="btn-close-modal head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'deletecategorybranch')
            <h5 class="modal-title admin_title head_title font-white branch-skeleton ps-1 pe-1" id="staticBackdropLabel">
              Delete [<span id="Heading"></span>]
            </h5>
            <button type="button" class="btn-close-modal head_btn branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'deleteconfirmbranch' || $data['modal_id'] === 'deletecategoryconfirmbranch')
            <h6 class="modal-title admin_title scan confirm_title branch-skeleton font-white pt-1" id="staticBackdropLabel">
              Confirm Delete
            </h6>
            <button type="button" class="btn-close-modal head_btn2 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <h6 class="modal-title admin_title scan update_title branch-skeleton font-white pt-1" id="staticBackdropLabel">
              Update [<span id="branch_update_modal_heading"></span>]
            </h6>
            <button type="button" class="btn-close-modal head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @elseif($data['modal_id'] === 'updatecategoryconfirmbranch')
            <h6 class="modal-title admin_title scan update_title branch-skeleton font-white pt-1" id="staticBackdropLabel">
              Update [<span id="confrmHead"></span>]
            </h6>
            <button type="button" class="btn-close-modal head_btn3 branch-skeleton" data-bs-dismiss="modal" aria-label="Close" 
              data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="canl">
            </button>
          @endif
        </x-Modals.SmallModals.Headers.Header>
        {{-- body --}}
        <x-Modals.SmallModals.Bodies.Body className="modal-body center-modal-content">
          @if($data['modal_id'] === 'deletebranch')
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
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="delete_text_message">
              <label class="label_user_edit" id="cate_delete" for="id">Branch-ID : </label>
              <label class="label_user_edit" id="cat_id"> <span id="delete_confrm_branch_id"></span><br></label>
              <label class="label_user_edit" id="cate_confirm" for="id">Are you confirm, confirm or cancel ? </label>
            </p>
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update <span id="branch_update_modal"></span>, confirm or cancel ? </label>
            </p>
          @elseif($data['modal_id'] === 'deletecategorybranch')
            <div class="row profile-heading">
              <div class="col-xl-12">
                <div class="form-group branch role_nme mb-1 branch_category_name branch-skeleton">
                  <label class="label_user_edit" id="cate_delete2">Are you sure, Would you like to delete <span id="deleteLab"></span>, permanently?</label>
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'deletecategoryconfirmbranch')
            @csrf
            <input type="hidden" id="branch_delete_category_id">
            <div class="row profile-heading">
              <div class="col-xl-12">
                <div class="form-group branch role_nme mb-1 branch__category_name branch-skeleton">
                  <label class="branch_label label_position" for="mail-transport">
                    Delete <span id="delete_label"></span>? Please confirm or cancel.
                  </label>
                </div>
              </div>
            </div>
          @elseif($data['modal_id'] === 'updatecategoryconfirmbranch')
            <input type="hidden" id="branch_category_id">
            <p class="admin_paragraph branch-skeleton" style="text-align:center;" id="text_message">
              <label class="label_user_edit" id="cate_confirm_update" for="id">Would you like to update <span id="confrmUpdateName"></span>, confirm or cancel ? </label>
            </p>
          @endif
        </x-Modals.SmallModals.Bodies.Body>
        {{-- footer --}}
        <x-Modals.SmallModals.Footers.Footer className="modal-footer action_group" footerId="logoutModal_footer">
          @if($data['modal_id'] === 'deletebranch')
            <p id="btn_group">
              <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
            </p>
            <p id="btn_group2">
              <a type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesButton">
                <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="yes-btn-text">{{__('translate.Yes')}}</span>
              </a>
            </p>  
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
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
          @elseif($data['modal_id'] === 'updateconfirmbranch')
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
          @elseif($data['modal_id'] === 'deletecategorybranch')
            <p id="btn_group">
              <a type="button" class="btn btn-danger modal_button logout_button branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
            </p>
            <p id="btn_group2">
              <a type="button" class="btn btn-success modal_button logout_button yes_button branch-delete-skeleton" id="yesBtn">
                <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="yes-btn-text">{{__('translate.Yes')}}</span>
              </a>
            </p> 
          @elseif($data['modal_id'] === 'deletecategoryconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" 
              btnId="branch_type_delete_cancel" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm purple-btn purple-btn-focus branch-skeleton" 
              btnId="branch_type_delete_confirm" 
              lableName="Confirm" 
              lableClass="delete-confrm-btn-text" 
              spinerClass="delete-confrm-icon"
            />
          @elseif($data['modal_id'] === 'updatecategoryconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm cgt_cancel_btn btn_focus branch-skeleton" 
              btnId="branch_type_delete_cancel" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm purple-btn purple-btn-focus update_confirm branch-skeleton" 
              btnId="category_update_confirm" 
              lableName="Confirm" 
              lableClass="confirm-btn-text" 
              spinerClass="confirm-icon"
            />
          @endif
        </x-Modals.SmallModals.Footers.Footer>
      </x-Modals.SmallModals.SmallModal>
    </x-Modals.Modal>
  @endforeach
  {{-- end modal --}}

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

  <!-- Tostar Message Show -->
  <x-TostarMessage.Tostar messageId="toast-body-message" tostarId="liveToast" />
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/table/zebra-table/zebra-table.css">
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
<?php 
  // Table-Head-th
  $headThRows = [
    ['label'=>'SN.', 'dataColumn'=>'id', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'width:5%;text-align:center;', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Branch-Type', 'dataColumn'=>'branch_type', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Branch-ID', 'dataColumn'=>'branch_id', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Branch-Name', 'dataColumn'=>'branch_name', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Division', 'dataColumn'=>'division_id', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'District', 'dataColumn'=>'district_id', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Upazila', 'dataColumn'=>'upazila_id', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'City', 'dataColumn'=>'town_name', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
    ['label'=>'Location', 'dataColumn'=>'location', 'dataOrder'=>'desc', 'className'=>'th-head skeleton', 'styleShow'=>'', 'thId'=>'headId', 'resizeRowClass'=>'row-resizer', 'resizeColClass'=>'col-resizer','moveIconDisplayClass'=>'move-icon', 'styles'=>'color:gray;cursor:move;','headIconId'=>'moveIconId','svgLable'=>'label-svg'],
  ];
  $hiddenAttr = 'hidden';
  // Custom Left Side Tab Panel Button
  $customLeftSideTabPanelGroupBtns = [
    ['labelName'=>'Home', 'btnClass'=>'btn btn-sm custom-tab-btn active','btnType'=>'button', 'btnId'=>'v-pills-home-tab', 'toggle'=>'pill', 'target'=>'#v-pills-home', 'btnRole'=>'tab', 'controls'=>'v-pills-home', 'selected'=>'true'],
    ['labelName'=>'Branch', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-branch-tab', 'toggle'=>'pill', 'target'=>'#v-pills-branch', 'btnRole'=>'tab', 'controls'=>'v-pills-branch', 'selected'=>'true'],
    ['labelName'=>'Category', 'btnClass'=>'btn btn-sm custom-tab-btn','btnType'=>'button', 'btnId'=>'v-pills-category-tab', 'toggle'=>'pill', 'target'=>'#v-pills-category', 'btnRole'=>'tab', 'controls'=>'v-pills-category', 'selected'=>'false']
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
  // SubMenuButtons
  $subMenuFilterBtns = [
    ['filterBtnId'=> 'showFilterField', 'filterBtnLable'=> 'Click']
  ];
  $subMenuDownloadBtns = [
    ['downloadBtnId'=> '', 'downloadBtnLable'=> 'Excel File'],
    ['downloadBtnId'=> '', 'downloadBtnLable'=> 'SVG File'],
    ['downloadBtnId'=> '', 'downloadBtnLable'=> 'PDF File'],
  ];
  $commonMenuBtns = [
    ['commonBtnId'=> 'dataPrint', 'menuBtnLable'=> 'Print'],
    ['commonBtnId'=> 'tableResize', 'menuBtnLable'=> 'Reset Table'],
  ];
?>
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
  <div class="container">
    <!-- =========== Tap Panel Top Bar =========== -->
    <x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar topBarClass="tab-panel" topBarRowClass="row tab-panel-topbar" topBarId="branchListPage" :hiddenAttr="$hiddenAttr">
      <div class="col-xl-8 group-btn">
        <div class="button-container">
          <x-Buttons.FormMediumButton label="Branch" buttonParentClass="btn btn-sm branch-tab-btn active-button" buttonChildClass="skeleton-button" buttonId="branchList" iconClass="icon" labelClass="btn-text">
            <svg class="connectorSVG" width="100%" height="100%">
              <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
            </svg>
          </x-Buttons.FormMediumButton>
        </div>
        <div class="button-container">
          <x-Buttons.FormMediumButton label="Settings" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchSettingPageView" iconClass="icon" labelClass="btn-text">
            <svg class="connectorSVG" width="100%" height="100%">
              <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
            </svg>
          </x-Buttons.FormMediumButton>
        </div>
        <div class="button-container">
          <x-Buttons.CommonRefreshPageBtn label="Refresh" buttonParentClass="btn btn-sm branch-tab-btn deactive" buttonChildClass="skeleton-button" buttonId="branchTypeRefresh" iconClass="type-icon" labelClass="type-btn-text">
            <svg class="connectorSVG" width="100%" height="100%">
              <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
            </svg>
          </x-Buttons.CommonRefreshPageBtn>
        </div>
      </div>
      <div class="col-xl-4"></div>
    </x-CustomTabPanels.TabPanelTopBars.TabPanelTopBar>
    <!-- =========== Tap Content Panel Home Page =========== -->
    <x-CustomTabPanels.TabPanelContents.TabContentPanel contentTabClass="tab-content-panel-bg mb-4" contentTabId="branchListTab" :hiddenAttr="$hiddenAttr">
      <!-- =========== Home Tab Content Panel Header =========== -->
      <x-CustomTabPanels.TabPanelContents.TabContentPanelHeader contentTabHeaderClass="table-heading component-focus">
        <div class="row">
          <div class="col-sm-1">
            <span class="table-icon-skeleton">
              <!-- Table-Menu-Card -->
              <x-MenuCards.MenuCard menuParentClass="dropdown menubar-component" menuChildClass="dropdown-content dropdown-menu-component menu-card" activeMenu="" wrapperId="BranchTableMenuCard" menuName="Menu" menuId="dropbtn" showIdClassName="table-icon-skeleton" menuIcon="☰">
                <div class="menu-card-header">
                  <x-Tables.Icon.TableIcon iconWidth="20" iconHeight="20" fillColor="#413571a6" svgId="tableIcon" />
                  <span class="ms-2">Branch Table</span>
                </div>
                <div class="row">
                  <div class="col-12">
                    <ul class="menu-btn-group">
                      <!-- Search-SubMenu -->
                      <li class="line-row dropdown-search-submenu-component-wrapper">
                        <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="searchMenu">
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="white" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                          </svg>
                          <span class="ms-2">Search</span>
                        </x-Buttons.MenuButtons.MenuCardButton>
                        <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-search-submenu-component submenu-card">
                          <li class="child-line-row">
                            <x-Buttons.MenuButtons.SubMenuCardButton className="sub-menu-btn" dataURL="#" subMenuBtnId="showSearchField">
                              <span class="btn-vertical-align">
                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                  <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                  <line x1="8" y1="12" x2="16" y2="12"/>
                                </svg>
                                <span class="pt-1">Click</span>
                              </span>
                            </x-Buttons.MenuButtons.SubMenuCardButton>
                          </li>
                        </x-MenuCards.SubMenuCards.SubMenuCard>
                      </li>
                      <!-- Filter-SubMenu -->
                      <li class="line-row dropdown-filter-submenu-component-wrapper">
                        <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="filterMenu">
                          <svg width="15" height="15" fill="dodgerblue" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 490 511.751">
                            <path fill-rule="nonzero" d="M40.867 0h408.265c11.248 0 21.467 4.596 28.87 11.999C485.404 19.401 490 29.621 490 40.869v52.689c0 .464-.034.92-.099 1.367a9.488 9.488 0 01-2.204 7.552L340.325 273.686l-.02-.018-.389.427c-4.812 4.951-8.835 10.857-11.587 17.468a51.297 51.297 0 00-3.352 11.907 10.97 10.97 0 01-.083.557 51.381 51.381 0 00-.518 7.282v43.728a9.483 9.483 0 01.668 3.508 9.483 9.483 0 01-.668 3.508v49.197a9.479 9.479 0 01.668 3.508 9.483 9.483 0 01-.668 3.508v63.998h-.038c-.024 7.863-1.851 14.526-4.876 19.403-1.893 3.053-4.257 5.484-6.977 7.192-3.031 1.902-6.418 2.904-10.039 2.891-3.637-.013-7.354-1.038-10.981-3.196a9.598 9.598 0 01-.939-.589L170.12 422.473a9.504 9.504 0 01-4.612-8.152v-102.71c-.762-6.35-2.854-12.586-6.005-18.963-3.464-7.011-8.192-14.184-13.84-21.825L2.303 102.403a9.434 9.434 0 01-2.179-7.312A9.571 9.571 0 010 93.558V40.869c0-11.248 4.595-21.468 11.997-28.87C19.4 4.596 29.62 0 40.867 0zm264.494 424.265h-28.953c-5.25 0-9.507-4.257-9.507-9.507 0-5.251 4.257-9.508 9.507-9.508h28.953v-37.197h-46.948c-5.25 0-9.507-4.258-9.507-9.508 0-5.25 4.257-9.508 9.507-9.508h46.948V311.84h-46.948c-5.25 0-9.507-4.257-9.507-9.508 0-5.25 4.257-9.507 9.507-9.507h49.444a71.603 71.603 0 012.943-8.541c3.615-8.681 8.858-16.45 15.123-22.995l-.008-.007 136.188-158.216H27.71l132.752 155.958.393.494.015-.011c6.307 8.53 11.634 16.635 15.642 24.747 4.217 8.534 6.988 17.077 7.936 26.089.033.325.049.647.05.966h.025v98.136l116.785 82.921c.486.279.847.423 1.085.443.298-.192.622-.563.951-1.094 1.272-2.05 2.042-5.269 2.054-9.451h-.037v-57.999zM449.132 19.016H40.867c-6 0-11.462 2.461-15.427 6.426-3.963 3.962-6.425 9.426-6.425 15.427v43.182h451.969V40.869c0-6.001-2.462-11.465-6.424-15.427-3.966-3.965-9.427-6.426-15.428-6.426z"/>
                          </svg>
                          <span class="ms-2">Filter</span>
                        </x-Buttons.MenuButtons.MenuCardButton>
                        <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-filter-submenu-component submenu-card">
                          @foreach($subMenuFilterBtns as $data)
                          <li class="child-line-row">
                            <x-Buttons.MenuButtons.SubMenuCardButton className="sub-menu-btn" dataURL="#" subMenuBtnId="{{ $data['filterBtnId'] }}">
                              <span class="btn-vertical-align">
                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                  <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                  <line x1="8" y1="12" x2="16" y2="12"/>
                                </svg>
                                <span class="pt-1">{{ $data['filterBtnLable'] }}</span>
                              </span>
                            </x-Buttons.MenuButtons.SubMenuCardButton>
                          </li>
                          @endforeach
                        </x-MenuCards.SubMenuCards.SubMenuCard>
                      </li>
                      <!-- Download-SubMenu -->
                      <li class="line-row dropdown-download-submenu-component-wrapper">
                        <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="downloadMenu">
                          <svg width="18" height="15" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 433.6">
                            <path fill="dodgerblue" fill-rule="nonzero" d="M359.785 124.707a172.966 172.966 0 00-9.415 5.044c-9.373 5.498-18.625 12.21-28.081 19.915l-20.169-23.081a166.847 166.847 0 0122.501-17.54 154.74 154.74 0 0119.918-11.042 148.086 148.086 0 018.33-3.876c-13.29-23.542-32.416-40.415-54.082-50.832-43.064-20.618-96.686-16.131-134.618 13.331-21.792 16.873-38.336 42.127-44.71 75.583l-2.002 10.456-10.415 1.835c-10.209 1.791-19.331 4.252-27.332 7.376-7.75 2.999-14.666 6.708-20.707 11.083-4.835 3.5-9.002 7.418-12.543 11.668-10.958 13.123-16.043 29.579-15.918 46.248.124 16.914 5.628 33.996 15.792 48.037 3.792 5.21 8.169 10.004 13.166 14.171a66.257 66.257 0 0017.211 10.333c6.374 2.623 13.415 4.496 21.207 5.581h11.335a148.445 148.445 0 00.763 30.668H97.417l-1.918-.167c-11.121-1.419-21.207-4.042-30.372-7.834-9.462-3.917-17.832-8.961-25.208-15.126-7-5.831-13.128-12.46-18.333-19.668C7.671 267.707.171 244.289.003 220.959c-.166-23.586 7.167-47.041 23.001-66.041 5.123-6.166 11.163-11.835 18.078-16.833 8.043-5.835 17.254-10.749 27.67-14.791 7.166-2.795 14.834-5.127 22.913-6.999 9.169-36.417 28.712-64.461 53.837-83.917C192.57-4.098 258.606-9.919 312.039 15.751c29.204 14.045 54.703 37.418 71.248 70.293 6.666-1.044 13.332-1.586 19.955-1.503 69.259.514 109.454 59.525 108.748 124.041-.292 26.293-7.374 52.46-21.874 71.706-9.457 12.544-21.583 22.792-36.124 30.918-13.999 7.834-30.331 13.79-48.664 18.042l-3.341.407a148.641 148.641 0 001.219-19.008c0-4.132-.179-8.221-.512-12.267 13.688-3.476 25.846-8.068 36.256-13.883 10.958-6.124 19.919-13.583 26.626-22.542 10.415-13.874 15.542-33.496 15.751-53.624.561-47.211-26.496-92.875-78.292-93.204-14.292-.126-29.167 3.332-43.25 9.58z"/>
                            <path fill="#3B95F6" d="M255.999 187.698c67.902 0 122.952 55.049 122.952 122.95 0 67.902-55.05 122.952-122.952 122.952-67.901 0-122.95-55.05-122.95-122.952 0-67.901 55.049-122.95 122.95-122.95z"/>
                            <path fill="#fff" fill-rule="nonzero" d="M206.424 299.319c-3.8.162-6.501 1.423-8.057 3.793-4.23 6.339 1.542 12.603 5.548 17.017 11.364 12.471 39.216 42.448 44.824 49.045 4.25 4.7 10.302 4.7 14.552 0 5.793-6.768 35.047-38.109 45.85-50.241 3.748-4.22 8.383-9.977 4.479-15.821-1.594-2.37-4.266-3.631-8.065-3.793h-23.069v-39.633c0-6.09-4.996-11.087-11.088-11.087H240.59c-6.095 0-11.088 4.99-11.088 11.087v39.633h-23.078z"/>
                          </svg>
                          <span class="ms-1">Download</span>
                        </x-Buttons.MenuButtons.MenuCardButton>
                        <x-MenuCards.SubMenuCards.SubMenuCard subMenuCardClass="dropdown-download-submenu-component submenu-card">
                          @foreach($subMenuDownloadBtns as $data)
                          <li class="child-line-row">
                            <x-Buttons.MenuButtons.SubMenuCardButton className="sub-menu-btn" dataURL="#" subMenuBtnId="{{ $data['downloadBtnId'] }}">
                              <span class="btn-vertical-align">
                                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                                  <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                                  <line x1="8" y1="12" x2="16" y2="12"/>
                                </svg>
                                <span class="pt-1">{{ $data['downloadBtnLable'] }}</span>
                              </span>
                            </x-Buttons.MenuButtons.SubMenuCardButton>
                          </li>
                          @endforeach
                        </x-MenuCards.SubMenuCards.SubMenuCard>
                      </li>
                      <!-- Menu Common Button -->
                      @foreach($commonMenuBtns as $data)
                      <li class="line-row">
                        <x-Buttons.MenuButtons.MenuCardButton className="menu-btn" dataURL="#" menuBtnId="{{ $data['commonBtnId'] }}">
                          @if($data['commonBtnId'] === 'dataPrint')
                          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>
                          </svg>
                          @elseif($data['commonBtnId'] === 'tableResize')
                          <svg width="15" height="15" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.88 122.88">
                            <defs><style>.cls-1{fill:dodgerblue;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:dodgerblue;}.cls-3{fill:#fff;}</style></defs>
                            <title>turn-off</title>
                            <path class="cls-1" d="M61.44,0A61.44,61.44,0,1,1,0,61.44,61.44,61.44,0,0,1,61.44,0Z"/>
                            <path class="cls-2" d="M61.44,2.25A59.15,59.15,0,0,1,120.59,61.4c0,.77,0,1.54,0,2.3a59.14,59.14,0,0,0-118.2,0c0-.76,0-1.53,0-2.3A59.15,59.15,0,0,1,61.44,2.25Z"/>
                            <path class="cls-3" d="M81,44.75a7.08,7.08,0,0,1,10.71-9.27,40,40,0,1,1-60.87.39A7.07,7.07,0,0,1,41.67,45,25.85,25.85,0,1,0,81,44.75ZM68.54,47.92a7.1,7.1,0,1,1-14.2,0V26.74a7.1,7.1,0,1,1,14.2,0V47.92Z"/>
                          </svg>
                          @endif
                          <span class="ms-2">{{ $data['menuBtnLable'] }}</span>
                        </x-Buttons.MenuButtons.MenuCardButton>
                      </li>
                      @endforeach
                      <!-- RAM Box -->
                      <li class="line-row">
                        <a type="button" class="menu-btn show-ram" dataURL="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                          <svg width="15px" height="15px" fill="rgba(0,123,255,0.8)" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 375.4">
                            <path fill-rule="nonzero" d="M25.13 39.95h34.22V0H85.2v39.95h47.65V0h25.84v39.95h47.64V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h34.23c6.88 0 13.15 2.82 17.71 7.37l.05.05c4.54 4.55 7.37 10.82 7.37 17.71v247.73c0 6.88-2.83 13.15-7.37 17.71l-.05.05c-4.56 4.54-10.83 7.37-17.71 7.37h-34.23v37.46H426.8v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.64v37.46h-25.84v-37.46H85.2v37.46H59.35v-37.46H25.13c-6.89 0-13.15-2.83-17.71-7.37l-.05-.05C2.83 325.96 0 319.69 0 312.81V65.08c0-6.89 2.83-13.16 7.37-17.71l.05-.05c4.56-4.55 10.82-7.37 17.71-7.37zm154.83 200.1h-35.98l-13.41-30.42h-8.56v30.42H90.83V137.84h51.52c23.44 0 35.16 11.94 35.16 35.81 0 16.36-5.07 27.15-15.21 32.38l17.66 34.02zm-57.95-77.57v23.5h9.05c3.93 0 6.79-.41 8.59-1.23 1.8-.82 2.7-2.7 2.7-5.64v-9.76c0-2.95-.91-4.83-2.7-5.64-1.8-.82-4.67-1.23-8.59-1.23h-9.05zm98.67 77.57h-34.5l26.49-102.21h50.53l26.49 102.21h-34.5l-3.76-16.19h-26.99l-3.76 16.19zm13.29-70.81-3.64 28.62h15.04l-3.48-28.62h-7.92zm96.93 70.81h-34.18l6.21-102.21h42.69l12.76 52h1.14l12.75-52h42.68l6.22 102.21h-34.18l-1.96-49.55h-1.15l-12.43 49.55h-25.01l-12.59-49.55h-.99l-1.96 49.55zM486.16 65.79H25.84V312.1h460.32V65.79z"/>
                          </svg>
                          <span class="ms-2">RAM Status</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <span class="menu-card-arrow"></span>
              </x-MenuCard.MenuCard>
            </span>
          </div>
          <div class="col-sm-3">
            <div class="search-column display_none">
              <x-Inputs.SearchInput.Search parentClass="input-search-box" childClass="icon-box" searchSvgWidth="20" searchSvgHeight="20" searchSvgFill="white" searchSvgStroke="rgb(170, 170, 170)" searchSvgStrokeWidth="2" 
                searchClass="form-control form-control-sm font-weight" searchType="search" searchName="search" searchPlaceHolder="Branch Search" searchId="search" searchValue=""
              />
              <button type="button" class="search-icon-btn search-layer"
                data-bs-toggle="tooltip"  data-bs-placement="right" title="Search" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' id="searchToast">
                <svg version="1.1" fill="dodgerblue" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 122.88 122.88" enable-background="new 0 0 122.88 122.88" xml:space="preserve">
                  <g>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M61.438,0c33.938,0,61.442,27.509,61.442,61.442S95.375,122.88,61.438,122.88 C27.509,122.88,0,95.376,0,61.442S27.509,0,61.438,0L61.438,0z M61.442,43.027c10.17,0,18.413,8.245,18.413,18.416 c0,10.17-8.243,18.413-18.413,18.413c-10.171,0-18.416-8.243-18.416-18.413C43.026,51.272,51.271,43.027,61.442,43.027 L61.442,43.027z M61.438,18.389c23.778,0,43.054,19.279,43.054,43.054s-19.275,43.049-43.054,43.049 c-23.77,0-43.049-19.274-43.049-43.049S37.668,18.389,61.438,18.389L61.438,18.389z"/>
                  </g>
                </svg>
              </button>
              <button type="button" class="btn-close-toast"
                data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="cancelSearchToast">
              </button>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="filter-column display_none">
              <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm select2" menuName="branch_type" menuId="selectBranchCategories" menuSelectLabel="Select Branch Type"></x-Dropdown.DropdownMenu>
              <button type="button" class="btn-close-toast"
               data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="cancelFilterToast">
              </button>
            </div>
          </div>
          <div class="col-sm-5">
            <!-- =========== Branch Record =========== -->
            <div class="card score-card">
              <div class="score-table-warpper">
                <div class="score-table-responsive">
                  <table class="table" id="branchScoreTable">
                    <thead>
                      <!-- Row 1 -->
                      <tr class="score-row">
                        <th class="score-column">
                          Total Category
                          <div class="score-row-resizer"></div>
                          <div class="score-col-resizer"></div>
                        </th>
                        <th class="score-column">
                          <span class="total-number" id="totalBranchCategories"></span>
                          <div class="score-row-resizer"></div>
                          <div class="score-col-resizer"></div>
                        </th>
                        <th class="score-column">
                          Total Branch
                          <div class="score-row-resizer"></div>
                          <div class="score-col-resizer"></div>
                        </th>
                        <th class="score-column">
                          <span class="total-number" id="totalBranch"></span>
                          <div class="score-row-resizer"></div>
                          <div class="score-col-resizer"></div>
                        </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </x-CustomTabPanels.TabPanelContents.TabContentPanelHeader>
      <!-- =========== Home Tab Content =========== -->
      <x-Tables.ViewDataTables.DataTableWrappers.DataTableWrapper wrapperClass="table-wrapper component-focus">
        <x-Tables.ViewDataTables.DataTableResponsives.DataTableResponsive tableResponsiveClass="table-responsive">
          <!-- ========== Branch-List Table =============== table-striped-->
          <div class="table-container" style="position: relative;">
            <!-- Loader Overlay -->
            <x-Tables.Icon.LoaderOverlay 
              tableOverlayClass="table-loader-overlay display_none" 
              loaderId="tableOverlayLoader" 
              loaderClass="data-table-loader" 
              loaderWidth="24" 
              loaderHeight="24" 
              loaderStroke="white" 
              loaderStrokeWidth="3" 
              loaderText="Loading...." 
              loaderTextClass="loader-text ms-1" 
              loaderFill="none"
            />
            <x-Tables.ViewDataTables.ViewDataTable tableClass="table" resizeTableId="BranchTableSetting">
              <x-Tables.ViewDataTables.DataTableHeads.DataTableHead className="table-head" >
                <x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow rowClass="table-head-row skeleton">
                  @foreach($headThRows as $data)
                    <th class="{{ $data['className'] }}" style="{{ $data['styleShow'] }}" data-coloumn="{{ $data['dataColumn'] }}" data-order="{{ $data['dataOrder'] }}" id="{{ $data['thId'] }}">
                      <i class="fa-solid fa-up-down-left-right {{ $data['moveIconDisplayClass'] }}" style="{{ $data['styles'] }}" id="{{ $data['headIconId'] }}"></i>
                      <span class="{{ $data['svgLable'] }}">
                        {{$data['label']}}
                        <x-Tables.TableHeadSvg svgWidth="12px" svgHeight="12px" svgFillColor="#333333a1" />
                      </span>
                      <div class="{{ $data['resizeRowClass'] }}"></div>
                      <div class="{{ $data['resizeColClass'] }}"></div>
                    </th>
                  @endforeach
                </x-Tables.ViewDataTables.DataTableHeads.DataTableHeadRow>
              </x-Tables.ViewDataTables.DataTableHeads.DataTableHead>
              <x-Tables.ViewDataTables.DataTableBody.TableBody bodyClassName="table-body table-light skeleton" tableId="BranchListTableBody">
              </x-Tables.ViewDataTables.DataTableBody.TableBody>
            </x-Tables.ViewDataTables.ViewDataTable>
          </div>
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
              selectedValue="2"
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
        <x-CustomLeftSideTabPanels.LeftSideTabPanelNavBars.LeftSideTabPanelNavBar className="nav flex-column nav-pills sidebar-plate" navBarId="v-pills-tab" navBarRole="tablist" ariaOrientation="vertical">
          <div class="icon-bar">
            <span class="list-icon">
              <span class="side-bar-text">
                <strong>Menu</strong>
                <input class="checkSideBar" type="checkbox" name="checking">
              </span>
            </span>
            <span class="icon-box">
              <div class="custom-side-bar-panel">
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
                <span class="side-bar-left-arrow"></span>
              </div>
            </span>
          </div>
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
            <div class="row drag-row">
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-setting-operation')
              </div>
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-setting-implement')
              </div>
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-setting-display')
              </div>
            </div>
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Category Setting -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-category" homeRole="tabpanel" ariaLabel="v-pills-category-tab" >
            <div class="row drag-row">
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-category-setting-operation')
              </div>
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-category-setting-implement')
              </div>
              <div class="col-sm-4 drag-column">
                @include('super-admin.branch._branch-category-setting-display')
              </div>
            </div>
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
          <!-- Search Setting -->
          <x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel className="tab-pane fade" homePanelId="v-pills-search" homeRole="tabpanel" ariaLabel="v-pills-search-tab" >
            ...
          </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.ContentPanels.ContentPanel>
        </x-CustomLeftSideTabPanels.LeftSideTabContentPanels.LeftSideTabContent>
      </x-CustomLeftSideTabPanels.LeftSideTabPanel>
    </x-CustomTabPanels.TabPanelContents.TabContentPanel>
  </div>
  
  <!-- RAM key Total Result -->
  <!-- <div id="ram-report-container"></div> -->
  <!-- RAM key detail view -->
  <!-- <div class="row mb-2">
    <div class="col-md-4">
      <input type="text" id="searchInput" class="form-control" placeholder="Search RAM Key / Table / Size">
    </div>
    <div class="col-md-2">
      <select class="form-control" id="tablePrefixFilter">
        <option value="">All Tables</option>
        <option value="BranchTableSetting">Branch Table Setting</option>
        <option value="BranchTableMenuCard">Branch Table Menu Card</option>
      </select>
    </div>
    <div class="col-md-2">
      <select class="form-control" id="perItems">
        <option value="10" selected>10</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="500">500</option>
      </select>
    </div>
  </div>
  <div class="mb-5">
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>SL</th>
          <th><a href="#" class="sort-link sort-button" data-field="ramKey">RAM Key</a></th>
          <th><a href="#" class="sort-link sort-button" data-field="table">Table</a></th>
          <th><a href="#" class="sort-link sort-button" data-field="size">Size (KB)</a></th>
        </tr>
      </thead>
      <tbody id="ramTableBody"></tbody>
    </table>
    <div class="d-flex justify-content-center mt-2" id="paginationControls"></div>
  </div> -->
  @include('loader.action-loader')
  @include('super-admin.branch._showRAMStatusTable')
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
              <a type="button" class="btn btn-sm danger-repl-btn branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
            </p>
            <p id="btn_group2">
              <a type="button" class="btn btn-sm success-shadow-btn yes_button branch-delete-skeleton" id="yesButton">
                <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="yes-btn-text">{{__('translate.Yes')}}</span>
              </a>
            </p>  
          @elseif($data['modal_id'] === 'deleteconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn branch-skeleton" 
              btnId="cancel_delete" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn delete_branch branch-skeleton" 
              btnId="delete_branch" 
              lableName="Confirm" 
              lableClass="delete-confrm-btn-text" 
              spinerClass="delete-confrm-icon"
            />
          @elseif($data['modal_id'] === 'updateconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn branch-skeleton" 
              btnId="cate_delete5" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn update_confirm branch-skeleton" 
              btnId="update_confirm" 
              lableName="Confirm" 
              lableClass="confirm-btn-text" 
              spinerClass="confirm-icon"
            />
          @elseif($data['modal_id'] === 'deletecategorybranch')
            <p id="btn_group">
              <a type="button" class="btn btn-sm danger-repl-btn branch-delete-skeleton" data-bs-dismiss="modal" id="noButton">No</a>
            </p>
            <p id="btn_group2">
              <a type="button" class="btn btn-sm success-shadow-btn yes_button branch-delete-skeleton" id="yesBtn">
                <span class="loading-yes-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
                <span class="yes-btn-text">{{__('translate.Yes')}}</span>
              </a>
            </p> 
          @elseif($data['modal_id'] === 'deletecategoryconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn branch-skeleton" 
              btnId="branch_type_delete_cancel" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn branch-skeleton" 
              btnId="branch_type_delete_confirm" 
              lableName="Confirm" 
              lableClass="delete-confrm-btn-text" 
              spinerClass="delete-confrm-icon"
            />
          @elseif($data['modal_id'] === 'updatecategoryconfirmbranch')
            <x-Modals.SmallModals.Buttons.CancelBtn 
              className="btn btn-sm danger-repl-btn branch-skeleton" 
              btnId="branch_type_delete_cancel" 
              lableName="Cancel"
            />  
            <x-Modals.SmallModals.Buttons.ConfirmBtn 
              className="btn btn-sm success-shadow-btn update_confirm branch-skeleton" 
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
<!-- <link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category-min.css"> -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/branch/branch.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/table/zebra-table/zebra-table.min.css">
<link rel="stylesheet" href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" />
@endsection

@push('scripts')
@include('fetch-api.branch.branch-division-district-upazila.ajax')
@include('super-admin.branch.ajax.branch-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script>
  $(document).ready(function () {
    $("#branchListPage").removeAttr('hidden');
    $("#branchListTab").removeAttr('hidden');

    // Branch List click
    $(document).on('click', '#branchList', function (e) {
      e.preventDefault();
      $("#BranchSettingPage").fadeOut("fast", function () {
        $(this).attr("hidden", true);
        $("#branchListTab").removeAttr("hidden").hide().fadeIn("fast");
      });
    });

    // Branch Setting click
    $(document).on('click', '#branchSettingPageView', function (e) {
      e.preventDefault();
      $("#branchListTab").fadeOut("fast", function () {
        $(this).attr("hidden", true);
        $("#BranchSettingPage").removeAttr("hidden").hide().fadeIn("fast");
      });
    });
  });
</script>
@endpush('scripts')
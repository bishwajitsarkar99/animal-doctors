@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="card panel-card" style="background:white;margin-bottom:5px;">
    <div class="card-body focus-color cd module_installions_card">
      <form autocomplete="off">
        @csrf
        <div class="row">
          <div class="col-xl-12">
            <div class="form-group button-box skeleton">
              <span class="panel-head">Module Installions</span>
              <x-Buttons.FormMediumButton 
                label="Refresh" 
                buttonParentClass="btn btn-sm success-shadow-btn" 
                buttonChildClass="" 
                buttonId="refresh" 
                iconClass="refresh-icon" 
                labelClass="refresh-btn-text ms-1"
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-12">
            <div class="form-group branch-info" id="moduleInstllations">
              <div class="table-wrapper">
                <div class="responsive component-focus mt-2">
                  <div class="table-container" style="position: relative;">
                    <x-Tables.Icon.LoaderOverlay 
                      tableOverlayClass="table-loader-overlay display_none" 
                      loaderId="loaderPage" 
                      loaderClass="data-menu-loader" 
                      loaderWidth="24" 
                      loaderHeight="24" 
                      loaderStroke="white" 
                      loaderStrokeWidth="3" 
                      loaderText="Loading...." 
                      loaderTextClass="loader-text ms-1" 
                      loaderFill="none"
                    />
                    <table class="table info_table" id="moduleInfosTable">
                      <thead>
                        <tr class="zebra-table-row">
                          <th class="branch_search_font label_position head-border lab_padding th-background cateogry-module"> 
                            <i class="fa-solid fa-up-down-left-right move-icon" style="color:gray;cursor:move;" id="moveIconId"></i>
                            <span>Module</span>
                            <div class="col-resizer"></div>
                            <div class="row-resizer"></div>
                          </th>
                          <th class="branch_search_font label_position head-border lab_padding th-background submodule"> 
                            <i class="fa-solid fa-up-down-left-right move-icon" style="color:gray;cursor:move;" id="moveIconId"></i>
                            <span>Sub Module</span> 
                            <div class="col-resizer"></div>
                            <div class="row-resizer"></div>
                          </th>
                          <th class="branch_search_font label_position head-border lab_padding th-background module-name"> 
                            <i class="fa-solid fa-up-down-left-right move-icon" style="color:gray;cursor:move;" id="moveIconId"></i>
                            <span>Parts Of Module</span> 
                            <div class="col-resizer"></div>
                            <div class="row-resizer"></div>
                          </th>
                          <th class="branch_search_font label_position head-border lab_padding th-background module-installions"> 
                            <i class="fa-solid fa-up-down-left-right move-icon" style="color:gray;cursor:move;" id="moveIconId"></i>
                            <span>Link URL</span>
                            <div class="col-resizer"></div>
                            <div class="row-resizer"></div>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="table-body" id="moduleTable">
                        <tr class="zebra-table-row">
                          <td class="first-init-column-border-cell">
                            <ul class="Grouping menu-responsive" id="categoryMenu">
                              @if($moduleCategories)
                                @foreach($moduleCategories as $item)
                                  <li class="select_list_category_menu" tabindex="0" data-value="{{ $item->id }}" id="select_list_category">
                                    <input class="module-checkbox category-module" type="checkbox" data-id="{{ $item->id }}" data-value="{{ $item->module_category_name }}" id="categoryCheck" disabled>
                                    <span class="label-text">{{ $item->module_category_name }}</span>
                                </li>
                                @endforeach
                              @else
                                <li id="errorPage">
                                  ⚠️ No module category found !
                                </li>
                              @endif
                            </ul>
                            <div class="row-resizer"></div>
                          </td>
                          <td class="second-init-column-border-cell sub-module-td-cell">
                            <x-Tables.Icon.LoaderOverlay 
                              tableOverlayClass="table-loader-overlay display_none" 
                              loaderId="loaderSecondMenu" 
                              loaderClass="data-menu-loader" 
                              loaderWidth="24" 
                              loaderHeight="24" 
                              loaderStroke="white" 
                              loaderStrokeWidth="3" 
                              loaderText="Loading...." 
                              loaderTextClass="loader-text ms-1" 
                              loaderFill="none"
                            />
                            <ul class="Grouping menu-responsive" id="subCategoryModule"></ul>
                            <div class="row-resizer"></div>
                          </td>
                          <td class="second-init-column-border-cell module-name-td-cell">
                            <x-Tables.Icon.LoaderOverlay 
                              tableOverlayClass="table-loader-overlay display_none" 
                              loaderId="loaderThirdMenu" 
                              loaderClass="data-menu-loader" 
                              loaderWidth="24" 
                              loaderHeight="24" 
                              loaderStroke="white" 
                              loaderStrokeWidth="3" 
                              loaderText="Loading...." 
                              loaderTextClass="loader-text ms-1" 
                              loaderFill="none"
                            />
                            <ul class="Grouping menu-responsive" id="moduleName"></ul>
                            <div class="row-resizer"></div>
                          </td>
                          <td class="second-init-column-border-cell installions-module-td-cell">
                            <ul class="Grouping menu-responsive" id="moduleInstall">
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>Auth</span>
                              </li>
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>Accounts</span>
                              </li>
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>Stock</span>
                              </li>
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>Marketing</span>
                              </li>
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>HRM</span>
                              </li>
                              <li>
                                <input class="module-checkbox" type="checkbox" data-id="" data-value="" id="categoryCheck">
                                <span>Inventory</span>
                              </li>
                            </ul>
                            <div class="row-resizer"></div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-xl-9"></div>
          <div class="col-xl-3">
            <div class="form-group right-align skeleton" id="category_module">
              <x-Buttons.FormMediumButton 
                label="Next" 
                buttonParentClass="btn btn-sm success-shadow-btn display_none" 
                buttonChildClass="" 
                buttonId="categoryNext" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
            </div>
            <div class="form-group right-align" id="sub_module" hidden>
              <x-Buttons.FormMediumButton 
                label="Back" 
                buttonParentClass="btn btn-sm success-shadow-btn me-4" 
                buttonChildClass="" 
                buttonId="back" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
              <x-Buttons.FormMediumButton 
                label="Next" 
                buttonParentClass="btn btn-sm success-shadow-btn" 
                buttonChildClass="" 
                buttonId="next" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
            </div>
            <div class="form-group right-align" id="module_name" hidden>
              <x-Buttons.FormMediumButton 
                label="Back" 
                buttonParentClass="btn btn-sm success-shadow-btn me-4" 
                buttonChildClass="" 
                buttonId="nameModuleBack" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
              <x-Buttons.FormMediumButton 
                label="Next" 
                buttonParentClass="btn btn-sm success-shadow-btn" 
                buttonChildClass="" 
                buttonId="nameModuleNext" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
            </div>
            <div class="form-group right-align" id="module_installions" hidden>
              <x-Buttons.FormMediumButton 
                label="Back" 
                buttonParentClass="btn btn-sm success-shadow-btn me-4" 
                buttonChildClass="" 
                buttonId="backSubModule" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
              <x-Buttons.FormMediumButton 
                label="Finish" 
                buttonParentClass="btn btn-sm success-shadow-btn" 
                buttonChildClass="" 
                buttonId="finish" 
                iconClass="add-icon" 
                labelClass="add-btn-text"
              />
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  @include('loader.action-loader')
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/module-asset/module.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
@include('module.module-installions.ajax.module-ajax')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI Auto-Complete or Date Picker -->
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
<script>
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
    fetchData();
    focuButton();
  }, 1000);
</script>
@endpush('scripts')
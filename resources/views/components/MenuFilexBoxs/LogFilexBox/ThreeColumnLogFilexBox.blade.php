<?php
    $group_flex_box=[
        ['groupCardId'=>'card-5','label'=>'Branch','filexBoxsearch'=>'searchBranch','inputPlaceholder'=>'Branch Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Disable','disableBtnId'=>'disableBtnBranch','buttonLabelTwo'=>'Enable','buttonLabelDownload'=>'Download','enableBtnId'=>'enableBtnBranch','downloadBtnId'=>'branchDownloadBtn','searchLabel'=>'search', 'flexGroupID'=>'branchFetchData','serachBtn'=>'branch-search-btn','enableCheck'=>'branch-check-point','enableSpin'=>'branchSpin','disableCheck'=>'branch-disable-check-point','disableSpin'=>'disableBranchSpin'],
        ['groupCardId'=>'card-6','label'=>'Role','filexBoxsearch'=>'searchRole','inputPlaceholder'=>'Role Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Disable','disableBtnId'=>'disableBtnRole','buttonLabelTwo'=>'Enable','buttonLabelDownload'=>'Download','enableBtnId'=>'enableBtnRole','downloadBtnId'=>'roleDownloadBtn','searchLabel'=>'search', 'flexGroupID'=>'roleFetchData','serachBtn'=>'role-search-btn','enableCheck'=>'role-check-point','enableSpin'=>'roleSpin','disableCheck'=>'role-check-disable-point','disableSpin'=>'disableRolechSpin'],
        ['groupCardId'=>'card-7','label'=>'Email','filexBoxsearch'=>'searchEmail','inputPlaceholder'=>'Email Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Disable','disableBtnId'=>'disableBtnEmail','buttonLabelTwo'=>'Enable','buttonLabelDownload'=>'Download','enableBtnId'=>'enableBtnEmail','downloadBtnId'=>'emailDownloadBtn','searchLabel'=>'search', 'flexGroupID'=>'emailFetchData','serachBtn'=>'email-search-btn','enableCheck'=>'email-check-point','enableSpin'=>'emailSpin','disableCheck'=>'email-check-disable-point','disableSpin'=>'disableEmailSpin'],
    ]; 
?>
<div id="card-container">
    <div class="row drag-row">
        @foreach($group_flex_box as $data)
        <div class="col-xl-4 drag-column">
            <!-- Cards go here -->
            <div class="card filex-column-card group-card" draggable="true" id="{{ $data['groupCardId'] }}">
                <div class="card-header filex-column-card-header filex-group">
                    <span class="move-icon">
                        <svg viewBox="0 0 24 24" width="18" height="14" stroke="darkcyan" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                    </span>
                    <span class="card-label pt-1">
                        <span>{{ $data['label'] }}</span>
                    </span>
                    <x-Dropdown.FilterBox filterBox="" filterWidth="24" filterHeight="18" filterStroke="rgb(194, 194, 194)" filterStrokeWidth="2" filterFill="white" />
                    <span class="search-box dropstart">
                        <span class="input-search-box">
                            <span class="filex-search-icon-box">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(194, 194, 194)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"/>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                            </span>
                            <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="{{ $data['inputPlaceholder'] }}" id="{{ $data['filexBoxsearch'] }}" autoComplete="off" />
                        </span>
                    </span>
                </div>
                <div class="card-body filex-column-card-body">
                    <input type="hidden" id="selectedBranchId" value="">
                    <input type="hidden" id="selectedRoleId" value="">
                    <input type="hidden" id="selectedEmailId" value="">
                    <ul class="first-filex-group" id="{{ $data['flexGroupID'] }}"></ul>
                </div>
                <div class="card-footer filex-column-card-footer">
                    <div class="group-filex-button">
                        <button type="button" class="{{ $data['buttonClass'] }}" id="{{ $data['disableBtnId'] }}" hidden>
                            <i class="fa-solid fa-check {{ $data['disableCheck'] }}" style="color:white;" hidden></i>
                            {{ $data['buttonLabelOne'] }}
                        </button>
                        <div class="spinner-border text-success spinner-width" role="status" id="{{ $data['disableSpin'] }}" hidden>
                            <span class="visually-hidden"></span>
                        </div>
                        <button type="button" class="{{ $data['buttonClass'] }}" id="{{ $data['enableBtnId'] }}">
                            <i class="fa-solid fa-check {{ $data['enableCheck'] }}" style="color:white;" hidden></i>
                            {{ $data['buttonLabelTwo'] }}
                        </button>
                        <div class="spinner-border text-success spinner-width" role="status" id="{{ $data['enableSpin'] }}" hidden>
                            <span class="visually-hidden"></span>
                        </div>
                        <button type="button" class="{{ $data['buttonClass'] }}" id="{{ $data['downloadBtnId'] }}" hidden>
                            {{ $data['buttonLabelDownload'] }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <svg id="lineConnectorId_{{ $data['groupCardId'] }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none; z-index: 10;"></svg>
</div>
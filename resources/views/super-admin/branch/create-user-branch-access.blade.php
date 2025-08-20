<div class="row">
    <div class="card-body focus-color cd user_access_branch_form skeleton">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-xl-12">
                    @if(auth()->user()->role ==1)
                    <div class="form-group role_nme">
                        <span class="input-label"><label class="group-field-label label_position" for="mail-transport">Searching...</label></span>
                        <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm search_all_branch select2" menuName="branch_name" menuId="search_branch_all" menuSelectLabel="Select Company Branch Name"></x-Dropdown.DropdownMenu>
                        <input type="hidden" id="branches_id">
                    </div>
                    @endif
                    @if(auth()->user()->role ==3)
                    <div class="form-group mb-1 role_nme">
                        <span class="input-label"><label class="group-field-label label_position" for="mail-transport">Searching...</label></span>
                        <x-Dropdown.DropdownMenu menuType="text" menuClass="form-control form-control-sm search_branch select2" menuName="branch_name" menuId="search_branch" menuSelectLabel="Select Company Branch Name"></x-Dropdown.DropdownMenu>
                        <input type="hidden" id="branches_id">
                    </div>
                    @endif
                    <div class="form-group button-box">
                        <x-Buttons.FormMediumButton 
                            label="Refresh" 
                            buttonParentClass="btn btn-sm success-shadow-btn" 
                            buttonChildClass="" 
                            buttonId="refresh" 
                            iconClass="refresh-icon" 
                            labelClass="refresh-btn-text ms-1"
                        />
                        @if(auth()->user()->role ==1)
                            <x-Buttons.FormMediumButton 
                                label="Branch Change" 
                                buttonParentClass="btn btn-sm success-shadow-btn ms-2" 
                                buttonChildClass="" 
                                buttonId="branch_change_btn" 
                                iconClass="confirm-icon" 
                                labelClass="confirm-btn-text"
                            />
                        @endif
                        <x-Buttons.FormMediumButton 
                            label="Permission" 
                            buttonParentClass="btn btn-sm success-shadow-btn ms-2" 
                            buttonChildClass="" 
                            buttonId="pagePermision" 
                            iconClass="permission-page-icon" 
                            labelClass="permission-page-btn-text"
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group branch-info" id="branchInfo" hidden>
                        <div class="table-wrapper">
                            <div class="table-responsive component-focus mt-2">
                                <div class="table-container" style="position: relative;">
                                <table class="table info_table" id="userBranchInfosTable">
                                    <thead>
                                        <tr class="zebra-table-row">
                                            <th class="branch_search_font label_position head-border lab_padding th-bg" style="text-align: right;"> 
                                                <svg width="30px" height="15px" fill="#666" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 101.61" style="enable-background:new 0 0 122.88 101.61" xml:space="preserve">
                                                    <g>
                                                        <path d="M15.28,46.33h30V4.44c0-2.45,1.99-4.44,4.44-4.44c2.45,0,4.44,1.99,4.44,4.44v92.72c0,2.45-1.99,4.44-4.44,4.44 c-2.45,0-4.44-1.99-4.44-4.44V55.21H15.07l15.15,15.28c1.72,1.73,1.72,4.54-0.02,6.26c-1.73,1.72-4.54,1.72-6.26-0.02L1.29,53.89 l0,0l-0.01-0.01c-0.05-0.05-0.09-0.09-0.13-0.14l-0.01-0.01l-0.06-0.07l-0.02-0.02l-0.05-0.06l-0.02-0.03l-0.02-0.02l-0.05-0.07 l0,0L0.87,53.4l-0.02-0.02l-0.01-0.02l-0.05-0.07l-0.01-0.02l-0.05-0.07l0,0l-0.04-0.07L0.66,53.1l-0.01-0.02l-0.04-0.07 l-0.01-0.02l-0.02-0.03l-0.04-0.06l0,0L0.5,52.82l-0.01-0.02l-0.04-0.08l0,0l-0.04-0.08L0.4,52.62l-0.03-0.06l-0.01-0.03L0.35,52.5 l-0.03-0.08L0.31,52.4l-0.03-0.08L0.27,52.3l-0.03-0.08l0-0.01c-0.02-0.06-0.04-0.13-0.06-0.19l0-0.01l-0.02-0.08l-0.01-0.02 l-0.01-0.02l-0.02-0.08l-0.02-0.1l0-0.01l-0.02-0.1l0-0.01l-0.01-0.07L0.06,51.5l0-0.02l-0.01-0.08l0-0.02l-0.01-0.08l0,0 L0.02,51.2l0-0.01l0-0.02l-0.01-0.08l0-0.01C0.01,51,0,50.93,0,50.87l0-0.01l0-0.09v-0.02l0-0.08l0-0.02l0-0.02l0-0.08l0-0.02 l0.01-0.08l0,0l0.01-0.09l0-0.01c0.01-0.1,0.02-0.21,0.04-0.31l0.02-0.09l0-0.02c0.02-0.1,0.04-0.2,0.07-0.3l0,0l0.02-0.08 l0.01-0.03l0.01-0.02l0.02-0.08l0.01-0.02l0.03-0.08l0.01-0.02l0.03-0.08l0-0.01c0.04-0.1,0.08-0.19,0.12-0.28l0.01-0.01 c0.03-0.06,0.06-0.12,0.09-0.17l0.01-0.02l0.01-0.02l0.04-0.07l0.01-0.02l0.04-0.07c0.03-0.05,0.06-0.11,0.1-0.16l0.02-0.03 l0.01-0.02l0.05-0.07l0-0.01c0.04-0.06,0.08-0.11,0.12-0.16l0.01-0.01L1,47.97v0l0.07-0.08l0.01-0.01l0.04-0.05l0.05-0.05l0,0 l0.06-0.06l0.02-0.02l0.06-0.06l0,0l0.01-0.01L23.97,25.4c1.74-1.71,4.55-1.69,6.26,0.05c1.71,1.74,1.69,4.55-0.05,6.26 L15.28,46.33L15.28,46.33z M67.86,4.44C67.86,1.99,69.85,0,72.3,0c2.45,0,4.44,1.99,4.44,4.44v41.89h30.86L92.7,31.72 c-1.74-1.71-1.77-4.52-0.05-6.26c1.71-1.74,4.52-1.77,6.26-0.05l22.65,22.21l0.01,0.01l0,0l0.06,0.06l0.02,0.02l0.06,0.06l0,0 l0.05,0.05l0.04,0.05l0.01,0.01l0.07,0.08v0l0.07,0.08l0.01,0.01c0.04,0.05,0.08,0.11,0.12,0.16l0,0.01l0.05,0.07l0.01,0.02 l0.02,0.03c0.03,0.05,0.07,0.11,0.1,0.16l0.04,0.07l0.01,0.02l0.04,0.07l0.01,0.02l0.01,0.02c0.03,0.06,0.06,0.12,0.09,0.17 l0.01,0.01c0.04,0.09,0.08,0.19,0.12,0.28l0,0.01l0.03,0.08l0.01,0.02l0.03,0.08l0.01,0.02l0.02,0.08l0.01,0.02l0.01,0.03 l0.02,0.08l0,0c0.03,0.1,0.05,0.2,0.07,0.3l0,0.02l0.02,0.09c0.02,0.1,0.03,0.21,0.04,0.31l0,0.01l0.01,0.09l0,0l0.01,0.08l0,0.02 l0,0.08l0,0.02l0,0.02l0,0.08v0.02l0,0.09l0,0.01c0,0.07,0,0.13-0.01,0.2l0,0.01l-0.01,0.08l0,0.02l0,0.01l-0.01,0.09l0,0 l-0.01,0.08l0,0.02l-0.01,0.08l0,0.02l-0.01,0.03l-0.01,0.07l0,0.01l-0.02,0.1l0,0.01l-0.02,0.1l-0.02,0.08l-0.01,0.02l-0.01,0.02 l-0.02,0.08l0,0.01c-0.02,0.06-0.04,0.13-0.06,0.19l0,0.01l-0.03,0.08l-0.01,0.02l-0.03,0.08l-0.01,0.02l-0.03,0.08l-0.01,0.02 l-0.01,0.03l-0.03,0.06l-0.01,0.02l-0.04,0.08l0,0l-0.04,0.08l-0.01,0.02l-0.04,0.07l0,0l-0.04,0.06l-0.02,0.03l-0.01,0.02 l-0.04,0.07l-0.01,0.02l-0.01,0.02l-0.04,0.07l0,0l-0.05,0.07l-0.01,0.02l-0.05,0.07l-0.01,0.02l-0.02,0.02l-0.05,0.06l0,0 l-0.05,0.07l-0.02,0.02l-0.02,0.03l-0.05,0.06l-0.02,0.02l-0.06,0.07l-0.01,0.01c-0.04,0.05-0.09,0.1-0.13,0.14l-0.01,0.01l0,0 L98.94,76.73c-1.72,1.73-4.53,1.74-6.26,0.02c-1.73-1.72-1.74-4.53-0.02-6.26l15.15-15.28H76.74v41.96c0,2.45-1.99,4.44-4.44,4.44 c-2.45,0-4.44-1.99-4.44-4.44V4.44L67.86,4.44z M122.16,48.35c0.03,0.05,0.07,0.11,0.1,0.16L122.16,48.35L122.16,48.35z"/>
                                                    </g>
                                                </svg>
                                                <div class="col-resizer"></div>
                                                <div class="row-resizer"></div>
                                            </th>
                                            <th class="branch_search_font label_position head-border lab_padding th-bg"> 
                                                Branch Information 
                                                <div class="col-resizer"></div>
                                                <div class="row-resizer"></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-body">
                                        <tr class="zebra-table-row">
                                            <td class="first-init-column-border-cell">
                                                <span class="tb_lb" id="brnch_id" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                            <td class="second-init-column-border-cell">
                                                <span class="tb_lb" id="district_id" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                        </tr>
                                        <tr class="zebra-table-row">
                                            <td class="first-column-border-cell">
                                                <span class="tb_lb" id="branch_type" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                            <td class="second-column-border-cell">
                                                <span class="tb_lb" id="upazila_id" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                        </tr>
                                        <tr class="zebra-table-row">
                                            <td class="first-column-border-cell">
                                                <span class="tb_lb" id="branch_name" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                            <td class="second-column-border-cell">
                                                <span class="tb_lb" id="town_name" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                        </tr>
                                        <tr class="zebra-table-row">
                                            <td class="first-column-border-cell">
                                                <span class="tb_lb" id="division_id" disabled></span>
                                                <div class="row-resizer"></div>
                                            </td>
                                            <td class="second-column-border-cell">
                                                <span class="tb_lb" id="location" disabled></span>
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="form-group right-align" id="add_accss" hidden>
                        <x-Buttons.FormMediumButton 
                            label="Cancel" 
                            buttonParentClass="btn btn-sm danger-repl-btn me-2" 
                            buttonChildClass="" 
                            buttonId="cancel_of_btn" 
                            iconClass="cancel-of-icon" 
                            labelClass="cancel-of-btn-text"
                        />
                        <x-Buttons.FormMediumButton 
                            label="ADD Access" 
                            buttonParentClass="btn btn-sm success-shadow-btn" 
                            buttonChildClass="" 
                            buttonId="add" 
                            iconClass="add-icon" 
                            labelClass="add-btn-text"
                        />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    $colaspeRow = [
        ['module_id'=>'1', 'group_id'=>'branch_module', 'groupClass'=>'group-ram', 'colaspeRowId'=>'branchModuleRam', 'colaspeTargetBtnId'=>'#tableContainer', 'colaspeBtnLabel'=>'Branch Module', 'colaspeIcon'=>'▼', 
        'colaspeContainerId'=>'tableContainer', 'tableId'=>'ramUsageTable', 'totalRAM'=>'totalRAMSize', 'sortTimeBtn'=>"renderRAMUsage('time')", 'sortSizeBtn'=>"renderRAMUsage('size')", 'sortResetBtn'=>"renderRAMUsage()", 'headIconId'=>'moveIconId', 
        'moveIconDisplayClass'=>'move-icon',  'styles'=>'color:gray;cursor:move;margin-top: 1px;',
        ],
        ['module_id'=>'2', 'group_id'=>'product_module', 'groupClass'=>'group-ram', 'colaspeRowId'=>'branchModuleRam', 'colaspeTargetBtnId'=>'#tablesContainer', 'colaspeBtnLabel'=>'Product Module', 'colaspeIcon'=>'▼', 
        'colaspeContainerId'=>'tablesContainer', 'tableId'=>'ramUsageTable', 'totalRAM'=>'totalRAMSize', 'sortTimeBtn'=>"renderRAMUsage('time')", 'sortSizeBtn'=>"renderRAMUsage('size')", 'sortResetBtn'=>"renderRAMUsage()", 'headIconId'=>'moveIconId', 
        'moveIconDisplayClass'=>'move-icon',  'styles'=>'color:gray;cursor:move;margin-top: 1px;',
        ],
    ];
?>
<div class="offcanvas offcanvas-end custom-offcanvas offcanvas-rom-card offcanvas-hidden component-focus" data-bs-backdrop="static" tabindex="-1" id="offcanvasRom" aria-labelledby="offcanvasRightLabel">
    <div class="panel-width-resizer left-resizer"></div>
    <svg class="connector" width="100%" height="100%">
        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg>
    <x-CustomOffCanvas.OffCanvasHeader className="offcanvas-header custom-offcanvas-header">
        <div class="head setting-head">
            <span class="logo-status">
                <svg width="50px" height="30px" fill="#b089ff" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 375.4">
                    <path fill-rule="nonzero" d="M25.13 39.95h34.22V0H85.2v39.95h47.65V0h25.84v39.95h47.64V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h34.23c6.88 0 13.15 2.82 17.71 7.37l.05.05c4.54 4.55 7.37 10.82 7.37 17.71v247.73c0 6.88-2.83 13.15-7.37 17.71l-.05.05c-4.56 4.54-10.83 7.37-17.71 7.37h-34.23v37.46H426.8v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.64v37.46h-25.84v-37.46H85.2v37.46H59.35v-37.46H25.13c-6.89 0-13.15-2.83-17.71-7.37l-.05-.05C2.83 325.96 0 319.69 0 312.81V65.08c0-6.89 2.83-13.16 7.37-17.71l.05-.05c4.56-4.55 10.82-7.37 17.71-7.37zm153.11 200.1h-35.98l-13.41-30.42h-8.56v30.42H89.12V137.84h51.51c23.44 0 35.16 11.94 35.16 35.81 0 16.36-5.07 27.15-15.21 32.38l17.66 34.02zm-57.95-77.57v23.5h9.05c3.93 0 6.79-.41 8.59-1.23 1.8-.82 2.7-2.7 2.7-5.64v-9.76c0-2.95-.91-4.83-2.7-5.64-1.8-.82-4.67-1.23-8.59-1.23h-9.05zm212.33 77.57h-34.18l6.21-102.21h42.68l12.76 52h1.14l12.76-52h42.68l6.21 102.21h-34.17l-1.96-49.55h-1.15l-12.43 49.55h-25.02l-12.59-49.55h-.98l-1.96 49.55zm-142.93-51.02c0-18.65 3.49-32.25 10.47-40.8 6.97-8.56 19.56-12.84 37.77-12.84 18.21 0 30.8 4.28 37.78 12.84 6.97 8.55 10.46 22.15 10.46 40.8 0 9.26-.73 17.06-2.2 23.38-1.48 6.32-4.01 11.83-7.61 16.52-3.6 4.69-8.56 8.12-14.88 10.3-6.33 2.18-14.17 3.27-23.55 3.27s-17.22-1.09-23.55-3.27c-6.32-2.18-11.28-5.61-14.88-10.3-3.6-4.69-6.13-10.2-7.6-16.52-1.47-6.32-2.21-14.12-2.21-23.38zm35.16-17.01v42.52h13.57c4.47 0 7.71-.52 9.73-1.56 2.02-1.03 3.03-3.4 3.03-7.11v-42.52h-13.74c-4.36 0-7.55.52-9.57 1.56-2.01 1.03-3.02 3.4-3.02 7.11zM486.16 65.79H25.84V312.1h460.32V65.79z"/>
                </svg>
            </span>
            <x-CustomOffCanvas.OffCanvasHeadTitle headClass="head_auth profile-heading mt-2" headId="offcanvasRightLabel" headLable="ROM Usage" />
        </div>
        <x-CustomOffCanvas.OffCanvasCloseBtn closeBtnClass="btn-close text-reset offcanvas-btn-close rom-btn-close" />
    </x-CustomOffCanvas.OffCanvasHeader>
    <x-CustomOffCanvas.OffCanvasBody bodyClassName="offcanvas-body">
        <div class="total-capacity">
            <div class="ram-space" id="totalUsage"></div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-12">
                <select class="form-select" size="3" aria-label="size 3 select example" id="tablePrefixFilter">
                    <option class="custom-select-optation" selected>Open Select Menu</option>
                    <option class="custom-select-optation" value="">All Tables</option>
                    <option class="custom-select-optation" value="BranchTableSetting">Branch Table Setting</option>
                    <option class="custom-select-optation" value="BranchTableMenuCard">Branch Table Menu Card</option>
                </select>
            </div>
        </div>
        <div class="card ram-card drag-ram-row mb-1" data-module="" id="cardDailouge">
            <div class="card-content-area">
                <div class="" id="">
                    <div class="row-btn-labe" id="ram-report-container"></div>
                    <ul class="box-container" id="romTable">
                        <li class="box-container-row">
                            <!-- ======= RAM Usage Status image-skeleton =========== -->
                            <div class="card panel" id="tableBox">
                                <div class="row mb-1">
                                    <div class="col-sm-9">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Search RAM Key / Table / Size">
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="flat-box">
                                            <select class="form-control btn btn-sm success-shadow-btn sortBtn" id="perItems">
                                                <option value="10" selected>10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="500">500</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="ram-usage-section">
                                    <div class="table-container">
                                        <div class="table-responsive">
                                            <table class="table" id="">
                                                <thead class="table-head" id="headId">
                                                    <tr class="table-head-row">
                                                        <th class="th-column">
                                                            S.N
                                                            <div class="row-resizer"></div>
                                                            <div class="col-resizer"></div>
                                                        </th>
                                                        <th class="th-column">
                                                            ROM Key
                                                            <div class="row-resizer"></div>
                                                            <div class="col-resizer"></div>
                                                        </th>
                                                        <th class="th-column">
                                                            ROM File
                                                            <div class="row-resizer"></div>
                                                            <div class="col-resizer"></div>
                                                        </th>
                                                        <th class="th-column">
                                                            Size
                                                            <div class="row-resizer"></div>
                                                            <div class="col-resizer"></div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-body" id="ramTableBody"></tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2" id="paginationControls"></div>
                                    </div>
                                </div>
                                <div class="panel-height-resizer bottom-resizer"></div>
                                <svg class="connector" width="100%" height="100%">
                                    <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
                                </svg>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <x-CustomOffCanvas.OffCanvasLoader loaderClass="side_canvas_animation" animationClass="sidebar-animation-size" />
    </x-CustomOffCanvas.OffCanvasBody>
</div>
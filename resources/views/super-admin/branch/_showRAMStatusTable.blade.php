<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="panel-width-resizer left-resizer"></div>
    <svg class="connector" width="100%" height="100%">
        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg>
    <x-CustomOffCanvas.OffCanvasHeader className="offcanvas-header custom-offcanvas-header">
        <div class="head setting-head">
            <div class="logo_size">
              <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
            </div>
            <x-CustomOffCanvas.OffCanvasHeadTitle headClass="head_auth profile-heading mt-2" headId="offcanvasRightLabel" headLable="Settings" />
        </div>
        <x-CustomOffCanvas.OffCanvasCloseBtn closeBtnClass="btn-close text-reset offcanvas-btn-close setting-btn-close" />
    </x-CustomOffCanvas.OffCanvasHeader>
    <x-CustomOffCanvas.OffCanvasBody bodyClassName="offcanvas-body">
        <li class="child-line-row block-space">
            <x-Buttons.MenuButtons.SubMenuCardButton className="canvas-link-btn" dataURL="#" subMenuBtnId="#">
                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
                <span class="lable-name">App Settings</span>
            </x-Buttons.MenuButtons.SubMenuCardButton>
        </li>
        <ul class="box-container">
            <li class="child-line-row text-space">
                <span class="card-lable-name">RAM Status</span>
            </li>
            <li class="box-container-row">
                <!-- ======= RAM Usage Status image-skeleton offcanvas-ram-card offcanvas-hidden =========== -->
                <div class="card panel component-focus" id="tableBox">
                    <div class="row">
                        <div class="col-sm-8 element-space">
                        <span class="body-heading">
                            <span>
                            <svg width="40px" height="25px" fill="rgba(0,123,255,0.8)" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 375.4">
                                <path fill-rule="nonzero" d="M25.13 39.95h34.22V0H85.2v39.95h47.65V0h25.84v39.95h47.64V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h34.23c6.88 0 13.15 2.82 17.71 7.37l.05.05c4.54 4.55 7.37 10.82 7.37 17.71v247.73c0 6.88-2.83 13.15-7.37 17.71l-.05.05c-4.56 4.54-10.83 7.37-17.71 7.37h-34.23v37.46H426.8v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.64v37.46h-25.84v-37.46H85.2v37.46H59.35v-37.46H25.13c-6.89 0-13.15-2.83-17.71-7.37l-.05-.05C2.83 325.96 0 319.69 0 312.81V65.08c0-6.89 2.83-13.16 7.37-17.71l.05-.05c4.56-4.55 10.82-7.37 17.71-7.37zm154.83 200.1h-35.98l-13.41-30.42h-8.56v30.42H90.83V137.84h51.52c23.44 0 35.16 11.94 35.16 35.81 0 16.36-5.07 27.15-15.21 32.38l17.66 34.02zm-57.95-77.57v23.5h9.05c3.93 0 6.79-.41 8.59-1.23 1.8-.82 2.7-2.7 2.7-5.64v-9.76c0-2.95-.91-4.83-2.7-5.64-1.8-.82-4.67-1.23-8.59-1.23h-9.05zm98.67 77.57h-34.5l26.49-102.21h50.53l26.49 102.21h-34.5l-3.76-16.19h-26.99l-3.76 16.19zm13.29-70.81-3.64 28.62h15.04l-3.48-28.62h-7.92zm96.93 70.81h-34.18l6.21-102.21h42.69l12.76 52h1.14l12.75-52h42.68l6.22 102.21h-34.18l-1.96-49.55h-1.15l-12.43 49.55h-25.01l-12.59-49.55h-.99l-1.96 49.55zM486.16 65.79H25.84V312.1h460.32V65.79z"/>
                            </svg>
                            </span>
                            RAM Usage Status
                        </span>
                        <span class="body-heading" id="totalRAMSize"></span>
                        </div>
                        <div class="col-sm-4">
                        <div class="button-set">
                            <button class="btn btn-sm success-shadow-btn sortBtn" onclick="renderRAMUsage('time')">
                            Sort by Time
                            </button>
                            <button class="btn btn-sm success-shadow-btn sortBtn" onclick="renderRAMUsage('size')">
                            Sort by Size
                            </button>
                            <button class="btn btn-sm success-shadow-btn sortBtn" onclick="renderRAMUsage()">
                            Reset Sort
                            </button>
                            <button type="button" class="btn-close-toast"
                            data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Close')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-danger"></div>' id="cancelRAMStatusTable">
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="ram-usage-section">
                        <div class="table-container">
                        <div class="table-responsive">
                            <table class="table" id="ramUsageTable">
                            <thead class="table-head" id="headId">
                                <tr class="table-head-row">
                                <th class="th-column">
                                    RAM File
                                    <div class="row-resizer"></div>
                                    <div class="col-resizer"></div>
                                </th>
                                <th class="th-column">
                                    RAM Store Size
                                    <div class="row-resizer"></div>
                                    <div class="col-resizer"></div>
                                </th>
                                <th class="th-column">
                                    RAM Perfomance
                                    <div class="row-resizer"></div>
                                    <div class="col-resizer"></div>
                                </th>
                                <th class="th-column">
                                    RAM Execution Time
                                    <div class="row-resizer"></div>
                                    <div class="col-resizer"></div>
                                </th>
                                </tr>
                            </thead>
                            <tbody class="table-body" id="RAMTable"></tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="panel-height-resizer bottom-resizer"></div>
                    <svg class="connector" width="100%" height="100%">
                        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
                    </svg>
                </div>
            </li>
        </ul>
        <x-CustomOffCanvas.OffCanvasLoader loaderClass="side_canvas_animation" animationClass="sidebar-animation-size" />
    </x-CustomOffCanvas.OffCanvasBody>
</div>
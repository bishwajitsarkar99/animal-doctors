<x-CustomOffCanvas.OffCanvas className="offcanvas offcanvas-end custom-offcanvas offcanvas-hidden offcanvas-setting-card" offCanvasId="offcanvasRightSettings">
    <div class="panel-width-resizer left-resizer"></div>
    <svg class="connector" width="100%" height="100%">
        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg>
    <x-CustomOffCanvas.OffCanvasHeader className="offcanvas-header custom-offcanvas-header">
        <div class="head">
            <div class="logo_size">
              <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
            </div>
            <x-CustomOffCanvas.OffCanvasHeadTitle headClass="head_auth mt-2" headId="offcanvasRightLabel" headLable="Settings" />
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
            <span class="lable-name">Panel Background</span>
        </li>
        <ul class="box-container">
            <li class="box-row mt-2">
                <div class="card box-card">
                    <div class="card-body box-card-body">
                        <div class="panel-img-box">
                            <img class="panel-img-size" src="{{ asset('/image/panel-image/blue-panel.png') }}" alt="setting-logo">
                        </div>
                        <div class="form-check form-switch check-box">
                            <input class="form-check-input panel-checked" type="checkbox" id="bluePanelChecked">
                            <label class="form-check-label rl-lable-class" for="bluePanelChecked">Checked Blue Panel Mode</label>
                        </div>
                    </div>
                </div>
            </li>
            <li class="box-row mt-2">
                <div class="card box-card">
                    <div class="card-body box-card-body">
                        <div class="panel-img-box">
                            <img class="panel-img-size" src="{{ asset('/image/panel-image/blue-panel.png') }}" alt="setting-logo">
                        </div>
                        <div class="form-check form-switch check-box">
                            <input class="form-check-input panel-checked" type="checkbox" id="bluePanelChecked">
                            <label class="form-check-label rl-lable-class" for="bluePanelChecked">Checked Dark Panel Mode</label>
                        </div>
                    </div>
                </div>
            </li>
            <li class="box-row mt-2">
                <div class="card box-card">
                    <div class="card-body box-card-body">
                        <div class="panel-img-box">
                            <img class="panel-img-size" src="{{ asset('/image/panel-image/blue-panel.png') }}" alt="setting-logo">
                        </div>
                        <div class="form-check form-switch check-box">
                            <input class="form-check-input panel-checked" type="checkbox" id="bluePanelChecked">
                            <label class="form-check-label rl-lable-class" for="bluePanelChecked">Checked White Panel Mode</label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <x-CustomOffCanvas.OffCanvasLoader loaderClass="side_canvas_animation" animationClass="sidebar-animation-size" />
    </x-CustomOffCanvas.OffCanvasBody>
</x-CustomOffCanvas.OffCanvas>
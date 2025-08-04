<?php
    $groupCards = [
        ['canvasId'=>'blueMode', 'lineClass'=>'box-row image-skeleton drag-canvas-column mt-2', 'className'=>'card box-card group-canvas', 'image'=>asset('/image/panel-image/blue-panel.png'), 'checkBtnId'=>'bluePanelChecked', 'checkLable'=> 'Checked Blue Panel Mode', 'lableFor'=>'bluePanelChecked'],
        ['canvasId'=>'darkMode', 'lineClass'=>'box-row image-skeleton drag-canvas-column mt-2', 'className'=>'card box-card group-canvas', 'image'=>asset('/image/panel-image/blue-panel.png'), 'checkBtnId'=>'darkPanelChecked', 'checkLable'=> 'Checked Dark Panel Mode', 'lableFor'=>'darkPanelChecked'],
        ['canvasId'=>'whiteMode', 'lineClass'=>'box-row image-skeleton drag-canvas-column mt-2', 'className'=>'card box-card group-canvas', 'image'=>asset('/image/panel-image/blue-panel.png'), 'checkBtnId'=>'whitePanelChecked', 'checkLable'=> 'Checked White Panel Mode', 'lableFor'=>'whitePanelChecked']
    ];
?>
<x-CustomOffCanvas.OffCanvas className="offcanvas offcanvas-end custom-offcanvas offcanvas-hidden offcanvas-setting-card" offCanvasId="offcanvasRightSettings">
    <div class="panel-width-resizer left-resizer"></div>
    <svg class="connector" width="100%" height="100%">
        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg>
    <x-CustomOffCanvas.OffCanvasHeader className="offcanvas-header custom-offcanvas-header">
        <div class="head setting-head image-skeleton">
            <div class="logo_size">
              <img src="{{ asset('/image/setting-two.png') }}" alt="setting-logo">
            </div>
            <x-CustomOffCanvas.OffCanvasHeadTitle headClass="head_auth profile-heading mt-2" headId="offcanvasRightLabel" headLable="Settings" />
        </div>
        <x-CustomOffCanvas.OffCanvasCloseBtn closeBtnClass="btn-close text-reset image-skeleton offcanvas-btn-close setting-btn-close" />
    </x-CustomOffCanvas.OffCanvasHeader>
    <x-CustomOffCanvas.OffCanvasBody bodyClassName="offcanvas-body">
        <li class="child-line-row block-space">
            <x-Buttons.MenuButtons.SubMenuCardButton className="canvas-link-btn image-skeleton" dataURL="#" subMenuBtnId="#">
                <svg width="18" height="17" viewBox="0 0 24 24" fill="none" stroke="dodgerblue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2">
                <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/>
                <line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
                <span class="lable-name">App Settings</span>
            </x-Buttons.MenuButtons.SubMenuCardButton>
        </li>
        <ul class="box-container drag-canvas-row">
            <li class="child-line-row text-space">
                <span class="card-lable-name image-skeleton">Theme Background Color</span>
            </li>
            @foreach($groupCards as $data)
            <li class="{{ $data['lineClass'] }}">
                <div class="{{ $data['className'] }}" id="{{ $data['canvasId'] }}">
                    <div class="card-body box-card-body">
                        <div class="panel-img-box">
                            <img class="panel-img-size" src="{{ $data['image'] }}" alt="setting-logo">
                        </div>
                        <div class="form-check form-switch check-box">
                            <input class="form-check-input panel-checked" type="checkbox" id="{{ $data['checkBtnId'] }}">
                            <label class="form-check-label rl-lable-class" for="{{ $data['lableFor'] }}">{{ $data['checkLable'] }}</label>
                        </div>
                    </div>
                </div>
                <svg id="lineConnectorId_{{ $data['canvasId'] }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none; z-index: 10;"></svg>
            </li>
            @endforeach
        </ul>
        <x-CustomOffCanvas.OffCanvasLoader loaderClass="side_canvas_animation" animationClass="sidebar-animation-size" />
    </x-CustomOffCanvas.OffCanvasBody>
</x-CustomOffCanvas.OffCanvas>
<?php
    $group_flex_box=[
        ['label'=>'Branch','inputPlaceholder'=>'Branch Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
        ['label'=>'Role','inputPlaceholder'=>'Role Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
        ['label'=>'Email','inputPlaceholder'=>'Email Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
    ]; 
?>
<div id="card-container">
    <div class="row drag-row">
        @foreach($group_flex_box as $index => $data)
        <div class="col-xl-4 drag-column">
            <!-- Cards go here -->
            <div class="card filex-column-card group-card" draggable="true" id="group_card_{{ $index }}">
                <div class="card-header filex-column-card-header filex-group">
                    <span class="move-icon">
                        <svg viewBox="0 0 24 24" width="18" height="14" stroke="darkcyan" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                    </span>
                    <span class="card-label">
                        <span>{{ $data['label'] }}</span>
                    </span>
                    <span class="search-box dropstart">
                        <a type="button" class="dropdown-toggle filex-search-btn" id="search_Dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
                            {{ $data['searchLabel'] }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="search_Dropdown" id="filexBoxMenu">
                            <span class="input-search-box">
                                <span class="filex-search-icon-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white" stroke="rgb(170, 170, 170)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"/>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                    </svg>
                                </span>
                                <input class="form-control form-control-sm font-weight" type="search" name="search" value="" placeholder="{{ $data['inputPlaceholder'] }}" id="filexBoxsearch" />
                            </span>
                        </ul>
                    </span>
                </div>
                <div class="card-body filex-column-card-body">
                    <ul class="first-filex-group">
                        <li>Dhaka Branch</li>
                        <li>Rangpur Branch</li>
                        <li>Barisal Branch</li>
                        <li>Natore Branch</li>
                        <li>Gazipur Branch</li>
                        <li>Rajshahi Branch</li>
                        <li>Dhaka Branch</li>
                        <li>Rangpur Branch</li>
                        <li>Barisal Branch</li>
                        <li>Natore Branch</li>
                        <li>Gazipur Branch</li>
                        <li>Rajshahi Branch</li>
                        <li>Dhaka Branch</li>
                        <li>Rangpur Branch</li>
                        <li>Barisal Branch</li>
                        <li>Natore Branch</li>
                        <li>Gazipur Branch</li>
                        <li>Rajshahi Branch</li>
                    </ul>
                </div>
                <div class="card-footer filex-column-card-footer">
                    <div class="group-filex-button">
                        <button type="button" class="{{ $data['buttonClass'] }}">{{ $data['buttonLabelOne'] }}</button>
                        <button type="button" class="{{ $data['buttonClass'] }}">{{ $data['buttonLabelTwo'] }}</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <svg id="svg" style="width: 100%; height: 400px; border: 1px solid #ccc;position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;">
    <path id="resizablePath" d="" stroke="rgb(238, 155, 53)" fill="none" stroke-width="2" />
    <path id="startPoint" data-rotation="-90" transform="translate(100,100) rotate(-90)" style="cursor: pointer; fill: darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
    <path id="endPoint" data-rotation="90" transform="translate(300,200) rotate(90)" style="cursor: pointer; fill:darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
    </svg>

    <svg id="svgDemo" style="width: 100%; height: 400px; border: 1px solid #ccc;position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 0;">
    <path id="resizablePathDemo" d="" stroke="#007BFF" fill="none" stroke-width="2" />
    <path id="startPointDemo" data-rotation="-90" transform="translate(100,100) rotate(-90)" style="cursor: pointer; fill: #007BFF;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
    <path id="endPointDemo" data-rotation="90" transform="translate(300,200) rotate(90)" style="cursor: pointer; fill: #007BFF;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
    </svg>
</div>
<!-- <svg id="connectionLines" width="100%" height="300" style="position:absolute; top:0; left:0; z-index:1;"></svg> -->
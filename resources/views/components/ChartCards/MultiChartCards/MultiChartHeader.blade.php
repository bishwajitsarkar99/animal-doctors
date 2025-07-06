<div class="{{ $parentClass }}">
    <div class="row">
        <div class="col-xl-5">
            <span class="{{ $childClass }}">
                <span class="svg_icon_chart"><svg id="Layer_1" data-name="Layer 1" width="25" height="15" viewBox="0 0 122.88 104.01"><path fill="{{$iconColor}}" d="M0,13.86a6,6,0,1,1,12.06,0V91.94H116.85a6,6,0,0,1,0,12.07H0V13.86ZM101.9,7.15l-3-3.88a2,2,0,0,1-.43-1.89C99-.19,100.8,0,102.09.05c3.65.26,11.72.84,13.6.91a2,2,0,0,1,2,2.49c-.38,1.9-1.59,10.55-2.22,14-.22,1.2-.58,2.77-2.11,2.88a2,2,0,0,1-1.72-.87l-3-3.88-1.23-1.56L92.39,25.41v.26a9.06,9.06,0,0,1-18.12,0c0-.2,0-.4,0-.6L63.78,17.48A9.05,9.05,0,0,1,52.85,17l-10.2,7.26A9.2,9.2,0,0,1,43,26.6a9,9,0,1,1-5.39-8.29l12-8.54A9.06,9.06,0,0,1,67.67,10c0,.2,0,.4,0,.59l10.51,7.6a9.06,9.06,0,0,1,10.55.15L102.48,7.89l-.58-.74Zm-.09,23.38H114.3a1.31,1.31,0,0,1,1.31,1.3V80.37a1.32,1.32,0,0,1-1.31,1.31H101.81a1.31,1.31,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM77.09,47.16H89.58a1.31,1.31,0,0,1,1.31,1.31v31.9a1.32,1.32,0,0,1-1.31,1.31H77.09a1.31,1.31,0,0,1-1.31-1.31V48.47a1.31,1.31,0,0,1,1.31-1.31ZM52.36,30.53h12.5a1.3,1.3,0,0,1,1.3,1.3V80.37a1.32,1.32,0,0,1-1.3,1.31H52.36a1.32,1.32,0,0,1-1.31-1.31V31.83a1.31,1.31,0,0,1,1.31-1.3ZM27.64,49.84H40.13a1.31,1.31,0,0,1,1.31,1.31V80.37a1.32,1.32,0,0,1-1.31,1.31H27.64a1.31,1.31,0,0,1-1.31-1.31V51.15a1.31,1.31,0,0,1,1.31-1.31Z"/></svg></span>
                {{ $chartLabel }}
            </span>
        </div>
        <div class="col-xl-2">
            <x-MenuFilexBoxs.MediumMenuFilexBox 
                filexClas="{{ $filexGroup }}"
                filexFilterId="{{ $filexId }}"
                filexLabelName="{{ $filexLabel }}"
                filexContentArea="{{ $filexContent }}"
                filexUpArrow="{{ $filexUpArrw }}"
            />
        </div>
        <div class="col-xl-5 {{ $groupClass }}">
            <span class="{{ $inputGroupClass }}">
                <label class="date-label ps-2 pe-2" for="from">{{ $inputLabelOne }} </label>
                <span class="">
                    <span class="{{ $iconClass }}" style="{{ $iconStyle }}">
                        <svg viewBox="0 0 24 24" width="{{ $svgWidth }}" height="{{ $svgHeight }}" stroke="{{ $svgStroke }}" stroke-width="{{ $svgStrokeWidth}}" fill="{{ $svgFillColor }}" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </span>
                <input class="{{ $inputClass }}" type="{{ $inputType }}" name="{{ $inputFirstName }}" Placeholder="{{ $inputPlaceHolder }}" id="{{ $inputFirstId }}" autocomplete="off">
            </span>
            <span class="{{ $inputGroupClass }}">
                <label class="date-label ps-2 pe-2" for="from">{{ $inputLabelTwo }} </label>
                <span class="">
                    <span class="{{ $iconClass }}" style="{{ $iconStyle }}">
                        <svg viewBox="0 0 24 24" width="{{ $svgWidth }}" height="{{ $svgHeight }}" stroke="{{ $svgStroke }}" stroke-width="{{ $svgStrokeWidth}}" fill="{{ $svgFillColor }}" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </span>
                <input class="{{ $inputClass }}" type="{{ $inputType }}" name="{{ $inputSecondName }}" Placeholder="{{ $inputPlaceHolder }}" id="{{ $inputSecondId }}" autocomplete="off">
            </span>
        </div>
    </div>
</div>
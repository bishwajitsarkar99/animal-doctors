<div class="{{ $dateRangeCardClass }}" id="{{ $dateRangeId }}">
    <div class="{{ $firstWrapperClass }}">
        <span id="{{ $leftTooltipId }}" class="{{ $tooltipClass }}">0%</span>
        <input type="{{ $inputRangeSliderType }}" id="{{ $leftInputRangeSliderId }}" min="{{ $inputRangeMin }}" max="{{ $inputRangeMax }}" value="{{ $leftinputRangeValue }}" class="{{ $inputRangeClass }}">
    </div>
    <div class="{{ $secondWrapperClass }}">
        <span id="{{ $rightTooltipId }}" class="{{ $tooltipClass }}">0%</span>
        <input type="{{ $inputRangeSliderType }}" id="rangeRightSlider" min="{{ $inputRangeMin }}" max="{{ $inputRangeMax }}" value="{{ $rightinputRangeValue }}" class="{{ $inputRangeClass }}">
    </div>
    <div class="{{ $dateRangeTrackingClass }}">
        <svg id="{{ $dateRangeSvgChartId }}" viewBox="{{ $dateRangeSvgChartViewBox }}" fill="{{ $dateRangeSvgChartFill }}" style="{{ $dateRangeSvgChartStyle }}">
            <rect x="0" y="0" width="{{ $dateRangeSvgChartWidth }}" height="{{ $dateRangeSvgChartHeight }}" fill="{{ $dateRangeSvgChartRectFill }}" />
        </svg>
    </div>
</div>
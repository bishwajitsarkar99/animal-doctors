<div class="dual-range-container mt-2" id="dateRange">
    <div class="slider-wrapper-first">
        <span id="leftTooltip" class="range-tooltip">0%</span>
        <input type="range" id="rangeLeftSlider" min="0" max="365" value="0" class="dual-range">
    </div>
    <div class="slider-wrapper-second">
        <span id="rightTooltip" class="range-tooltip">0%</span>
        <input type="range" id="rangeRightSlider" min="0" max="365" value="365" class="dual-range">
    </div>
    <div class="range-track">
        <svg id="cruveChart" viewBox="0 0 800 50" fill="rgba(0,123,255,0.2)" style="border: none;
            background: #f9f9f9;
            overflow: hidden;path {
            fill: none;
            stroke-width: 2.5;display: block;margin: none;">
            <rect x="0" y="0" width="800" height="50" fill="white" />
        </svg>
    </div>
</div>
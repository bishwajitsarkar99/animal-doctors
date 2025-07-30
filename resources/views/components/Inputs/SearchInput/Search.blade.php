<span class="{{ $parentClass }}">
    <span class="{{ $childClass }}">
        <svg width="{{ $searchSvgWidth }}" height="{{ $searchSvgHeight }}" viewBox="0 0 24 24" fill="{{ $searchSvgFill }}" stroke="{{ $searchSvgStroke }}" stroke-width="{{ $searchSvgStrokeWidth }}" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
    </span>
    <input class="{{ $searchClass }}" type="{{ $searchType }}" name="{{ $searchName }}" value="{{ $searchValue }}" placeholder="{{ $searchPlaceHolder }}" id="{{ $searchId }}" autocomplete="off"/>
</span>
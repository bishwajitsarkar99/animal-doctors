<a class="{{ $dataPrintClassName }}" id="{{ $dataPrintId }}">
    <svg width="{{ $svgWidth }}" height="{{ $svgHeight }}" viewBox="0 0 64 64">
        <!-- Printer body -->
        <rect x="12" y="20" width="40" height="26" rx="4" ry="4" fill="#555"/>
        
        <!-- Paper output -->
        <rect x="18" y="34" width="28" height="18" rx="2" ry="2" fill="#fff" stroke="#ccc" stroke-width="2"/>
        
        <!-- Paper lines -->
        <line x1="22" y1="40" x2="42" y2="40" stroke="#aaa" stroke-width="2"/>
        <line x1="22" y1="45" x2="42" y2="45" stroke="#aaa" stroke-width="2"/>
        
        <!-- Top panel -->
        <rect x="16" y="10" width="32" height="14" rx="2" ry="2" fill="#777"/>
        
        <!-- Status light -->
        <circle cx="46" cy="28" r="3" fill="#38b2ac"/>
    </svg>
</a>
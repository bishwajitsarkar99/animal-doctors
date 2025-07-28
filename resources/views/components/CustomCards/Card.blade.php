@props([
    'cardClass',
    'cardId',
    'hiddenAttr'=>'',
])
<div class="{{ $cardClass }}" draggable="true" id="{{ $cardId }}" {{ $hiddenAttr }}>
    {{ $slot }}
    <svg id="lineConnectorId_{{ $cardId }}" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; pointer-events: none; z-index: 10;"></svg>
</div>
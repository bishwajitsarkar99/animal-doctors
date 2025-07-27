@props([
    'topBarClass',
    'topBarId',
    'topBarRowClass',
    'hiddenAttr' => ''
])
<div class="{{ $topBarClass }}" id="{{ $topBarId }}" {{$hiddenAttr}}>
    <!-- <div class="panel-width-resizer right-resizer"></div>
    <div class="panel-width-resizer left-resizer"></div>
    <div class="panel-height-resizer bottom-resizer"></div>
    <div class="panel-height-resizer top-resizer"></div>
    <svg class="connector" width="100%" height="100%">
    <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg> -->
    <div class="{{ $topBarRowClass }}">
        {{ $slot }}
    </div>
</div>
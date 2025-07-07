@props([
    'topBarClass',
    'topBarId',
    'topBarRowClass',
    'hiddenAttr' => ''
])
<div class="{{ $topBarClass }}" id="{{ $topBarId }}" {{$hiddenAttr}}>
    <div class="{{ $topBarRowClass }}">
        {{ $slot }}
    </div>
</div>
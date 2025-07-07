@props([
    'contentTabClass',
    'contentTabId',
    'hiddenAttr' => ''
])
<div class="{{ $contentTabClass }}" id="{{ $contentTabId }}" {{$hiddenAttr}}>{{ $slot }}</div>
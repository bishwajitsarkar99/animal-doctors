@props([
    'cardHeaderClass',
    'cardHeaderId',
    'hiddenAttr'=>'',
])
<div class="{{ $cardHeaderClass }}" id="{{ $cardHeaderId }}" {{$hiddenAttr}}>{{ $slot }}</div>
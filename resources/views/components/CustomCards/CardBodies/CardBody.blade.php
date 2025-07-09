@props([
    'cardBodyClass',
    'cardBodyId',
    'hiddenAttr'=>'',
])
<div class="{{ $cardBodyClass }}" id="{{ $cardBodyId }}" {{$hiddenAttr}}>{{ $slot }}</div>
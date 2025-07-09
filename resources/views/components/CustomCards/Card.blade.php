@props([
    'cardClass',
    'cardId',
    'hiddenAttr'=>'',
])
<div class="{{ $cardClass }}" id="{{ $cardId }}" {{ $hiddenAttr }}>{{ $slot }}</div>
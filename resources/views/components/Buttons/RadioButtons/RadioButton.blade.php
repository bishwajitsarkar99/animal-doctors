@props([
    'lableName',
    'lableClassName',
    'lableFor',
    'buttonClass',
    'buttonType',
    'buttonName',
    'buttonId',
    'checkAttr' => ''
])
<label class="{{ $lableClassName }}" for="{{ $lableFor }}">
    <input class="{{ $buttonClass }}" type="{{ $buttonType }}" name="{{ $buttonName }}" id="{{ $buttonId }}" {{ $checkAttr }}>
    {{ $lableName }}
</label>
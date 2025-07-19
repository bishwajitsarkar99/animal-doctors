<button type="button" class="btn btn-sm {{ $buttonParentClass }} {{ $buttonChildClass }}" id="{{ $buttonId }}">
    {{ $slot }}
    <span class="{{ $iconClass }} spinner-border spinner-border-sm text-white refrsh-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
    <span class="{{ $labelClass }} ms-1">{{ $label }}</span>
</button>
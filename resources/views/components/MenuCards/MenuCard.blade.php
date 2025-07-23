<div class="{{ $menuParentClass }}">
    <a id="{{ $menuId }}">☰</a>
    <div class="{{ $menuChildClass}}" id="{{ $wrapperId }}">
        <div class="card-width-resizer"></div>
        {{$slot}}
        <svg class="connector" width="100%" height="100%">
            <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
        </svg>
        <div class="card-height-resizer"></div>
    </div>
</div>
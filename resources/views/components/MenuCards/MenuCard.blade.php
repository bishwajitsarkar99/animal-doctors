<div class="{{ $menuParentClass }}">
    <a id="{{ $menuId }}">
        <span class="table-icon-skeleton">
            <strong>{{ $menuName }}</strong>
        </span>
        ☰
    </a>
    <div class="{{ $menuChildClass}}" id="{{ $wrapperId }}">
        <div class="card-width-resizer"></div>
        <div class="card-height-resizer"></div>
        <svg class="connector" width="100%" height="100%">
            <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
        </svg>
        {{$slot}}
    </div>
</div>
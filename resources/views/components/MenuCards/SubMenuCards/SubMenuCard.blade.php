<ul class="{{ $subMenuCardClass }}">
    <div class="card-width-resizer"></div>
    <div class="card-height-resizer"></div>
    <svg class="connector" width="100%" height="100%">
        <rect class="connectorPath" x="0" y="0" rx="3" ry="3" />
    </svg>
    <span class="sub-menu-card-arrow"></span>
    {{ $slot }}
</ul>
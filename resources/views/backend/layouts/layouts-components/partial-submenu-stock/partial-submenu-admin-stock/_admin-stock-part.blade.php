@isset(auth()->user()->role->permission['name']['permission']['list'])
<!-- Stock -->
<a class="nav-link_cgrMenu dropdown-toggle ty " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Stock')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="adminStock" aria-labelledby="headingTwo" data-bs-parent="#adminStock">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Create-Stock')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Create Stock')}}
                </a>
            </nav>
        </div>
    </li>
</ul>
@endisset
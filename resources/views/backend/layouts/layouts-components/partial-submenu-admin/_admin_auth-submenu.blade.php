<a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Blog-Post')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{ route('categories.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Category')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Category')}}
                </a>
            </nav>
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{ route('post.index') }}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Post')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Post')}}
                </a>
            </nav>
        </div>
    </li>
</ul>
<!-- =========================== Doctor-post ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Doctor-Post')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{ route('create.doctorpost')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Add-Post')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Add-Post')}}
                </a>
            </nav>
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{ route('doctors.index')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Post-List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Post-List')}}
                </a>
            </nav>
        </div>
    </li>
</ul>


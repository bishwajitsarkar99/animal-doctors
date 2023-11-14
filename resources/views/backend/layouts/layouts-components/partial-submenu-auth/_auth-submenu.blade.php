<a class="nav-link_cgrMenu dropdown-toggle ty" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Authentication')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>
        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{route('get_account-holders.action')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Account-History')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Account-History')}}
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Forget Password">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Forget Password
                </a> -->
                <a class="nav-link underline" href="{{route('manageRole')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Manage Role')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Manage Role')}}
                </a>
                <a class="nav-link underline" href="{{route('superAdminUsers')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Users Setting')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.Users Permission')}}
                </a>
            </nav>
        </div>

    </li>

</ul>
<!-- ================= Roles and Permission ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Permission List')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="{{route('permission.show')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Permission List')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.User Permission List')}}
                </a>
                <a class="nav-link underline" href="{{route('permission.create')}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.ADD Permission')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.ADD Permission')}}
                </a>
                <!-- <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Permission Setting">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>Role Setting
                </a> -->
            </nav>
        </div>

    </li>

</ul>

<!-- ================= Error ================= -->
<a class="nav-link_cgrMenu dropdown-toggle ty " id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-folder-open fa-beat"></i> <span class="ps-1" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.Click')}}">{{__('translate.Error Page')}}</span>
</a>
<ul class="dropdown-menu dropdown-menu-end tyg rgs line_menu" aria-labelledby="navbarDropdown">
    <li>

        <div class="collapse" id="auth_" aria-labelledby="headingTwo" data-bs-parent="#auth_">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.401 Page')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.401 Page')}}
                </a>
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.404 Page')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.404 Page')}}
                </a>
                <a class="nav-link underline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="{{__('translate.500 Page')}}">
                    <i class="fa-regular fa-hand-point-right fa-beat me-1"></i>{{__('translate.500 Page')}}
                </a>
            </nav>
        </div>

    </li>

</ul>
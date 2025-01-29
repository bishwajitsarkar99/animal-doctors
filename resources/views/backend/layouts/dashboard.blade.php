<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layouts._head')

    @yield('css')
    @stack('css')
</head>

<body oncontextmenu="return flase;" class="sb-nav-fixed" id="myscreen" dir="{{setting('app_dir', 'ltr')}}">

    <nav class="sb-topnav navbar navbar-expand navbar-dark" id="topBar_tigger">
        @include('backend.layouts.layouts-components._topbar')
    </nav>

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light-grey" id="sidenavAccordion">
                @include('backend.layouts.layouts-components._sidebar')
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid bg-transparent px-4" id="main_content">
                    <div class="modal fade" id="loaderModalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content small_modal loader_modal" style="border:none;" id="admin_modal_box">
                                <div class="modal-body" id="loaderModal_body">
                                    <div class="loader-login">
                                        <img class="modal-loader" src="{{ asset('/image/loader/load-30.gif') }}" alt="Loading...." />
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </main>
            @include('backend.layouts.layouts-components._footer')
        </div>
    </div>
    @include('backend.layouts.handler-js.them-setting-js._them-setup')
    @include('backend.layouts.layouts-components._themesetting-modal')
    @include('backend.layouts.layouts-components._logout-modal')
    @include('backend.layouts.layouts-components._profile')
    @include('loader.action-loader')
    @include('backend.layouts.layouts-components._account-holders')
    @include('backend.layouts.layouts-components._activity-log')

    @include('backend.layouts._script')
    @include('backend.layouts._sidebar-script')
    @include('backend.layouts._file_manager_script')
    @include('backend.layouts.handler-js.design._dashboard-page-js')
    @include('backend.layouts.handler-js.dropdown-menu-js._message-menu-js')

    @include('backend.layouts.handler-js.modal._modal-js')
    @include('backend.layouts.handler-js.profile-js._profile-handler')
    @include('backend.layouts.handler-js.account-setting-js._account-setting-ajax')
    @include('backend.layouts.handler-js.activity-log-js._activity-log-ajax')
    @include('backend.layouts.handler-js.design._side-bar-js')
    @include('backend.layouts.handler-js.footer-js._footer-menu-js')
    @include('backend.layouts.handler-js._footer-js')
    @include('backend.layouts.layouts-components.file-manager._file_manager')
    @include('loader.action-loader');
    @include('permission.permission-templete-index');
    @include('permission.ajax.permission-ajax');

    @yield('script')
    @stack('scripts')

</body>

</html>
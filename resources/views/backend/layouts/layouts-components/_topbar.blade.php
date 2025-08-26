<?php
    $auth = auth()->user();
    $role = $auth->role;
    $branchType = $auth->branch_type;

    $rolesArray = [
        ['roleId'=>0, 'roleName'=> 'Default Role', 'cssStyles'=>'color:darkblue;animation: none;'],
        ['roleId'=>1, 'roleName'=> 'Super Admin', 'cssStyles'=>''],
        ['roleId'=>2, 'roleName'=> 'Sub Admin', 'cssStyles'=>''],
        ['roleId'=>3, 'roleName'=> 'Admin', 'cssStyles'=>''],
        ['roleId'=>5, 'roleName'=> 'Accounts', 'cssStyles'=>'font-size:10px;'],
        ['roleId'=>6, 'roleName'=> 'Marketing', 'cssStyles'=>''],
        ['roleId'=>7, 'roleName'=> 'Delivery Team', 'cssStyles'=>'']
    ];
?>
<!-- Navbar Brand -->
<a type="button" class="navbar-brand ps-1 admin_panel" data-url="#" id="side_bar">
    <span id="screenopen" class="visit_link mini-btn-one" onclick="openFullscreen()" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Full Screen')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
        @if($role ==0)
            <span>
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#f1c107" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" id="Fullscreen_Exit"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
            </span>
        @else
            <span>
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="#f1c107" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" id="Fullscreen_Exit"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
            </span>  
        @endif  
    </span>
    <span id="screenclose" class="visit_link mini-btn-two" onclick="closeFullscreen()" data-bs-toggle="tooltip"  data-bs-placement="right" title="{{__('translate.Full Screen Exit')}}" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>' hidden>
        @if($role ==0)
            <span>
                <svg fill="#f1c107" height="22px" width="20px" version="1.1" id="Capa_1" viewBox="0 0 385.331 385.331" xml:space="preserve"><g><g id="Fullscreen_Exit"><path d="M264.943,156.665h108.273c6.833,0,11.934-5.39,11.934-12.211c0-6.833-5.101-11.85-11.934-11.838h-96.242V36.181    c0-6.833-5.197-12.03-12.03-12.03s-12.03,5.197-12.03,12.03v108.273c0,0.036,0.012,0.06,0.012,0.084    c0,0.036-0.012,0.06-0.012,0.096C252.913,151.347,258.23,156.677,264.943,156.665z"></path><path d="M120.291,24.247c-6.821,0-11.838,5.113-11.838,11.934v96.242H12.03c-6.833,0-12.03,5.197-12.03,12.03    c0,6.833,5.197,12.03,12.03,12.03h108.273c0.036,0,0.06-0.012,0.084-0.012c0.036,0,0.06,0.012,0.096,0.012    c6.713,0,12.03-5.317,12.03-12.03V36.181C132.514,29.36,127.124,24.259,120.291,24.247z"></path><path d="M120.387,228.666H12.115c-6.833,0.012-11.934,5.39-11.934,12.223c0,6.833,5.101,11.85,11.934,11.838h96.242v96.423    c0,6.833,5.197,12.03,12.03,12.03c6.833,0,12.03-5.197,12.03-12.03V240.877c0-0.036-0.012-0.06-0.012-0.084    c0-0.036,0.012-0.06,0.012-0.096C132.418,233.983,127.1,228.666,120.387,228.666z"></path><path d="M373.3,228.666H265.028c-0.036,0-0.06,0.012-0.084,0.012c-0.036,0-0.06-0.012-0.096-0.012    c-6.713,0-12.03,5.317-12.03,12.03v108.273c0,6.833,5.39,11.922,12.223,11.934c6.821,0.012,11.838-5.101,11.838-11.922v-96.242    H373.3c6.833,0,12.03-5.197,12.03-12.03S380.134,228.678,373.3,228.666z"></path></g></g></svg>
            </span> 
        @else
            <span>
                <svg fill="#f1c107" height="22px" width="20px" version="1.1" id="Capa_1" viewBox="0 0 385.331 385.331" xml:space="preserve"><g><g id="Fullscreen_Exit"><path d="M264.943,156.665h108.273c6.833,0,11.934-5.39,11.934-12.211c0-6.833-5.101-11.85-11.934-11.838h-96.242V36.181    c0-6.833-5.197-12.03-12.03-12.03s-12.03,5.197-12.03,12.03v108.273c0,0.036,0.012,0.06,0.012,0.084    c0,0.036-0.012,0.06-0.012,0.096C252.913,151.347,258.23,156.677,264.943,156.665z"></path><path d="M120.291,24.247c-6.821,0-11.838,5.113-11.838,11.934v96.242H12.03c-6.833,0-12.03,5.197-12.03,12.03    c0,6.833,5.197,12.03,12.03,12.03h108.273c0.036,0,0.06-0.012,0.084-0.012c0.036,0,0.06,0.012,0.096,0.012    c6.713,0,12.03-5.317,12.03-12.03V36.181C132.514,29.36,127.124,24.259,120.291,24.247z"></path><path d="M120.387,228.666H12.115c-6.833,0.012-11.934,5.39-11.934,12.223c0,6.833,5.101,11.85,11.934,11.838h96.242v96.423    c0,6.833,5.197,12.03,12.03,12.03c6.833,0,12.03-5.197,12.03-12.03V240.877c0-0.036-0.012-0.06-0.012-0.084    c0-0.036,0.012-0.06,0.012-0.096C132.418,233.983,127.1,228.666,120.387,228.666z"></path><path d="M373.3,228.666H265.028c-0.036,0-0.06,0.012-0.084,0.012c-0.036,0-0.06-0.012-0.096-0.012    c-6.713,0-12.03,5.317-12.03,12.03v108.273c0,6.833,5.39,11.922,12.223,11.934c6.821,0.012,11.838-5.101,11.838-11.922v-96.242    H373.3c6.833,0,12.03-5.197,12.03-12.03S380.134,228.678,373.3,228.666z"></path></g></g></svg>
            </span> 
        @endif
    </span>
    <!-- Role Name-->
    @foreach($rolesArray as $data)
        @if($role ==$data['roleId'])
            {{$data['roleName']}}
        @endif
    @endforeach
</a>
<!-- Sidebar Toggle -->
@foreach($rolesArray as $data)
    @if($role == $data['roleId'])
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 footer_toggle" id="sidebarToggle" style="{{ $data['cssStyles'] }}">
            <span>
                <svg fill="#fff" height="20px" width="20px" version="1.1" id="Capa_1" viewBox="0 0 384.97 384.97" xml:space="preserve"><g><g id="List"><path d="M144.123,84.092l228.576,0.241c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03l-228.576-0.241    c-6.641,0-12.03,5.39-12.03,12.03C132.093,78.702,137.482,84.092,144.123,84.092z"></path><path d="M372.939,180.455l-228.576-0.241c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03l228.576,0.241    c6.641,0,12.03-5.39,12.03-12.03S379.58,180.455,372.939,180.455z"></path><path d="M372.939,300.758l-228.576-0.241c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03l228.576,0.241    c6.641,0,12.03-5.39,12.03-12.03C384.97,306.147,379.58,300.758,372.939,300.758z"></path><path d="M48.001,24.301C21.486,24.301,0,45.787,0,72.302s21.486,48.001,48.001,48.001s48.001-21.486,48.001-48.001    S74.516,24.301,48.001,24.301z M47.881,96.363c-13.522,0-24.361-10.539-24.361-24.061s10.839-24.061,24.361-24.061    S71.941,58.78,71.941,72.302S61.403,96.363,47.881,96.363z"></path><path d="M48.001,144.604C21.486,144.604,0,166.09,0,192.605s21.486,48.001,48.001,48.001s48.001-21.486,48.001-48.001    S74.516,144.604,48.001,144.604z M47.881,216.666c-13.522,0-24.361-10.539-24.361-24.061c0-13.522,10.839-24.061,24.361-24.061    s24.061,10.539,24.061,24.061C71.941,206.127,61.403,216.666,47.881,216.666z"></path><path d="M48.001,264.667C21.486,264.667,0,286.153,0,312.668s21.486,48.001,48.001,48.001s48.001-21.486,48.001-48.001    S74.516,264.667,48.001,264.667z M47.881,336.728c-13.522,0-24.361-10.539-24.361-24.061s10.839-24.061,24.361-24.061    s24.061,10.539,24.061,24.061S61.403,336.728,47.881,336.728z"></path></g></g></svg>
            </span> 
        </button>
    @endif
@endforeach
<!-- Branch Type Name -->
@if($role ==0)
    <span style="color:darkblue;font-weight:700;font-size: .9rem;">{{$branchType}}</span>
@elseif($role ==1)
    <span class="admin_email">{{$branchType}}</span>
@else
    <span class="admin_email">{{$branchType}}</span>
@endif

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 {{setting('topbar_moduel_display')}}">
    <div class="input-group">
        <!-- extra class remove [class="src_form"] -->
        <input type="search" list="datalistOptionsTop" class="form-control form-control-sm {{setting('topbar_moduel_display')}}" id="srch_url" placeholder="{{__('translate.Search..')}}" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-success btn-btn-sm {{setting('topbar_searchbtn_moduel_display')}}" id="btnNavbarSearch" type="submit" data-bs-toggle="tooltip"  data-bs-placement="left" title="Search" data-bs-delay="100" data-bs-html="true" data-bs-boundary="window" data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
            <svg width="22px" height="25px" fill="#808080f0" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 119.828 122.88" enable-background="new 0 0 119.828 122.88" xml:space="preserve"><g><path d="M48.319,0C61.662,0,73.74,5.408,82.484,14.152c8.744,8.744,14.152,20.823,14.152,34.166 c0,12.809-4.984,24.451-13.117,33.098c0.148,0.109,0.291,0.23,0.426,0.364l34.785,34.737c1.457,1.449,1.465,3.807,0.014,5.265 c-1.449,1.458-3.807,1.464-5.264,0.015L78.695,87.06c-0.221-0.22-0.408-0.46-0.563-0.715c-8.213,6.447-18.564,10.292-29.814,10.292 c-13.343,0-25.423-5.408-34.167-14.152C5.408,73.741,0,61.661,0,48.318s5.408-25.422,14.152-34.166C22.896,5.409,34.976,0,48.319,0 L48.319,0z M77.082,19.555c-7.361-7.361-17.53-11.914-28.763-11.914c-11.233,0-21.403,4.553-28.764,11.914 C12.194,26.916,7.641,37.085,7.641,48.318c0,11.233,4.553,21.403,11.914,28.764c7.36,7.361,17.53,11.914,28.764,11.914 c11.233,0,21.402-4.553,28.763-11.914c7.361-7.36,11.914-17.53,11.914-28.764C88.996,37.085,84.443,26.916,77.082,19.555 L77.082,19.555z"/></g></svg>
        </button>
        <datalist id="datalistOptionsTop">
            <option value="{{setting('category_link')}}">
        </datalist>
    </div>
</form>
<!-- Navbar Dropdown Menu-->
<ul class="navbar-nav ms-auto ms-md-0 me-lg-2">
    <li class="nav-item dropdown">
        <a type="button" class="dropdown-toggle" id="navbar_Dropdown" data-url="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 0.5rem;">
            <img class="img-profile rounded-circle" style="margin-top: -2px;" id="output" src="/storage/image/user-image/{{auth()->user()->image}}">
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbar_Dropdown" id="themeMenuListBackground">
            <li>
                <a type="button" class="dropdown-item pro_link btn-bottom-margin" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightProfile" aria-controls="offcanvasRight" id="profile_urllinks">
                    <span class="show-profile badge rounded-pill bg-doragblue list-sm-btn" hidden>
                        <svg width="20px" height="15px" fill="#0A5EDB" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 336.62"><path fill-rule="nonzero" d="M23.09 0h465.82C501.58 0 512 10.42 512 23.09v290.44c0 12.67-10.42 23.09-23.09 23.09H23.09C10.42 336.62 0 326.2 0 313.53V23.09C0 10.42 10.42 0 23.09 0zm220.86 180.16c-13.75 0-13.75-25.1 0-25.1h206.92c13.75 0 13.73 25.1 0 25.1H243.95zm153.16 51.29c-13.74 0-13.74-25.1 0-25.1h53.76c13.74 0 13.74 25.1 0 25.1h-53.76zm-153.16 0c-13.75 0-13.75-25.1 0-25.1h113.27c13.74 0 13.74 25.1 0 25.1H243.95zm.01 51.39c-13.76 0-13.75-25.09 0-25.09h207.13c13.74 0 13.74 25.09 0 25.09H243.96zM56.9 50.03h308.78c4.43 0 8.06 3.64 8.06 8.07v42.81c0 4.42-3.64 8.06-8.06 8.06H56.9c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zm351.76 0h46.44c4.44 0 8.07 3.64 8.07 8.07v42.81c0 4.42-3.64 8.06-8.07 8.06h-46.44c-4.43 0-8.07-3.62-8.07-8.06V58.1c0-4.44 3.63-8.07 8.07-8.07zM52.72 282.84c-2.41 0-2.44-2.45-2.01-4.16 3.62-28.69 14.71-27.68 30.62-31.78 7.65-1.97 25.12-9.64 23.27-19.53-3.85-3.57-7.68-8.5-8.35-15.87l-.46.01c-1.07-.02-2.1-.26-3.06-.81-2.13-1.21-3.29-3.52-3.86-6.17-.55-2.61-.69-7.7 0-10.31.74-2.07 1.66-3.19 2.83-3.68l.03-.01c-.53-9.96 1.15-20.56-9.07-23.66 20.19-24.95 43.46-38.52 60.94-16.32 19.47 1.02 28.15 24.55 16.06 39.99h-.51c1.62.68 2.52 2.56 2.96 4.17.34 2.5.58 6.48-.14 9.82-.55 2.65-1.72 4.96-3.85 6.17-.96.55-1.99.79-3.06.81l-.47-.01c-.66 7.37-4.5 12.3-8.35 15.87-1.85 9.9 15.64 17.56 23.29 19.53 15.92 4.09 27.02 3.09 30.64 31.78.42 1.71.39 4.16-2.02 4.16H52.72zM488.91 16.43H23.09c-3.69 0-6.66 2.97-6.66 6.66v290.44c0 3.69 2.97 6.66 6.66 6.66h465.82c3.69 0 6.66-2.97 6.66-6.66V23.09c0-3.69-2.97-6.66-6.66-6.66z"/></svg> 
                        {{__('translate.Profile')}}
                    </span>
                </a>
                <span class="show-prof ms-2" id="profileSkel"></span>
            </li>
            <li>
                <a type="button" class="dropdown-item pro_link side-bar-link btn-bottom-margin" data-url="/application/email-{slug}/index">
                    <span class="show-email badge rounded-pill bg-doragblue list-sm-btn pt-1" hidden>
                        <svg id="Layer_1" data-name="Layer 1" width="20px" height="15px" viewBox="0 0 117.88 122.88">
                            <defs><style>.cls-1{fill:#297cf8ff;}.cls-2{fill:#297cf8ff;}.cls-3,.cls-5{fill:#fff;}.cls-4{fill:#297cf8ff;}.cls-4,.cls-5{fill-rule:evenodd;}</style></defs>
                            <path fill="#297cf8ff" d="M110.44,41.57a3.59,3.59,0,0,1,2.43-.93,4,4,0,0,1,2.06.6,5.09,5.09,0,0,1,1.26,1.07,7.06,7.06,0,0,1,1.69,4.26v70.64a5.71,5.71,0,0,1-1.66,4h0a5.67,5.67,0,0,1-4,1.66H5.67a5.71,5.71,0,0,1-4-1.66h0a5.62,5.62,0,0,1-1.66-4V46.57a7.1,7.1,0,0,1,1.73-4.32,5.5,5.5,0,0,1,1.26-1,4,4,0,0,1,2-.58,3.59,3.59,0,0,1,2,.57V2.74A2.74,2.74,0,0,1,9.7,0H78.9A2.71,2.71,0,0,1,81,1l28.65,29.59a2.71,2.71,0,0,1,.78,1.9h0v.79c0,.11,0,.22,0,.34s0,.22,0,.33v7.63Z"/>
                            <polygon fill="#297cf8ff" points="112.39 109.75 112.39 47.12 76.6 78.39 112.39 109.75 112.39 109.75 112.39 109.75"/>
                            <polygon fill="#297cf8ff" points="40.79 78.69 5.49 47.15 5.49 109.63 40.79 78.69 40.79 78.69 40.79 78.69"/>
                            <path fill="#297cf8ff" d="M56.52,92.74,44.9,82.36,5.49,116.9v.31a.17.17,0,0,0,0,.13h0a.22.22,0,0,0,.13,0H112.21a.22.22,0,0,0,.13,0h0a.17.17,0,0,0,0-.13V117L72.45,82,60.15,92.76h0a2.73,2.73,0,0,1-3.62,0Z"/>
                            <path fill="#fff" d="M102.31,30.86,78,5.74V5.49H12.44V46h0L46.66,76.6l.15.14L58.36,87.06,105,46.36v-10l-2.64-5.49Z"/>
                            <path fill="#fff" d="M58.7,13.35A25.26,25.26,0,1,1,33.44,38.61,25.26,25.26,0,0,1,58.7,13.35Z"/>
                            <path class="#297cf8ff" d="M50.86,34.6l4.47,4.22L65.91,28.1c.88-.89,1.43-1.6,2.51-.49l3.51,3.59c1.15,1.14,1.09,1.81,0,2.87L57.34,48.43c-2.29,2.25-1.89,2.39-4.22.08L45,40.39a1,1,0,0,1,.1-1.58l4.07-4.22c.62-.65,1.11-.59,1.74,0Z"/>
                        </svg> 
                        Send-Email
                    </span>
                </a>
                <span class="show-prof ms-2" id="emailSkel"></span>
            </li>
            <li>
                <a type="button" class="dropdown-item pro_link btn-bottom-margin" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" id="ram_click">
                    <span class="show-setting badge rounded-pill bg-doragblue list-sm-btn pt-1" hidden>
                        <svg width="20px" height="15px" fill="rgba(0,123,255,0.8)" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 375.4">
                            <path fill-rule="nonzero" d="M25.13 39.95h34.22V0H85.2v39.95h47.65V0h25.84v39.95h47.64V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h34.23c6.88 0 13.15 2.82 17.71 7.37l.05.05c4.54 4.55 7.37 10.82 7.37 17.71v247.73c0 6.88-2.83 13.15-7.37 17.71l-.05.05c-4.56 4.54-10.83 7.37-17.71 7.37h-34.23v37.46H426.8v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.64v37.46h-25.84v-37.46H85.2v37.46H59.35v-37.46H25.13c-6.89 0-13.15-2.83-17.71-7.37l-.05-.05C2.83 325.96 0 319.69 0 312.81V65.08c0-6.89 2.83-13.16 7.37-17.71l.05-.05c4.56-4.55 10.82-7.37 17.71-7.37zm154.83 200.1h-35.98l-13.41-30.42h-8.56v30.42H90.83V137.84h51.52c23.44 0 35.16 11.94 35.16 35.81 0 16.36-5.07 27.15-15.21 32.38l17.66 34.02zm-57.95-77.57v23.5h9.05c3.93 0 6.79-.41 8.59-1.23 1.8-.82 2.7-2.7 2.7-5.64v-9.76c0-2.95-.91-4.83-2.7-5.64-1.8-.82-4.67-1.23-8.59-1.23h-9.05zm98.67 77.57h-34.5l26.49-102.21h50.53l26.49 102.21h-34.5l-3.76-16.19h-26.99l-3.76 16.19zm13.29-70.81-3.64 28.62h15.04l-3.48-28.62h-7.92zm96.93 70.81h-34.18l6.21-102.21h42.69l12.76 52h1.14l12.75-52h42.68l6.22 102.21h-34.18l-1.96-49.55h-1.15l-12.43 49.55h-25.01l-12.59-49.55h-.99l-1.96 49.55zM486.16 65.79H25.84V312.1h460.32V65.79z"/>
                        </svg>
                        {{__('translate.RAM Status')}}
                    </span>
                    <span class="show-ram ms-2" id="ramSkel"></span>
                </a>
            </li>
            <li>
                <a type="button" class="dropdown-item pro_link btn-bottom-margin" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRom" aria-controls="offcanvasRom" id="rom_click">
                    <span class="show-setting badge rounded-pill bg-doragblue list-sm-btn pt-1" hidden>
                        <svg width="20px" height="15px" fill="rgba(0,123,255,0.8)" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 375.4">
                            <path fill-rule="nonzero" d="M25.13 39.95h34.22V0H85.2v39.95h47.65V0h25.84v39.95h47.64V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h47.65V0h25.84v39.95h34.23c6.88 0 13.15 2.82 17.71 7.37l.05.05c4.54 4.55 7.37 10.82 7.37 17.71v247.73c0 6.88-2.83 13.15-7.37 17.71l-.05.05c-4.56 4.54-10.83 7.37-17.71 7.37h-34.23v37.46H426.8v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.65v37.46h-25.84v-37.46h-47.64v37.46h-25.84v-37.46H85.2v37.46H59.35v-37.46H25.13c-6.89 0-13.15-2.83-17.71-7.37l-.05-.05C2.83 325.96 0 319.69 0 312.81V65.08c0-6.89 2.83-13.16 7.37-17.71l.05-.05c4.56-4.55 10.82-7.37 17.71-7.37zm153.11 200.1h-35.98l-13.41-30.42h-8.56v30.42H89.12V137.84h51.51c23.44 0 35.16 11.94 35.16 35.81 0 16.36-5.07 27.15-15.21 32.38l17.66 34.02zm-57.95-77.57v23.5h9.05c3.93 0 6.79-.41 8.59-1.23 1.8-.82 2.7-2.7 2.7-5.64v-9.76c0-2.95-.91-4.83-2.7-5.64-1.8-.82-4.67-1.23-8.59-1.23h-9.05zm212.33 77.57h-34.18l6.21-102.21h42.68l12.76 52h1.14l12.76-52h42.68l6.21 102.21h-34.17l-1.96-49.55h-1.15l-12.43 49.55h-25.02l-12.59-49.55h-.98l-1.96 49.55zm-142.93-51.02c0-18.65 3.49-32.25 10.47-40.8 6.97-8.56 19.56-12.84 37.77-12.84 18.21 0 30.8 4.28 37.78 12.84 6.97 8.55 10.46 22.15 10.46 40.8 0 9.26-.73 17.06-2.2 23.38-1.48 6.32-4.01 11.83-7.61 16.52-3.6 4.69-8.56 8.12-14.88 10.3-6.33 2.18-14.17 3.27-23.55 3.27s-17.22-1.09-23.55-3.27c-6.32-2.18-11.28-5.61-14.88-10.3-3.6-4.69-6.13-10.2-7.6-16.52-1.47-6.32-2.21-14.12-2.21-23.38zm35.16-17.01v42.52h13.57c4.47 0 7.71-.52 9.73-1.56 2.02-1.03 3.03-3.4 3.03-7.11v-42.52h-13.74c-4.36 0-7.55.52-9.57 1.56-2.01 1.03-3.02 3.4-3.02 7.11zM486.16 65.79H25.84V312.1h460.32V65.79z"/>
                        </svg>
                        {{__('translate.ROM Status')}}
                    </span>
                    <span class="show-rom ms-2" id="romSkel"></span>
                </a>
            </li>
            <li>
                <a type="button" class="dropdown-item pro_link btn-bottom-margin" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRightSettings" aria-controls="offcanvasRight" id="setting_click">
                    <span class="show-setting badge rounded-pill bg-doragblue list-sm-btn pt-1" hidden>
                        <svg id="Layer_1" width="20px" height="15px" fill="" data-name="Layer 1" viewBox="0 0 122.88 122.88">
                            <defs><style>.cls-5{fill:#297cf8ff;}</style></defs>
                            <path class="cls-5" d="M73.48,15.84A46.87,46.87,0,0,1,84.87,21L91,14.84a7.6,7.6,0,0,1,10.72,0L108,21.15a7.6,7.6,0,0,1,0,10.72l-6.6,6.6a46.6,46.6,0,0,1,4.34,10.93h9.52A7.6,7.6,0,0,1,122.88,57V65.9a7.6,7.6,0,0,1-7.58,7.58h-9.61a46.83,46.83,0,0,1-4.37,10.81L108,91a7.6,7.6,0,0,1,0,10.72L101.73,108A7.61,7.61,0,0,1,91,108l-6.34-6.35a47.22,47.22,0,0,1-11.19,5v8.59a7.6,7.6,0,0,1-7.58,7.58H57a7.6,7.6,0,0,1-7.58-7.58v-7.76a47.39,47.39,0,0,1-12.35-4.68L31.87,108a7.62,7.62,0,0,1-10.72,0l-6.31-6.31a7.61,7.61,0,0,1,0-10.72l4.72-4.72A47.38,47.38,0,0,1,14,73.48H7.58A7.6,7.6,0,0,1,0,65.9V57A7.6,7.6,0,0,1,7.58,49.4h6.35a47.2,47.2,0,0,1,5.51-12.94l-4.6-4.59a7.62,7.62,0,0,1,0-10.72l6.31-6.31a7.6,7.6,0,0,1,10.72,0l5,5A46.6,46.6,0,0,1,49.4,15V7.58A7.6,7.6,0,0,1,57,0H65.9a7.6,7.6,0,0,1,7.58,7.58v8.26ZM59.86,36.68a24.6,24.6,0,1,1-24.6,24.59,24.59,24.59,0,0,1,24.6-24.59Z"/>
                        </svg>
                        {{__('translate.Settings')}}
                    </span>
                    <span class="show-log ms-2" id="settingSkel"></span>
                </a>
            </li>
            <li>
                <a class="dropdown-item pro_link btn-bottom-margin" id="logout_click">
                    <span class="show-logout badge rounded-pill bg-doragblue list-sm-btn pt-1" hidden>
                        <svg width="20px" height="15px" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 492 512.324"><circle fill="#297cf8ff" cx="231.181" cy="231.181" r="231.181"/><path fill="#3083ffff" d="M437.687 127.171C471.6 167.894 492 220.259 492 277.396c0 129.746-105.183 234.928-234.928 234.928-103.431 0-191.249-66.843-222.619-159.684 40.74 65.851 113.605 109.722 196.728 109.722 127.682 0 231.181-103.499 231.181-231.181 0-37.412-8.899-72.749-24.675-104.01z"/><path fill="#fff" fill-rule="nonzero" d="M287.713 185.327c-7.388-8.54-6.456-21.466 2.084-28.855 8.54-7.388 21.466-6.456 28.855 2.084a115.738 115.738 0 0120.83 35.219c4.704 12.679 7.283 26.248 7.283 40.234 0 31.807-12.941 60.69-33.863 81.641l-.078.078c-20.993 20.943-49.855 33.863-81.641 33.863-31.906 0-60.803-12.941-81.725-33.863-20.916-20.916-33.856-49.813-33.856-81.719 0-13.767 2.479-27.103 7.007-39.528 4.655-12.771 11.556-24.532 20.195-34.802 7.254-8.632 20.145-9.741 28.777-2.487 8.632 7.255 9.74 20.146 2.486 28.777a74.492 74.492 0 00-12.976 22.456c-2.868 7.868-4.436 16.486-4.436 25.584 0 20.583 8.343 39.224 21.82 52.701 13.484 13.485 32.125 21.827 52.708 21.827 20.64 0 39.274-8.314 52.702-21.749l.077-.078c13.435-13.427 21.749-32.061 21.749-52.701 0-9.289-1.61-18.033-4.556-25.966a74.568 74.568 0 00-13.442-22.716zm-36.003 9.182c0 11.331-9.197 20.527-20.527 20.527-11.33 0-20.526-9.196-20.526-20.527v-61.206c0-11.33 9.196-20.526 20.526-20.526s20.527 9.196 20.527 20.526v61.206z"/></svg> 
                        {{__('translate.Logout')}}
                    </span>
                    <span class="show-log ms-2" id="logoutSkel"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>

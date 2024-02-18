@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="card-body manage_role_page">
        <h2 class=" manage_head mb-4">Footer <span class="">Setting</span></h2>

        <ul class="nav nav-tabs tab_bg skeleton" role="tablist">
            <li class="nav-item">
                <a class="nav-link setting active skeleton" data-bs-toggle="tab" href="#home">Company Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link setting skeleton" data-bs-toggle="tab" href="#menu2" onclick="typewriterEffect()">Social-Media</a>
            </li>
        </ul>

        <form action="#" method="POST">
            
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Company Information -->
                <div id="home" class="container tab-pane active skeleton"><br>
                    <h6>Company Information</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="#">would you like to update footer ? Please, click the beside button :</span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="profile_mode">
                        <label id="button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Information Update Mode :
                        <label id="login_enable3a" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable3a" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    @csrf
                    @include('super-admin.forntend.footer._company_information')
                </div>
                <!-- Social Media -->
                <div id="menu2" class="container tab-pane fade"><br>
                    <h6>Social-Media Setting</h6>
                    <p class="text-dark font-weight-bold">
                        <span id="media"></span>
                        <i class="fa-regular fa-hand-point-right fa-beat-fade ms-3 mt-2" style="color: darkcyan;"></i>
                        <input class="company_name form-switch form-check-input skeleton mt-2" type="checkbox" id="media_mode" style="cursor: pointer;">
                        <label id="button_mode" class="input_label profile_yes skeleton mt-1" for="select-user"></label>
                    </p>
                    <p>
                        Social Media Update Mode :
                        <label id="login_enable_social" class="input_label profile_yes enable skeleton mt-1 ps-2 pe-2" for="select-user">Enable</label>
                        <label id="login_disable_social" class="input_label profile_yes disable skeleton mt-1 ps-2 pe-2" for="select-user">Disable</label>
                    </p>
                    @include('super-admin.forntend.footer._social_medias')
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xl-10">

                </div>
                <div class="col-xl-2" style="text-align:end;">
                    <button id="company_btn" type="submit" class="footer_con_update btn btn-sm manage_button update_btn loader_btn app_btn_pill me-2">
                        <i class="update-icon fa fa-spinner fa-spin update-hidden"></i>
                        <span class="btn-text">Update</span>
                    </button>

                    <button id="jubayedTest" type="button">Test</button>
                </div>
            </div>
        </form>
    </div>
    <p class="mt-3 mb-5">
        <span class="Profile_success_message" id="success_message"></span>
    </p>
</div>

@endsection

@section('css')
<!-- ================ manage-role-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/company-profile/company_profile.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/company-profile/app_setting.css">
@endsection

@section('script')
<!-- Sidebar-Writer -->
<script>
    var i = 0;
    var txt = 'Would you like to update app setting ? Please, click the beside button :';
    var speed = 30;

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("demo").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
</script>
<!-- Page-Writer -->
<script>
    function typewritingPage(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingPage("page_set", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Social-Media-Writer -->
<script>
    function typewriterEffect(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewriterEffect("media", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Navbar-Writer -->
<script>
    function typewritingNavbar(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingNavbar("navbar_moduel", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Topbar-Writer -->
<script>
    function typewriting(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewriting("topbar", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>
<!-- Footer-Writer -->
<script>
    function typewritingFocus(elementId, text, speed) {
        var i = 0;

        function type() {
            if (i < text.length) {
                document.getElementById(elementId).innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }
    typewritingFocus("footermenu", "Would you like to update app setting ? Please, click the beside button :", 50);
</script>

<!-- Avatara -->
<script>
    // update avatar
    $("#image_view").on('click', function(e) {
        e.preventDefault();
        $(".edit_image").click();
    });
    // put and upload avatar/image
    $(".edit_image").on('change', function(event) {
        if (event.target.files && event.target.files[0]) {
            const tempurl = URL.createObjectURL(event.target.files[0]);

            $("#image_view").attr('src', tempurl);
        }
    });
</script>

@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._purchases-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._accounts-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._social-media-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._hrm-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._auth-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._layouts-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.side-bar-setting-ajax._components-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.footer-setting-ajax.footer-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.top-bar-setting-ajax.top-bar-setting')
@include('super-admin.setting.app-setting.moduel-setting-ajax.nav-bar-setting-ajax.nav-bar-setting')


<script type="text/javascript">
    // Get Company Profile
    $(document).ready(function() {

        //<----Ajax Form Header Setup for csrf token----------->
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/super-admin/forntend-footer-information/",
            success: function(response) {
                if (response.status == 400) {
                    $.each(response.errors, function(key, err_value) {
                        $('#updateForm_errorList').html("");
                        $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                    });
                } else if (response.status == 404) {
                    $('#updateForm_errorList').html("");
                    $('#success_message').text(response.messages);
                } else {
                    $('#updateForm_errorList').html("");
                    $('#success_message').html("");
                    $('#success_message').fadeIn();


                    // $('#success_message').text(response.messages);
                    // inject
                    $("#update_company_name").val(response.company_name)
                    $("#update_company_address").val(response.company_address)
                    $("#update_contract_number_one").val(response.contract_number_one)
                    $("#update_contract_number_two").val(response.contract_number_two)
                    $("#update_whatapp_number_one").val(response.whatsapp_number_one)
                    $("#update_whatapp_number_two").val(response.whatsapp_number_two)
                    $("#update_hot_number").val(response.hot_number)
                    $("#update_email").val(response.email)
                    $("#update_facebook_address").val(response.	facebook_address)
                    $("#update_linkedin").val(response.linkedin)
                    $("#update_youtube").val(response.youtube_chenel)

                    $("#update_social_media1").val(response.facebook_link)
                    $("#update_social_media2").val(response.messaner_link)
                    $("#update_social_media3").val(response.whatsapp_link)
                    $("#update_social_media4").val(response.linkedin_link)

                    setTimeout(() => {
                        $('#success_message').fadeOut();
                    }, 3000);
                }
            }
        });

    });
</script>
 

<script type="text/javascript">


    // Update Company Profile
    $(document).ready(function() {
        $(document).on('click', '.footer_con_update', function(e) {
            e.preventDefault();

            var data = {
                company_name: $("#update_company_name").val(),
                company_address: $("#update_company_address").val(),
                contract_number_one: $("#update_contract_number_one").val(),
                contract_number_two: $("#update_contract_number_two").val(),
                whatsapp_number_one: $("#update_whatapp_number_one").val(),
                whatsapp_number_two: $("#update_whatapp_number_two").val(),
                hot_number: $("#update_hot_number").val(),
                email: $("#update_email").val(),
                facebook_address: $("#update_facebook_address").val(),
                linkedin: $("#update_linkedin").val(),
                youtube_chenel: $("#update_youtube").val(),

                facebook_link: $("#update_social_media1").val(),
                messaner_link: $("#update_social_media2").val(),
                whatsapp_link: $("#update_social_media3").val(),
                linkedin_link: $("#update_social_media4").val(),
            }

            //<----Ajax Form Header Setup for csrf token----------->
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/super-admin/forntend-footer-update-information/",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 400) {
                        $.each(response.errors, function(key, err_value) {
                            $('#updateForm_errorList').html("");
                            $('#updateForm_errorList').append('<span>' + err_value + '</span>');
                        });
                    } else if (response.status == 404) {
                        $('#updateForm_errorList').html("");
                        $('#success_message').text(response.messages);
                    } else {
                        $('#updateForm_errorList').html("");
                        $('#success_message').html("");
                        $('#success_message').fadeIn();
                        $('#success_message').text(response.message);

                        setTimeout(() => {
                            $('#success_message').fadeOut();
                        }, 3000);
                    }
                }
            });

        });
    });
</script>
@endsection
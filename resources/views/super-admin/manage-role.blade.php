@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="card-body">
        <h2 class=" manage_head mb-4"><span class="page-heading-skeleton">Manage</span> <span class="ps-2 page-heading-skeleton">Role</span></h2>

        <form action="{{ route('updateRole') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <label class="input_label page-heading-skeleton mt-1" for="select-user">Select Email :</label>
                </div>
                <div class="custom-select col-md-4 page-heading-skeleton">
                    <select type="text" class="form-control form-control-sm select2" name="user_id" id="select_user">
                        <option value="">Select Email</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                    <span class="input-error-skeleton text-danger contact_message show-error remove-error-one">@error('user_id')
                        {{$message}}@enderror
                    </span>
                </div>
                <div class="col-md-1 pt-1">
                    <span class="fbox cricale-skeleton"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <label class="input_label page-heading-skeleton mt-1" for="select-role">Select Role :</label>
                </div>
                <div class="custom-select col-md-4 page-heading-skeleton">
                    <select type="text" class="form-control form-control-sm select2" name="role_id" id="select_role">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-error-skeleton text-danger contact_message show-error remove-error-two">@error('role_id')
                        {{$message}}@enderror
                    </span>
                </div>
                <div class="col-md-1 pt-1">
                    <span class="fbox cricale-skeleton"><input id="light_focus2" type="text" class="light2-focus" readonly></input></span>
                </div>
                <div class="col-md-2">
                    <button id="manage_btn" type="submit" class="btn btn-sm manage_button button-skeleton">
                        <span class="updated-icon spinner-border spinner-border-sm text-white updated-hidden" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true"></span>
                        <span class="btn-text">Update Role</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@if(Session::has('success'))
<div class="messg_box mt-3">
    <p style="color:green;">
        <label id="update_message" class="background_success" for="message">{{ Session::get('success') }}</label>
    </p>
</div>
@endif

@endsection

@section('css')
<!-- ================ manage-role-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
<link href="{{ asset('backend_asset') }}/main_asset/css/select2.min.css" rel="stylesheet" />
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for all elements with the 'select2' class
        //$('.select2').select2();
        $('.select2').each(function() {
            // Check the ID or name to set specific options
            if ($(this).attr('id') === 'select_user') {
                $(this).select2({
                    placeholder: 'Select Email',
                    allowClear: true
                });
            } else if ($(this).attr('id') === 'select_role') {
                $(this).select2({
                    placeholder: 'Select Role',
                    allowClear: true
                });
            }
        });
        // Set custom placeholder for the search input inside Select2 dropdowns
        $('#select_user').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search emails...');
        });

        $('#select_role').on('select2:open', function() {
            $('.select2-search__field').attr('placeholder', 'Search roles...');
        });
    });
</script>
<script>
    $(document).ready(() => {
        // Button Loader
        $(".manage_button").on('click', () => {
            $('.updated-icon').removeClass('updated-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Update Role...');
            setTimeout(() => {
                $('.updated-icon').addClass('updated-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Update Role');
            }, 3000);
        });
        // Success Message
        var successMessage = $('#update_message').text().trim();
        if (successMessage) {
            $('#update_message').fadeIn();
            var time = null;
            time = setTimeout(() => {
                $('#update_message').fadeOut(6000);
                $('#update_message').delay(6000);
            }, 3000);
            return ()=>{
                clearTimeout(time);
            }
        }
    });
</script>
<script>
    // page-skeleton
    function headSkeletone() {
      const allSkeleton = document.querySelectorAll('.page-heading-skeleton')
  
      allSkeleton.forEach(item => {
        item.classList.remove('page-heading-skeleton')
      });
    }
  // cricale-skeleton
  function cricaleSkeleton() {
    const allSkeleton = document.querySelectorAll('.cricale-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('cricale-skeleton')
    });
  }
  // button-skeleton
  function buttonSkeleton() {
    const allSkeleton = document.querySelectorAll('.button-skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('button-skeleton')
    });
  }

  setTimeout(() => {
    cricaleSkeleton();
    headSkeletone();
    buttonSkeleton();
  }, 1000);
</script>
<script>
    $(document).ready(function(){
        // select email
        $(document).on('change', '#select_user', function(){
            var email_id = $(this).val();
            $(".remove-error-one").text('');
            $(this).addClass('show-current-border').removeClass('show-success-border');
            $("#light_focus").removeClass('is-invalid');
        });
        // select role
        $(document).on('change', '#select_role', function(){
            var email_id = $(this).val();
            $(".remove-error-two").text('');
            $(this).addClass('show-current-border').removeClass('show-success-border');
            $("#light_focus2").removeClass('is-invalid');
        });
        // error handle
        function checkForErrors() {
            // Error handling for input fields
            $(".show-error").each(function () {
                var errorMessage = $(this).text().trim();
                if (errorMessage !== '') {
                    var errorInput = $(this).closest('.row').find('input');
                    errorInput.addClass('is-invalid').removeClass('show-current-border show-success-border');
                }
            });
        }
        checkForErrors();
    });
</script>
@endsection
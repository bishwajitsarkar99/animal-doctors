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
                    <label class="input_manage_label page-heading-skeleton mt-1" for="select-user">Select Email :</label>
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
                    <label class="input_manage_label page-heading-skeleton mt-1" for="select-role">Select Role :</label>
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
                        <span class="updated-icon spinner-border spinner-border-sm text-white" style="color:white;opacity:1;width:1em;height:1em;" role="status" aria-hidden="true" hidden></span>
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
<script type="module" src="{{asset('/module/module-min-js/design-helper-function-min.js')}}"></script>
<script type="module">
    import { buttonLoader, handleSuccessMessage, removeSkeletonClass, handleInputOrSelectValidation} from "/module/module-min-js/design-helper-function-min.js";
    buttonLoader();
    $(document).ready(function(){

        // Initialize the refresh button loader for the login button
        buttonLoader('.manage_button', '.updated-icon', '.btn-text', 'Update Role...', 'Update Role', 3000);

        // Initialize the message
        handleSuccessMessage('#update_message');

        
        // Select email validation
        $(document).on('change', '#select_user', function() {
            handleInputOrSelectValidation(
                '#select_user',        // Select element
                '.remove-error-one',   // Error message selector
                'show-success-border', // Success class
                'is-invalid',          // Error class
                'show-current-border', // Current border class
                '#light_focus'         // Success message selector (you can remove if not needed)
            );
        });
        // Select role validation
        $(document).on('change', '#select_role', function() {
            handleInputOrSelectValidation(
                '#select_role',        // Select element
                '.remove-error-two',   // Error message selector
                'show-success-border', // Success class
                'is-invalid',          // Error class
                'show-current-border', // Current border class
                '#light_focus2'        // Success message selector (you can remove if not needed)
            );
        });
        // Error handle function refactored to handle input/select validation
        function checkForErrors() {
            handleInputOrSelectValidation(
                '#select_user',        // Select element
                '.remove-error-one',   // Error message selector
                'show-success-border', // Success class
                'is-invalid',          // Error class
                'show-current-border', // Current border class
                '#light_focus'         // Success message selector
            );

            handleInputOrSelectValidation(
                '#select_role',        // Select element
                '.remove-error-two',   // Error message selector
                'show-success-border', // Success class
                'is-invalid',          // Error class
                'show-current-border', // Current border class
                '#light_focus2'        // Success message selector
            );
        }
        // Call the function to handle errors when needed
        checkForErrors();


        // Array of skeleton class names
        const skeletonClasses = [
            'page-heading-skeleton',
            'cricale-skeleton',
            'button-skeleton'
        ];
        // Remove skeleton
        setTimeout(() => {
            removeSkeletonClass(skeletonClasses);
        }, 1000);


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
@endsection
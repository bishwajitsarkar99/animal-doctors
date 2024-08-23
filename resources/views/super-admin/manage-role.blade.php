@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm mange_background">
    <div class="card-body manage_role_page">
        <h2 class=" manage_head mb-4"><span class="page-heading-skeleton">Manage</span> <span class="ps-2 page-heading-skeleton">Role</span></h2>

        <form action="{{ route('updateRole') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <label class="input_label page-heading-skeleton mt-1" for="select-user">Select Email :</label>
                </div>
                <div class="custom-select col-md-4 page-heading-skeleton">
                    <select name="user_id" required class="form-control ui-select" id="select_input"> 
                        <option value="">Select Email </option>
                        @foreach ($users as $user)
                        <option class="option_value" value="{{ $user->id }}">{{ $user->email }}</option>
                        @endforeach
                    </select>
                    <span class="custom-role-arrow me-2"></span>
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
                    <select name="role_id" required class="form-control ui-select" id="select_input">
                        <option class="option_value" value="">Select Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <span class="custom-role-arrow me-2"></span>
                </div>
                <div class="col-md-1 pt-1">
                    <span class="fbox cricale-skeleton"><input id="light_focus" type="text" class="light2-focus" readonly></input></span>
                </div>
                <div class="col-md-2">
                    <button id="manage_btn" type="submit" class="btn btn-sm manage_button button-skeleton">
                        <i class="updated-icon fa fa-spinner fa-spin updated-hidden"></i>
                        <span class="btn-text">Update Role</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if(Session::has('success'))
    <div class="messg_box mt-3">
        <p style="color:green;">
            <label id="update_message" class="role_success_message" for="message">{{ Session::get('success') }}</label>
        </p>
    </div>
    @endif
</div>

@endsection

@section('css')
<!-- ================ manage-role-css ================= -->
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/manage-role-css/manage.css">
@endsection
@section('script')
<script>
    $(document).ready(() => {
        // Button Loader
        $(".manage_button").on('click', () => {
            $('.updated-icon').removeClass('updated-hidden');
            $(this).attr('disabled', true);
            $('.btn-text').text('Update Role...');
            $("#update_message").fadeIn();
            setTimeout(() => {
                $('.updated-icon').addClass('updated-hidden');
                $(this).attr('disabled', false);
                $('.btn-text').text('Update Role');
                $("#update_message").fadeOut();
            }, 3000);
        });
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
@endsection
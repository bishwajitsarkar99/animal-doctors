@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card form-control form-control-sm" id="branch_page">
      <div class="card-body" id="table_card_body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card-body focus-color cd branch_form">
                <div class="row">
                    <div style="justify-content:center;align-items:center;display:flex;">
                        @auth
                            <h4 class="display-6 text-bold top-skeleton" style="color:#555;font-size: 1.5vw;font-weight: 700;font-family: 'Poppins', Sans-serif;">You are not able to access the page !</h4>
                        @endauth
                    </div>
                    <div class="col-xl-5">
                        @auth
                            <span class="user text-capsule ms-5" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;">User</span><br>
                            <span class="image-skeletone">
                                <img class="img-profile rounded-circle" id="userOutput" src="/storage/image/user-image/{{auth()->user()->image}}" alt="error-image"><br>
                            </span>
                            <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Name : {{ auth()->user()->name}}</span><br>
                            <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Email : {{ auth()->user()->login_email}}</span>
                        @else
                            <span class="image-skeletone">
                                <img class="img-profile rounded-circle" id="userOutput" src="/image/828.jpg" alt="user-image">
                            </span>
                            <span class="user text-capsule">Guest User</span>
                        @endauth
                    </div>
                    <div class="col-xl-4">
                        @auth
                            <span class="forbiden_skeletone">
                                <img class="" style="width:200px;height:200px;" src="/image/403 Error Forbidden.gif" alt="error-image">
                            </span>
                        @endauth
                    </div>
                    <div class="col-xl-3">
                        @auth
                            <h1 class="mt-2  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code code-skeletone">403</h1>
                        @endauth
                    </div>
                    <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider error-message" style="color:orangered;justify-content: center;display: flex;">
                        @auth
                            <span>
                                <span class="text-capsule" style="color:#555;font-size: 3vw;font-family: 'Poppins', Sans-serif;">
                                    <strong>Unauthorized</strong>
                                    <span class="" style="font-size: 1.5vw;font-family: 'Poppins', Sans-serif;"> The{{$page_name}}Page.</span>   
                                </span>
                            </span>                
                        @endauth   
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('loader.action-loader')
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/action-loader/action-loader-min.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/suspended-page-asset/suspended-asset.css">
@endsection

@push('scripts')
<script>
    // skeleton
    function pageTopBar() {
        const allSkeleton = document.querySelectorAll('.top-skeleton')

        allSkeleton.forEach(item => {
            item.classList.remove('top-skeleton')
        });
    }
    function imageSkeletone() {
        const allSkeleton = document.querySelectorAll('.image-skeletone')

        allSkeleton.forEach(item => {
            item.classList.remove('image-skeletone')
        });
    }
    function forbidenSkeletone() {
        const allSkeleton = document.querySelectorAll('.forbiden_skeletone')

        allSkeleton.forEach(item => {
            item.classList.remove('forbiden_skeletone')
        });
    }
    function codeSkeletone() {
        const allSkeleton = document.querySelectorAll('.code-skeletone')

        allSkeleton.forEach(item => {
            item.classList.remove('code-skeletone')
        });
    }
    function leftCapsule() {
        const allSkeleton = document.querySelectorAll('.text-capsule')

        allSkeleton.forEach(item => {
            item.classList.remove('text-capsule')
        });
    }
    function btnCapsule() {
        const allSkeleton = document.querySelectorAll('.btn-capsule')

        allSkeleton.forEach(item => {
            item.classList.remove('btn-capsule')
        });
    }

    setTimeout(() => {
        pageTopBar();
        imageSkeletone();
        forbidenSkeletone();
        codeSkeletone();
        leftCapsule();
        btnCapsule();
    }, 2000);
</script>
@endpush('scripts')
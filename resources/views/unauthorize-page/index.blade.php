@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="card card-message form-control form-control-sm">
      <div class="card-body" id="table_card_body">
        <div class="row">
          <div class="col-xl-12">
            <div class="card-body focus-color cd branch_form">
                <div class="row">
                    <div style="justify-content:center;align-items:center;display:flex;">
                        @auth
                            <h4 class="display-6 text-bold top-skeleton" style="color:#555;font-size: 1.1vw;font-weight: 700;font-family: 'Poppins', Sans-serif;">
                                <svg viewBox="0 0 24 24" width="30" height="30" stroke="orange" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                You are not able to access the {{$page_name}} page !
                            </h4>
                        @endauth
                    </div>
                    <div class="col-xl-5">
                        @auth
                            <span class="image-skeletone">
                                <img class="img-profile rounded-circle" id="userOutput" src="/storage/image/user-image/{{auth()->user()->image}}" alt="error-image"><br>
                            </span><br>
                            <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Name : {{ auth()->user()->name}}</span><br>
                            <span class="auth_user text-capsule" style="color:#555;font-weight: 700;font-family: 'Poppins', Sans-serif;font-size:0.9rem">Email : {{ auth()->user()->login_email}}</span>
                        @else
                            <span class="image-skeletone">
                                <img class="img-profile rounded-circle" id="userOutput" src="/image/828.jpg" alt="user-image">
                            </span>
                        @endauth
                    </div>
                    <div class="col-xl-4 text-bold-skeletone" style="text-align:center;align-items:center;">
                        @auth
                            <img class="" style="width:300px;height:300px;margin-top: -10px;" src="/image/403 Error Forbidden.gif" alt="error-image">
                        @endauth
                    </div>
                    <div class="col-xl-3" style="text-align:center;">
                        @auth
                            <h1 class="mt-4  display-1 fw-6 px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider error-code code-skeletone">403</h1>
                            <span class="text-bold-skeletone" style="color:#555;font-size: 2vw;font-family: 'Poppins', Sans-serif;">
                                <strong>Unauthorized</strong>  
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
    function boldText(){
        const allSkeleton = document.querySelectorAll('.text-bold-skeletone')

        allSkeleton.forEach(item => {
            item.classList.remove('text-bold-skeletone')
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
        //forbidenSkeletone();
        codeSkeletone();
        leftCapsule();
        boldText();
        btnCapsule();
    }, 2000);
</script>
@endpush('scripts')
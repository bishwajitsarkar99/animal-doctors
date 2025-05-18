@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

  <div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="url-message-box">
                @auth
                    <span class="border-boxing top-skeleton">
                        <svg viewBox="0 0 24 24" width="40" height="40" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                        <span style="color:#555;">The URL of {{$page_name}} is copy URL, for that this URL does not match current {{$page_name}} page !</span>
                    </span>
                @endauth
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
@extends('backend.layouts.home-page')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="row">
    @include('backend.layouts.dashboard-area-parts._dashboard-main-result')
</div>
<!-- =========== SUMMARY HEAD ============= -->
<h1>Delivery Team</h1>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection
@section('script')
<script>
    // skeleton
    function fetchData(){
        const  allSkeleton = document.querySelectorAll('.skeleton')
    
        allSkeleton.forEach(item=>{
            item.classList.remove('skeleton')
        });
    }

    setTimeout(() => {
        fetchData();
    }, 1000);
</script>
<script src="{{asset('backend_asset')}}/support_asset/date-picker/jquery/jquery-ui.min.js"></script>
@endsection


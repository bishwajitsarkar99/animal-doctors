@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="row">
    @include('backend.layouts.dashboard-area-parts._dashboard-main-result')
</div>
<!-- =========== SUMMARY HEAD ============= -->
<h1>Admin</h1>
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
@endsection


@extends('backend.layouts.home-page')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="row">
    @include('backend.layouts.dashboard-area-parts._dashboard-main-result')
</div>

@endsection

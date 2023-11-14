@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')

<div class="card form-control form-control-sm" id="category_page">
    @include('super-admin.setting.post-setting._category-setting')
    @include('super-admin.setting.post-setting._post-setting')
    <!-- show-message -->
    <div class="col-xl-12 action_message">
        <p class="ps-1"><span id="success_message"></span></p>
    </div>
</div>

{{-- Start Delete Category Modal--}}
    @include('super-admin.setting.post-setting._category-delete')
{{-- End Delete Category Modal---}}

{{-- Start Delete Post Modal--}}
    @include('super-admin.setting.post-setting._post-delete')
{{-- End Delete Post Modal---}}
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/brand/brand.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/post/setting/setting.css">
@endsection

@section('script')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
@include('super-admin.setting.post-setting.setting-ajax.setting-handel-ajax')
@include('super-admin.setting.post-setting.setting-ajax.post-setting')
<script>
  // skeleton
  function fetchData() {
    const allSkeleton = document.querySelectorAll('.skeleton')

    allSkeleton.forEach(item => {
      item.classList.remove('skeleton')
    });
  }

  setTimeout(() => {
    fetchData();
  }, 1000);
</script>
@endsection
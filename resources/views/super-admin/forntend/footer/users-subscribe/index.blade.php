@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<div class="card form-control form-control-sm" id="category_page">
  @include('super-admin.forntend.footer.users-subscribe._recent_subscriber_table')
  @include('super-admin.forntend.footer.users-subscribe._allsubscriber')
  <!-- show-message -->
  <div class="col-xl-12 action_message">
      <p class="ps-1"><span id="success_message"></span></p>
  </div>
</div>
@include('super-admin.forntend.footer.users-subscribe._recent_newsletter_delete')
@include('super-admin.forntend.footer.users-subscribe.history.newsletter_history')
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/category/category.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/product-item/brand/brand.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/post/setting/setting.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/main_asset/custom-css/paginate-css/users-paginate.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/forntend/news_letter.css">
<link rel="stylesheet" href="{{asset('backend_asset')}}/support_asset/date-picker/css/jquery-ui.min.css">
@endsection
@section('script')
@include('super-admin.forntend.footer.users-subscribe.ajax-handeler.recent_ajax')
@include('super-admin.forntend.footer.users-subscribe.ajax-handeler.all_search_ajax')
<script src="{{asset('backend_asset')}}/support_asset/product-item/js/medicine-iteam.min.js"></script>
<script>
  $(document).ready(function(){
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
  });
</script>

<script>
  // newsletter print window
  document.getElementById('printBtn').addEventListener('click', function() {
    window.print();
  });
</script>
@endsection

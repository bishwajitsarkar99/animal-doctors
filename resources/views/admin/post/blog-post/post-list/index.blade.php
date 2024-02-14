@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="order-tab">
    <div class="post-bar-bg-color skeleton">
        <a type="button" style="text-decoration: none;" href="{{route('post.index')}}" class="tablinkcreatepost skeleton ps-2 pe-3" id="user_active">{{__('translate.Post-List')}}</a>
        <a type="button" style="text-decoration: none;" href="{{route('create.post')}}" class="tablinkcreatepost skeleton ps-2 pe-3" id="product_inactive">{{__('translate.Add-Post')}}</a>
        <a type="button" style="text-decoration: none;" href="{{route('categories.index')}}" class="tablinkcreatepost skeleton ps-2 pe-3" id="product_inactive">{{__('translate.Category-List')}}</a>
        <a type="button" style="text-decoration: none;" href="{{route('create.category')}}" class="tablinkcreatepost skeleton ps-2 pe-3" id="product_inactive">{{__('translate.Add-Category')}}</a>
    </div>

    <div class="card card-body category-post-table table_scroll skeleton mt-4">
        <table class="view-category-table row-border order-column hover skeleton mt-3" style="width:100%" id="myDataTable">
            <thead class="skeleton">
                <tr class="skeleton">
                    <th class="skeleton head-font">{{__('translate.ID')}}</th>
                    <th class="skeleton head-font">{{__('translate.Catg-ID')}}</th>
                    <th class="skeleton head-font">{{__('translate.Category')}}</th>
                    <th class="skeleton head-font">{{__('translate.Post-Title')}}</th>
                    <th class="skeleton head-font">{{__('translate.Post-Name')}}</th>
                    <th class="skeleton head-font">{{__('translate.Status')}}</th>
                    <th class="skeleton head-font">{{__('translate.Permission')}}</th>
                    <th class="skeleton head-font">{{__('translate.Action')}}</th>
                </tr>
            </thead>
            <tbody class="bg-transparent skeleton">
                @if(count($posts)> 0)

                @foreach($posts as $item)
                <tr class="skeleton">
                    <td class="skeleton">{{$item->id}}</td>
                    <td class="skeleton">{{$item->category_id}}</td>
                    <td class="skeleton">
                        @if ($item->category)
                            {{ $item->category->category_name }}
                        @else
                            <span class="focus_light" style="font-style:italic">No category</span>
                        @endif
                    </td>
                    <td class="skeleton">{{$item->post_title}}</td>
                    <td class="skeleton">{{$item->category_name}}</td>
                    <td class="status_td skeleton">
                        @if($item->navbar_status ==1)
                        <span class="badge bg-danger text-light show" style="letter-spacing: 1px;">Hidden</span>
                        @else
                        <span class="badge bg-info text-light show" style="letter-spacing: 1px;">Shown</span>
                        @endif
                    </td>
                    <td class="status_td skeleton">
                        @if($item->status ==1)
                        <span class="badge bg-danger text-light show" style="letter-spacing: 1px;">Unauthorize</span>
                        @else
                        <span class="badge bg-primary text-light show" style="letter-spacing: 1px;">Approve</span>
                        @endif
                    </td>
                    <td class="skeleton">
                        <a class="skeleton ms-3" href="{{ url('admin/edit-post/'.$item->id) }}"><i class="fa-solid fa-pen-fancy"></i></a>
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td class="error_data text-danger" style="text-align: center;" colspan="11">
                        {{__('translate.Post Data Not Exists On Server!')}}
                    </td>
                </tr>

                @endif

            </tbody>
        </table>
    </div>
    <div class="col-xl-12 action_message">
        @if(Session::has('success'))
        <p id="success_message" class="background_success" style="color:green;">{{ Session::get('success') }}</p>
        @endif
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="{{ asset('backend_asset')}}/support_asset/auth/post/medicine/medicine_post.css">
<link rel="stylesheet" href="{{ asset('backend_asset')}}/support_asset/auth/post/products/products_post.css">
<link rel="stylesheet" href="{{ asset('backend_asset')}}/support_asset/auth/post/animal/animal_post.css">
<link rel="stylesheet" href="{{ asset('backend_asset')}}/support_asset/auth/post/post-main.css">
@endsection

@section('script')
@include('admin.post.handel-ajax.medicine-data')
@include('admin.post.handel-ajax.product-data')
@include('admin.post.handel-ajax.animal-data')
@include('admin.post.handel-ajax.post')
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/nav-bar.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/editors_image.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/medicine-post-js/medicine.js"></script>
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
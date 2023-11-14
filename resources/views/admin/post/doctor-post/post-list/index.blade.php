@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="order-tab">
    <div class="post-bar-bg-color">
        <a type="button" style="text-decoration: none;" href="#" class="tablinkcreatepost ps-2 pe-3" id="user_active">{{__('translate.Doctor-Post-List')}}</a>
        <a type="button" style="text-decoration: none;" href="{{ route('create.doctorpost')}}" class="tablinkcreatepost ps-2 pe-3" id="product_inactive">{{__('translate.Add-Post')}}</a>
    </div>

    <div class="card card-body category-post-table mt-4">
        <table class="view-category-table row-border order-column hover mt-3" style="width:100%" id="myDataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Catg-ID</th>
                    <th>Category</th>
                    <th>Post-Title</th>
                    <th>Status</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($doctor_posts)> 0)

                @foreach($doctor_posts as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->category_id}}</td>
                    <td>{{$item->category_name}}</td>
                    <td>{{$item->post_title}}</td>
                    <td>
                        @if($item->doctor_status ==1)
                        <span class="badge text-danger show" style="letter-spacing: 1px;">Hidden</span>
                        @else
                        <span class="badge show" style="letter-spacing: 1px;">Shown</span>
                        @endif
                    </td>
                    <td>
                        @if($item->permission_status ==1)
                        <span class="badge text-danger show" style="letter-spacing: 1px;">Unauthorize</span>
                        @else
                        <span class="badge text-primary show" style="letter-spacing: 1px;">Approve</span>
                        @endif
                    </td>
                    <td>
                        <a class="ms-3" href="{{ url('admin/doctor-edit/'.$item->id) }}"><i class="fa-solid fa-pen-fancy"></i></a>
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td class="error_data text-danger" style="text-align: center;" colspan="11">
                        Post Data Not Exists On Server!
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
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/nav-bar.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/editors_image.js"></script>
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/medicine-post-js/medicine.js"></script>
@endsection
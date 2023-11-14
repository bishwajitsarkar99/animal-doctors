@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="order-tab">
    <div class="post-bar-bg-color">
        <a type="button" style="text-decoration: none;" href="{{route('post.index')}}" class="tablinkcreatepost ps-2 pe-3" id="user_active">{{__('translate.Back')}}</a>
    </div>

    <form action="{{ url('admin/update-post/'.$posts->id) }}" class="mt-2" id="MedicinePostForm" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body profile-body pb-1">
            @if(Session::get('fail'))
            <div class="alert alert-danger error_message">
                {{Session::get('fail')}}
            </div>
            @endif
            <div class="row">
                <div class="col-xl-12">
                    <div class="row profile-heading">
                        <div class="col-md-6">
                            <input type="hidden" id="medicine_post_id">
                            <span id="savForm_error"></span><span id="updateForm_errorList"></span>
                            <div class="form-group skeleton mt-1">
                                <label class="post_label skeleton" for="contract_number">{{__('translate.Post-Title')}}
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm post_title skeleton" id="post-category" value="{{$posts->post_title}}" name="{{__('translate.post_title')}}" placeholder="Post title" autofocus>
                                <span class="text-danger name_message">@error('post_title')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group skeleton mt-1">
                                <label class="post_label skeleton" for="contract_number">{{__('translate.Slug')}}
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm skeleton" id="post-category" value="{{$posts->slug}}" name="slug" placeholder="{{__('translate.Slug')}}">
                                <span class="text-danger name_message">@error('slug')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group skeleton mt-3 mb-3">
                                <label class="post_label skeleton" for="contract_number">{{__('translate.Post-Category')}}
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <div class="custom-select">
                                    <select class="form-control form-control-sm skeleton" name="category_id" id="post-category" aria-placeholder="{{__('translate.Select Category')}}">
                                        <option value="">{{__('translate.--Select Category--')}}</option>
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}" {{$posts->category_id == $item->id ? 'selected':'' }}>
                                            {{$item->category_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    <span class="custom-list-item-arrow"></span>
                                </div>
                                <span class="text-danger name_message">@error('category_id')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group skeleton mt-3 mb-3">
                                <label class="post_label skeleton" for="contract_number">{{__('translate.Sub-Post-Category')}}
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm skeleton" id="post-category" value="{{$posts->sub_category_name}}" name="sub_category_name" placeholder="{{__('translate.Sub Post Category')}}">
                                <span class="text-danger name_message">@error('sub_category_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group skeleton mt-3 mb-3">
                                <label class="post_label skeleton" for="contract_number">{{__('translate.Post-Name')}}
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm skeleton" id="post-category" value="{{$posts->category_name}}" name="category_name" placeholder="{{__('translate.Post Name')}}">
                                <span class="text-danger name_message">@error('category_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="image_label skeleton" for="contract_number">{{__('translate.YouTube-iframe-link')}}</label>
                            <div class="form-group skeleton mt-3 mb-3">
                                <input type='text' class="form-control form-control-sm skeleton" id="post-category" value="{{$posts->yt_iframe}}" name="yt_iframe" placeholder="{{__('translate.YouTube Link')}}">
                                <span class="text-danger name_message">@error('yt_iframe')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="accordion" id="accordionExample">
                    <!-- Post-Content -->
                    <div class="accordion-item medicine_history">
                        <h2 class="accordion-header skeleton" id="medicineHistory">
                            <button class="accordion-button header_button collapsed post_cat_table skeleton" type="button" data-bs-toggle="collapse" data-bs-target="#medicine_History" aria-expanded="false" aria-controls="collapseTwo">
                                {{__('translate.Main-Content')}}
                            </button>
                        </h2>
                        <div id="medicine_History" class="accordion-collapse collapse" aria-labelledby="medicineHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <textarea class="form-control form-control-sm description" id="my_summernote" name="description" cols="30" rows="10" placeholder="{{__('translate.Post Description')}}">
                                        {!! $posts->description !!}
                                    </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row profile-body">
                <div class="col-xl-12">
                    <h6 class="seo_label skeleton mt-3">{{__('translate.SEO-Meta Tag')}}</h6>
                    <div class="form-group skeleton mt-3 mb-3">
                        <label class="post_label skeleton" for="contract_number">{{__('translate.Meta-Title')}}
                            <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                        </label>
                        <input type="text" class="form-control form-control-sm skeleton" id="post-category" value="{{$posts->meta_title}}" name="meta_title" placeholder="{{__('translate.Meta title')}}">
                        <span class="text-danger name_message">@error('meta_title')
                            <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                            {{$message}}@enderror
                        </span>
                    </div>
                    <div class="form-group skeleton mt-3 mb-3">
                        <label class="post_label skeleton" for="contract_number">{{__('translate.Meta-Keywords')}}
                            <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                        </label>
                        <textarea class="form-control form-control-sm description skeleton" id="post-category" name="meta_keywords" cols="30" rows="3" placeholder="{{__('translate.Meta keywords')}}">
                            {!! $posts->meta_keywords !!}
                        </textarea>
                        <span class="text-danger name_message">@error('meta_keywords')
                            <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                            {{$message}}@enderror
                        </span>
                    </div>
                    <div class="form-group skeleton mt-3 mb-3">
                        <label class="post_label skeleton" for="contract_number">{{__('translate.Meta-Description')}}
                            <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                        </label>
                        <textarea class="form-control form-control-sm description skeleton" id="post-category" name="meta_description" cols="30" rows="6" placeholder="{{__('translate.Meta description')}}">
                            {!! $posts->meta_description !!}
                        </textarea>
                        <span class="text-danger name_message">@error('meta_description')
                            <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                            {{$message}}@enderror
                        </span>
                    </div>
                    <div class="card card-body side_card mt-3">
                        <div class="">
                            <h6 class="status_label skeleton">{{__('translate.Status-Mode')}}</h6>
                            <label class="stats skeleton" for="status_mode">{{__('translate.Would you like to unauthorize this post?')}}</label>
                            <input class="stat skeleton ms-2 mt-1" type="checkbox" name="status" {{$posts->status =='1' ? 'checked':'' }} />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" profile_modal_footer mt-2 pb-4">
            <button type="submit" class="btn btn-sm modal_button update_btn skeleton" id="postAdd">
                <i class="add-icon fa fa-spinner fa-spin add-hidden"></i>
                <span class="btn-text addBtn">Update Post</span>
            </button>
        </div>
    </form>
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
@extends('backend.layouts.dashboard')
@section('content')
@include('backend.layouts.dashboard-components._navbar')
<section class="order-tab">
    <div class="post-bar-bg-color">
        <a type="button" style="text-decoration: none;" href="{{ route('doctors.index')}}" class="tablinkcreatepost ps-2 pe-3" id="user_active">Back</a>
    </div>
    <form action="{{ {{ url('admin/update-doctor/'.$category->id) }})}}" class="mt-2" id="MedicinePostForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body profile-body pb-1">
            <div class="row">
                @if(Session::get('fail'))
                <div class="alert alert-danger error_message">
                    {{Session::get('fail')}}
                </div>
                @endif
                <div class="col-xl-12">
                    <div class="row profile-heading">
                        <div class="col-md-6">
                            <div class="form-group mt-1">
                                <label class="post_label" for="contract_number">Post-Title
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="post-category" value="{{$item->post_title}}" name="post_title" placeholder="Write post title........." autofocus>
                                <span class="text-danger name_message">@error('post_title')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-1">
                                <label class="post_label" for="contract_number">Slug
                                    <i class="post-title-icon fa fa-spinner fa-spin post-title-hidden"></i>
                                </label>
                                <input type="text" class="form-control form-control-sm" id="post-category" name="slug" placeholder="Write slug.........">
                                <span class="text-danger name_message">@error('slug')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row profile-heading">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="label_user_edit" for="name">Category :</label>
                                <select id="category" class="mt-3 ps-1 update_user firstcategory category_name" name="category_id" placeholder="Select-Category">
                                    <option value="0" selected>Selecte Category</option>
                                    @foreach($categories as $row)
                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->category_name}}</option>
                                    @endforeach
                                </select>
                                <i class="category-icon fa fa-spinner fa-spin category-hidden"></i>
                                <span class="text-danger name_message">@error('category_id')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="name">Sub-Category :</label>
                                <select id="subCategory" class="mt-3 ps-1 update_user subcateg sub_category_name" name="sub_category_name" placeholder="Select-Sub-Category">
                                    <option value="0" selected>Selecte Sub Category</option>
                                </select>
                                <i class="subcategory-icon fa fa-spinner fa-spin subcategory-hidden"></i>
                                <span class="text-danger name_message">@error('sub_category_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="email">Medicine-Group :</label>
                                <select id="group" class="mt-3 ps-1 update_user group group_name" name="group_name" placeholder="Select-Group">
                                    <option value="0" selected>Selecte Medicine-Group</option>
                                    @foreach($medicine_groups as $row)
                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->group_name}}</option>
                                    @endforeach
                                </select>
                                <i class="group-icon fa fa-spinner fa-spin group-hidden"></i>
                                <span class="text-danger name_message">@error('group_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="contract_number">Medicine-Name :</label>
                                <select id="medicine_name" class="mt-3 ps-1 update_user subcategory medicine_name" name="medicine_name" placeholder="Select-Medicine Name">
                                    <option value="0" selected>Selected Medicine-Name</option>
                                </select>
                                <i class="medicine-name-icon fa fa-spinner fa-spin medicine-name-hidden"></i>
                                <span class="text-danger name_message">@error('medicine_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label class="label_user_edit" for="contract_number">Medicine-Dogs :</label>
                                <select id="medicine_dogs" class="mt-3 ps-1 update_user dogs medicine_dogs" name="medicine_dogs" placeholder="Select-Medicine-Dogs">
                                    <option value="0" selected>Selected Medicine-Dogs</option>
                                </select>
                                <i class="medicine-dogs-icon fa fa-spinner fa-spin medicine-dogs-hidden"></i>
                                <span class="text-danger name_message">@error('medicine_dogs')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="contract_number">Medicine-Origin :</label>
                                <select id="origin_name" class="mt-3 ps-1 update_user category origin_name" name="origin_name" placeholder="Select-Origin">
                                    <option value="0" selected>Selecte Origin</option>
                                    @foreach($medicine_origins as $row)
                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->origin_name}}</option>
                                    @endforeach
                                </select>
                                <i class="origin-icon fa fa-spinner fa-spin origin-hidden"></i>
                                <span class="text-danger name_message">@error('origin_name')
                                    <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                    {{$message}}@enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="label_user_edit" for="contract_number">Medicine-Size :</label>
                                <select id="product_size" class="mt-3 ps-1 update_user size medicine_size" name="units_name" placeholder="Select-Size">
                                    <option value="0" selected>Selecte Size</option>
                                    @foreach($units as $row)
                                    <option class="sub_name_text" value="{{$row->id}}">{{$row->units_name}}</option>
                                    @endforeach
                                </select>
                                <i class="size-icon fa fa-spinner fa-spin size-hidden"></i>
                                <span class="text-danger name_message">@error('units_name')
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
                    <!-- Category-Content -->
                    <div class="accordion-item medicine_history">
                        <h2 class="accordion-header" id="medicineHistory">
                            <button class="accordion-button header_button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#medicine_History" aria-expanded="false" aria-controls="collapseTwo">
                                Main-Content
                            </button>
                        </h2>
                        <div id="medicine_History" class="accordion-collapse collapse" aria-labelledby="medicineHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <textarea class="form-control form-control-sm description" id="my_summernote" name="description" cols="30" rows="10" placeholder="Post Description.............."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2 offset-10">
                    <div class="card card-body medicine_side_bar">
                        <label class="image_label" for="contract_number">Medicine-Image</label>
                        <div class="form-group">
                            <div class="img-area">
                                <img class="register_img " id="image_view" src="{{asset('backend_asset')}}/main_asset/img/thumbinal2.jpg" alt="Image 500X500">
                            </div>
                            <input accept="image/*" type='file' class="image mt-2" name="image">
                            <span class="text-danger name_message">@error('image')
                                <i class="fa-regular fa-hand-point-right fa-beat" style="color: orangered;"></i>
                                {{$message}}@enderror
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" profile_modal_footer mt-2 pb-4">
            <button type="submit" class="btn btn-sm modal_button add_btn cate_btn" id="postAdd">
                <i class="add-icon fa fa-spinner fa-spin add-hidden"></i>
                <span class="btn-text addBtn">ADD</span>
            </button>
            <button type="reset" class="btn btn-sm text-danger modal_button cancel_btn" id="cancel_btn">Cancel</button>
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
<script src="{{asset('backend_asset')}}/support_asset/auth/post/js/medicine-post-js/medicine.js"></script>
@endsection
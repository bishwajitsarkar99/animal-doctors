<?php
namespace App\LogicBild\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\Admin\PostFormRequest;
use App\Http\Requests\Admin\DoctorFormRequest;
use App\Models\CompanyProfile;
use App\Models\Post\PostCategory;
use App\Models\Post\PostTable;
use App\Models\Post\DoctorPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;


class PostServiceProvider
{
    // ========================= Category Post =================================
    // =========================================================================
    /**
     * Handle Category Post View
    */
    public function viewCategoriesPostList()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::where('status','=',0)->latest()->paginate(10);
        return view('admin.post.blog-post.index',compact('company_profiles','category'));
    }
    /**
     * Handle Create Category Post View
    */
    public function viewCategoriesPost()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.add-category.create',compact('company_profiles'));
    }
    /**
     * Handle Create Post-Category Event
    */
    public function createPostCategories(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new PostCategory;
        $category->post_title = $data['post_title'];
        $category->slug = $data['slug'];
        $category->category_name = $data['category_name'];
        $category->sub_category_name = $data['sub_category_name'];
        $category->meta_title = $data['meta_title'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->meta_description = $data['meta_description'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('post/category/', $filename);
            $category->image = $filename;
        }

        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect('admin/categories-list')->with('success', 'The category has added successfully.');
    }
    /**
     * Handle Edit Post-Category Event
    */
    public function editPostCategories($category_id)
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::find($category_id);
        return view('admin.post.blog-post.edit-category.edit', compact('category','company_profiles'));
    }
    /**
     * Handle Update Post-Category Event
    */
    public function updatePostCategories(CategoryFormRequest $request,$category_id)
    {
        $data = $request->validated();

        $category = PostCategory::find($category_id);
        $category->post_title = $data['post_title'];
        $category->slug = $data['slug'];
        $category->category_name = $data['category_name'];
        $category->sub_category_name = $data['sub_category_name'];
        $category->meta_title = $data['meta_title'];
        $category->meta_keywords = $data['meta_keywords'];
        $category->meta_description = $data['meta_description'];
        $category->description = $data['description'];

        if($request->hasfile('image'))
        {
            $destination = 'post/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('post/category/', $filename);
            $category->image = $filename;
        }

        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/categories-list')->with('success', 'The category has updated successfully.');
    }


    // ========================= Post-List =====================================
    // =========================================================================
    /**
     * Handle Post-List View
    */
    public function viewPostList()
    {
        $posts = PostTable::where('navbar_status','=',0)->latest()->paginate(10);
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.post-list.index', compact('company_profiles','posts'));
    }
    /**
     * Handle Create Post Page
    */
    public function createPostPage()
    {
        $category = PostCategory::where('status','=',0)->get();
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        return view('admin.post.blog-post.post-create.create', compact('company_profiles','category'));
    }
    /**
     * Handle Create Post Event
    */
    public function createPost(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new PostTable;
        $post->category_id = $data['category_id'];
        $post->post_title = $data['post_title'];
        $post->slug = $data['slug'];
        $post->category_name = $data['category_name'];
        $post->sub_category_name = $data['sub_category_name'];
        $post->meta_title = $data['meta_title'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->meta_description = $data['meta_description'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->navbar_status = $request->navbar_status == true ? '1':'0';
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();
        return redirect('admin/post-list')->with('success', 'The post has added successfully.');
    }
    /**
     * Handle Edit Post Event
    */
    public function editPosts($id)
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $category = PostCategory::where('status','=',0)->get();
        $posts = PostTable::find($id);
        return view('admin.post.blog-post.post-edit.edit',compact('company_profiles','category','posts'));
    }
    /**
     * Handle Update Post Event
    */
    public function updatePosts(PostFormRequest $request,$id)
    {
        $data = $request->validated();

        $post = PostTable::find($id);
        $post->category_id = $data['category_id'];
        $post->post_title = $data['post_title'];
        $post->slug = $data['slug'];
        $post->category_name = $data['category_name'];
        $post->sub_category_name = $data['sub_category_name'];
        $post->meta_title = $data['meta_title'];
        $post->meta_keywords = $data['meta_keywords'];
        $post->meta_description = $data['meta_description'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];

        $post->status = $request->status == true ? '1':'0';
        $post->update();
        return redirect('admin/post-list')->with('success', 'The post has updated successfully.');
    }


    // ========================= Doctor-Post ===================================
    // =========================================================================
    /**
     * Handle Doctor-Post Page View
    */
    public function viewDoctorPost()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $doctor_posts = DoctorPost::orderBy('id','ASC')->get();
        return view('admin.post.doctor-post.post-list.index', compact('company_profiles','doctor_posts'));
    }
    /**
     * Handle Create Doctors Post Page View
    */
    public function viewCreateDoctorsPost()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $categories = DB::table('categories')->orderBy('category_name','ASC')->get();
        $units = DB::table('units')->orderBy('units_name','ASC')->get();
        $medicine_origins = DB::table('medicine_origins')->orderBy('origin_name','ASC')->get();
        $medicine_groups = DB::table('medicine_groups')->orderBy('group_name','ASC')->get();
        return view('admin.post.doctor-post.add-post.index',compact('company_profiles','categories','units','medicine_origins','medicine_groups'));
    }
    /**
     * Handle Create Doctors Post Event
    */
    public function createMedicinePost(DoctorFormRequest $request)
    {
        $data = $request->validated();

        $doctors_post = new DoctorPost;
        $doctor_posts->category_id = $data['category_id'];
        $doctor_posts->post_title = $data['post_title'];
        $doctor_posts->slug = $data['slug'];
        $doctor_posts->category_name = $data['category_name'];
        $doctor_posts->sub_category_name = $data['sub_category_name'];
        $doctor_posts->group_name = $data['group_name'];
        $doctor_posts->medicine_name = $data['medicine_name'];
        $doctor_posts->medicine_dogs = $data['medicine_dogs'];
        $doctor_posts->origin_name = $data['origin_name'];
        $doctor_posts->units_name = $data['units_name'];
        $doctor_posts->description = $data['description'];

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('post/medicine/', $filename);
            $doctor_posts->image = $filename;
        }

        $doctor_posts->doctor_status = $request->doctor_status == true ? '1':'0';
        $doctor_posts->permission_status = $request->permission_status == true ? '1':'0';
        $doctor_posts->created_by = Auth::user()->id;

        return redirect('admin/doctors')->with('success', 'The medicine post has added successfully.');
    }
    /**
     * Handle Sub-Category-Data Fetch For Depenable Dropdown View
    */
    public function requestSubcategories($id)
    {
        $sub_categories = DB::table('sub_categories')->where('category_id', $id)->orderBy('sub_category_name','ASC')->get();
        return response()->json($sub_categories);
    }
    /**
     * Handle Medicine-Name-Data Fetch For Depenable Dropdown View
    */
    public function requestMedicineNames($id)
    {
        $medicine_names = DB::table('medicine_names')->where('group_id', $id)->orderBy('medicine_name','ASC')->get();
        return response()->json($medicine_names);
    }
    /**
     * Handle Medicine-Dogs-Data Fetch For Depenable Dropdown View
    */
    public function requestMedicineDosage($id)
    {
        $medicine_dogs = DB::table('medicine_dogs')->where('medicine_id', $id)->orderBy('dosage','ASC')->get();
        return response()->json($medicine_dogs);
    }
}

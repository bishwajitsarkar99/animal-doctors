<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Post\DoctorPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\DoctorFormRequest;
use Illuminate\Support\Facades\Cache;

class MedicinePostController extends Controller
{   
    // Doctor-Post Main Page---------------------
    public function index()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $doctor_posts = DoctorPost::orderBy('id','ASC')->get();
        return view('admin.post.doctor-post.post-list.index', compact('company_profiles','doctor_posts'));
    }

    // Sub-Category-Data Fetch For Depenable Dropdown---------------------
    public function requestSubcategory($id)
    {
        $sub_categories = DB::table('sub_categories')->where('category_id', $id)->orderBy('sub_category_name','ASC')->get();
        return response()->json($sub_categories);
    }

    // Medicine-Name-Data Fetch For Depenable Dropdown---------------------
    public function requestMedicineName($id)
    {
        $medicine_names = DB::table('medicine_names')->where('group_id', $id)->orderBy('medicine_name','ASC')->get();
        return response()->json($medicine_names);
    }

    // Medicine-Dogs-Data Fetch For Depenable Dropdown---------------------
    public function requestMedicineDogs($id)
    {
        $medicine_dogs = DB::table('medicine_dogs')->where('medicine_id', $id)->orderBy('dosage','ASC')->get();
        return response()->json($medicine_dogs);
    }
    public function createDoctorPost()
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

    // Medicine-Post For Doctors
    public function storageMedicinePost(DoctorFormRequest $request)
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

}

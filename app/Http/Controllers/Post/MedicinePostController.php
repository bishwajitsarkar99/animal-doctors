<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DoctorFormRequest;
use App\LogicBild\Post\PostServiceProvider;

class MedicinePostController extends Controller
{   
    protected $postServiceProvider;

    // inject PostServiceProvider
    public function __construct(PostServiceProvider $postServiceProvider)
    {
        return $this->postServiceProvider = $postServiceProvider;
    }

    // Doctor-Post Main Page---------------------
    public function index()
    {
        return $this->postServiceProvider->viewDoctorPost();
    }

    // Sub-Category-Data Fetch For Depenable Dropdown---------------------
    public function requestSubcategory($id)
    {
        return $this->postServiceProvider->requestSubcategories($id);
    }

    // Medicine-Name-Data Fetch For Depenable Dropdown---------------------
    public function requestMedicineName($id)
    {
        return $this->postServiceProvider->requestMedicineNames($id);
    }

    // Medicine-Dogs-Data Fetch For Depenable Dropdown---------------------
    public function requestMedicineDogs($id)
    {
        return $this->postServiceProvider->requestMedicineDosage($id);
    }

    // Create Doctors Post View
    public function createDoctorPost()
    {   
        return $this->postServiceProvider->viewCreateDoctorsPost();
    }

    // Medicine-Post For Doctors
    public function storageMedicinePost(DoctorFormRequest $request)
    {
        return $this->postServiceProvider->createMedicinePost($request);
    }

}

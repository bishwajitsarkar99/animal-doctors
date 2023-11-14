<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Post\DoctorPost;

class DoctorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =[
            'post_title'=>[
                'required',
                'string',
                'max:200'
            ],
            'slug'=>[
                'required',
                'string',
                'max:200'
            ],
            'category_id'=>[
                'required',
                'string',
                'max:200'
            ],
            'category_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'sub_category_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'group_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'medicine_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'medicine_dogs'=>[
                'required',
                'string',
                'max:200'
            ],
            'origin_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'units_name'=>[
                'required',
                'string',
                'max:200'
            ],
            'description'=>[
                'nullable',
                'string',
            ],
            'image'=>[
                'mimes:jpeg,png,jpg,giv,svg|max:2048',
            ],
            'doctor_status'=>[
                'nullable'
            ],
        ];

        return $rules;
    }
}

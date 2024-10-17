<?php
namespace App\LogicBild\SettingService;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use App\Models\Post\PostCategory;
use App\Models\Post\PostTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostSettingServiceProvicer
{
    // ========================= Post Category Setting =========================
    // =========================================================================
    /**
     * Handle Post Category Setting view
    */
    public function viewPostSetting()
    {
        $company_profiles = Cache::rememberForever('company_profiles', function () {
            return companyProfile::find(1);
        });
        $post_categories = DB::table('post_categories')->orderBy('id', 'ASC')->get();
        $post_tables = DB::table('post_tables')->orderBy('id', 'ASC')->get();
        return view('super-admin.setting.post-setting.index', compact('company_profiles', 'post_categories', 'post_tables'));
    }
    /**
     * Handle Post Category Fetch Data
    */
    public function getPostCategories(Request $request)
    {
        if ($request->ajax() == false) {
            // return abort(404);
        }

        $data = PostCategory::orderBy('id', 'desc')->latest();

        if ($query = $request->get('query')) {
            $data->where('id', 'LIKE', '%' . $query . '%')
                ->orWhere('post_title', 'LIKE', '%' . $query . '%')
                ->orWhere('category_name', 'LIKE', '%' . $query . '%')
                ->orWhere('sub_category_name', 'LIKE', '%' . $query . '%')
                ->orWhere('status', 'LIKE', '%' . $query . '%');
        }
        $perItem = 10;
        if ($request->input('per_item')) {
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();

        return response()->json($data, 200);
    }
    /**
     * Handle Post Category Hide Status Update Event
    */
    public function postCategoryStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $status = (bool)$request->input('status');
        $status = !$status;

        $data = PostCategory::findOrFail($id);

        $data->update([
            'status' => (int)$status,
        ]);

        return response()->json([
            'messages' => 'The Post Category Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle Post Category Delete Event
    */
    public function deletePostCategories(Request $request ,$folder ,$filename ,$id)
    {
        $post_category = PostCategory::find($id);

        if (!$post_category) {
            return response()->json([
                'status' => 404,
                'messages' => 'Post category not found',
            ]);
        }
        $post_category->delete();

        $filePath = public_path('post'. '/' . $folder) . '/' . $filename;

        if (File::exists($filePath)) {
            File::delete($filePath);
            return response()->json([
                'messages' => 'File deleted successfully'
            ]);
        }
        return response()->json([
            'status' => 200,
            'messages' => 'The post category is deleted successfully',
        ]);
    }
    /**
     * Handle Post Fetch Data
    */
    public function getMainPosts(Request $request)
    {
        if ($request->ajax() == false) {
            // return abort(404);
        }

        $data = PostTable::orderBy('id', 'desc')->latest();

        if ($query = $request->get('query')) {
            $data->where('id', 'LIKE', '%' . $query . '%')
                ->orWhere('post_title', 'LIKE', '%' . $query . '%')
                ->orWhere('category_name', 'LIKE', '%' . $query . '%')
                ->orWhere('sub_category_name', 'LIKE', '%' . $query . '%')
                ->orWhere('status', 'LIKE', '%' . $query . '%');
        }
        $perItem = 10;
        if ($request->input('per_item')) {
            $perItem = $request->input('per_item');
        }
        $data = $data->paginate($perItem)->toArray();

        return response()->json($data, 200);
    }
    /**
     * Handle Main Post Status Update Event
    */
    public function mainPostStatusUpdate(Request $request)
    {
        $id = (int)$request->input('id');
        $navbar_status = (bool)$request->input('navbar_status');
        $navbar_status = !$navbar_status;

        $data = PostTable::findOrFail($id);

        $data->update([
            'navbar_status' => (int)$navbar_status,
        ]);

        return response()->json([
            'messages' => 'The Main Post Access Permission has Updated Successfully',
            'code' => 202,
        ], 202);
    }
    /**
     * Handle Post Delete Event
    */
    public function deleteMainPosts($id)
    {
        $main_post = PostTable::find($id);
        $main_post->delete();

        return response()->json([
            'status' => 200,
            'messages' => 'The main post is deleted successfully',
        ]);
    }
}

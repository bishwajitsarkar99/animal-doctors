<?php

namespace App\Http\Controllers\FileManagerController;

use App\Http\Controllers\Controller;
use App\Models\Folder\Folder_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileManagerController extends Controller
{
    // show folder name
    public function modalContent()
    {
        return view('backend.layouts.layouts-components.file-manager._file_manager');
    }

    // Get Folders
    public function getFolder()
    {
        $folders = Folder_entry::all();
        return response()->json([
            'folders' => $folders
        ]);
    }

    // Fetch Folder
    public function fetchFolder(Request $request){
        if($request->ajax() == false){
            // return abort(404);
        }

        $data = Folder_entry::orderBy('id','desc')->latest();

        if( $query = $request->get('query')){
            $data->where('id','LIKE','%'.$query.'%')
                ->orWhere('folder_name','LIKE','%'.$query.'%');      
        } 
        $perItem = 1;
        if($request->input('per_item')){
            $perItem = $request->input('per_item');
        }

        $data = $data->paginate($perItem)->toArray();
        
        return response()->json( $data, 200);
    }

    // Fetch Folder For Select View
    public function getFolderSelect(Request $request){
       $folders = Folder_entry::all();
       return  response()->json([
        'folders' => $folders,
       ]);
    }

    // Edit Folder
    public function editFolder($id){
        $folder_names = Folder_entry::find($id);
        if($folder_names){
            return response()->json([
                'status'=> 200,
                'messages'=> $folder_names,
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'messages'=> 'Folder Name is not found',
            ]);
        }
    }
    // Update Folder Name
    public function updateFolder(Request $request, $id){
        $validator = validator::make($request->all(),[
            'folder_name'=>'required|max:191',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=> 400,
                'errors'=> $validator->messages(),
            ]);
        }    
        else{
            $folders = Folder_entry::find($id);
            if($folders){
                $folders->folder_name = $request->input('folder_name');
                $folders->update();
                return response()->json([
                    'status'=> 200,
                    'messages'=> 'Folder name updated successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=> 404,
                    'messages'=> 'Folder Name is not found',
                ]);
            } 
        }
    }

    // Delete Folder Name
    public function deleteFolder($id){
        $folder_entries = Folder_entry::find($id);
        $folder_entries->delete();

        return response()->json([
            'status'=> 200,
            'messages'=> 'Folder has deleted successfully',
        ]);
    }
    // Create Folder
    // public function createFolder(Request $request)
    // {

    //     $request->validate([
    //         'folder_name' => 'required|string|max:255',
    //     ]);

    //     $folderName = $request->input('folder_name');
    //     $folderPath = public_path('uploads') . '/' . $folderName;

    //     if (!File::exists($folderPath)) {
    //         File::makeDirectory($folderPath, 0777, true, true);
    //         return response()->json(['success' => 'Folder created successfully']);
    //     }

    //     return response()->json(['error' => 'Folder already exists']);
    // }

    public function createFolder(Request $request){

        $validators = Validator::make($request->all(),[
            'folder_name'=>'required|string|max:255',
        ]);
        if($validators->fails()){
            return response()->json([
                'status'=> 400,
                'errors' =>$validators->messages(),
            ]);
        }    
        else{
            $Folder_entries = new Folder_entry;
            $Folder_entries->folder_name = $request->input('folder_name');
            $Folder_entries->save();
            return response()->json([
                'status'=> 200,
                'messages'=> 'Folder has Created successfully',
            ]);
        }
    }
    // Upload File with request
    public function uploadFile(Request $request)
    {
        
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,pdf,csv,mp4|max:2048',
            'folder_name' => 'required|string'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $folder = $request->input('folder_name');
            $folderPath = ($folder) ? public_path('uploads/' . $folder) : public_path('uploads');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move($folderPath, $fileName);

            return response()->json([
                'status' => 200,
                'messages' => 'File uploaded successfully',
            ]);
        }

        return response()->json([
            'status' => 404,
            'messages' => 'File not found'
        ]);
    }
    // Get Files
    public function showFiles($folder){
        $folderPath = public_path('uploads/' . $folder);
        $files = [];

        if (file_exists($folderPath)) {
            $files = array_diff(scandir($folderPath), ['.', '..']);
        }

        return response()->json([
            'files' => $files,
            'folder' => $folder
        ]);
    }
    // Delete File
    public function delete(Request $request, $folder, $filename)
    {
        $filePath = public_path('uploads'. '/' . $folder) . '/' . $filename;

        if (File::exists($filePath)) {
            File::delete($filePath);
            return response()->json(['messages' => 'File deleted successfully']);
        }

        return response()->json(['error' => 'File not found']);
    }
}

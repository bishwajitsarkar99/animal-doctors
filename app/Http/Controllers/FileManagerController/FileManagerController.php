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
        $validator = Validator::make($request->all(), [
            'folder_name' => 'required|max:191',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
    
        $folder = Folder_entry::find($id);
    
        if ($folder) {
            $oldFolderName = $folder->folder_name;
            $newFolderName = $request->input('folder_name');
    
            $oldFolderPath = public_path('uploads/' . $oldFolderName);
            $newFolderPath = public_path('uploads/' . $newFolderName);
    
            // Check if the old folder exists and rename it
            if (file_exists($oldFolderPath)) {
                if (!file_exists($newFolderPath)) {
                    rename($oldFolderPath, $newFolderPath);
                } else {
                    return response()->json([
                        'status' => 409,
                        'messages' => 'Folder with this name exists!',
                    ]);
                }
            }
    
            // Update the folder name in the database
            $folder->folder_name = $newFolderName;
            $folder->update();
    
            return response()->json([
                'status' => 200,
                'messages' => 'Folder name has updated',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'messages' => 'Folder not found',
            ]);
        }
    }

    // Delete Folder Name
    public function deleteFolder($id){
        $folder = Folder_entry::find($id);

        if ($folder) {
            $folderPath = public_path('uploads/' . $folder->folder_name);

            // Check if the folder exists before deleting
            if (file_exists($folderPath)) {
                // Delete the folder and its contents
                $this->deleteFolderWithContents($folderPath);
            }

            // Delete the folder entry from the database
            $folder->delete();

            return response()->json([
                'status' => 200,
                'messages' => 'Folder has deleted',
            ]);
        }

        return response()->json([
            'status' => 404,
            'messages' => 'Folder not found',
        ]);
    }
    /**
     * Recursively delete a folder and its contents.
     */
    private function deleteFolderWithContents($folderPath)
    {
        if (!is_dir($folderPath)) {
            return;
        }

        $files = array_diff(scandir($folderPath), ['.', '..']);

        foreach ($files as $file) {
            $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                $this->deleteFolderWithContents($filePath); // Recursively delete subfolders
            } else {
                unlink($filePath); // Delete file
            }
        }

        rmdir($folderPath); // Finally, remove the empty folder
    }

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
                'messages'=> 'Folder has Created',
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
            $folderPath = public_path('uploads/' . $folder);
    
            // Ensure the folder exists
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
    
            $fileName = $file->getClientOriginalName();
            $filePath = $folderPath . '/' . $fileName;
    
            // Check if the file already exists
            if (file_exists($filePath)) {
                return response()->json([
                    'status' => 409, // Conflict status
                    'messages' => 'This file already exists',
                ]);
            }
    
            // Move the file if it's unique
            $file->move($folderPath, $fileName);
    
            return response()->json([
                'status' => 200,
                'messages' => 'File has been uploaded',
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
            return response()->json(['messages' => 'File has deleted']);
        }

        return response()->json(['error' => 'File not found']);
    }
}

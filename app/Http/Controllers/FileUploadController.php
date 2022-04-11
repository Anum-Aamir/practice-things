<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileUploadController extends Controller
{
    //
    public function index(){
        return view('file-upload');
    }

    // take file and store it to project storage/public/file folder  and then we take its name and path and store to database.
    public function store(Request $request){
        {
         
            $validated = $request->validate([
             'file' => 'required|mimes:csv,xls,xlsx',
     
            ]);
            
            $name = $request->file('file')->getClientOriginalName();
     
            // storing to this path
            $path = $request->file('file')->store('public/files');
     
            
            $file = new File;
     
            $file->name = $name;
            $file->path = $path;

            $file->save();
             return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
     
        }
    }
}
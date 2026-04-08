<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CkEditorController extends Controller
{
  public function ckupload(Request $request)
  {
    $request->validate([
      'upload' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('upload')) {
      $file = $request->file('upload');
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
      $extension = strtolower($file->getClientOriginalExtension());

      if (!in_array($extension, $allowedExtensions)) {
        return response()->json(['error' => 'Invalid file type.'], 400);
      }

      $fileName = md5(time() . uniqid()) . Auth::user()->id . '.' . $extension;
      $path = public_path('images/articles');

      if (!file_exists($path)) {
        mkdir($path, 0755, true);
      }

      $fileName = $file->move($path, $fileName)->getFilename();
      $CKEditorFuncNum = $request->input('CKEditorFuncNum');
      $url = asset('images/articles/' . $fileName);
      $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
      echo $response;
      exit;
    }

    return false;
  }
}
<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CkEditorController extends Controller
{
  public function ckupload(Request $request)
  {
    if ($request->hasFile('upload')) {
      $originName = $request->file('upload')->getClientOriginalName();
      $fileName = pathinfo($originName, PATHINFO_FILENAME);
      $extension = $request->file('upload')->getClientOriginalExtension();
      $fileName = md5(time()) . Auth::user()->id . '.' . $extension;
      $path = public_path('images/articles');
      $fileName = $request->file('upload')->move($path, $fileName)->getFilename();

      $CKEditorFuncNum = $request->input('CKEditorFuncNum');
      $url = asset('images/articles/' . $fileName);
      $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";

      echo $response;
    }

    return false;
  }
}

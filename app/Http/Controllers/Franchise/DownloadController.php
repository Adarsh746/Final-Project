<?php

namespace App\Http\Controllers\Franchise;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file_name) {
        $file_path = public_path('resumes/'.$file_name);
        return response()->download($file_path);
      }
}

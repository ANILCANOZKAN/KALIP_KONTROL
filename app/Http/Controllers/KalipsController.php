<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\kalip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KalipsController extends Controller
{
    public function index(kalip $kalip){
        return view('KALIP', [
           'kalip' => $kalip,
            'files' => File::where('kalip_id', $kalip->id)->get()
        ]);
    }
}

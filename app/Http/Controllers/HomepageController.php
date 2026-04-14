<?php

namespace App\Http\Controllers;

use App\Models\HomepageInfo;
use App\Models\HomepageFeature;

class HomepageController extends Controller
{
    public function index()
    {
        $info = HomepageInfo::first();
        $features = HomepageFeature::all();

        return view('/frontend/homepage', compact('info', 'features'));
    }
}

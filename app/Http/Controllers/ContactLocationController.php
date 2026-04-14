<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Location;

class ContactLocationController extends Controller
{
    public function index()
    {
        $location = Location::first(); // asumsi hanya 1 data
        return view('frontend.kontaklokasi', compact('location'));
    }
}

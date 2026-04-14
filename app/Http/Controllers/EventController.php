<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $topEvent = Event::where('category', 'top_event')->get();
        $topWorkshop = Event::where('category', 'top_workshop')->get();
        $sharingSession = Event::where('category', 'sharing_session')->get();

        return view('frontend.event', compact('topEvent', 'topWorkshop', 'sharingSession'));
    }
}

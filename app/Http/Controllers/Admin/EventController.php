<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'    => 'required',
            'headline'    => 'required|max:255',
            'subheadline' => 'nullable|max:255',
            'date'        => 'required|date',
            'description' => 'required',
            'image'       => 'required|file|image|max:2048',
            'link_tujuan' => 'nullable|max:255',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('event'), $filename);
        }

        Event::create([
            'category'    => $request->category,
            'headline'    => $request->headline,
            'subheadline' => $request->subheadline,
            'date'        => $request->date,
            'description' => $request->description,
            'image'       => $filename,
            'link_tujuan' => $request->link_tujuan,
        ]);

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil dibuat!');
    }

    public function edit($id_event)
    {
        $event = Event::findOrFail($id_event);
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, $id_event)
    {
        $event = Event::findOrFail($id_event);

        $request->validate([
            'category'    => 'required',
            'headline'    => 'required|max:255',
            'subheadline' => 'nullable|max:255',
            'date'        => 'required|date',
            'description' => 'required',
            'image'       => 'nullable|file|image|max:2048',
            'link_tujuan' => 'nullable|max:255',
        ]);

        $event->category    = $request->category;
        $event->headline    = $request->headline;
        $event->subheadline = $request->subheadline;
        $event->date        = $request->date;
        $event->description = $request->description;
        $event->link_tujuan = $request->link_tujuan;

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($event->image && file_exists(public_path('event/' . $event->image))) {
                unlink(public_path('event/' . $event->image));
            }

            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('event'), $filename);
            $event->image = $filename;
        }

        $event->save();

        return redirect()->route('event.index')
            ->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy($id_event)
    {
        $event = Event::findOrFail($id_event);

        if ($event->image && file_exists(public_path('event/' . $event->image))) {
            unlink(public_path('event/' . $event->image));
        }

        $event->delete();

        return back()->with('success', 'Event berhasil dihapus!');
    }
}

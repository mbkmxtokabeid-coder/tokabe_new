<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        $event_categories = EventCategory::with('event')->latest()->get();
        return view('admin.event_categories.index', compact('event_categories'));
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.event_categories.create', compact('events'));
    }

    public function store(Request $request)
{
    $request->validate([
        'event_id' => 'required|exists:events,id',
        'nama_kategori' => 'array',
        'nama_kategori.*' => 'nullable|string|max:100',
    ]);

    $event = Event::findOrFail($request->event_id);
    $kategoriList = array_filter($request->nama_kategori); 

    if (empty($kategoriList)) {
        
        EventCategory::create([
            'event_id' => $event->id,
            'nama_kategori' => $event->judul,
        ]);
    } else {
        foreach ($kategoriList as $nama) {
            EventCategory::create([
                'event_id' => $event->id,
                'nama_kategori' => $nama,
            ]);
        }
    }

    return redirect()->route('event_categories.index')
                     ->with('success', 'Kategori event berhasil ditambahkan!');
}

    public function edit($event_id)
{
    $event = Event::with('categories')->findOrFail($event_id);
    return view('admin.event_categories.edit', compact('event'));
}

public function update(Request $request, $event_id)
{
    $event = Event::findOrFail($event_id);

    
    $event->categories()->delete();

    
    foreach ($request->nama_kategori as $nama) {
        if (!empty($nama)) {
            $event->categories()->create([
                'nama_kategori' => $nama
            ]);
        }
    }

    return redirect()->route('events.index')->with('success', 'Kategori event berhasil diperbarui!');
}


    public function destroy($id)
    {
        $category = EventCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('event_categories.index')->with('delete', 'Kategori berhasil dihapus!');
    }

    public function getCategories($event_id)
{
    $categories = \App\Models\EventCategory::where('event_id', $event_id)->get(['id', 'nama_kategori']);
    return response()->json($categories);
}

}



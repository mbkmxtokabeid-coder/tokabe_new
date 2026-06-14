<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        
        $participants = Participant::latest()->with(['eventCategory', 'event'])->get();
        return view('admin.participant.index', compact('participants'));
    }

    public function create()
    {
        
        $categories = EventCategory::with('event')->get();
        return view('admin.participant.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik'                 => 'nullable|digits:16|unique:participants,nik',
            'registration_number' => 'nullable|string|max:50',
            'fullname'            => 'required|string|max:255',
            'email'               => 'required|email|max:255',
            'phone'               => 'required|string|max:20',
            'address'             => 'required|string|max:255',
            'event_name'          => 'nullable|string|max:255',
            'event_category_id'   => 'required|exists:event_categories,id',
            'tiket'               => 'nullable|integer|min:1',
        ]);

        Participant::create($validated);

        return redirect()->route('participant.index')
            ->with('success', 'Participant berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        $categories = EventCategory::with('event')->get();
        return view('admin.participant.edit', compact('participant', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);

        $validated = $request->validate([
            'nik'                 => 'nullable|digits:16|unique:participants,nik,' . $participant->id,
            'registration_number' => 'nullable|string|max:50',
            'fullname'            => 'required|string|max:255',
            'email'               => 'required|email|max:255',
            'phone'               => 'required|string|max:20',
            'address'             => 'required|string|max:255',
            'event_name'          => 'nullable|string|max:255',
            'event_category_id'   => 'required|exists:event_categories,id',
            'tiket'               => 'nullable|integer|min:1',
        ]);

        $participant->update($validated);

        return redirect()->route('participant.index')
            ->with('success', 'Participant berhasil diupdate!');
    }

    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return redirect()->route('participant.index')
            ->with('success', 'Participant berhasil dihapus!');
    }
}

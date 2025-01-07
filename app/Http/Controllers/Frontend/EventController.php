<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
{
    $events = Event::paginate(10);
    return view('frontend.events.index', compact('events'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'date' => 'required|date',
    ]);

    Event::create($request->all());

    return redirect()->route('frontend.events.index')->with('success', 'Event created successfully.');
}

public function show(Request $request)
{
    $event = Event::where('id', $request['id'])->first();
    return view('frontend.events.show', compact('event'));
}

public function edit(Request $request)
{
    $event = Event::where('id', $request['id'])->first();
    if ($event) {
        return view('frontend.events.edit', compact('event'));
    }
    return redirect()->route('frontend.events.index')->with('error', 'Event Not Found.');
}

public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'date' => 'required|date',
    ]);

    Event::where('id', $request['id'])->update([
        'name' => $request['name'],
        'date' => $request['date'],
        'description' => $request['description'],
    ]);
    return redirect()->route('frontend.events.index')->with('success', 'Event updated successfully.');
}

public function destroy(Request $request)
{
    Event::where('id', $request['id'])->delete();
    return redirect()->route('frontend.events.index')->with('success', 'Event deleted successfully.');
}

}

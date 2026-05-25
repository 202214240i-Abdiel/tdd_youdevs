<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        $events = Event::all();

        return view('events.index', ['events' => $events]);
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $validatedEventData = $request->validated();

        Event::create($validatedEventData);

        return redirect()->route('events.index');
    }

    public function update(Request $request, Event $event): JsonResponse
    {
        $event->update($request->only([
            'name',
            'featured',
            'date',
            'time',
            'location',
        ]));

        return response()->json($event, 200);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response(null, 204);
    }
}

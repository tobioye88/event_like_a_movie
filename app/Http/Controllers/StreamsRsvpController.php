<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStreamsRsvpRequest;
use App\Http\Requests\UpdateStreamsRsvpRequest;
use App\Models\StreamsRsvp;

class StreamsRsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStreamsRsvpRequest $request)
    {
        StreamsRsvp::create($request->validated());

        return back()
            ->withCookie(cookie()->forever('rsvp_stream_' . $request->stream_id, true))
            ->with('success', 'RSVP submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StreamsRsvp $streamsRsvp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StreamsRsvp $streamsRsvp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStreamsRsvpRequest $request, StreamsRsvp $streamsRsvp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StreamsRsvp $streamsRsvp)
    {
        //
    }
}

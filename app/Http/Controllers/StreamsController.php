<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStreamsRequest;
use App\Http\Requests\UpdateStreamsRequest;
use App\Models\Streams;

class StreamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentStreams = Streams::query()
            ->where('status', 'active')
            ->orderByDesc('event_date')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('pages.streams.index', [
            'recentStreams' => $recentStreams,
        ]);
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
    public function store(StoreStreamsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Streams $stream)
    {
        return view('pages.streams.show', [
            'stream' => $stream,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Streams $streams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStreamsRequest $request, Streams $streams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Streams $streams)
    {
        //
    }
}

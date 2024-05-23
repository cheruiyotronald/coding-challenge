<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = status::all();
        return response()->json($statuses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json(Status::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->input('name');
        $status->save();
        return response()->json(Status::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return response()->json(Status::find($status->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return response()->json(Status::find($status ->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $status ->name = $request->input('name');
        $status->save();

        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return response()->json("Status deleted successfully");
    }
}

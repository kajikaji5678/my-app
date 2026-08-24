<?php

namespace App\Http\Controllers\CMS;

use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Status::class);
        $status = Status::all();
        return StatusResource::collection($status);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Status::class);
        $status = Status::create(['status_name' => $request->name, 'project_id' => 1]);
        return new StatusResource($status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $this->authorize('update', $status);
        $status->update(['status_name' => $request->name]);
        return new StatusResource($status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $this->authorize('delete', $status);
        $status->delete();
        return response()->json(['message' => "消去しました"]);
    }
}

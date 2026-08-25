<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\MasterTrait;

class TypeController extends Controller
{
    use MasterTrait;

    protected $modelClass = Type::class;
    protected $resourceClass = TypeResource::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Type::class);
        $types = Type::all();
        return TypeResource::collection($types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $this->authorize('create', Type::class);
        $type = Type::create(['type_name' => $request->name, 'projects_id' => 1, 'type_color' => "red"]);
        return new TypeResource($type);
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
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $this->authorize('update', $type);
        $type->update(['task_name' => $request->name]);
        return new TypeResource($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $this->authorize('delete', $type);
        $type->delete();
        return response()->json(['message' => "消去しました"]);
    }
}

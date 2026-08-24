<?php

namespace App\Http\Traits;
use App\Http\Controllers\Controller;

/**
 * @mixin Controller
 */

trait MasterTrait
{
    public function index()
    {
        $this->authorize('viewAny', $this->modelClass);
        $items = $this->modelClass::orderBy('id')->get();
        return $this->resourceClass::collection($items);
    }

    public function destroy($item)
    {
        $this->authorize('delete', $item);
        $this->delete();
        return response()->json(['message' => "削除しました"]);
    }
}

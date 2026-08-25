<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\MasterTrait;

class CategoryController extends Controller
{
    use MasterTrait;

    protected $modelClass = Category::class;
    protected $resourceClass = CategoryResource::class;
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create', Category::class);
        //! マジックナンバー注意
        $category = Category::create(['category_name' => $request->name, 'project_id' => 1]);
        return new CategoryResource($category);
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
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update', $category);
        $category->update(['category_name' => $request->name]);
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return response()->json(['message' => "消去しました"]);
    }
}

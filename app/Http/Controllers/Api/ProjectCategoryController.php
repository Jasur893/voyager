<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Http\Requests\StoreProjectCategoryRequest;
use App\Http\Requests\UpdateProjectCategoryRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectCategory = ProjectCategory::all();
        $totalProjectCategory = $projectCategory->count();

        return response()->json([
            'total_ProjectCategory' => $totalProjectCategory,
            'projectCategory' => $projectCategory
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectCategoryRequest $request)
    {
        $month = Carbon::now()->monthName;
        $year = Carbon::now()->year;
        $monthYear = "$month$year";

        if ($request->hasFile('image')){
            $path = $request->file('image')->store("project-categories/$monthYear", 'public');
        }
        $requestData = $request->all();
        $requestData['image'] = $path;

        return ProjectCategory::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $projectCategory = ProjectCategory::findOrFail($id);
            return $projectCategory;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'No Data'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectCategoryRequest  $request
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $month = Carbon::now()->monthName;
        $year = Carbon::now()->year;
        $monthYear = "$month$year";

        if ($request->hasFile('image')){
            $path = $request->file('image')->store("project-categories/$monthYear", 'public');
        }
        $requestData = $request->all();
        $requestData['image'] = $path;

        $projectCategory->update($requestData);
        return 'updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();
        return 'deleted';
    }
}

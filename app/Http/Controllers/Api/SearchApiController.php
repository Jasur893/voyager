<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchApiController extends Controller
{
    public function projectcategories($search)
    {
        $projectcategories = DB::table('project_categories')
            ->where('category_name', 'LIKE', "%$search%");
        return $projectcategories->paginate(2);
    }
}

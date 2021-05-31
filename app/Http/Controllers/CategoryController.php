<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', '!=' ,  0)->get();
        return view('cat', compact('categories'));

    }

    public function parents( Request $request )
    {
        $cat = $request->cat;
        return view('parents', compact('cat'));

    }


    public function cat( Request $request )
    {
        // $request->parent_id

        $cat = Category::where('parent_id', $request->parent_id);


        return response()->json(['status' => true, 'message' => 'success', 'data' => $cat ]);
    }





}

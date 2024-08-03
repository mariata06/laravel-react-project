<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function AllCat() {
        return view('admin.category.index');
    }

    public function AddCat(Request $request) {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            // 'body' => 'required',
        ],
        [
            'category_name.required' => 'Please Input Category name',
            'category_name.max' => 'Category Less Then 255Charts',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        $category = new Category;
        $category -> category_name = $request->category_name;
        $category -> user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success', 'Category Inserted Successfull');
    }
}

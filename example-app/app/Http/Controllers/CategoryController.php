<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat() {
        // $categories = category::all();
        // $categories = Category::latest()->paginate(7);
        // by using query Builder way
        $categories = DB::table('categories')->latest()->paginate(7);
        //для отображения наших данных из базы в таблицу надо передать эти данные (admin.category.index)
        return view('admin.category.index', compact('categories'));
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

        // Inserting data then using ORM
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        // $category = new Category;
        // $category -> category_name = $request->category_name;
        // $category -> user_id = Auth::user()->id;
        // $category->save();

        //Inserting data with Query Builder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'Category Inserted Successfull');
    }
}

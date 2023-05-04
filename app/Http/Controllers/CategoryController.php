<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category(); // создаем новый экземпляр модели Category
        $category->name = $request->input('name'); // присваиваем значение поля "name" из формы
        $category->save(); // сохраняем модель в базе данных

        return redirect()->back();
    }

    public function index()
    {
        $categories = Category::all();
        return view('categs', compact('categories'));
    }

    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        if ($category) {

            return redirect()->back()->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }


    public function indexWithPhotos()
    {
        $categories = Category::with(['photos' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])->get()->sortByDesc(function ($category) {
            return optional($category->photos->first())->updated_at ?? $category->created_at;
        });

        return view('list', compact('categories'));
    }


}

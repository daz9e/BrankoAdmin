<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Photo;

class PhotoController extends Controller
{
    // Display the photo upload form
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    // Process the photo upload form submission
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'required|image|max:2048', // Max size of 2MB
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
        ]);

        $path = $request->file('photo')->store('public/photos');
        $photo = new Photo;
        $photo->name = $validatedData['name'];
        $photo->file_path = $path;
        $photo->category_id = $validatedData['category_id'];
        $photo->save();

        return redirect()-> back() ->with('success', 'Photo uploaded successfully!');
    }
}

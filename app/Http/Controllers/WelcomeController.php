<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $photos = Photo::query()
            ->with(['user', 'category'])
            ->published()
            ->when($request->filled('name'), function ($query) use ($request) {
                $query->withName($request->input('name'));
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->withCategory($request->input('category_id'));
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(8);

        $categories = Category::select('id', 'name')->get();

        return view('welcome', [
            'photos' => $photos,
            'categories' => $categories
        ]);
    }
}

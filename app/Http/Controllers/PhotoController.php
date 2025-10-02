<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::query()
            ->with(['user', 'category'])
            ->where('user_id', auth()->user()->id)
            ->orderBy('updated_at', 'desc')
            ->paginate(8);

        return view('photos.index', [
            'photos' => $photos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Photo::class);

        $photo = new Photo;
        $categories = Category::select('id', 'name')->get();

        return view('photos.edit', [
            'photo' => $photo,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'is_published' => ['sometimes'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:2048'],
        ]);

        $photo = Photo::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'is_published' => $request->has('is_published') ?? false,
            'user_id' => auth()->user()->id,
        ]);

        if ($request->hasFile('photo')) {
            $photo->clearMediaCollection();
            $photo->addMediaFromRequest('photo')
                ->toMediaCollection();
        }

        return to_route('photos.index')->with('success', 'Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        // Gate::authorize('update', $photo);
        $categories = Category::select('id', 'name')->get();

        return view('photos.edit', [
            'photo' => $photo,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'is_published' => ['sometimes'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,avif', 'max:2048'],
        ]);

        $photo->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'is_published' => $request->has('is_published') ?? false,
        ]);

        if ($request->hasFile('photo')) {
            $photo->clearMediaCollection();
            $photo->addMediaFromRequest('photo')
                ->toMediaCollection();
        }

        return to_route('photos.index')->with('success', 'Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();

        return to_route('photos.index')->with('success', 'Deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::latest('id')->paginate();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required|image',
        ]);


        $data = $request->except('_token', 'image');

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $category = Category::create([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
        ]);

        $img = $request->File('image');
        $img_name = rand() . time() . $img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $category->image()->create([
            'path' => $img_name,
        ]);


        return redirect()->route('admin.category.index')
            ->with('msg', __('admin.catAdd'))
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);


        $data = $request->except('_token', 'image');

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $category->update([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
        ]);

        if ($request->hasFile('image')) {
            if ($category->image) {
                File::delete(public_path('images/' . $category->image->path));
                $category->image()->delete();
            }
            $img = $request->File('image');
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $category->image()->create([
                'path' => $img_name,
            ]);
        }


        return redirect()->route('admin.category.index')
            ->with('msg', __('admin.catEdit'))
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            File::delete(public_path('images/' . $category->image->path));
            $category->image()->delete();
        }

        $category->delete();
        return redirect()->route('admin.category.index')
            ->with('msg', __('admin.catDanger'))
            ->with('type', 'danger');
    }
}

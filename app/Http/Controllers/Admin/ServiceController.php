<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\File;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Service::latest('id')->paginate();
         return view('admin.service.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {  
        $data = Category::select('id', 'name')->get();
        return view('admin.service.create', compact('data'));
        
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
              'category_id' => 'required',
        ]);

        
        $data = $request->except('_token', 'image');
        
         $name = [
               'en' => $request->name_en,
               'ar' => $request->name_ar,
          ];

        $service = Service::create([
              'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
              'category_id' => $request->category_id,
        ]);

        $img = $request->File('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        $service->image()->create([
            'path' => $img_name,
        ]);


      return redirect()->route('admin.service.index')
      ->with('msg', __('admin.catAddS'))
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
    public function edit(Service $service)
    {
        $data = Category::select('id', 'name')->get();
        return view('admin.service.edit', compact('data', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
         $request->validate([
              'name_en' => 'required', 
              'name_ar' => 'required',
              'category_id' => 'required', 
        ]);

        
        $data = $request->except('_token', 'image');
        
         $name = [
               'en' => $request->name_en,
               'ar' => $request->name_ar,
          ];

        $service->update([
              'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
              'category_id' => $request->category_id,
        ]);

        if($request->hasFile('image')) {
            if($service->image) {
                File::delete(public_path('images/'.$service->image->path));
                $service->image()->delete();
            } 
            $img = $request->File('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $service->image()->create([
                'path' => $img_name,
            ]);
       }

       return redirect()->route('admin.service.index')
      ->with('msg',__('admin.catEditS'))
      ->with('type', 'info');

}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
         if($service->image) {
                File::delete(public_path('images/'.$service->image->path));
                $service->image()->delete();
            } 
            $service->delete();
             return redirect()->route('admin.service.index')
      ->with('msg',__('admin.catEditS'))
      ->with('type', 'danger');
    }
}

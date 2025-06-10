<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Contact;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function all_orders_provider()
    {
        $user = Auth::user();
        $categoriesId = $user->categories()->pluck('categories.id');
        $orders = ServiceRequest::with(['service', 'user'])->whereHas(
            'service',
            function ($query) use ($categoriesId) {
                $query->whereIn('category_id', $categoriesId);
            }
        )->latest()->get();
        return view('user.all_orders_provider', compact('orders'));
    }

    public function service_details($id)
    {
        $data = Service::findOrFail($id);
        return view('user.service_details', compact('data'));
    }

    public function categories()
    {
        return view('user.categories');
    }

    public function category_service($id)
    {
        $data = Category::findOrFail($id);
        return view('user.category_service', compact('data'));
    }

    public function contact_us()
    {
        return view('user.contact_us');
    }

    public function store_msg(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'msg' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('msg', __('front.contactMsg'));
    }

    public function myorders()
    {
        $myorders = ServiceRequest::where('user_id', Auth::id())->get();
        return view('user.myorders', compact('myorders'));
    }

    public function cancel_order($id)
    {
        $item = ServiceRequest::where('user_id', auth()->id())->findOrFail($id);
        $item->delete();
        return redirect()->back()->with('msg', __('front.orderDanger'))
            ->with('type', 'danger');
    }
}

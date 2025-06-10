<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::select('id', 'name')->get();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:18'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type' => 'required|in:provider,customer',
            'categories'  => 'required_if:type,provider|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'type' => $request->type ?? 'customer',
            'password' => Hash::make($request->password),
        ]);

        if ($request->type === 'provider') {
            $user->categories()->sync($request->categories);
        }

        event(new Registered($user));

        Auth::login($user);

        $auth = Auth::user()->type;
        if ($auth == 'admin') {
            return redirect(route('admin.index', absolute: false));
        }

        return redirect(route('front.index', absolute: false));
    }
}

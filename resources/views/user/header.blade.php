<header class="header-container flex items-center justify-between whitespace-nowrap px-10 py-3">
    <div class="flex items-center gap-4 text-[#0d141c]">
        <div class="size-4">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_6_535)">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z"
                        fill="currentColor">
                    </path>
                </g>
                <defs>
                    <clipPath id="clip0_6_535">
                        <rect width="48" height="48" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <h2 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em]" style="cursor: pointer;">
            {{ __('front.endak') }}
        </h2>
    </div>

    <div class="flex flex-1 justify-end gap-8">
        <div class="flex items-center gap-9">

            {{-- اللغة --}}
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if(app()->getLocale() != $localeCode)
            <a rel="alternate" hreflang="{{ $localeCode }}"
                class="nav-link text-[#0d141c] text-sm font-medium leading-normal"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
            @endif
            @endforeach

            @if(Auth::check() && (auth()->user()->type === 'provider'))
            <a class="nav-link text-sm font-medium leading-normal {{ request()->routeIs('admin.orders') ? 
                'text-green-600 font-bold border-b-2 border-green-600' : 'text-[#0d141c]' }}"
                href="{{ route('front.all_orders_provider') }}">
                {{ __('admin.orders') }}
            </a>
            @endif


            @if(Auth::check() && (auth()->user()->type === 'customer' || auth()->user()->type === 'admin'))
            <a class="nav-link text-sm font-medium leading-normal {{ request()->routeIs('front.myorders') ? 'text-green-600 font-bold border-b-2 border-green-600' : 'text-[#0d141c]' }}"
                href="{{ route('front.myorders') }}">

                @if(auth()->user()->service_requests->count()> 0)
                {{ __('front.myorders') }} [{{ auth()->user()->service_requests->count() }}]

                @else
                {{ __('front.myorders') }}
                @endif
            </a>
            @endif


            {{-- روابط التنقل --}}
            <a class="nav-link text-sm font-medium leading-normal {{ request()->is('/') ? 'text-green-600 font-bold border-b-2 border-green-600' : 'text-[#0d141c]' }}"
                href="{{route('front.index') }}">
                {{ __('front.main') }}
            </a>

            <a class="nav-link text-sm font-medium leading-normal {{ request()->routeIs('front.categories') ? 'text-green-600 font-bold border-b-2 border-green-600' : 'text-[#0d141c]' }}"
                href="{{ route('front.categories') }}">
                {{ __('front.cats') }}
            </a>


            <a class="nav-link text-sm font-medium leading-normal {{ request()->routeIs('front.contact_us') ? 'text-green-600 font-bold border-b-2 border-green-600' : 'text-[#0d141c]' }}"
                href="{{ route('front.contact_us') }}">
                {{ __('front.contactUs') }}
            </a>
        </div>

        {{-- تسجيل الخروج --}}
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">
                <span class="truncate">{{ __('admin.out') }} <i class="fas fa-sign-out-alt"></i></span>
            </button>
        </form>
        @endauth
    </div>
</header>
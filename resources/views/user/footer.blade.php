<style>
    .footer {
        background-color: #111827;
        color: #f3f4f6;
        padding: 60px 20px;
        font-family: 'Cairo', sans-serif;
        direction: rtl;
    }

    .footer h3 {
        color: #34d399;
        font-size: 20px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .footer-grid {
        max-width: 1200px;
        margin: auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 40px;
    }

    .service-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .service-item {
        font-size: 14px;
        color: #d1d5db;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: right;
    }

    .service-item:hover {
        color: #34d399;
    }

    .footer-bottom {
        border-top: 1px solid #374151;
        text-align: center;
        padding-top: 20px;
        margin-top: 40px;
        font-size: 14px;
        color: #9ca3af;
    }
</style>

<footer class="footer">
    <div class="footer-grid">
        <!-- Logo / Brief -->
        <div>
            <h3>{{ __('front.endak') }}</h3>
            <p>{{ __('front.body') }}</p>
        </div>

        <!-- الخدمات -->
        <div>
            <h3>{{ __('front.services') }}</h3>
            <div class="service-grid">
                @foreach(App\Models\Service::latest('id')->get() as $item)
                <div class="service-item">{{ $item->Trans_Name }}</div>
                @endforeach
            </div>
        </div>

        <!-- تواصل معنا -->
        <div>
            <h3>{{ __('front.contactUs') }}</h3>
            <ul style="list-style: none; padding: 0; color: #d1d5db; font-size: 14px;">
                <li style="margin-top: 30px;">
                    {{ __('front.email') }}:
                    <a href="mailto:info@endak.com" style="color: #34d399;">info@endak.com</a>
                </li>
                <li style="margin-top: 30px;">
                    {{ __('front.phone') }}:
                    <a href="tel:+966123456789" style="color: #34d399;">+966 56 840 1348</a>
                </li>
                <li style="margin-top: 30px;">
                    {{ __('front.address') }}: {{ __('front.ksa') }}
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2024 {{ __('front.copyRight') }}</p>
    </div>
</footer>
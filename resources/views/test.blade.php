<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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

    <p> {{__('front.test')}}</p>
</body>

</html>
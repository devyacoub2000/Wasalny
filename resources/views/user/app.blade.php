<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link rel="stylesheet" as="style" onload="this.rel='stylesheet'"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans+Arabic:wght@400;500;700;900&amp;family=Plus+Jakarta+Sans:wght@400;500;700;800" />
    <title> @yield('title',__('front.title'))</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="stylesheet" href="{{asset('front/styles.css')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Bootstrap JS (with Popper) -->

    @if(app()->currentLocale() == 'ar')
    <style>
        body {
            direction: rtl;
            text-align: right;
            font-family: "Noto Sans Arabic", sans-serif;
        }

        .text-start {
            text-align: right !important;
        }

        .text-end {
            text-align: left !important;
        }

        .ms-auto {
            margin-left: auto !important;
            margin-right: 0 !important;
        }

        .me-auto {
            margin-right: auto !important;
            margin-left: 0 !important;
        }

        .ps-3 {
            padding-right: 1rem !important;
            padding-left: 0 !important;
        }

        .pe-3 {
            padding-left: 1rem !important;
            padding-right: 0 !important;
        }

        input,
        textarea,
        select {
            direction: rtl;
            text-align: right;
        }
    </style>
    @else
    <style>
        body {
            direction: ltr;
            text-align: left;
            font-family: "Plus Jakarta Sans", sans-serif;
        }
    </style>
    @endif



    @yield('css')
</head>

<body>
    <div class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden"
        style='font-family: "Plus Jakarta Sans", "Noto Sans Arabic", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">

            @include('user.header')


            @yield('content')


            @include('user.footer')


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        @if(session('msg'))
        Toast.fire({
            icon: "success",
            title: "{{session('msg')}}"
        });
        @endif
    </script>
    @yield('js')
</body>

</html>
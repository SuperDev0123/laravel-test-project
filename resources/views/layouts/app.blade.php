<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Test') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <div class="relative flex h-full w-full flex-1">

        @if (!$fullWidthNoNav)
            @livewire('navigation-menu')
        @endif

        @if (isset($rightSidebar))
            <main
                class="dark:bg-gray-900 w-full flex-1 p-4 flex flex-col items-stretch h-full space-y-4 lg:mr-96 lg:ml-64 pt-20 lg:pt-4">
            @else
                <main
                    class="dark:bg-gray-900 w-full flex-1 flex flex-col items-stretch h-full @if (!$fullWidthNoNav) lg:ml-64 @endif  ">
        @endif

        <x-banner />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif


        {{ $slot }}

        @if (!$fullWidthNoNav)
            </main>
        @endif


        <!-- Page Heading -->
        @if (isset($rightSidebar))
            <aside
                class="fixed top-0 right-0 z-40 w-96 h-screen pt-20 lg:pt-0 transition-transform translate-x-full bg-white border-l border-gray-200 lg:!translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Profilebar" id="user-drawer">
                <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                    {{ $rightSidebar }}
                </div>
            </aside>
        @endif

    </div>


    @stack('modals')

    @livewireScripts
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert', ({
            detail: {
                type,
                message
            }
        }) => {
            Toast.fire({
                icon: type,
                title: message
            })
        })
    </script>

</body>

</html>

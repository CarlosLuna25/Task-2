<!-- component -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<!-- Styles -->
@livewireStyles


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <x-navmenu-header>

    </x-navmenu-header>

    {{-- sidebar component --}}
    <x-sidebar-menu >
    
    </x-sidebar-menu>

    <!-- Contenedor gris al lado de la barra lateral -->
    <div class="ml-16 bg-gray-100 h-full fixed w-full transition-all duration-200 ease-in-out overflow-y-auto">

       
     
        <!-- Contenedor de las 4 secciones -->
        <div class="grid grid-cols-1 gap-4 mt-2 p-4 h-100% overflow-y-auto">
            {{$slot}}
           
        </div>
        
        @stack('modals')

        @livewireScripts

        <script>
            function expandSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.ml-16');
        const fixTables = document.querySelector('.table-fix')

        if (sidebar.style.width === '16rem') {
            sidebar.style.width = '4rem';
          
            mainContent.style.marginLeft = '4rem';
            sidebar.classList.remove('text-left', 'px-6');
            sidebar.classList.add('text-center', 'px-0');
            fixTables.classList.add('mx-auto')
        } else {
           
            sidebar.style.width = '16rem';
            mainContent.style.marginLeft = '16rem';
            sidebar.classList.add('text-left', 'px-6');
            sidebar.classList.remove('text-center', 'px-0');
            fixTables.classList.remove('mx-auto')
        }

        const labels = sidebar.querySelectorAll('span');
        labels.forEach(label => label.classList.toggle('opacity-0'));
    }
 
        </script>
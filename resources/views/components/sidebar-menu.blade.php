<!-- Barra lateral -->
<div id="sidebar"
    class="w-28 bg-white h-screen fixed rounded-none border-none transition-all duration-200 ease-in-out overflow-hidden">
    <!-- Items -->
    <div class="p-2 space-y-4">
        <!-- dashboard -->
        <a href=" {{ route('dashboard')  }}" class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group 
                @if(request()->routeIs('dashboard')) {{'bg-gradient-to-r from-cyan-400 to-cyan-500 w-56 h-10 ml-0 text-white'}} @endif
            ">
            <i class="fas fa-home text-lg"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Dashboard</span>
        </a>

        <!-- products -->
        <a href="{{ route('products') }}" class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group
            @if(request()->routeIs('products')) {{'bg-gradient-to-r from-cyan-400 to-cyan-500 w-56 h-10 ml-0 text-white'}} @endif
            ">
            <i class="fa-solid fa-headset"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Products</span>
        </a>

        <!-- prices -->
        <a href="{{ route('prices') }}" class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group
            @if(request()->routeIs('prices')) {{'bg-gradient-to-r from-cyan-400 to-cyan-500 w-56 h-10 ml-0 text-white'}} @endif
            ">
            <i class="fa-solid fa-money-bill"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Prices</span>
        </a>

        <!-- stocks -->
        <a href="{{ route('inventory') }}" class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group
            @if(request()->routeIs('inventory')) {{'bg-gradient-to-r from-cyan-400 to-cyan-500 w-56 h-10 ml-0 text-white'}} @endif
            ">
            <i class="fas fa-store"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Inventory</span>
        </a>

        <!-- changes -->
        @if (Auth::user()->role== 'Teamleader')
        <a href="{{ route('changes') }}" class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group
            @if(request()->routeIs('changes')) {{'bg-gradient-to-r from-cyan-400 to-cyan-500 w-56 h-10 ml-0 text-white'}} @endif
            ">
            <i class="fa-solid fa-pencil"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Changes</span>
        </a>
        @endif

        <!-- Cerrar sesión -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

           <a href="{{ route('logout') }}"
            class="relative px-3 py-3 flex items-center space-x-4 justify-start text-gray-500 rounded-lg group"
            onclick="highlightSidebarItem(this)">
            <i class="fas fa-sign-out-alt"></i>
            <span class="font-medium transition-all duration-200 opacity-0">Log Out</span>
            </a>
        </form>
     
    </div>
</div>
@extends('layouts.app')

@section('heading')
<div class="relative bg-gray-50">
    
    <div class="relative bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
          
            <div class="w-0 flex-1 flex">
                <a href="{{ route('home') }}">
                    <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                </a>
            </div>
          
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                </button>
            </div>
          
            <nav class="hidden md:flex space-x-10">
                {{-- <a href="#" class="text-gray-500 inline-flex items-center space-x-2 text-base leading-6 font-medium hover:text-gray-900 transition ease-in-out duration-150">
                    link1
                </a> --}}
            </nav>
            
            <div class="hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                @auth
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Register</a>
                    @endif
                @endauth
            </div>

        </div>
    </div>
    </div>

</div>
@endsection

@section('content')

<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">

            (cmd+k + cmd+e)
            <div
                x-data="{ pressed: false }"
                @keydown.cmd.k.window="pressed = true; setTimeout(() => { pressed = false }, 750)"
                @keydown.cmd.e.window="pressed && alert('Combo Worked!')"
            >
            
            </div>
            
            @include('_content')

        </div>
    </div>
</div>

@endsection
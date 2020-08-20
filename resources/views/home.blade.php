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
            
            <div id="cardDashboard" class="bg-white overflow-hidden sm:rounded-lg sm:shadow">

                <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">
          
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                        
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Dashboard
                                </h3>
                            </div>
                        
                            <div class="ml-4 mt-2 flex-shrink-0">
                                <span class="inline-flex rounded-md shadow-sm">
          
                                    <button type="button" onclick="NOTIF.subscribe()" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700">
                                        Suscribir
                                    </button>

                                    <button type="button" onclick="NOTIF.unsubscribe()" class="relative bg-gray-300 text-sm hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center mx-2">
                                        Baja
                                    </button>

                                    <button type="button" onclick="NOTIF.sendNotification();window.livewire.emit('notificationSent');" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        Notificación
                                    </button>

                                </span>
                            </div>

                        </div>
                    </div>

                    <div class="bg-gray-100 px-4 py-5 border-b border-gray-200 sm:px-6">
                        @livewire('notification-list')
                    </div>

                </div>

            </div>

            <div id="cardNotify" class="bg-white overflow-hidden sm:rounded-lg sm:shadow mt-10">
                
            </div>

        </div>
    </div>
</div>

@endsection
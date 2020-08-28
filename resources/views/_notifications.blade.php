<div id="cardDashboard" class="bg-white overflow-hidden sm:rounded-lg sm:shadow">

    <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">

        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Notificaciones
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

                        <button type="button" onclick="NOTIF.sendNotification()" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
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
<div id="cardMenu" class="bg-white overflow-hidden sm:rounded-lg sm:shadow" 
    x-data="dataTab()" id="tab_wrapper"
    x-init="init()"
    >

    <script>
        function dataTab() {
            return {
                tabs: ['tab1', 'tab2'],
                tab: '',
                init() {
                    this.tab = window.location.hash ? window.location.hash.substring(1) : 'tab1';
                    // this.$refs.tab.focus()

                    let aTab = this.tabs.find(
                        t => t == this.tab
                    );
                    this.$refs[aTab].focus()
                }
            }
        }
    </script>

    <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">

        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            
                <div class="ml-4 mt-2">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Tablero
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
            <div>
                
                <!-- Tabs at small breakpoint and up -->
                <div>
                    <nav class="-mb-px flex space-x-8">
                        <a x-ref="tab1" :class="{ 'active': tab === 'tab1' }" @click.prevent="tab = 'tab1'; window.location.hash = 'tab1'" href="#"
                            class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700">
                            Notificaciones
                        </a>
        
                        <a x-ref="tab2" :class="{ 'active': tab === 'tab2' }" @click.prevent="tab = 'tab2'; window.location.hash = 'tab2'" href="#"
                            class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700">
                            Tab2
                        </a>
                    </nav>
                </div>
        
                <!-- The tabs content -->
                <div class="bg-gray-100 px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div x-show="tab === 'tab1'">
                        @include('_notifications')
                    </div>
                    <div x-show="tab === 'tab2'">
                        content tab2
                    </div>
                </div>
                
            </div>
        </div>

    </div>

</div>
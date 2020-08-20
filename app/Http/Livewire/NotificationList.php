<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationList extends Component
{
    public $usuario;
    public $mensajes;
    public $log;
        
    protected $listeners = ['notificationSent'];

    public function mount()
    {
        $ultimoId = 0;
        $user = request()->user();
        $this->mensajes = $user->notifications;
        $this->log = "....";
        
        $this->usuario = request()->query('usuario', $this->usuario) ?? request()->user()->email;
    }

    public function notificationSent()
    {
        $this->log = "notificationSent";
        $this->actualizar();
    }

    public function actualizar()
    {                
        $user = request()->user();

        $this->mensajes = $user->notifications;
    }

    public function render()
    {
        return view('livewire.notification-list');
    }
}

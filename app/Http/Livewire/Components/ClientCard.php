<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Client;

class ClientCard extends Component
{
    public Client $client;
    public function render()
    {
        return view('livewire.components.client-card');
    }
}

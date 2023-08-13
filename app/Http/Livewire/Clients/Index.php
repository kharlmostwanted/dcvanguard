<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;

class Index extends Component
{
    public function render()
    {
        return view('livewire.clients.index');
    }

    public function getClientsProperty()
    {
        return Client::orderBy('company_name', 'ASC')->paginate(10);
    }

    public function getTotalClientsProperty()
    {
        return Client::count();
    }
}

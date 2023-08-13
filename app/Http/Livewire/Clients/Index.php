<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;

class Index extends Component
{
    public $orderBy;

    public function render()
    {
        return view('livewire.clients.index');
    }

    public function getClientsProperty()
    {
        return Client::orderBy($this->orderBy, 'ASC')
            ->paginate(10);
    }

    public function getTotalClientsProperty()
    {
        return Client::count();
    }


    public function getOrderByableColumnsProperty()
    {
        return [
            'company_name' => 'Company Name',
            'representative' => 'Representative',
        ];
    }
}

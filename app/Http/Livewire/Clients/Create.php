<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;

class Create extends Component
{
    public Client $client;

    public function mount()
    {
        $this->client = new Client();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'client.company_name' => 'required|string',
            'client.representative.name' => 'required|string',
            'client.representative.email' => 'required|email|unique:users,email',
            'client.representative.mobile_number' => 'required|numeric|unique:users,mobile_number',
            'client.street' => 'required|string',
            'client.city' => 'required|string',
            'client.province' => 'required|string',
        ];
    }

    public function render()
    {
        return view('livewire.clients.create');
    }

    public function review()
    {
        $this->validate();
    }
}

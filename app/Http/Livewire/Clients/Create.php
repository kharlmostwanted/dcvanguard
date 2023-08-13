<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public Client $client;
    public User $user;

    public function mount()
    {
        $this->client = new Client();
        $this->user = new User();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'client.company_name' => 'required|string',
            'user.name' => 'required|string',
            'user.email' => 'required|email',
            'user.mobile_number' => 'required|numeric',
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

    public function getAddressProperty()
    {
        return implode(', ', [
            $this->client->street,
            $this->client->city,
            $this->client->province
        ]);
    }

    public function save()
    {
        // dd($this->client);
        $this->validate();

        $user = User::firstOrCreate([
            'email' => $this->user->email,
        ], [
            'name' => $this->user->name,
            'mobile_number' => $this->user->mobile_number,
            'password' => Hash::make(str()->random(8)),
        ]);
        $this->client->representative_id = $user->id;
        $this->client->save();
        
        session()->flash('message', 'Client created successfully!');
        // return redirect(route('clients.index'));
    }
}

<?php

namespace App\Http\Livewire\Clients;

use Livewire\Component;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Carbon;

class Edit extends Component
{
    use LivewireAlert;
    
    public Client $client;
    public User $user;

    public function render()
    {
        return view('livewire.clients.edit');
    }

    public function mount()
    {
        $this->user = $this->client->representative;
        $this->client->since = Carbon::parse($this->client->since)->format('Y-m-d');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'client.company_name' => 'required|string',
            'client.since' => 'required|date',
            'user.name' => 'required|string',
            'user.email' => 'required|email',
            'user.mobile_number' => 'required|numeric',
            'client.street' => 'required|string',
            'client.city' => 'required|string',
            'client.province' => 'required|string',
        ];
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

        $user = User::updateOrCreate([
            'email' => $this->user->email,
        ], [
            'name' => $this->user->name,
            'mobile_number' => $this->user->mobile_number,
            'password' => Hash::make(str()->random(8)),
        ]);
        $this->client->representative_id = $user->id;
        $this->client->save();

        $this->alert('success', 'Client updated successfully!', [
            'position' =>  'center',
        ]);
        // return redirect(route('clients.index'));
    }
}

<?php

namespace App\Http\Livewire\Billings;

use Livewire\Component;
use App\Models\Billing;
use App\Models\Client;

class Create extends Component
{
    public Billing $billing;
    public Client $client;

    public function mount()
    {
        $this->billing = new Billing();
    }

    public function render()
    {
        return view('livewire.billings.create');
    }
    
}

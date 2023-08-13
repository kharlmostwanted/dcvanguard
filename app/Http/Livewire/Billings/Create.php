<?php

namespace App\Http\Livewire\Billings;

use Livewire\Component;
use App\Models\Billing;
use App\Models\Client;

class Create extends Component
{
    public Billing $billing;
    public Client $client;
    public $item;
    public $amount;
    public $due_at;

    public function mount()
    {
        $this->billing = new Billing();
    }

    public function render()
    {
        return view('livewire.billings.create');
    }

    public function rules()
    {
        return [
            'item' => 'required|string',
            'amount' => 'required|numeric|string|min:.01',
            'due_at' => 'required|date',
        ];
    }

    public function save()
    {
        $this->validate();
    }
}

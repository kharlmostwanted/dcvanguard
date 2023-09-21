<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Billing;

class BillingCard extends Component
{
    public Billing $billing;
    protected $listeners = ['billingUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.components.billing-card');
    }

    public function getTotalAmountProperty()
    {
        return $this->billing->items->sum('pivot.price');
    }
}

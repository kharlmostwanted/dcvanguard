<?php

namespace App\Http\Livewire\Billings;

use App\Models\Billing;
use Livewire\Component;
use App\Models\Payment;

class Show extends Component
{
    public Billing $billing;
    public $client;

    public function render()
    {
        $this->client = $this->billing->client;
        return view('livewire.billings.show');
    }

    public function getTotalAmountProperty()
    {
        return $this->billing->items->sum('pivot.price');
    }

    public function markPaid()
    {
        Payment::firstOrCreate([
            'billing_id' => $this->billing->id,
            'amount' => $this->totalAmount,
        ]);
    }

    public function delete()
    {
        // $this->billing->items()->detach();
        $this->billing->delete();
        session()->flash('success', 'Billing deleted successfully');
    }
}

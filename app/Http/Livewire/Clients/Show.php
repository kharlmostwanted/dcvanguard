<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use App\Models\Payment;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    public Client $client;
    public function render()
    {
        return view('livewire.clients.show');
    }

    public function markPaid($billingId)
    {
        $billing = $this->client->billings()->find($billingId);
        Payment::firstOrCreate([
            'billing_id' => $billing->id,
            'amount' => $billing->items->sum('pivot.price'),
        ]);

        $this->alert('success', 'Billing marked as paid!', [
            'position' => 'center'
        ]);
    }

    public function markUnpaid($billingId)
    {
        $billing = $this->client->billings()->find($billingId);
        $billing->payments()->delete();
        $this->alert('success', 'Billing marked as unpaid!', [
            'position' => 'center'
        ]);
    }

    public function getBillingsProperty()
    {
        return $this->client->billings()
            ->with('payments')->get();
    }
}

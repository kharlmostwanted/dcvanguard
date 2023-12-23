<?php

namespace App\Http\Livewire\Clients;

use App\Models\Client;
use Livewire\Component;
use App\Models\Payment;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Show extends Component
{
    use LivewireAlert;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Client $client;
    public $status;

    protected $queryString = [
        'status' => ['except' => ''],
    ];

    public function render()
    {
        return view('livewire.clients.show');
    }

    public function markPaid($billingId)
    {
        $billing = $this->billings()->find($billingId);
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
        $billing = $this->billings()->find($billingId);
        $billing->payments()->delete();
        $this->alert('success', 'Billing marked as unpaid!', [
            'position' => 'center'
        ]);
    }

    public function billings()
    {
        return $this->client
            ->billings()
            ->with('payments')
            ->withCasts(['start_date' => 'date', 'end_date' => 'date'])
            ->orderBy('end_date', 'desc')
            ->when($this->status == 'fully-paid', function ($query) {
                $query->fullyPaid();
            })->when($this->status == 'partially-paid', function ($query) {
                $query->partiallyPaid();
            })->when($this->status == 'unpaid', function ($query) {
                $query->unpaid();
            })->when($this->status == 'overpaid', function ($query) {
                $query->overpaid();
            });
    }

    public function getBillingsProperty()
    {
        return $this->billings()->paginate(10);
    }
}

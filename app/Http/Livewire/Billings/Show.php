<?php

namespace App\Http\Livewire\Billings;

use App\Models\Billing;
use Livewire\Component;
use App\Models\Payment;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    public Billing $billing;
    public $client;
    public $payment;

    public function mount()
    {
        $this->payment = $this->billing->payments()->first() ?? new Payment([
            'billing_id' => $this->billing->id,
            'amount' => $this->totalAmount,
            'received_at' => now(),
        ]);

        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('m/d/Y');
        $this->payment->check_date = Carbon::parse($this->payment->check_date)->format('m/d/Y');
    }

    public function rules()
    {
        return [
            'payment.received_at' => 'required|date',
            'payment.or_number' => 'required|string',
            'payment.check_number' => 'nullable|string',
            'payment.check_bank' => 'nullable|string',
            'payment.check_date' => 'nullable|date',
        ];
    }

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
        $this->payment = Payment::firstOrCreate([
            'billing_id' => $this->billing->id,
            'amount' => $this->totalAmount,
            'received_at' => now(),
        ]);
        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('m/d/Y');
    }

    public function delete()
    {
        // $this->billing->items()->detach();
        $this->billing->delete();
        session()->flash('success', 'Billing deleted successfully');
    }

    public function savePayment()
    {
        //format payment date to be mysql friendly format
        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('Y-m-d');
        $this->payment->check_date = Carbon::parse($this->payment->check_date)->format('Y-m-d');
        $this->payment->save();
        //format the dates back to be human friendly
        $this->payment->received_at = Carbon::parse($this->payment->received_at)->format('m/d/Y');
        $this->payment->check_date = Carbon::parse($this->payment->check_date)->format('m/d/Y');
        //flash the success message
        $this->alert('success', 'Payment Details Saved!', [
            'position' => 'bottom-end'
        ]);
    }
}
